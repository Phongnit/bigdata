@extends('layout.master')
@section('title')
    Thêm mới submit
@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm mới</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Thêm submit</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    @csrf
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>Ngày tạo:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" name="day_create" class="form-control" data-inputmask-alias="datetime"
                                                data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Số điện thoại:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name="phone" class="form-control"
                                                data-inputmask='"mask": "999 999 9999"' data-mask>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- IP mask -->
                                    <div class="form-group">
                                        <label>Email:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <!-- IP mask -->
                                    <div class="form-group">
                                        <label>Lời nhắn:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-comment"></i></span>
                                            </div>
                                            <input type="text" name="message" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <!-- IP mask -->
                                    <div class="form-group">
                                        <label>Lĩnh vực:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-cog"></i></span>
                                            </div>
                                            <input type="text" name="field" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <div class="form-group">
                                        <label>Khu vực:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-globe" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" name="country" class="form-control">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <button type="submit" class="btn btn-block btn-success">Thêm Data  <i class="fa fa-plus" aria-hidden="true"></i></button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.col (right) -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Thêm data bằng file</small></h3>
                            </div>
                            <div class="card-body">
                                <div id="actions" class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-group w-100">
                                            <span class="btn btn-success col fileinput-button dz-clickable">
                                                <i class="fas fa-plus"></i>
                                                <span>Add files</span>
                                            </span>
                                            <button type="submit" class="btn btn-primary col start">
                                                <i class="fas fa-upload"></i>
                                                <span>Start upload</span>
                                            </button>
                                            <button type="reset" class="btn btn-warning col cancel">
                                                <i class="fas fa-times-circle"></i>
                                                <span>Cancel upload</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 d-flex align-items-center">
                                        <div class="fileupload-process w-100">
                                            <div id="total-progress" class="progress progress-striped active"
                                                role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                <div class="progress-bar progress-bar-success" style="width:0%;"
                                                    data-dz-uploadprogress=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table table-striped files" id="previews">

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                upload file
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection