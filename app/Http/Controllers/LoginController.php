<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash,Auth};
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

        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route("login.homepage")->with('berhasil','login berhasil');;
        } else {
            return redirect()->route('login.auth')->with('gagal','username atau password salah');
        };
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

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login.auth');
    }
}
