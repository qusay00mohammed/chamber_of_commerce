@extends('layouts.admin')

@section('title', 'إضافة عضو مجلس إدارة')

@push('css')
    <style>
        .tagify {
            overflow: auto !important;
            height: 100px !important;
        }

        .tox-statusbar {
            display: none !important;
        }

        .loading {
            height: 100%;
            width: 100%;
            position: absolute;
            background-color: #eee;
            opacity: 0.5;
            display: none;
        }

        .load {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -50px;
            font-size: 20px;
        }
    </style>
@endpush

@push('javascript')
    {{-- Text Editor --}}
    <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script src="{{ asset('assets/tiny/ar.js') }}"></script>

    <script>
        // Text Editor
        var options = {
            selector: "#editor",
            language: "ar",
            direction: "rtl"
        };
        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);

        // Dropzone
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            acceptedFiles: ".jpg,.png,.jpeg,.mp4",
            autoProcessQueue: false,
            url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: null, // MB
            addRemoveLinks: true, // 0!
            accept: function(file, done) {
                "wow.jpg" == file.name ? done("Naha, you don't.") : done();
            }
        });

        // Store
        function performStore() {

            let data = new FormData();
            data.append('full_name', $('input[name="fullname"]').val());
            data.append('job_title', $('input[name="job_title"]').val());
            data.append('administration', $('select[name="administration"]').val());
            data.append('description', tinymce.get('editor').getContent());

            var files = myDropzone.getAcceptedFiles(); // Get the selected files

            for (var i = 0; i < files.length; i++) {
                data.append('files[]', files[i]); // Append each file to the FormData object
                break;
            }


            store('/admin/administrationMembers', data);
            document.getElementById('loading').style.display = 'block';
            myDropzone.removeAllFiles(true);
        }

        // Publication Date
        $(document).ready(function() {
            $('#status').change(function() {
                if ($(this).val() === 'scheduled') {
                    $('#date').attr('min', "<?php echo date('Y-m-d\TH:i'); ?>");
                    $('#date').removeAttr('max');
                    $('#date').val("<?php echo date('Y-m-d\TH:i'); ?>");
                } else {
                    $('#date').attr('max', "<?php echo date('Y-m-d\TH:i'); ?>");
                    $('#date').removeAttr('min');
                    $('#date').val("<?php echo date('Y-m-d\TH:i'); ?>");
                }
            });
        });
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">اعضاء مجلس إدارة</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">إضافة عضو مجلس إدارة</small>
    </h1>
@endsection


@section('content')

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="loading" id="loading">
                    <div class="spinner-border text-success load" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="create_form" onsubmit="event.preventDefault(); performStore();">
                        @csrf
                        <div class="row row-sm">


                            <label for="" class="mb-3">اسم العضو الكامل</label>
                            <input class="form-control mb-2" name="fullname" required type="text"
                                placeholder="اسم العضو الكامل">

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">المسمى الوظيفي</label>
                                    <input class="form-control mb-2" name="job_title" required type="text"
                                        placeholder="المسمى الوظيفي">

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">رئيس مجلس الإدارة</label>
                                    <select class="form-select form-select" name="administration" id="administration" required
                                        data-placeholder="Select an option" data-hide-search="true">
                                        <option value="1">نعم</option>
                                        <option value="0" selected>لا</option>
                                    </select>
                                </div>
                            </div>

                            <label for="" class="mb-3">إضافة وصف</label>
                            <textarea id="editor" name="description" class="tox-target" placeholder="الوصف يكون فقط لرئيس مجلس الادارة فقط"></textarea>
                        </div>



                        <p class="text-danger mt-3">* صيغة المرفق jpeg , jpg , png</p>

                        <h5 class="card-title">صورة العضو</h5>

                        <!--begin::Form-->
                        {{-- <form class="form" action="#" method="post"> --}}
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="kt_dropzonejs_example_1">
                                <!--begin::Message-->
                                <div class="dz-message needsclick">
                                    <!--begin::Icon-->
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                    <!--end::Icon-->

                                    <!--begin::Info-->
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">قم بإسقاط الصورة هنا أو انقر للتحميل.
                                        </h3>
                                        <span class="fs-7 fw-bold text-gray-400">تحميل ما يصل إلى 1 ملفات</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!--end::Input group-->
                        {{-- </form> --}}
                        <!--end::Form-->


                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <input type="submit" value="حفظ البيانات" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
