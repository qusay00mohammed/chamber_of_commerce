@extends('layouts.admin')

@section('title', 'المستخدمين')

@push('css')
@endpush

@push('javascript')
    <script>
        function performDestroy(id, ref) {
            confirmDestroy('/admin/users/' + id, ref);
        }

        $('#kt_modal_2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('id')
            var name = button.data('name')
            var email = button.data('email')

            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #email').val(email);
        })

    </script>

    <script type="text/javascript">
        $(function() {
            var table = $('#kt_datatable_example_5').DataTable({


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
        <small class="text-muted fs-7 fw-bold my-1 ms-1">المستخدمين</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')
@include('layouts.alert')
    <div class="card p-3">


        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1" title=""
                data-bs-original-title="إضافة مستخدم">
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
                    <th>اسم المستخدم</th>
                    <th>البريد الالكتروني</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a onclick="performDestroy({{ $item->id }}, this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>

                            <a data-bs-toggle="modal" data-bs-target="#kt_modal_2" style="cursor: pointer;"
                                data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                data-email="{{ $item->email }}"><i class="text-info fas fa-edit"
                                    style="font-size: 16px"></i>&nbsp;&nbsp;</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- add --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة مستخدم</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">اسم المستخدم</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">البريد الالكتروني</label>
                            <input class="form-control" type="text" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">كلمة المرور</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
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

    {{-- update --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل المستخدم</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('users.update', 'test') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label for="" class="mb-2">اسم المستخدم</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">البريد الالكتروني</label>
                            <input class="form-control" type="text" name="email" id="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">كلمة المرور القديمة</label>
                            <input class="form-control" type="password" name="oldPassword" id="oldPassword" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="mb-2">كلمة المرور الجديدة</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="mb-2">تأكيد كلمة المرور</label>
                            <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" required>
                        </div>

                        <input type="hidden" class="form-control" name="user_id" id="user_id">


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
