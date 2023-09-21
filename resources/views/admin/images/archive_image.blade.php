@extends('layouts.admin')

@section('title', 'ارشيف البوم الصور')

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
        //
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
                url: "{{ Route('archive_image') }}",
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

    </script>


    <script>
        function forceDelete(id, ref) {
            confirmForceDelete('news/ForceDelete/' + id, ref);
        }
        function restore(id, ref) {
            restoreNews('news/restore/' + id, ref);
        }
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">ارشيف البوم الصور</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')
    @include('layouts.alert')





    <div class="card p-3">
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
