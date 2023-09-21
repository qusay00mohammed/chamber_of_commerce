
@extends('layouts.admin')

@section('title', 'رسائل SMS')

@push('css')
    <style>
        .custom_btn {
            background-color: #06603a !important;
        }

        .btn-check:active+.btn.btn-primary,
        .btn-check:checked+.btn.btn-primary,
        .btn.btn-primary.active,
        .btn.btn-primary.show,
        .btn.btn-primary:active:not(.btn-active),
        .btn.btn-primary:focus:not(.btn-active),
        .btn.btn-primary:hover:not(.btn-active),
        .show>.btn.btn-primary {
            background-color: #86c127 !important;
        }

        .stepper.stepper-pills .stepper-item .stepper-icon .stepper-number {
            font-weight: 600;
            color: #86c127 !important;
            font-size: 1.25rem;
        }

        .stepper.stepper-pills .stepper-item.current .stepper-icon {
            transition: color .2s ease, background-color .2s ease;
            background-color: #86c127;
        }

        .stepper.stepper-pills .stepper-item.completed .stepper-icon .stepper-check,
        .stepper.stepper-pills .stepper-item.current:last-child .stepper-icon .stepper-check {
            display: none !important;
        }

        .stepper.stepper-pills .stepper-item.current .stepper-icon .stepper-number {
            color: #fff !important;
            font-size: 1.35rem !important;
        }

        .stepper.stepper-pills .stepper-item.completed .stepper-icon .stepper-number,
        .stepper.stepper-pills .stepper-item.current:last-child .stepper-icon .stepper-number {
            display: inline;
        }

        .select2-container--bootstrap5 .select2-selection--multiple:not(.form-select-sm):not(.form-select-lg) .select2-selection__choice .select2-selection__choice__remove {
            margin: -9px !important;
        }

        /* .stepper.stepper-pills .stepper-item.completed .stepper-icon, .stepper.stepper-pills .stepper-item.current:last-child .stepper-icon {
                display: flex;
                align-items: center;
                justify-content: center;
                transition: color .2s ease,background-color .2s ease;
                width: 40px;
                height: 40px;
                border-radius: 0.475rem;
                background-color: #f1faff;
                margin-left: 1.5rem;
            } */
    </style>
@endpush

@push('javascript')
    <script>
        // Stepper lement
        var element = document.querySelector("#kt_stepper_example_clickable");

        // Initialize Stepper
        var stepper = new KTStepper(element);

        // Handle navigation click
        stepper.on("kt.stepper.click", function(stepper) {
            stepper.goTo(stepper.getClickedStepIndex()); // go to clicked step
        });

        // Handle next step
        stepper.on("kt.stepper.next", function(stepper) {
            stepper.goNext(); // go next step
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">رسائل SMS</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')
    @include('layouts.alert')


    <div class="card p-15">
        <!--begin::Stepper-->
        <div class="stepper stepper-pills" id="kt_stepper_example_clickable">
            <!--begin::Nav-->
            <div class="stepper-nav flex-center flex-wrap mb-10">
                <!--begin::Step 1-->
                <div class="stepper-item mx-2 my-4 current" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Line-->
                    <div class="stepper-line w-40px"></div>
                    <!--end::Line-->

                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">1</span>
                    </div>
                    <!--end::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            رسائل
                        </h3>

                        <div class="stepper-desc">
                            SMS
                        </div>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Step 1-->

                <!--begin::Step 2-->
                <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Line-->
                    <div class="stepper-line w-40px"></div>
                    <!--end::Line-->

                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">2</span>
                    </div>
                    <!--begin::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            اعدادت
                        </h3>

                        <div class="stepper-desc">
                            SMS
                        </div>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Step 2-->

                <div style="display: none;" class="stepper-item mx-2 my-4" data-kt-stepper-element="nav"
                    ata-kt-stepper-action="step"></div>

            </div>
            <!--end::Nav-->

            <div class="mb-5">


                <!--begin::Step 1-->
                <div class="flex-column current" data-kt-stepper-element="content">
                    <!--begin::Input group-->
                    <form action="{{ route('sendSMS') }}" class="form w-lg-500px mx-auto" method="POST">
                        @csrf
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label">رقم الهاتف</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="phone_number"
                                placeholder="رقم المحمول" required />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label">نص الرسالة</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid" required name="messageSMS" placeholder="نص الرسالة"></textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <input type="submit" class="btn btn-primary custom_btn" value="إرسال">

                        {{-- <button type="submit" >

                            </button> --}}


                    </form>

                </div>
                <!--begin::Step 1-->


                <!--begin::Step 1-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <!--begin::Input group-->
                    <form action="{{ route('settingsSMS') }}" class="form w-lg-500px mx-auto" method="POST">
                        @csrf

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label">اسم المرسل</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" required class="form-control form-control-solid" name="send_name_sms"
                                placeholder="" value="{{ $settings->where('type', 'sms-information')->where('key', 'send_name_sms')->first()->description ?? '' }}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label">اسم المستخدم</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" required class="form-control form-control-solid" name="username_sms"
                                placeholder="" value="{{ $settings->where('type', 'sms-information')->where('key', 'username_sms')->first()->description ?? '' }}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label">كلمة المرور</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="password" required class="form-control form-control-solid" name="password_sms"
                                placeholder="" value="{{ $settings->where('type', 'sms-information')->where('key', 'password_sms')->first()->description ?? '' }}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <input type="submit" class="btn btn-primary custom_btn" value="حفظ">
                    </form>

                    <!--begin::Input group-->
                    {{-- <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label">Example Label 3</label>
                        <!--end::Label-->

                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" checked="checked" value="1" />
                            <span class="form-check-label">
                                Switch
                            </span>
                        </label>
                        <!--end::Switch-->
                    </div> --}}
                    <!--end::Input group-->
                </div>
                <!--begin::Step 1-->


            </div>

            <div class="d-flex flex-stack">

            </div>
        </div>
    </div>


@endsection
