@extends('parent.body')
@section('body')
<style>
    body {
        font-family: 'Times New Roman', Times, serif;
        background-color: #e6e6e6;
    }
</style>

<body>
    <div class="text-center">
        <h3>RUKUN TETANGGA 017</h3>
        <h3>RUKUN WARGA 010</h3>
        <h3>KELURAHAN UTAN KAYU UTARA KECAMATAN MATRAMAN</h3>
        <h3>KOTA ADMINISTRASI JAKARTA TIMUR</h3>
        <p>Sekretariat : GG. KRAMAT ASEM</p>

    </div>
    <hr size="3" color="black">
    </hr>
    <div class="text-center">
        <h3><b>SURAT PENGANTAR</b></h3>
        <h3>{{ $noSurat }}</h3>
    </div>

    <p>Yang bertanda tangan dibawah ini, menerangkan bahwa :</p>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $getData->name }}</td>
        </tr>
        <tr>
            <td>Tempat/Tgl. lahir</td>
            <td>:</td>
            <td>{{$getData->ttl_tempat}}, {{ date_format(date_create($getData->ttl_tahun), "d-F-Y")}}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            @if ($getData->gender == "L")
                <td>Laki - Laki</td>
            @elseif ($getData->gender == "P")
                <td>Perempuan</td>
            @endif
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{$getData->agama}}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{$getData->pekerjaan}}</td>
        </tr>
        <tr>
            <td>No. KTP</td>
            <td>:</td>
            <td>{{$getData->ktp}}</td>

        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$getData->alamat}}</td>

        </tr>
        <tr>
            <td>Keperluan</td>
            <td>:</td>
            <td>{{$getData->keperluan}}</td>
        </tr>
    </table>
    <p>Demikian surat pengantar ini dibuat untuk dapat dipergunakan sebagaimana mestinya dan yang berkepentingan untuk
        menjadi maklum</p>
    <div class="float-right">
        <table style="margin-right: 50px;">
            <tr>
                <td style="padding-right: 100px;">no. ...................</td>
                <td>Jakarta, @php
                    echo Date('d-F-Y')
                @endphp
                </td>
            </tr>
            <tr>
                <td>pengurus RW.010</td>
                <td style="padding-bottom: 10px;">pengurus RT.017/RW.010</td>
            </tr>
            <tr>
                <td></td>
                <td style="padding-bottom: 10px;">
                    <div class="text-center">
                        {!! QrCode::size(100)->generate($getDataProses->lastupdatedby) !!}
                    </div>
                </td>
            </tr>
            <tr>
                <td>.............................</td>
                <td>
                    <div class="text-center">
                        {{$getDataProses->lastupdatedby}}
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
@endsection