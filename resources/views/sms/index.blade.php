@extends('layout.master')
@section('title')
    Create SMS
@endsection
@section('main')
    <div class="content-wrapper">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Thành công !</h5>
                {{ session('success') }}
            </div>
        @endif
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">SMS Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">SMS Manager</li>
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
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <a class="button btn-success" href="{{ route('emails.create') }}">Thêm mới</a>

                                <div class="card-tools" style="display:inline-block;">
                                    {{-- <div class="amount-flt">
                                        <label for="itemsPerPage">Số phần tử trên mỗi trang:</label>
                                        <select id="itemsPerPage" onchange="changeItemsPerPage()">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div> --}}
                                    <form id="search-form" class="filter-email" method="GET">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="search" placeholder="Tìm kiếm"
                                                value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="mailbox-controls">
                                    <!-- Check all button -->
                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                            class="far fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-share"></i>
                                        </button>
                                    </div>
                                    <!-- /.btn-group -->
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                    <div class="float-right">
                                        <div class="btn-group">
                                            <button onclick="previousPage()" type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <button type="button" onclick="nextPage()" class="btn btn-default btn-sm">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>
                                        <!-- /.btn-group -->
                                    </div>
                                    <!-- /.float-right -->
                                </div>
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
                                                    <td><a href="{{ route('emails.show', ['id' => $emails->id]) }}"><i class="text-success fas fa-eye"></i></a>
                                                        <a href="{{ route('emails.edit', ['id' => $emails->id]) }}"><i class="text-primary fas fa-edit"></i></a>
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
                                <!-- /.mail-box-messages -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer p-0">
                                <div class="mailbox-controls">
                                    <!-- Check all button -->
                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                        <i class="far fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-share"></i>
                                        </button>
                                    </div>
                                    <!-- /.btn-group -->
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                    <div class="float-right">
                                        <span id="pagination"></span>
                                        <div class="btn-group">
                                            <button onclick="previousPage()" type="button"
                                                class="btn btn-default btn-sm">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <button type="button" onclick="nextPage()" class="btn btn-default btn-sm">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>
                                        <!-- /.btn-group -->
                                    </div>
                                    <!-- /.float-right -->

                                    <script>
                                        var currentPage = 1;
                                        var recordsPerPage = 15;
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
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
