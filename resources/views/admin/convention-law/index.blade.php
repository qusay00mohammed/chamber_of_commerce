@extends('layouts.admin')

@section('title', 'الاتفاقيات والقوانين')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <style>
        .card .card-body {
            padding: 0rem 2.25rem;
        }
    </style>
@endpush

@push('javascript')

    <script>
        function performDestroy(id, ref) {
            performDelete('/admin/conventionLaw/' + id, ref);
        }
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">الاتفاقيات والقوانين</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')
    @include('layouts.alert')

    <div class="card p-3">
        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
            <a href="{{ route('conventionLaw.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" title=""
                data-bs-original-title="إضافة قانون او تعميم">
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


        <br>


        <!--begin::Accordion-->
        <div class="accordion" id="kt_accordion_1">

            @foreach ($data as $item)
                @if ($item->parent_id == null)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="kt_accordion_1_header_{{ $item->id }}" style="position: relative;">
                            <button class="accordion-button fs-4  fw-bold collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#kt_accordion_1_body_{{ $item->id }}" aria-expanded="true" aria-controls="kt_accordion_1_body_{{ $item->id }}">
                                {{ $item->title }}
                            </button>
                            <div style="position: absolute; left: 50px; z-index: 100; top:50%; transform: translateY(-50%)">
                                <a href="{{ route("conventionLaw.edit", $item->id) }}"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>
                                <a onclick="performDestroy('{{ $item->id }}', this)" style="cursor: pointer; font-size: 16px"><i class="text-danger fas fa-trash-alt"></i></a>
                            </div>


                        </h2>
                        <div id="kt_accordion_1_body_{{ $item->id }}" class="accordion-collapse collapse"
                            aria-labelledby="kt_accordion_1_header_{{ $item->id }}" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                    <thead>
                                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                            <th>#</th>
                                            <th>عناون الملف</th>
                                            <th>معاينة الملف</th>
                                            {{-- <th>العمليات</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $i)
                                            @if ($item->id == $i->parent_id)
                                                <tr>
                                                    <td>{{ $key++ }}</td>
                                                    <td>{{ $i->title }}</td>
                                                    <td><a target="_blank" href="{{ asset("storage/$i->file_name") }}">هنا</a></td>

                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach


        </div>
        <!--end::Accordion-->

    </div>

@endsection
