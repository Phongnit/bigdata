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
                            <div class="card-header"
                                style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                                <a class="button btn-success" href="{{ route('submit.create') }}">Thêm mới</a>
                                <form id="search-form" method="GET" style="right: 0;">
                                    <input type="text" name="search" placeholder="Tìm kiếm"
                                        value="{{ request('search') }}">
                                    <select id="country" name="country">
                                        <option value="">Quốc gia</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ ($filters['country'] ?? '') == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <select id="field" name="field">
                                        <option value="">Lĩnh vực</option>
                                        @foreach ($fields as $field)
                                            <option value="{{ $field->id }}"
                                                {{ ($filters['field'] ?? '') == $field->id ? 'selected' : '' }}>
                                                {{ $field->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit">Tìm kiếm</button>
                                </form>
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
                                            <th>Quốc gia</th>
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
                                                        <li><a href="{{ route('submit.show', ['id' => $submit->id]) }}"><i
                                                                    style="color: green;" class="fa fa-eye"
                                                                    aria-hidden="true"></i></a></li>
                                                        <li><a href="{{ route('submit.edit', ['id' => $submit->id]) }}"><i
                                                                    style= "color: blue;" class="fa fa-wrench"
                                                                    aria-hidden="true"></i></a></li>
                                                        <li><a href="{{ route('submit.delete', ['id' => $submit->id]) }}"
                                                                onclick="return confirm('Bạn có chắc muốn xóa không?');"><i
                                                                    style="color: red;" class="fa fa-trash"
                                                                    aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div id="pagination-container">
                                    <button onclick="previousPage()">Trang trước</button>
                                    <span id="pagination"></span>
                                    <button onclick="nextPage()">Trang tiếp theo</button>
                                </div>
                                
                                <script>
                                    var currentPage = 1;
                                    var recordsPerPage = 10;
                                    var rows = document.getElementById('example1').getElementsByTagName('tbody')[0].rows;
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
                                                paginationHTML += '<button onclick="showPage(' + k + ')" ' + (k === currentPage ? 'class="active"' : '') + '>' + k + '</button>';
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
                                                paginationHTML += '<button onclick="showPage(' + k + ')" ' + (k === currentPage ? 'class="active"' : '') + '>' + k + '</button>';
                                            }
                                
                                            if (currentPage > 3) {
                                                paginationHTML = '<button onclick="showPage(1)">1</button><span>...</span>' + paginationHTML;
                                            }
                                
                                            if (currentPage < totalPages - 2) {
                                                paginationHTML += '<span>...</span><button onclick="showPage(' + totalPages + ')">' + totalPages + '</button>';
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
