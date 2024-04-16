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
                                <a class="button btn-success" href="{{ route('submit.create')}}">Thêm mới</a>
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
                                        @foreach ($submits as $submit)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $submit->name }}</td>
                                                <td>{{ $submit->phone }}</td>
                                                <td>{{ $submit->email }}</td>
                                                <td>{{ $submit->description }}</td>
                                                <td>{{ $submit->field->name }}</td>
                                                <td>{{ $submit->country->name }}</td>
                                                <td>
                                                    <ul
                                                        style="display: flex; list-style: none; justify-content: space-evenly; padding: 0;">
                                                        <li><a href="{{ route('submit.show', ['id' => $submit->id]) }}"><i  style="color: green;"
                                                                    class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                        <li><a href="{{ route('submit.edit', ['id' => $submit->id]) }}"><i  style= "color: blue;"
                                                                    class="fa fa-wrench" aria-hidden="true"></i></a></li>
                                                        <li><a href="{{ route('submit.delete', ['id' => $submit->id]) }}" onclick="return confirm('Bạn có chắc muốn xóa không?');"><i  style="color: red;"
                                                                    class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
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
