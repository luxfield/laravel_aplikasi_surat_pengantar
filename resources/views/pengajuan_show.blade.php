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
                            <h1>Buat Pengajuan Baru</h1>
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
                <form method="post">
                    @csrf()
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="nama">Name</label>
                                        <input type="text" id="nama" name="nama" class="form-control" value="{{ $getData->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Tempat & Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" id="ttl_place" name="ttl_place" class="form-control" value="{{ $getData->ttl_tempat }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" id="ttl_date" name="ttl_date" class="form-control" value="{{ $getData->ttl_tahun }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Jenis Kelamin</label>
                                        <select id="inputStatus" name="jenis_kelamin" class="form-control custom-select">
                                            <option selected disabled>Pilih salah satu</option>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" id="agama" name="agama" class="form-control" value="{{ $getData->agama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" value="{{ $getData->pekerjaan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="ktp">No. KTP</label>
                                        <input type="text" id="ktp" name="ktp" class="form-control" value="{{ $getData->ktp }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">alamat</label>
                                        <textarea id="alamat" class="form-control" name="alamat" rows="4" >{{ $getData->alamat }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="keperluan">keperluan</label>
                                        <textarea id="keperluan" class="form-control" name="keperluan" rows="4">{{ $getData->keperluan }}</textarea>
                                    </div>
                                  
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('login.homepage') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" value="Create new Project" class="btn btn-success float-right">Create
                                new
                                Project</button>
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

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>
@endsection