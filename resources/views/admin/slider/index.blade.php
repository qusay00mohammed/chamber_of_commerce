@extends('layouts.admin')

@section('title', 'سلايدر')

@push('css')
@endpush

@push('javascript')
    <script>
        $("#kt_datatable_example_5").DataTable({
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
            confirmDestroy('/admin/slider/' + id, ref);
        }
    </script>
@endpush


@section('toolbar')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي
    <!--begin::Separator-->
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
    <!--end::Separator-->
    <!--begin::Description-->
    <small class="text-muted fs-7 fw-bold my-1 ms-1">سلايدر</small>
    <!--end::Description-->
</h1>
@endsection


@section('content')

@include('layouts.alert')

    <div class="card p-3">


        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
            <a href="{{ route('slider.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="إضافة سلايدر">
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
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
                    <th>الوصف</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $item)
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td><img width="80px" height="60px" style="border-radius: 7px"
                                src="{{ asset("storage/images/slider/$item->image") }}"></td>
                        <td>{{ $item->title_ar }}</td>
                        <td>{{ $item->description_ar }}</td>
                        <td>
                            <a onclick="performDestroy({{ $item->id }}, this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>
                            <a href="{{ route('slider.edit', [$item->id]) }}"><i
                                    class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
