@extends('layouts.admin')

@section('title', 'تعديل خبر')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <style>
        .tagify {
            overflow: auto !important;
            height: 100px !important;
        }

        .tox-statusbar {
            display: none !important;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #f48336;
            color: white;
            border: none;
            padding: 0px 6px;
            border-radius: 20%;
            cursor: pointer;
        }

        .image {
            max-width: 100%;
            height: auto;
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
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox]', {
        //
    });
</script>

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
            maxFiles: 10,
            maxFilesize: null, // MB
            addRemoveLinks: true, // 0!
            accept: function(file, done) {
                "wow.jpg" == file.name ? done("Naha, you don't.") : done();
            }
        });

        // Store
        function performUpdate() {

            let data = new FormData();
            data.append('_method', 'PUT');
            data.append('title', $('input[name="title"]').val());
            data.append('short_description', $('input[name="short_description"]').val());
            data.append('status', $('select[name="status"]').val());
            data.append('publication_at', $('input[name="publication_at"]').val());
            data.append('showInSlider', $('select[name="showInSlider"]').val());
            data.append('basicFile', $('input[name="basicFile"]').prop('files')[0]);
            data.append('description', tinymce.get('editor').getContent());

            var files = myDropzone.getAcceptedFiles(); // Get the selected files

            for (var i = 0; i < files.length; i++) {
                data.append('files[]', files[i]); // Append each file to the FormData object
            }


            updateURL = "{{ route('news.update', [$news->id]) }}";
            redirectUrl = "{{ route('news.index') }}";

            update(updateURL, data, redirectUrl);

            document.getElementById('loading').style.display = 'block';
        }

        // delete image
        function deleteImage(id, ref) {
            destroyImage('/admin/image/delete/' + id, ref, 'news');
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
        <small class="text-muted fs-7 fw-bold my-1 ms-1">الاخبار</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل خبر</small>
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
                    <form id="create_form" onsubmit="event.preventDefault(); performUpdate();">
                        @csrf
                        <div class="row row-sm">


                            <label for="" class="mb-3">عنوان الخبر</label>
                            <input class="form-control mb-2" name="title" required type="text" placeholder="عنوان الخبر" value="{{ $news->title }}">

                            <label for="" class="mb-3">الخبر باختصار</label>
                            <input class="form-control mb-2" name="short_description" required type="text" placeholder="نبدا عن الخبر" value="{{ $news->short_description }}">


                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">تاريخ النشر</label>
                                    <input type="datetime-local" class="form-control mb-2" id="date"
                                        max="<?php echo date('Y-m-d\TH:i'); ?>" value="{{ $news->publication_at }}" name="publication_at"
                                        required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">حالة الخبر</label>
                                    <select class="form-select form-select" name="status" id="status" required
                                        data-placeholder="Select an option" data-hide-search="true">
                                        <option value="active" {{ $news->status == 'active' ? 'selected' : '' }}>فعال</option>
                                        <option value="unactive" {{ $news->status == 'unactive' ? 'selected' : '' }}>غير فعال</option>
                                        <option value="scheduled" {{ $news->status == 'scheduled' ? 'selected' : '' }}>مجدول</option>
                                    </select>
                                </div>
                            </div>

                            <label for="" class="mb-3">وصف الخبر</label>
                            <textarea id="editor" name="description" class="tox-target" placeholder="تفاصيل الخبر">{{ $news->description }}</textarea>
                        </div>



                        <p class="text-danger mt-3">* صيغة المرفق jpeg , jpg , png , mp4 </p>
                        <div class="row row-sm">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-0" style="position: relative">

                                    <a href="{{ asset("storage/files/news/$news->basicFile") }}" data-fancybox >

                                        <i class="fa-solid fa-eye" style="position: absolute; top: 40px; left: 10px; color: #e4e6ef; font-size: 20px;"></i>
                                    </a>

                                    <label for="" class="mb-3">الصورة او الفيديو الاساسي</label>
                                    <input type="file" class="form-control mb-2" name="basicFile">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">عرض الخبر داخل السلايدر</label>
                                    <select class="form-select form-select" name="showInSlider" id="showInSlider" required data-placeholder="Select an option" data-hide-search="true">
                                        <option disabled selected value="">-- اختر قيمة --</option>
                                        <option value="yes" {{ $news->showInSlider == 'yes' ? 'selected' : '' }}>نعم</option>
                                        <option value="no" {{ $news->showInSlider == 'no' ? 'selected' : '' }}>لا</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <h5 class="card-title">باقي المرفقات إن وجدت</h5>

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
                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">قم بإسقاط الملفات هنا أو انقر للتحميل.
                                        </h3>
                                        <span class="fs-7 fw-bold text-gray-400">تحميل ما يصل إلى 10 ملفات</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!--end::Input group-->
                        {{-- </form> --}}
                        <!--end::Form-->



                        @foreach ($news->files as $file)

                            <?php $part2 = explode('.', $file->filename) ?>

                            @if ($part2[1] == 'mp4')

                                <div class="image-container">
                                    <video height="140px" width="140px" controls>
                                        <source src="{{ asset("storage/files/news/$file->filename") }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <a class="delete-button" onclick="deleteImage({{ $file->id }}, this)">x</a>
                                </div>

                            @else

                                <div class="image-container">
                                    <img height="100px" width="100px" class="mt-2"
                                        src="{{ asset("storage/files/news/$file->filename") }}">
                                    <a class="delete-button" onclick="deleteImage({{ $file->id }}, this)">x</a>
                                </div>

                            @endif

                        @endforeach



                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <input type="submit" value="تعديل البيانات" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
