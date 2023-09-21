@extends('layouts.admin')

@section('title', 'تعديل اتفاق او قانون')

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

<script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
<script>
        // form repeater
        $('#kt_docs_repeater_basic').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });

        let div = document.querySelector("div[data-repeater-list='kt_docs_repeater_basic']")
        let firstChild = div.firstElementChild;
        firstChild.remove();



        // Store
        function performStore() {

            let data = new FormData(document.getElementById('create_form'));
            data.append('_method', 'PUT');

            updateURL = "{{ route('conventionLaw.update', [$conventionLaw->id]) }}";
            redirectUrl = "{{ route('conventionLaw.index') }}";

            update(updateURL, data, redirectUrl);

            document.getElementById('loading').style.display = 'block';
         }


    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">الاتفاقات والقوانين</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل قانون او اتفاق</small>
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


                            <label for="" class="mb-3">عنوان الاتفاق او القانون</label>
                            <input class="form-control mb-2" name="title" value="{{ $conventionLaw->title }}" required type="text" placeholder="عنوان الاتفاق او القانون">


                            <!--begin::Repeater-->
                            <div id="kt_docs_repeater_basic">
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div data-repeater-list="kt_docs_repeater_basic" id="repeaterLinks">

                                        <div data-repeater-item>
                                            <div class="form-group row">
                                                <div class="col-md-7">
                                                    <label class="form-label">عنوان الملف :</label>
                                                    <input type="text" name="filename" data-link="title" style="direction: inherit;" class="form-control mb-2 mb-md-0 link" placeholder="ادخل عنوان الملف" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">الملف بصيغة pdf:</label>
                                                    <input type="file" name="file" accept=".pdf"  data-link="file" style="direction: inherit;" class="form-control mb-2 mb-md-0 link" />
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                        <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        حذف
                                                    </a>
                                                </div>
                                            </div>
                                        </div>



                                        @foreach ($conventions as $convention)
                                            <div data-repeater-item>
                                                <div class="form-group row">
                                                    <div class="col-md-7">
                                                        <label class="form-label">عنوان الملف :</label>
                                                        <input type="text" name="filename" value="{{ $convention->title }}" data-link="title" style="direction: inherit;" class="form-control mb-2 mb-md-0 link" placeholder="ادخل عنوان الملف" />
                                                        <input type="hidden" name="id" value="{{ $convention->id }}" />

                                                    </div>
                                                    <div class="col-md-4" style="position: relative">

                                                        <a style="position: absolute; left: 10px" target="_blank" href="{{ asset("storage/$convention->file_name") }}" data-fancybox >

                                                            <i class="fa-solid fa-eye" style="position: absolute; top: 40px; left: 10px; color: #e4e6ef; font-size: 20px;"></i>
                                                        </a>

                                                        <label class="form-label">الملف بصيغة pdf:</label>
                                                        <input type="file" name="file" accept=".pdf"  data-link="file" style="direction: inherit;" class="form-control mb-2 mb-md-0 link" />
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                            <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                            حذف
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="form-group mt-5">
                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                        <i class="ki-duotone ki-plus fs-3"></i>
                                        إضافة
                                    </a>
                                </div>
                            </div>

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
