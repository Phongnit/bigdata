@extends('layout.master')
@section('title')
    Edit Roles
@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chỉnh sửa : {{ $roles->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Roles</li>
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
                        <form action="{{ route('roles.edit', $roles->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <table id="tb-permission" class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Permission</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Permission</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($permission as $item)
                                            <tr>
                                                <td class="per_id">{{ $loop->iteration }}</td>
                                                <td class="per_title">{{ $item->title }}</td>
                                                {{-- <td>
                                                    <select name="permissions[]" onchange="changeBackgroundColor(this)"
                                                        id="per_status_{{ $item->id }}">
                                                        <option class="red" value="{{ $item->id }}">Chặn</option>
                                                        <option class="green" value="">Cho phép</option>
                                                    </select>
                                                </td> --}}
                                                <td>
                                                    <input type="checkbox" name="permissions[]"
                                                        id="per_status_{{ $item->id }}" value="{{ $item->id }}"
                                                        {{ in_array($item->id, $selectedPermissions) ? 'checked' : '' }}>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <script>
                                        function changeBackgroundColor(selectElement) {
                                            var selectedClass = selectElement.options[selectElement.selectedIndex].className;
                                            selectElement.className = selectedClass;
                                        }
                                    </script>

                                    <style>
                                        .green {
                                            background-color: #a3eba3;
                                        }

                                        .red {
                                            background-color: #ef9191;
                                        }
                                    </style>
                                </table>
                                <button type="submit" style="color: #fff" id="sendEmailBtn" class="btn btn-primary">Lưu
                                    thay đổi <i class="fas fa-save"></i></button>
                            </div>
                        </form>
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
                    document.getElementById('table-submit').innerHTML = data;
                });
        });
    </script>
@endsection
