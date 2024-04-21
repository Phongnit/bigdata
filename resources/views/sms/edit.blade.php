@extends('layout.master')
@section('title')
    [Edit] {{$emails->subject}}
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chỉnh sửa SMS</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa SMS</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-3">
                        <a href="{{ route('emails.index')}}" class="btn btn-primary btn-block mb-3">Quay lại danh sách</a>
                        

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Folders</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item active">
                                        <a href="{{ route('emails.index') }}" class="nav-link">
                                            @php
                                               $count = DB::table('table_emails')->count(); 
                                            @endphp
                                            <i class="fas fa-inbox"></i> Danh sách
                                            <span class="badge bg-primary float-right">{{$count}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-envelope"></i> Gửi SMS
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-file-alt"></i> Bản nháp
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-trash-alt"></i> Thùng rác
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Labels</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i>
                                            Important</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i>
                                            Promotions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i>
                                            Social</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Chỉnh sửa SMS</h3>
                            </div>
                            <!-- /.card-header -->
                            <form id="emailForm" action="" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" placeholder="Tiêu đề:" value="{{$emails->subject}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nội dung:</label>
                                        <textarea id="compose-textarea" name="content" class="form-control" style="height: 300px; display: none;" placeholder="Nội dung:">
                                            {!!$emails->content!!}
                                        </textarea>
                                    </div>
                                    <input type="hidden" name="status" id="statusInput" value="">
                                    <input type="hidden" name="user_id" value="1">
                                    {{-- <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                        <i class="fas fa-paperclip"></i> Đính kèm tệp
                                        <input type="file" name="attachment">
                                    </div>
                                    <p class="help-block">Tối đa. 32MB</p>
                                </div> --}}
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="button" id="saveDraftBtn" class="btn btn-default"><i class="fas fa-pencil-alt"></i>
                                            Lưu nháp</button>
                                        <button type="submit" id="sendEmailBtn" class="btn btn-primary"><i class="far fa-envelope"></i>
                                            Lưu mẫu SMS</button>
                                    </div>
                                    <button type="reset" class="btn btn-default"><i class="fas fa-times"></i>
                                        Discard</button>
                                </div>
                            </form>
                            <!-- /.card-footer -->
                            <script>
                                var saveDraftBtn = document.getElementById('saveDraftBtn');
                                var sendEmailBtn = document.getElementById('sendEmailBtn');
                                var statusInput = document.getElementById('statusInput');
                                var emailForm = document.getElementById('emailForm');
                            
                                saveDraftBtn.addEventListener('click', function () {
                                    statusInput.value = 0; // Thiết lập giá trị status = 0
                                    emailForm.submit(); // Gửi form đi
                                });
                            
                                sendEmailBtn.addEventListener('click', function () {
                                    statusInput.value = 1; // Thiết lập giá trị status = 1
                                    emailForm.submit(); // Gửi form đi
                                });
                            </script>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
