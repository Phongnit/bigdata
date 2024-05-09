@extends('layout.master')
@section('title')
    Lựa chọn gửi mail
@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Lựa chọn gửi mail</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Lựa chọn gửi mail</li>
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
                            <div class="card-header"
                                style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                                <a class="btn btn-default" href="{{ route('sms.show', ['id' => $sms->id]) }}"><i class="fas fa-reply"></i> Quay lại</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ tên</th>
                                            <th>Số điện thoại</th>
                                            <th>SMS</th>
                                            <th>Lời nhắn</th>
                                            <th>Lĩnh vực</th>
                                            <th>Quốc gia</th>
                                            <th><input type="checkbox" name="tickall"></th>

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
                                                    <input type="checkbox" name="tickmail">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div id="pagination-container">
                                    <a id="send_email" href="{{ route('emails.sendmore', ['id' => $sms->id]) }}"
                                        onclick="return confirm('Bạn có chắc muốn những mail đã chọn không?');"class="btn btn-default"><i
                                            class="fas fa-share"></i> Gửi SMS</a>
                                </div>

          
                                <script>
                                    // Lắng nghe sự kiện khi click vào checkbox "tickall"
                                    document.querySelector('[name="tickall"]').addEventListener('click', function() {
                                        var checkboxes = document.querySelectorAll('[name="tickmail"]');

                                        // Kiểm tra trạng thái của checkbox "tickall"
                                        if (this.checked) {
                                            // Nếu được chọn, tick tất cả các checkbox "tickmail"
                                            checkboxes.forEach(function(checkbox) {
                                                checkbox.checked = true;
                                            });
                                        } else {
                                            // Nếu không được chọn, bỏ tick tất cả các checkbox "tickmail"
                                            checkboxes.forEach(function(checkbox) {
                                                checkbox.checked = false;
                                            });
                                        }
                                        // Kiểm tra số lượng checkbox "tickmail" đã được chọn
                                        var checkedCount = document.querySelectorAll('[name="tickmail"]:checked').length;
                                            // Gán số lượng checkbox "tickmail" đã được chọn vào biến để hiển thị
                                            var selectedCountElement = document.querySelector('#selected-count');
                                            selectedCountElement.textContent = checkedCount;
                                    });

                                    // Lắng nghe sự kiện khi click vào bất kỳ checkbox "tickmail" nào
                                    var tickmailCheckboxes = document.querySelectorAll('[name="tickmail"]');
                                    tickmailCheckboxes.forEach(function(checkbox) {
                                        checkbox.addEventListener('click', function() {
                                            var tickallCheckbox = document.querySelector('[name="tickall"]');

                                            // Kiểm tra số lượng checkbox "tickmail" đã được chọn
                                            var checkedCount = document.querySelectorAll('[name="tickmail"]:checked').length;
                                            // Gán số lượng checkbox "tickmail" đã được chọn vào biến để hiển thị
                                            var selectedCountElement = document.querySelector('#selected-count');
                                            selectedCountElement.textContent = checkedCount;

                                            // Kiểm tra trạng thái của checkbox "tickmail" hiện tại
                                            if (!this.checked) {
                                                // Nếu checkbox "tickmail" bị bỏ chọn, bỏ chọn cả checkbox "tickall"
                                                tickallCheckbox.checked = false;
                                            }
                                        });
                                    });
                                </script>
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

    <script>
        document.getElementById('search-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = event.target;
            var formData = new FormData(form);

            fetch({{ route('submit.list') }}, {
                    method: 'GET',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('example1').innerHTML = data;
                });
        });
    </script>
@endsection
