@extends('layout.master')
@section('title')
    Bản nháp
@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Bản nháp</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Bản nháp</li>
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

                                <div id="filter">
                                    <div class="amount-flt">
                                        <label for="itemsPerPage">Số phần tử trên mỗi trang:</label>
                                        <select id="itemsPerPage" onchange="changeItemsPerPage()">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive mailbox-messages">
                                    <table id="tb-email" class="table table-hover table-striped">
                                        <thead>
                                            {{-- <th></th> --}}
                                            <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Người tạo</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                            <th>Ngày tạo</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @foreach ($emails as $emails)
                                                <tr>
                                                    {{-- <td>
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" value="" id="check15">
                                                            <label for="check15"></label>
                                                        </div>
                                                    </td> --}}
                                                    <td class="mailbox-star">{{ $loop->iteration }}</td>
                                                    <td class="mailbox-name">{{ $emails->subject }}</td>
                                                    <td class="mailbox-subject">{{ $emails->users->name }}</td>
                                                    <td>{{ $emails->deleted_at == null ? 'Đã duyệt' : 'Đã xóa' }}</td>
                                                    <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                    <td class="mailbox-date">{{ $emails->created_at->format('d/m/Y') }}</td>
                                                    <td><a href="{{ route('emails.edit', ['id' => $emails->id]) }}"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('emails.delete', ['id' => $emails->id]) }}"
                                                            onclick="return confirm('Bạn có chắc muốn xóa không?');"><i
                                                                style="color: red;" class="fa fa-trash"
                                                                aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div id="pagination-container">
                                    <button onclick="previousPage()">&lt;</button>
                                    <span id="pagination"></span>
                                    <button onclick="nextPage()">&gt;</button>
                                    {{-- <a id="send_email" href="{{ route('emails.sendmore', ['id' => $emails->id]) }}"
                                        onclick="return confirm('Bạn có chắc muốn những mail đã chọn không?');"class="btn btn-default"><i
                                            class="fas fa-share"></i> Gửi Email</a> --}}
                                </div>

                                <script>
                                    var currentPage = 1;
                                    var recordsPerPage = 10;
                                    var rows = document.getElementById('tb-email').getElementsByTagName('tbody')[0].rows;
                                    var totalRecords = rows.length;
                                    var totalPages = Math.ceil(totalRecords / recordsPerPage);

                                    showPage(currentPage);

                                    function showPage(page) {
                                        currentPage = page;
                                        var start = (page - 1) * recordsPerPage;
                                        var end = start + recordsPerPage;

                                        for (var i = 0; i < totalRecords; i++) {
                                            rows[i].style.display = 'none';
                                        }

                                        for (var j = start; j < end; j++) {
                                            if (rows[j]) {
                                                rows[j].style.display = 'table-row';
                                            }
                                        }

                                        var paginationContainer = document.getElementById('pagination');
                                        paginationContainer.innerHTML = '';

                                        var paginationHTML = '';

                                        if (totalPages <= 5) {
                                            for (var k = 1; k <= totalPages; k++) {
                                                paginationHTML += '<button onclick="showPage(' + k + ')" ' + (k === currentPage ? 'class="active"' :
                                                    '') + '>' + k + '</button>';
                                            }
                                        } else {
                                            var startPage, endPage;

                                            if (currentPage <= 3) {
                                                startPage = 1;
                                                endPage = 5;
                                            } else if (currentPage >= totalPages - 2) {
                                                startPage = totalPages - 4;
                                                endPage = totalPages;
                                            } else {
                                                startPage = currentPage - 2;
                                                endPage = currentPage + 2;
                                            }

                                            for (var k = startPage; k <= endPage; k++) {
                                                paginationHTML += '<button onclick="showPage(' + k + ')" ' + (k === currentPage ? 'class="active"' :
                                                    '') + '>' + k + '</button>';
                                            }

                                            if (currentPage > 3) {
                                                paginationHTML = '<button onclick="showPage(1)">1</button><span>...</span>' + paginationHTML;
                                            }

                                            if (currentPage < totalPages - 2) {
                                                paginationHTML += '<span>...</span><button onclick="showPage(' + totalPages + ')">' + totalPages +
                                                    '</button>';
                                            }
                                        }

                                        paginationContainer.innerHTML = paginationHTML;
                                    }

                                    function previousPage() {
                                        if (currentPage > 1) {
                                            showPage(currentPage - 1);
                                        }
                                    }

                                    function nextPage() {
                                        if (currentPage < totalPages) {
                                            showPage(currentPage + 1);
                                        }
                                    }

                                    function changeItemsPerPage() {
                                        recordsPerPage = parseInt(document.getElementById('itemsPerPage').value);
                                        totalPages = Math.ceil(totalRecords / recordsPerPage);
                                        showPage(1);
                                    }
                                </script>
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
