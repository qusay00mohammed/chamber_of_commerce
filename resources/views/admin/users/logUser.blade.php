@extends('layouts.admin')

@section('title', 'تسجيلات الدخول')

@push('css')
@endpush

@push('javascript')


<script type="text/javascript">
    $(function() {
        var table = $('#kt_datatable_example_5').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ Route('logUser') }}",
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'user_id', name: 'user_id'},
                {data: 'ip_address', name: 'ip_address'},
                {data: 'user_device', name: 'user_device'},
                {data: 'created_at', name: 'created_at'},
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

    });

</script>


@endpush


@section('toolbar')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي
    <!--begin::Separator-->
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
    <!--end::Separator-->
    <!--begin::Description-->
    <small class="text-muted fs-7 fw-bold my-1 ms-1">تسجيلات الدخول</small>
    <!--end::Description-->
</h1>
@endsection


@section('content')

    <div class="card p-3">
        <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المستخدم</th>
                    <th>عنوان IP</th>
                    <th>نوع الجهاز</th>
                    <th>التاريخ والوقت</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTables -->
            </tbody>
        </table>
    </div>

@endsection
