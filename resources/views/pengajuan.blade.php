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
                                    <!-- <h3 class="card-title">General</h3> -->

                                    <!-- <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div> -->
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="nama">Name</label>
                                        <input type="text" id="nama" name="nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Tempat & Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" id="ttl_place" name="ttl_place" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" id="ttl_date" name="ttl_date" class="form-control">
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
                                        <input type="text" id="agama" name="agama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ktp">No. KTP</label>
                                        <input type="text" id="ktp" name="ktp" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">alamat</label>
                                        <textarea id="alamat" class="form-control" name="alamat" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="keperluan">keperluan</label>
                                        <textarea id="keperluan" class="form-control" name="keperluan" rows="4"></textarea>
                                    </div>
                                    <!-- <div class="form-group">
                                    <label for="inputStatus">Status</label>
                                    <select id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option>On Hold</option>
                                        <option>Canceled</option>
                                        <option>Success</option>
                                    </select>
                                </div> -->
                                    <!-- <div class="form-group">
                                    <label for="inputClientCompany">Client Company</label>
                                    <input type="text" id="inputClientCompany" class="form-control">
                                </div> -->
                                    <!-- <div class="form-group">
                                    <label for="inputProjectLeader">Project Leader</label>
                                    <input type="text" id="inputProjectLeader" class="form-control">
                                </div> -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Budget</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Estimated budget</label>
                                    <input type="number" id="inputEstimatedBudget" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputSpentBudget">Total amount spent</label>
                                    <input type="number" id="inputSpentBudget" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedDuration">Estimated project duration</label>
                                    <input type="number" id="inputEstimatedDuration" class="form-control">
                                </div>
                            </div> -->
                        <!-- /.card-body -->
                        <!-- </div> -->
                        <!-- /.card -->
                        <!-- </div> -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('login.homepage') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" value="Create new Project" class="btn btn-success float-right">Tambah Pengajuan baru</button>
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