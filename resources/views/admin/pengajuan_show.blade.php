@extends('parent/body')
@section('body')

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('partial/navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('partial/sidebar')
        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pengajuan Baru</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Buat Pengajuan Baru</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @if ($errors->has('summary'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $errors->first('summary') }}</strong>
                    </div>
                @endif
                <form method="post">
                    @method('PUT')
                    @csrf()
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="noreg" value="{{ $getData->noreg }}">
                                    <div class="form-group">
                                        <label for="nama">Name pemohon</label>
                                        <input type="text" id="nama" name="nama" class="form-control"
                                            value="{{ $getData->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Tempat & Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" id="ttl_place" name="ttl_place" class="form-control"
                                                    value="{{ $getData->ttl_tempat }}" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" id="ttl_date" name="ttl_date" class="form-control"
                                                    value="{{ $getData->ttl_tahun }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Jenis Kelamin</label>
                                        <select id="inputStatus" name="jenis_kelamin" class="form-control custom-select"
                                            readonly>
                                            <option selected readonly>Pilih salah satu</option>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" id="agama" name="agama" class="form-control"
                                            value="{{ $getData->agama }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control"
                                            value="{{ $getData->pekerjaan }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="ktp">No. KTP</label>
                                        <input type="text" id="ktp" name="ktp" class="form-control"
                                            value="{{ $getData->ktp }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">alamat</label>
                                        <textarea id="alamat" class="form-control" name="alamat" rows="4"
                                            readonly>{{ $getData->alamat }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="keperluan">keperluan</label>
                                        <textarea id="keperluan" class="form-control" name="keperluan" rows="4"
                                            readonly>{{ $getData->keperluan }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="summary">alasan di tolak / setuju</label>
                                        <textarea id="summary" class="form-control" name="summary" rows="4"
                                            aria-required="harap diisi" required>{{$getSummary->summary ?? ""}}</textarea>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('login.homepage') }}" class="btn btn-secondary">Kembali</a>
                            <!-- <a href="{{ route('pengajuan.update', ["id" => $getData->noreg]) }}" type="submit"
                                class="btn btn-success float-right ml-3">Setuju</a>
                            <a href="{{ route('pengajuan.update', ["id" => $getData->noreg]) }}" type="submit"
                                class="btn btn-danger float-right">tolak</a> -->
                            <button type="submit" value="accept" name="submit"
                                class="btn btn-success float-right ml-3">setuju</button>
                            <button type="submit" value="reject" name="submit"
                                class="btn btn-danger float-right">tolak</button>
                        </div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer mt-3">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.0.1
            </div>
            <strong>Copyright &copy; 2024 Muhammad Rafli Syafei.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

</body>
@endsection