@extends('parent/body')
@section('body')

<body class="hold-transition sidebar-mini">
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">List pengajuan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">List pengajuan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>

                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the
                                        card's
                                        content.
                                    </p>

                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div> -->
                            <!-- 
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>

                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the
                                        card's
                                        content.
                                    </p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div> -->
                            <!-- /.card -->
                            <!-- TABLE: LATEST ORDERS -->
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Pengajuan Terakhir</h3>

                                    <div class="card-tools">
                                        <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button> -->
                                        <!-- <a href="{{ route('pengajuan.index') }}" class="btn btn-sm btn-info">Buat
                                            pengajuan baru</a> -->
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Pemohon</th>
                                                    <th>Keperluan</th>
                                                    <th>Status</th>
                                                    <th>Tanggal pengajuan</th>
                                                    <th>Tanggal hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getData as $data)
                                                    <tr>
                                                        <td><a
                                                                href="{{ route('pengajuan.show', ["id" => $data->noreg]) }}">{{ $data->noreg }}</a>
                                                        </td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->keperluan }}</td>
                                                        @if ($data->status == "pending")
                                                            <td><span class="badge badge-warning">{{ $data->status }}</span>
                                                            </td>
                                                        @elseif ($data->status == "accept")
                                                            <td><span class="badge badge-success">{{ $data->status }}</span>
                                                            </td>
                                                        @elseif ($data->status == "reject")
                                                            <td><span class="badge badge-danger">{{ $data->status }}</span></td>
                                                        @endif
                                                        <td>
                                                            {{ $data->tgl_permohonan }}
                                                        </td>
                                                        <td>
                                                            {{ $data->tgl_hasil }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Lihat
                                        semua pengajuan</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                        <!-- <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div> -->
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->


</body>
@endsection