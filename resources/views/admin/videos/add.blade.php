@extends('layouts.admin')

@section('title', 'إضافة ألبوم فيديو')

@push('css')
    <style>

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

{{-- <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script> --}}
<script>
        // form repeater
        // $('#kt_docs_repeater_basic').repeater({
        //     initEmpty: false,

        //     defaultValues: {
        //         'text-input': 'foo'
        //     },

        //     show: function () {
        //         $(this).slideDown();
        //     },

        //     hide: function (deleteElement) {
        //         $(this).slideUp(deleteElement);
        //     }
        // });



        // Store
        function performStore() {

            let data = new FormData();
            // data.append('title', $('input[name="title"]').val());
            // data.append('short_description', $('input[name="short_description"]').val());
            data.append('status', $('select[name="status"]').val());
            data.append('publication_at', $('input[name="publication_at"]').val());
            // data.append('showInSlider', $('select[name="showInSlider"]').val());
            data.append('basicFile', $('input[name="basicFile"]').val());
            // data.append('description', tinymce.get('editor').getContent());


            // let repeaterData = [];
            // $('div[data-repeater-list="kt_docs_repeater_basic"] div[data-repeater-item]').each(function () {

            //     repeaterData.push($(this).find('input[data-link="link"]').val());

            // });
            // data.append('repeaterData', JSON.stringify(repeaterData));

            // data.append('links', $('#repeaterLinks').html());

            // var files = myDropzone.getAcceptedFiles(); // Get the selected files

            // for (var i = 0; i < files.length; i++) {
            //     data.append('files[]', files[i]); // Append each file to the FormData object
            // }


            store('/admin/videos', data);
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
        <small class="text-muted fs-7 fw-bold my-1 ms-1">ألبوم الفيديو</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">إضافة ألبوم الفيديو</small>
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


                            {{-- <label for="" class="mb-3">عنوان الألبوم</label>
                            <input class="form-control mb-2" name="title" required type="text" placeholder="عنوان الفعالية"> --}}

                            {{-- <label for="" class="mb-3">الفعالية باختصار</label>
                            <input class="form-control mb-2" name="short_description" required type="text" placeholder="نبدا عن الفعالية"> --}}


                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">تاريخ النشر</label>
                                    <input type="datetime-local" class="form-control mb-2" id="date"
                                        max="<?php echo date('Y-m-d\TH:i'); ?>" value="<?php echo date('Y-m-d\TH:i'); ?>" name="publication_at"
                                        required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">حالة النشر</label>
                                    <select class="form-select form-select" name="status" id="status" required
                                        data-placeholder="Select an option" data-hide-search="true">
                                        <option disabled selected value="">--حالة النشر--</option>
                                        <option value="active">فعال</option>
                                        <option value="unactive">غير فعال</option>
                                        <option value="scheduled">مجدول</option>
                                    </select>
                                </div>
                            </div>


                            <label for="" class="mb-3">رابط فيديو اليوتيوب</label>
                            <input class="form-control mb-2" name="basicFile" style="direction: inherit;" required type="url" placeholder="رابط الفيديو الاساسي">







                            {{-- <!--begin::Repeater-->
                            <div id="kt_docs_repeater_basic">
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div data-repeater-list="kt_docs_repeater_basic" id="repeaterLinks">
                                        <div data-repeater-item>
                                            <div class="form-group row">
                                                <div class="col-md-11">
                                                    <label class="form-label">رابط يوتيوب:</label>
                                                    <input type="url" data-link="link" style="direction: inherit;" class="form-control mb-2 mb-md-0 link" placeholder="ادخل رابط يوتيوب فعال" />
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                        <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Form group-->

                                <!--begin::Form group-->
                                <div class="form-group mt-5">
                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                        <i class="ki-duotone ki-plus fs-3"></i>
                                        Add
                                    </a>
                                </div>
                                <!--end::Form group-->
                            </div>
                            <!--end::Repeater--> --}}



                            {{-- <label for="" class="mb-3">وصف الفعالية</label>
                            <textarea id="editor" name="description" class="tox-target" placeholder="تفاصيل الفعالية"></textarea> --}}
                        </div>



                        {{-- <p class="text-danger mt-3">* صيغة المرفق jpeg , jpg , png , mp4 </p>

                        <div class="row row-sm">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">الصورة او الفيديو الاساسي</label>
                                    <input type="file" class="form-control mb-2" name="basicFile" required>
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">عرض الخبر داخل السلايدر</label>
                                    <select class="form-select form-select" name="showInSlider" id="showInSlider" required data-placeholder="Select an option" data-hide-search="true">
                                        <option disabled selected value="">-- اختر قيمة --</option>
                                        <option value="yes">نعم</option>
                                        <option value="no">لا</option>
                                    </select>
                                </div>
                            </div> --}}
                        {{-- </div> --}}


                        {{-- <h5 class="card-title">باقي المرفقات إن وجدت</h5> --}}

                        <!--begin::Form-->
                        {{-- <form class="form" action="#" method="post"> --}}
                        <!--begin::Input group-->
                        {{-- <div class="fv-row">
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="kt_dropzonejs_example_1">
                                <!--begin::Message-->
                                <div class="dz-message needsclick">
                                    <!--begin::Icon-->
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                    <!--end::Icon-->

                                    <!--begin::Info-->
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">قم بإسقاط الملفات هنا أو انقر للتحميل.
                                        </h3>
                                        <span class="fs-7 fw-bold text-gray-400">تحميل ما يصل إلى 10 ملفات</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                            <!--end::Dropzone-->
                        </div> --}}
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
