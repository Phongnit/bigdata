<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist') }}/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist') }}/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('dist') }}/css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-buttons/css/buttons.bootstrap4.min.css">


</head>
@php
use App\Models\Role;
$user = Auth::user();
$roles = Role::find($user->role_id);
$roles = $roles->permission()->pluck('route_name');
$data = $roles->toArray();
@endphp

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('dist') }}/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        {{-- <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> --}}

        {{-- <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dist') }}/img/user1-128x128.jpg" alt="User Avatar"
        class="img-size-50 mr-3 img-circle">
        <div class="media-body">
          <h3 class="dropdown-item-title">
            Brad Diesel
            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
          </h3>
          <p class="text-sm">Call me whenever you can...</p>
          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
        </div>
  </div>
  <!-- Message End -->
  </a>
  <div class="dropdown-divider"></div>
  <a href="#" class="dropdown-item">
    <!-- Message Start -->
    <div class="media">
      <img src="{{ asset('dist') }}/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
      <div class="media-body">
        <h3 class="dropdown-item-title">
          John Pierce
          <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
        </h3>
        <p class="text-sm">I got your message bro</p>
        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
      </div>
    </div>
    <!-- Message End -->
  </a>
  <div class="dropdown-divider"></div>
  <a href="#" class="dropdown-item">
    <!-- Message Start -->
    <div class="media">
      <img src="{{ asset('dist') }}/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
      <div class="media-body">
        <h3 class="dropdown-item-title">
          Nora Silvester
          <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
        </h3>
        <p class="text-sm">The subject goes here</p>
        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
      </div>
    </div>
    <!-- Message End -->
  </a>
  <div class="dropdown-divider"></div>
  <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
  </div>
  </li>
  <!-- Notifications Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
      <span class="badge badge-warning navbar-badge">15</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item dropdown-header">15 Notifications</span>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fas fa-envelope mr-2"></i> 4 new messages
        <span class="float-right text-muted text-sm">3 mins</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fas fa-users mr-2"></i> 8 friend requests
        <span class="float-right text-muted text-sm">12 hours</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fas fa-file mr-2"></i> 3 new reports
        <span class="float-right text-muted text-sm">2 days</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
  </li> --}}
  <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-expand-arrows-alt"></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
      <i class="fas fa-th-large"></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}" role="button">
      <i class="fas fa-sign-out-alt"></i>
    </a>
  </li>
  </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist') }}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist') }}/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- Quản lý data khách hàng --}}
          @if ($user->role_id == 1)
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Khách hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>


            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('submit.list') }}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Danh sách</p>
                  @php
                  $countsm = DB::table('table_submit')->whereNull('deleted_at')->count();
                  @endphp
                  <span class="badge badge-info right">{{ $countsm }}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('submit.create') }}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Phân quyền</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          {{-- Quản lý tài khoản người dùng --}}
          @if ($user->role_id == 1)
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Người dùng
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Danh sách</p>
                  @php
                  $countem = DB::table('table_users')
                  ->whereNull('deleted_at')
                  // ->where('status', 1)
                  ->count();
                  @endphp
                  <span class="badge badge-info right">{{ $countem }}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>

                  <p>Tạo mới</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          {{-- Phân quyền người dùng --}}
          @if ($user->role_id == 1)
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Phân quyền
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Danh sách</p>
                  @php
                  $countem = DB::table('table_role')
                  ->whereNull('deleted_at')
                  // ->where('status', 1)
                  ->count();
                  @endphp
                  <span class="badge badge-info right">{{ $countem }}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('roles.create') }}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>

                  <p>Tạo mới</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          {{-- Quản lý mailbox --}}
          @if ($user->role_id == 1)
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('emails.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Danh sách</p>
                  @php
                  $countem = DB::table('table_emails')
                  ->whereNull('deleted_at')
                  ->where('status', 1)
                  ->count();
                  @endphp
                  <span class="badge badge-info right">{{ $countem }}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('emails.create') }}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>

                  <p>Tạo mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('emails.draft') }}" class="nav-link">
                  <i class="fas fa-file-signature nav-icon"></i>
                  <p>Bản nháp</p>
                  @php
                  $countemt = DB::table('table_emails')
                  ->whereNull('deleted_at')
                  ->where('status', 0)
                  ->count();
                  @endphp
                  <span class="badge badge-info right">{{ $countemt }}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('emails.trashed') }}" class="nav-link">
                  <i class="fas fa-trash-alt nav-icon"></i>
                  <p>Thùng rác</p>
                  @php
                  $countemd = DB::table('table_emails')
                  ->whereNotNull('deleted_at')
                  ->count();
                  @endphp
                  <span class="badge badge-info right">{{ $countemd }}</span>
                </a>
              </li>

            </ul>
          </li>
          @endif
          {{-- Quản lý smsbox --}}

          @if ($user->role_id == 1)
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                SMS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sms.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Danh sách</p>
                  @php
                  $countem = DB::table('table_sms')
                  ->whereNull('deleted_at')
                  ->where('status', 1)
                  ->count();
                  @endphp
                  <span class="badge badge-info right">{{ $countem }}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sms.create') }}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>

                  <p>Tạo mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sms.draft') }}" class="nav-link">
                  <i class="fas fa-file-signature nav-icon"></i>
                  <p>Bản nháp</p>
                  @php
                  $countemt = DB::table('table_sms')
                  ->whereNull('deleted_at')
                  ->where('status', 0)
                  ->count();
                  @endphp
                  <span class="badge badge-info right">{{ $countemt }}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sms.trashed') }}" class="nav-link">
                  <i class="fas fa-trash-alt nav-icon"></i>
                  <p>Thùng rác</p>
                  @php
                  $countemd = DB::table('table_sms')->whereNotNull('deleted_at')->count();
                  @endphp
                  <span class="badge badge-info right">{{ $countemd }}</span>
                </a>
              </li>

            </ul>
            @endif
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @if (session('error'))
    <div class="alert alert-error alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-check"></i> Lỗi !</h5>
      {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-check"></i> Thành công !</h5>
      {{ session('success') }}
    </div>
    @endif
    <!-- /.sidebar -->
  </aside>

  @yield('main')


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('plugins') }}/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins') }}/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="{{ asset('plugins') }}/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="{{ asset('plugins') }}/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="{{ asset('plugins') }}/jqvmap/jquery.vmap.min.js"></script>
  <script src="{{ asset('plugins') }}/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('plugins') }}/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('plugins') }}/moment/moment.min.js"></script>
  <script src="{{ asset('plugins') }}/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('plugins') }}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins') }}/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('plugins') }}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist') }}/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist') }}/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('dist') }}/js/pages/dashboard.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('plugins') }}/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('plugins') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('plugins') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{ asset('plugins') }}/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="{{ asset('plugins') }}/jszip/jszip.min.js"></script>
  <script src="{{ asset('plugins') }}/pdfmake/pdfmake.min.js"></script>
  <script src="{{ asset('plugins') }}/pdfmake/vfs_fonts.js"></script>
  <script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="{{ asset('plugins') }}/chart.js/Chart.min.js"></script>

  @if (Auth::user()->role_id == 1)
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "responsive": true,
        "language": {
          "lengthMenu": "Hiển thị _MENU_ dòng",
          "zeroRecords": "Không tìm thấy dòng nào",
          "info": "Hiển thị _START_ đến _END_ của _TOTAL_ dòng",
          "infoEmpty": "Không có dữ liệu",
          "infoFiltered": "(được lọc từ _MAX_ tổng số dòng)",
          "search": "Tìm kiếm:",
          "paginate": {
            "first": "&lt;&lt;",
            "last": "&gt;&gt;",
            "next": "&gt;",
            "previous": "&lt;"
          }
        }
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
          "lengthMenu": "Hiển thị _MENU_ dòng",
          "zeroRecords": "Không tìm thấy dòng nào",
          "info": "Hiển thị _START_ đến _END_ của _TOTAL_ dòng",
          "infoEmpty": "Không có dữ liệu",
          "infoFiltered": "(được lọc từ _MAX_ tổng số dòng)",
          "search": "Tìm kiếm:",
          "paginate": {
            "first": "&lt;&lt;",
            "last": "&gt;&gt;",
            "next": "&gt;",
            "previous": "&lt;"
          }
        }
      });
    });
  </script>
  @else
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
          "lengthMenu": "Hiển thị _MENU_ dòng",
          "zeroRecords": "Không tìm thấy dòng nào",
          "info": "Hiển thị _START_ đến _END_ của _TOTAL_ dòng",
          "infoEmpty": "Không có dữ liệu",
          "infoFiltered": "(được lọc từ _MAX_ tổng số dòng)",
          "search": "Tìm kiếm:",
          "paginate": {
            "first": "&lt;&lt;",
            "last": "&gt;&gt;",
            "next": "&gt;",
            "previous": "&lt;"
          }
        }
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
          "lengthMenu": "Hiển thị _MENU_ dòng",
          "zeroRecords": "Không tìm thấy dòng nào",
          "info": "Hiển thị _START_ đến _END_ của _TOTAL_ dòng",
          "infoEmpty": "Không có dữ liệu",
          "infoFiltered": "(được lọc từ _MAX_ tổng số dòng)",
          "search": "Tìm kiếm:",
          "paginate": {
            "first": "&lt;&lt;",
            "last": "&gt;&gt;",
            "next": "&gt;",
            "previous": "&lt;"
          }
        }
      });
    });
  </script>
  @endif
  <script>
    $(function() {
      //Add text editor
      $('#compose-textarea').summernote()
    })
  </script>

</body>

</html>