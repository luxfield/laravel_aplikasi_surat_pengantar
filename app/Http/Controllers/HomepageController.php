<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomepageController extends Controller
{
    //
    public function index()
    {
        $judul = 'Halaman Utama';
        $getUser = Auth::user();
        if ($getUser->role == "administrator") {
            $userloginname = $getUser->name;
            $getData = DB::table('pengajuan')->select(['*','pengajuan.noreg','pengajuan.lastupdatedatetime as tgl_permohonan','pengajuan_proses.lastupdatedatetime as tgl_hasil'])->orderByDesc('pengajuan.lastupdatedatetime')->leftJoin('pengajuan_proses','pengajuan_proses.noreg','=','pengajuan.noreg')->get();
            return view('admin.homepage_index', compact('judul', 'getData','userloginname'));
        } else {
            $userloginname = $getUser->name;
            $getData = DB::table('pengajuan')->orderByDesc('lastupdatedatetime')->where('userid','=', $getUser->id)->get();
            return view('homepage', compact('judul', 'getData','userloginname'));
        }
    }
}
