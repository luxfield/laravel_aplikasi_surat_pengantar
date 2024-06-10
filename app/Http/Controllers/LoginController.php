<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Auth};
use App\Models\User;
use DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get without id
        return view('login', ["judul" => "login"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // post
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route("login.homepage")->with('berhasil', 'login berhasil');
            ;
        } else {
            return redirect()->route('login.auth')->with('gagal', 'username atau password salah');
        }
        ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.auth');
    }

    public function register(Request $request)
    {
        $judul = "pendaftaran member";
        return view('register', compact("judul"));
    }
    public function doRegister(Request $request)
    {
        $judul = "pendaftaran member";
        $validate = $request->validate([
            "namalengkap" => "required",
            "email" => "required",
            "password" => "required",
            "retypepassword" => "required",
        ]);
        if ($validate) {
            $getUser = User::where("email", $request->email)->first();
            if ($getUser == null) {
                $user = DB::table("users")->insert([
                    "name" => $request->namalengkap,
                    "email" => $request->email,
                    "email_verified_at" => date("Y-m-d H:i:s"),
                    "password" => bcrypt($request->password),
                    "role" => "member",
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s"),
                ]);
                return redirect()->route("login.auth")->with("success", "pendaftaran berhasil");
            } else {
                return redirect()->route('register')->with("error", "email sudah digunakan");
            }
        } else {
            return redirect()->route('register')->with("error", "input belum dimasukkan");
        }
    }

    public function forgotPassword(Request $request)
    {
        $judul = "lupa password";
        return view("forgotpassword", compact("judul"));
    }
    public function doForgotPassword(Request $request)
    {
        $user = User::where("email", $request->email)->first();
        $userEmail = $user->email;
        if ($user == null) {
            return redirect()->route("forgotPassword")->with("error", "email tidak ditemukan");
        } else {
            return redirect()->route("recoveryPassword", compact("userEmail"));
        }
    }
    public function recoveryPassword(Request $request)
    {
        $judul = "Pemulihan Akun";
        $userEmail = $request->userEmail;
        return view("recoverypassword", compact("judul", "userEmail"));
    }
    public function doRecoveryPassword(Request $request)
    {
        $validate = $request->validate([
            "password" => "required",
            "confirmpassword" => "required"
        ]);

        if ($validate) {
            $user = DB::table("users")->where("email", $request->email)->update([
                "password" => bcrypt($request->password)
            ]);
            if ($user == true) {
                return redirect()->route("login.auth")->with("success", "berhasil ubah password");
            } else {
                return redirect()->route("recoveryPassword")->with("error", "gagal ubah");
            }
        } else {
            return redirect()->route("recoveryPassword")->with("error", "gagal ubah");
        }
    }

}
