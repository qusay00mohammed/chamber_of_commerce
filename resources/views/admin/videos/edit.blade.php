@extends('layouts.admin')

@section('title', 'تعديل ألبوم الفيديو')

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

    // let div = document.querySelector("div[data-repeater-list='kt_docs_repeater_basic']")
    // let firstChild = div.firstElementChild;
    // firstChild.remove();


    Fancybox.bind('[data-fancybox]', {
        //
    });
</script>

    <script>




        // Store
        function performUpdate() {

            let data = new FormData();
            data.append('_method', 'PUT');
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


            updateURL = "{{ route('videos.update', [$news->id]) }}";
            redirectUrl = "{{ route('videos.index') }}";

            update(updateURL, data, redirectUrl);

            document.getElementById('loading').style.display = 'block';
        }

        // delete image
        // function deleteImage(id, ref) {
        //     destroyImage('/admin/image/delete/' + id, ref, 'image');
        // }

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
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل ألبوم الفيديو</small>
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

                            {{-- <label for="" class="mb-3">عنوان ألبوم الفيديو</label>
                            <input class="form-control mb-2" name="title" required type="text" placeholder="عنوان الفيديو" value="{{ $news->title }}"> --}}

                            {{-- <label for="" class="mb-3">الفعالية باختصار</label>
                            <input class="form-control mb-2" name="short_description" required type="text" placeholder="نبدا عن الفعالية" value="{{ $news->short_description }}"> --}}


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

                                    <label for="" class="mb-3">حالة الألبوم</label>
                                    <select class="form-select form-select" name="status" id="status" required
                                        data-placeholder="Select an option" data-hide-search="true">
                                        <option value="active" {{ $news->status == 'active' ? 'selected' : '' }}>فعال</option>
                                        <option value="unactive" {{ $news->status == 'unactive' ? 'selected' : '' }}>غير فعال</option>
                                        <option value="scheduled" {{ $news->status == 'scheduled' ? 'selected' : '' }}>مجدول</option>
                                    </select>
                                </div>
                            </div>

                            {{-- <label for="" class="mb-3">وصف الفعالية</label>
                            <textarea id="editor" name="description" class="tox-target" placeholder="تفاصيل الفعالية">{{ $news->description }}</textarea> --}}
                        </div>

                        <label for="" class="mb-3">رابط فيديو اليوتيوب</label>
                        <input class="form-control mb-2" name="basicFile" style="direction: inherit;" required type="url" placeholder="رابط الفيديو الاساسي" value="{{ $news->basicFile }}">


                        <!--begin::Repeater-->
                        {{-- <div id="kt_docs_repeater_basic">
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

                                        @foreach ($news->files as $link)
                                            <div data-repeater-item>
                                                <div class="form-group row">
                                                    <div class="col-md-11">
                                                        <label class="form-label">رابط يوتيوب:</label>
                                                        <input type="url" data-link="link" style="direction: inherit;" class="form-control mb-2 mb-md-0 link" value="{{ $link->filename }}" placeholder="ادخل رابط يوتيوب فعال" />
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                            <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach



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
                        </div> --}}
                        <!--end::Repeater-->







                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <input type="submit" value="تعديل البيانات" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
