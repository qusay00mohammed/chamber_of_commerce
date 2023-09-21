@extends('layouts.admin')

@section('title', 'معلومات عامة بالنظام')

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
    </style>
@endpush

@push('javascript')
    {{-- Text Editor --}}
    <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script src="{{ asset('assets/tiny/ar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox]', {
            //
        });
    </script>

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

        // Text Editor
        var options = {
            selector: "#editor1",
            language: "ar",
            direction: "rtl"
        };
        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);

        // Text Editor
        var options = {
            selector: "#editor2",
            language: "ar",
            direction: "rtl"
        };
        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);


        // Text Editor
        var options = {
            selector: "#editor3",
            language: "ar",
            direction: "rtl"
        };
        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);

        // Text Editor
        var options = {
            selector: "#editor4",
            language: "ar",
            direction: "rtl"
        };
        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);

        // Text Editor
        var options = {
            selector: "#editor5",
            language: "ar",
            direction: "rtl"
        };
        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">معلومات عامة بالنظام</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')
    @include('layouts.alert')
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('information-public-store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">رسالة الغرفة</label>
                                    <textarea class="form-control mb-2" name="messageRoom" required type="text">{{ $informationPublic->where('key', 'messageRoom')->first()->description ?? '' }}</textarea>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">رؤية الغرفة</label>
                                    <textarea class="form-control mb-2" name="seeRoom" required type="text">{{ $informationPublic->where('key', 'seeRoom')->first()->description ?? '' }}</textarea>

                                </div>
                            </div>

                        </div>


                        <div class="row row-sm">

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">كلمة رئيس المجلس مختصرة</label>
                                    <textarea id="editor" name="speech_of_the_chairman_of_the_council_short" class="tox-target">{{ $informationPublic->where('key', 'speech_of_the_chairman_of_the_council')->first()->short_description ?? '' }}</textarea>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">عن غزة مختصرة</label>
                                    <textarea id="editor1" name="about_gaza_short" class="tox-target">{{ $informationPublic->where('key', 'about_gaza')->first()->short_description ?? '' }}</textarea>

                                </div>
                            </div>



                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">كلمة رئيس المجلس كاملة</label>
                                    <textarea id="editor2" name="speech_of_the_chairman_of_the_council" class="tox-target">{{ $informationPublic->where('key', 'speech_of_the_chairman_of_the_council')->first()->description ?? '' }}</textarea>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">عن غزة كاملة</label>
                                    <textarea id="editor3" name="about_gaza" class="tox-target">{{ $informationPublic->where('key', 'about_gaza')->first()->description ?? '' }}</textarea>

                                </div>
                            </div>
                        </div>


                        <div class="row row-sm">

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0" style="position: relative">
                                    <?php $path = $informationPublic->where('key', 'speech_of_the_chairman_of_the_council')->first()->image_url ?? ''; ?>
                                    <a href="{{ asset("storage/$path") }}" data-fancybox>

                                        <i class="fa-solid fa-eye"
                                            style="position: absolute; top: 33px; right: 125px; color: #e4e6ef; font-size: 20px;"></i>
                                    </a>

                                    <p class="text-danger mt-3">* صيغة المرفق jpeg , jpg , png </p>
                                    <label for="" class="mb-3">صورة رئيس المجلس</label>
                                    <input type="file" class="form-control mb-2"
                                        name="speech_of_the_chairman_of_the_council_image">
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group mg-b-0" style="position: relative">
                                    <?php $path = $informationPublic->where('key', 'about_gaza')->first()->image_url ?? ''; ?>
                                    <a href="{{ asset("storage/$path") }}" data-fancybox>

                                        <i class="fa-solid fa-eye"
                                            style="position: absolute; top: 33px; right: 125px; color: #e4e6ef; font-size: 20px;"></i>
                                    </a>

                                    <p class="text-danger mt-3">* صيغة المرفق jpeg , jpg , png </p>
                                    <label for="" class="mb-3">صورة عن غزة</label>
                                    <input type="file" class="form-control mb-2"
                                        name="about_gaza_image">
                                </div>
                            </div>

                        </div>


                        <div class="row row-sm">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">تأسيس الغرفة</label>
                                    <textarea id="editor4" name="establishment_of_the_chamber" class="tox-target">{{ $informationPublic->where('key', 'establishment_of_the_chamber')->first()->description ?? '' }}</textarea>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">

                                    <label for="" class="mb-3">مباشرة مجلس إدارة الغرفة</label>
                                    <textarea id="editor5" name="directly_to_the_chamber_board_of_directors" class="tox-target">{{ $informationPublic->where('key', 'directly_to_the_chamber_board_of_directors')->first()->description ?? '' }}</textarea>

                                </div>
                            </div>
                        </div>

                        <div class="row row-sm">

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0" style="position: relative">
                                    <?php $path = $informationPublic->where('key', 'establishment_of_the_chamber')->first()->image_url ?? ''; ?>
                                    <a href="{{ asset("storage/$path") }}" data-fancybox>

                                        <i class="fa-solid fa-eye"
                                            style="position: absolute; top: 33px; right: 125px; color: #e4e6ef; font-size: 20px;"></i>
                                    </a>

                                    <p class="text-danger mt-3">* صيغة المرفق jpeg , jpg , png </p>
                                    <label for="" class="mb-3">صورة عن الغرفة</label>
                                    <input type="file" class="form-control mb-2"
                                        name="establishment_of_the_chamber_image">
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <br><br>
                                <div class="form-group mg-b-0" style="position: relative; margin-top: 3px">
                                    <label for="" class="mb-3">رابط يوتيوب مجلس إدارة الغرفة</label>
                                    <input type="url" class="form-control mb-2" name="directly_to_the_chamber_board_of_directors_link" value="{{ $settings->where('key', 'directly_to_the_chamber_board_of_directors')->first()->image_url ?? '' }}">
                                </div>
                            </div>

                        </div>



                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <input type="submit" value="حفظ البيانات" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
