@extends('layouts.admin')

@section('title', 'إصدارات الغرفة')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endpush

@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox]', {
        //
    });
</script>

    <script>
        function performDestroy(id, ref) {
            confirmDestroy('/admin/versions/' + id, ref);
        }

        function performStore() {
            let data = new FormData();
            data.append('title', $('input[name="title"]').val());
            data.append('image', $('input[name="image"]')[0].files[0]);

            store('/admin/versions', data);
        }

        $('#kt_modal_2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var title = button.data('title')
            var version_id = button.data('version_id')
            let image = button.data('image')
            var modal = $(this)
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #version_id').val(version_id);

        })
    </script>

    <script type="text/javascript">
        $(function() {
            var table = $('#kt_datatable_example_5').DataTable({

                processing: true,
                serverSide: true,
                ajax: "{{ Route('versions.index') }}",
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
                        data: 'date',
                        name: 'date'
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

        });
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">إصدارات الغرفة</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')
@include('layouts.alert')
    <div class="card p-3">


        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
            <a data-bs-toggle="modal" data-bs-target="#kt_modal_1" class="btn btn-primary" title=""
                data-bs-original-title="إضافة إصدار">
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
                    <th>معاينة الملف</th>
                    <th>العنوان</th>
                    <th>تاريخ النشر</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                <!-- dataTables -->
            </tbody>
        </table>
    </div>




    {{-- add --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة إصدار</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form id="create_form" onsubmit="event.preventDefault(); performStore()">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="" class="mb-3">العنوان</label>
                            <input class="form-control" type="text" name="title" required>
                        </div>

                        <br><br>

                        <p class="text-danger">* صيغة المرفق .pdf </p>
                        <h5 class="card-title">المرفق</h5>

                        <input class="form-control" accept=".pdf" type="file" name="image" required>

                        <br>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- edit --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل إصدار</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('versions.update', 'test') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="" class="mb-3">العنوان</label>
                            <input class="form-control" type="text" name="title" id="title" required>
                        </div>

                        <br><br>
                        <input type="hidden" class="form-control" name="version_id" id="version_id">

                        <p class="text-danger">* صيغة المرفق .pdf </p>
                        <h5 class="card-title">المرفق</h5>

                        <input class="form-control" accept=".pdf" type="file" name="image">


                        <br>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
