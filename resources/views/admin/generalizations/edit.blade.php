@extends('layouts.admin')

@section('title', 'تعديل تعميم')

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


        // Store
        function performStore() {

            let data = new FormData();
            data.append('title', $('input[name="title"]').val());
            data.append('_method', 'PUT');
            data.append('description', tinymce.get('editor').getContent());

            updateURL = "{{ route('generalizations.update', [$generalization->id]) }}";
            redirectUrl = "{{ route('generalizations.index') }}";

            update(updateURL, data, redirectUrl);
            document.getElementById('loading').style.display = 'block';

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
        <small class="text-muted fs-7 fw-bold my-1 ms-1">التعميمات</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل التعميم</small>
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


                            <label for="" class="mb-3">عنوان التعميم</label>
                            <input class="form-control mb-2" name="title" required type="text"
                                placeholder="عنوان التعميم" value="{{ $generalization->title }}">

                            <label for="" class="mb-3">وصف التعميم</label>
                            <textarea id="editor" name="description" class="tox-target" placeholder="تفاصيل التعميم">{{ $generalization->description }}</textarea>
                        </div>

                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <input type="submit" value="تعديل البيانات" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
