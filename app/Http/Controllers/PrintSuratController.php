<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PrintSuratController extends Controller
{
    //
    public function index(Request $request, string $noreg)
    {
        $judul = "cetak surat";
        $getData = DB::table("pengajuan")->where("noreg", $noreg)->first();
        $getDataProses = DB::table("pengajuan_proses")->where("noreg", $noreg)->first();
        $getNoSurat = DB::table("archive_surat")->orderByDesc("lastupdatedatetime")->first();
        $getNoSuratById = DB::table("archive_surat")->where("noreg", $noreg)->first();
        if ($getNoSuratById == null) {
            if ($getNoSurat == null) {
                $noUrut = "1";
                $noSurat = $noUrut . "/010/6/JT/" . date("Y");
                DB::table("archive_surat")->insert([
                    "nosurat" => $noSurat,
                    "noreg" => $noreg,
                    "isactive" => 1,
                    "isdeleted" => 1,
                    "lastupdateby" => "system",
                    "lastupdatedatetime" => date("Y-m-d H:m:s"),
                ]);
                return view("PrintSuratView", compact("judul", "noSurat", "getData", "getDataProses"));
            } else {
                $getNoSuratSplit = explode("/", $getNoSurat->nosurat);
                // dd($getNoSuratSplit[4]);
                if ($getNoSuratSplit[4] == date("Y")) {
                    $getintnosurat = (int) $getNoSuratSplit[0];
                    ++$getintnosurat;
                    $getStrNoSurat = (string) $getintnosurat;
                    $noSurat = $getStrNoSurat . "/010/6/JT/" . date("Y");
                    DB::table("archive_surat")->insert([
                        "nosurat" => $noSurat,
                        "noreg" => $noreg,
                        "isactive" => 1,
                        "isdeleted" => 1,
                        "lastupdateby" => "system",
                        "lastupdatedatetime" => date("Y-m-d H:m:s"),
                    ]);
                    return view("PrintSuratView", compact("judul", "noSurat", "getData", "getDataProses"));
                } else {
                    $noUrut = "1";
                    $noSurat = $noUrut . "/010/6/JT/" . date("Y");
                    DB::table("archive_surat")->insert([
                        "nosurat" => $noSurat,
                        "noreg" => $noreg,
                        "isactive" => 1,
                        "isdeleted" => 1,
                        "lastupdateby" => "system",
                        "lastupdatedatetime" => date("Y-m-d H:m:s"),
                    ]);
                    return view("PrintSuratView", compact("judul", "noSurat", "getData", "getDataProses"));
                }
            }
        } else {
            $judul = "archive surat";
            $noSurat = $getNoSuratById->nosurat;
            return view("PrintSuratView", compact("judul", "noSurat", "getData", "getDataProses"));
        }
    }
}
