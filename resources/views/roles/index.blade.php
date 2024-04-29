@extends('layout.master')
@section('title')
    List Roles
@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Roles</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">List Roles</li>
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
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <a class="button btn-success" href="{{ route('roles.create') }}">Thêm mới</a>

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
                                {{-- <div class="mailbox-controls">
                                    <!-- Check all button -->
                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                            class="far fa-square"></i>
                                    </button>
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
                                </div> --}}
                                <div class="table-responsive mailbox-messages">
                                    <table id="role-table" class="table table-hover table-striped">
                                        <thead>
                                            <th><input type="checkbox" name="all" id=""></th>
                                            <th>Role Name</th>
                                            <th>Role</th>
                                            <th>User</th>
                                            <th>Chức năng</th>
                                            <th>Chặn</th>
                                            <th>Tùy chọn</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $item)
                                                <tr>
                                                    <td>
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" value="" id="check{{$item->id}}">
                                                            <label for="check{{$item->id}}"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td class="mailbox-star">{{ $loop->iteration }}</td> --}}
                                                    <td class="mailbox-name">{{ $item->name }}</td>
                                                    <td class="mailbox-subject">{{ $item->name }}</td>
                                                    @php
                                                        $grant = App\Models\RolePer::where('role_id',$item->id)->count();
                                                        $count = App\Models\User::where('role_id',$item->id)->count();
                                                        @endphp
                                                    <td class="mailbox-subject"><a href="{{ route('roles.user', ['id' => $item->id]) }}">{{$count}} <i class="text-primary fas fa-user"></i></a></td>
                                                    <td class="mailbox-subject">{{$grant}}</td>
                                                    <td class="mailbox-subject">0</td>
                                                    {{-- <td class="mailbox-date">{{ $item->created_at->format('d/m/Y') }}</td> --}}
                                                    <td><a href="{{ route('roles.edit', ['id' => $item->id]) }}"><i class="text-primary fas fa-edit"> Set Quyền</i></a>
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
                                    <div class="float-right">
                                        <span id="pagination"></span>
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

                                    <script>
                                        var currentPage = 1;
                                        var recordsPerPage = 15;
                                        var rows = document.getElementById('role-table').getElementsByTagName('tbody')[0].rows;
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
                    document.getElementById('role-table').innerHTML = data;
                });
        });
    </script>
@endsection
