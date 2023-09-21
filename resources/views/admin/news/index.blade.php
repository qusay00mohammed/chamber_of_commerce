@extends('layouts.admin')

@section('title', 'الاخبار')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <style>
        .card .card-body {
            padding: 0rem 2.25rem;
        }
    </style>
@endpush

@push('javascript')

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox]', {
    //     $(document).ready(function() {
    //     $('[data-fancybox="gallery"]').fancybox({
    //         afterLoad: function(instance, current) {
    //             // عرض شريط التقدم أثناء تحميل الفيديو
    //             current.$content = $('<div class="fancybox-video-wrap"><div class="fancybox-video"></div></div>');
    //             current.$slide = current.$content.find('.fancybox-video');
    //             current.$slide.append('<video controls><source src="' + current.src + '" type="video/mp4"></video>');
    //         },
    //         beforeShow: function(instance, current) {
    //             // إخفاء شريط التقدم عند عرض الفيديو بشكل كامل
    //             if (current.type === 'video') {
    //                 current.$slide.find('video').on('canplaythrough', function() {
    //                     current.$content.find('.fancybox-video-wrap').remove();
    //                 });
    //             }
    //         }
    //     });
    // });
    });
</script>

<script>
    // تكوين FancyBox

</script>


    <script>
        var table = $('#kt_datatable_example_5').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ Route('news.index') }}",
                data: function(d) {
                    // d.title = $('input[name=title]').val();
                    d.title = $('input[name=title]').val();
                    d.desc = $('input[name=desc]').val();
                    d.start_date = $('input[name=start_date]').val();
                    d.end_date = $('input[name=end_date]').val();
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'publication_at',
                    name: 'publication_at'
                },
                {
                    data: 'visited_count',
                    name: 'visited_count'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            "language": {
                "lengthMenu": "عرض _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });

        $('#filter').click(function() {
            table.draw();
        });
        $('#reset').click(function() {
            document.getElementById("reset_form").reset();
            table.draw();
        });
    </script>

    {{-- <script>
        function checkboxFun(status, id) {
            axios.post('news/status', {
                    status: status,
                    id: id
                })
                .then(function() {
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toastr-top-left",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };

                    toastr.success("تمت العملية بنجاح");
                })
                .catch(function() {
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toastr-top-left",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };

                    toastr.warning("فشلت العملية");
                });
        }
    </script> --}}

    <script>
        function performDestroy(id, ref) {
            confirmDestroy('/admin/news/' + id, ref);
        }
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">الاخبار</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')
    @include('layouts.alert')


    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card p-3  py-4">
                <div class="">
                    {{-- <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                        aria-controls="collapseExample" class="advanced">
                        البحث المتقدم <i class="fa fa-angle-down"></i>
                    </a> --}}
                    <h2 style="color: #494b74; margin: 5px 5px 15px 0">البحث المتقدم</h2>
                    <div class="" id="collapseExample">
                        <div class="card card-body">
                            <form id="reset_form">
                            <div class="row" id="reset_form">
                                <div class="col-md-4">
                                    <label for="" class="mb-3">عنوان الخبر</label>
                                    <input type="text" name="title" placeholder="عنوان الخبر"
                                        class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="mb-3">وصف الخبر</label>
                                    <input type="text" name="desc" class="form-control" placeholder="وصف الخبر">
                                </div>

                                <div class="col-md-2">
                                    <label for="" class="mb-3">من</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label for="" class="mb-3">الى</label>
                                    <input type="date" name="end_date" class="form-control">
                                </div>
                            </div>
                        </form>
                            <br>
                            <div class="col-md-3">
                                <button type="button" name="filter" class="btn btn-secondary btn-block" id="filter">عرض
                                    النتائج</button>

                                <button type="button" name="reset" class="btn btn-secondary btn-block" id="reset">تحديث</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <br>



    <div class="card p-3">
        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

            <a href="{{ route('archive_news') }}" class="btn btn-success" data-bs-toggle="tooltip" title=""
                data-bs-original-title="الارشيف" style="margin-left: 15px">
            <i class="fa-solid fa-inbox"></i>
            <!--end::Svg Icon-->الارشيف</a>




            <a href="{{ route('news.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" title=""
                data-bs-original-title="إضافة خبر">
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                            transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black">
                        </rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->إضافة</a>
        </div>




        <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
            <thead>
                <tr class="fw-bolder fs-6 text-gray-800 px-7">
                    <th>#</th>
                    <th>الصورة</th>
                    <th>العنوان</th>
                    <th>تاريخ النشر</th>
                    <th>عدد الزيارات</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTables -->
            </tbody>
        </table>
    </div>

@endsection
