@extends('layout.master')
@section('title')
    Submit Manager
@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Submit Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Submit Manager</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Lời nhắn</th>
                                            <th>Lĩnh vực</th>
                                            <th>Khu vực</th>
                                            <th>Trạng thái</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Lê Thị Thu</td>
                                            <td>0123456789</td>
                                            <td>thu@gmail.com</td>
                                            <td>Tôi muốn tìm hiểu xuất khẩu lao động úc</td>
                                            <td>XKLĐ
                                            <td>Úc</td>
                                            <td>
                                                <ul>
                                                    <li>Xem</li>
                                                    <li>Chỉnh sửa</li>
                                                    <li>Xóa</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Lê Thị Thu</td>
                                            <td>0123456789</td>
                                            <td>thu@gmail.com</td>
                                            <td>Tôi muốn tìm hiểu xuất khẩu lao động úc</td>
                                            <td>XKLĐ
                                            <td>Úc</td>
                                            <td>
                                                <ul>
                                                    <li>Xem</li>
                                                    <li>Chỉnh sửa</li>
                                                    <li>Xóa</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Lê Thị Thu</td>
                                            <td>0123456789</td>
                                            <td>thu@gmail.com</td>
                                            <td>Tôi muốn tìm hiểu xuất khẩu lao động úc</td>
                                            <td>XKLĐ
                                            <td>Úc</td>
                                            <td>
                                                <ul>
                                                    <li>Xem</li>
                                                    <li>Chỉnh sửa</li>
                                                    <li>Xóa</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Lê Thị Thu</td>
                                            <td>0123456789</td>
                                            <td>thu@gmail.com</td>
                                            <td>Tôi muốn tìm hiểu xuất khẩu lao động úc</td>
                                            <td>XKLĐ
                                            <td>Úc</td>
                                            <td>
                                                <ul>
                                                    <li>Xem</li>
                                                    <li>Chỉnh sửa</li>
                                                    <li>Xóa</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
