@extends('layouts.admin')

@section('title', 'إضافة اتفاق او قانون')

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



        // Store
        function performStore() {

            let data = new FormData(document.getElementById('create_form'));

            store('/admin/conventionLaw', data);
            document.getElementById('loading').style.display = 'block';



            // data.append('title', $('input[name="title"]').val());
            // data.append('short_description', $('input[name="short_description"]').val());
            // data.append('status', $('select[name="status"]').val());
            // data.append('publication_at', $('input[name="publication_at"]').val());
            // data.append('showInSlider', $('select[name="showInSlider"]').val());
            // data.append('basicFile', $('input[name="basicFile"]').val());
            // data.append('description', tinymce.get('editor').getContent());


            // let repeaterTitle = [];
            // let repeaterFile = [];
            // $('div[data-repeater-list="kt_docs_repeater_basic"] div[data-repeater-item]').each(function () {

            //     repeaterTitle.push($(this).find('input[data-link="title"]').val());

            //     repeaterFile.push($(this).find('input[data-link="file"]').prop('files')[0]);
            // });
            // data.append('repeaterTitle', JSON.stringify(repeaterTitle));
            // data.append('repeaterFile', JSON.stringify(repeaterFile));
         }

        // Publication Date

    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">الاتفاقات والقوانين</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">إضافة قانون او اتفاق</small>
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
                            <input class="form-control mb-2" name="title" required type="text" placeholder="عنوان الاتفاق او القانون">


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
                            <input type="submit" value="حفظ البيانات" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
