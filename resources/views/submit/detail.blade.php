@extends('layout.master')
@section('title')
    Chi tiết
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chi tiết</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Chi tiết</li>
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

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Họ tên:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $submits->name }}" readonly>
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label>Ngày tạo:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="day_create" class="form-control"
                                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                            data-mask value="{{ $submits->created_at }}" readonly>
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
                                            data-inputmask='"mask": "999 999 9999"' data-mask value="{{ $submits->phone }}"
                                            readonly>
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
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $submits->email }}" readonly>
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
                                        <input type="text" name="description" class="form-control"
                                            value="{{ $submits->description }}" readonly>
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
                                        <input type="text" name="description" class="form-control"
                                            value="{{ $submits->field->name }}" readonly>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <div class="form-group">
                                    <label>Khu vực:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-globe"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" name="description" class="form-control"
                                            value="{{ $submits->country->name }}" readonly>
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <a class="button btn-danger"
                                        href="{{ route('submit.edit', ['id' => $submits->id]) }}">Chỉnh sửa</a>
                                    <a class="button btn-primary"
                                        href="{{ route('submit.show', ['id' => $submits->id]) }}">Gửi email</a>
                                    <a class="button btn-success"
                                        href="{{ route('submit.show', ['id' => $submits->id]) }}">Gửi SMS</a>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.col (right) -->
                    </div>
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Lịch sử gửi mail</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Search Mail">
                                        <div class="input-group-append">
                                            <div class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                    </div>
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
                                        1-50/200
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>
                                        <!-- /.btn-group -->
                                    </div>
                                    <!-- /.float-right -->
                                </div>
                                <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check1">
                                                        <label for="check1"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check2">
                                                        <label for="check2"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star-o text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                <td class="mailbox-date">28 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check3">
                                                        <label for="check3"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star-o text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                <td class="mailbox-date">11 hours ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check4">
                                                        <label for="check4"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">15 hours ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check5">
                                                        <label for="check5"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                <td class="mailbox-date">Yesterday</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check6">
                                                        <label for="check6"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star-o text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                <td class="mailbox-date">2 days ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check7">
                                                        <label for="check7"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star-o text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                <td class="mailbox-date">2 days ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check8">
                                                        <label for="check8"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">2 days ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check9">
                                                        <label for="check9"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">2 days ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check10">
                                                        <label for="check10"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star-o text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">2 days ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check11">
                                                        <label for="check11"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star-o text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                <td class="mailbox-date">4 days ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check12">
                                                        <label for="check12"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">12 days ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check13">
                                                        <label for="check13"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star-o text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                <td class="mailbox-date">12 days ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check14">
                                                        <label for="check14"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                <td class="mailbox-date">14 days ago</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check15">
                                                        <label for="check15"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i
                                                            class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a>
                                                </td>
                                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a
                                                    solution to this problem...
                                                </td>
                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                <td class="mailbox-date">15 days ago</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- /.table -->
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
                                        1-50/200
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>
                                        <!-- /.btn-group -->
                                    </div>
                                    <!-- /.float-right -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>
@endsection
