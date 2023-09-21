@extends('layouts.admin')

@section('title', 'معلومات التواصل')

@push('css')
{{--  --}}
@endpush

@push('javascript')
{{--  --}}
@endpush


@section('toolbar')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية
    <!--begin::Separator-->
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
    <!--end::Separator-->
    <!--begin::Description-->
    <small class="text-muted fs-7 fw-bold my-1 ms-1">معلومات الدفع الالكتروني</small>
    <!--end::Description-->
</h1>
@endsection


@section('content')
@include('layouts.alert')
<div class="row">

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('information-payment-store') }}">
                    @csrf
                    <div class="row row-sm">
                        <p>اعدادت بوابة سترايب</p>
                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">المفتاح السري بوابة سترايب</label>
                                <input class="form-control mb-2" name="secretkeystripe" required type="text" value="{{ $informationPayment->where('key', 'secret-key-stripe')->first()->description ?? '' }}">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">المفتاح العام بوابة سترايب</label>
                                <input class="form-control mb-2" name="publickeystripe" required type="text" value="{{ $informationPayment->where('key', 'public-key-stripe')->first()->description ?? '' }}">

                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row row-sm">
                        <p>اعدادات بنك فلسطين</p>
                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">رقم التاجر</label>
                                <input class="form-control mb-2" name="BOP_MERCHANT_ID" required type="text" value="{{ $informationPayment->where('key', 'BOP_MERCHANT_ID')->first()->description ?? '' }}">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">كلمة مرور التاجر</label>
                                <input class="form-control mb-2" name="BOP_MERCHANT_PASSWORD" required type="text" value="{{ $informationPayment->where('key', 'BOP_MERCHANT_PASSWORD')->first()->description ?? '' }}">

                            </div>
                        </div>

                    </div>


                    <div class="row row-sm">

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">رقم المستفيد</label>
                                <input class="form-control mb-2" name="BOP_ACQUIRER_ID" required type="text" value="{{ $informationPayment->where('key', 'BOP_ACQUIRER_ID')->first()->description ?? '' }}">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">رقم العملة</label>
                                <input class="form-control mb-2" name="BOP_CURRENCY_ISO_CODE" required type="text" value="{{ $informationPayment->where('key', 'BOP_CURRENCY_ISO_CODE')->first()->description ?? '' }}">

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
