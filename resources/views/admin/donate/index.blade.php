@extends('layouts.admin')

@section('title', 'قائمة التبرعات')

@push('css')
@endpush

@push('javascript')
    <script>
        var table = $('#kt_datatable_example_5').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ Route('support-us.index') }}",

            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'fullname',
                    name: 'fullname'
                },
                // {
                //     data: 'phone_number',
                //     name: 'phone_number'
                // },
                {
                    data: 'payment_way',
                    name: 'payment_way'
                },
                {
                    data: 'status',
                    name: 'status',
                },
                // {
                //     data: 'email',
                //     name: 'email'
                // },
                {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'introducing_donor',
                    name: 'introducing_donor'
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
        function performDestroy(id, ref) {
            confirmDestroy('/admin/support-us/' + id, ref);
        }
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">قائمة التبرعات</small>
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
                    <th>الاسم</th>
                    <th>طريقة الدفع</th>
                    {{-- <th>رقم الجوال</th> --}}
                    <th>حالة الدفع</th>
                    {{-- <th>البريد الالكتروني</th> --}}
                    <th>المبلغ</th>
                    <th>عرض بياناتي</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTables -->
            </tbody>
        </table>
    </div>

@endsection
