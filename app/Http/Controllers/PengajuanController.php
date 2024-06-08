<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userloginname = Auth::user()->name;
        return view("pengajuan", ["judul" => "Buat Pengajuan Baru", "userloginname" => $userloginname]);
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
        setlocale(LC_TIME, 'id_ID');
        //
        $noreg = "";
        $getLatestNoreg = DB::table("pengajuan")->orderByDesc("noreg")->limit(1)->first();
        if ($getLatestNoreg == null) {
            $noreg = "REQ/" . date("Ymd") . "/0001";
        } else {
            // dd($request->all());
            $splitReg = explode("/", $getLatestNoreg->noreg);

            if ($splitReg[1] == date("Ymd")) {
                $intReg = (int) $splitReg[2];
                $strReg = str_pad((string) ++$intReg, strlen($splitReg[2]), "0", STR_PAD_LEFT);
                $noreg = "REQ/" . date("Ymd") . "/" . $strReg;
            } else {
                $noreg = "REQ/" . date("Ymd") . "/0001";
            }
        }

        $nama = $request->input("nama");
        $ttl_tempat = $request->input("ttl_place");
        $ttl_date = $request->input("ttl_date");
        $jenis_kelamin = $request->input("jenis_kelamin");
        $agama = $request->input("agama");
        $pekerjaan = $request->input("pekerjaan");
        $ktp = $request->input("ktp");
        $alamat = $request->input("alamat");
        $keperluan = $request->input("keperluan");
        $status = "pending";
        $is_active = 1;
        $is_deleted = 0;
        $lastupdatedby = "system";
        $lastupdatedDatetime = date("Y-m-d H:m:s");

        DB::table("pengajuan")->insert([
            "noreg" => $noreg,
            "name" => $nama,
            "ttl_tempat" => $ttl_tempat,
            "ttl_tahun" => $ttl_date,
            "gender" => $jenis_kelamin,
            "agama" => $agama,
            "pekerjaan" => $pekerjaan,
            "ktp" => $ktp,
            "alamat" => $alamat,
            "keperluan" => $keperluan,
            "status" => $status,
            "isactive" => $is_active,
            "isdeleted" => $is_deleted,
            "lastupdatedby" => $lastupdatedby,
            "lastupdatedatetime" => $lastupdatedDatetime,
        ]);

        return redirect()->route("login.homepage")->with("success", "berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $getData = DB::table("pengajuan")->where("noreg", $id)->first();
        $judul = "tampilkan pengajuan";
        $userloginname = Auth::user()->name;
        if (Auth::user()->role == "administrator") {
            $getSummary = DB::table("pengajuan_proses")->where("noreg", $id)->first();
            return view("admin.pengajuan_show", compact("judul", "getData", "getSummary","userloginname"));
        } else {
            if (DB::table("pengajuan_proses")->where("noreg", $id)->get()->count() == 1) {
                $judul = "cetak surat pengantar";
                return view('pengajuan_result', compact("judul", "getData","userloginname"));
            } else {
                return view("pengajuan_show", compact("judul", "getData","userloginname"));
            }

        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $getData = DB::table("pengajuan")->where("noreg", $id)->first();
        $judul = "tampilkan pengajuan";
        $userloginname = Auth::user()->name;
        if (Auth::user()->role == "administrator") {
            $getSummary = DB::table("pengajuan_proses")->where("noreg", $id)->first();
            return view("admin.pengajuan_show", compact("judul", "getData", "getSummary","userloginname"));
        } else {
            return view("pengajuan_show", compact("judul", "getData","userloginname"));

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate([
            "summary" => "required",
        ]);
        if (!$validate) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            DB::table("pengajuan")->where("noreg", $request->input("noreg"))->update(["status" => $request->submit]);
            DB::table("pengajuan_proses")->insert([
                "noreg" => $request->input("noreg"),
                "summary" => $request->input("summary"),
                "isactive" => 1,
                "isdeleted" => 1,
                "lastupdatedby" => Auth::user()->name,
                "lastupdatedatetime" => date("Y-m-d H:i:s"),
            ]);
            return redirect()->route("login.homepage")->with("success", "nomor regist : " . $request->input("noreg") . " berhasil diupdate");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
