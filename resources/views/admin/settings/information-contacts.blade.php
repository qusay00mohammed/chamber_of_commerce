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
    <small class="text-muted fs-7 fw-bold my-1 ms-1">معلومات التواصل</small>
    <!--end::Description-->
</h1>
@endsection


@section('content')
@include('layouts.alert')
<div class="row">

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('information-contacts-store') }}">
                    @csrf
                    <div class="row row-sm">

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">رابط الفيسبوك</label>
                                <input class="form-control mb-2" name="facebook" required type="url" value="{{ $informationContacts->where('key', 'facebook')->first()->description ?? '' }}">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">رابط الانستقرام</label>
                                <input class="form-control mb-2" name="instagram" required type="url" value="{{ $informationContacts->where('key', 'instagram')->first()->description ?? '' }}">

                            </div>
                        </div>

                    </div>

                    <div class="row row-sm">

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">رابط اليوتيوب</label>
                                <input class="form-control mb-2" name="youtube" required type="url" value="{{ $informationContacts->where('key', 'youtube')->first()->description ?? '' }}">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">رابط تويتر</label>
                                <input class="form-control mb-2" name="twitter" required type="url" value="{{ $informationContacts->where('key', 'twitter')->first()->description ?? '' }}">

                            </div>
                        </div>

                    </div>

                    <div class="row row-sm">

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">رابط تيليجرام</label>
                                <input class="form-control mb-2" name="telegram" required type="url" value="{{ $informationContacts->where('key', 'telegram')->first()->description ?? '' }}">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">البريد الاكتروني</label>
                                <input class="form-control mb-2" name="email" required type="email" value="{{ $informationContacts->where('key', 'email')->first()->description ?? '' }}">

                            </div>
                        </div>

                    </div>

                    <div class="row row-sm">

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">رقم الهاتف</label>
                                <input class="form-control mb-2" name="telephone" required type="text" value="{{ $informationContacts->where('key', 'telephone')->first()->description ?? '' }}">

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">رقم الجوال</label>
                                <input class="form-control mb-2" name="phone" required type="text" value="{{ $informationContacts->where('key', 'phone')->first()->description ?? '' }}">

                            </div>
                        </div>

                    </div>

                    <div class="row row-sm">

                        <div class="col-lg-12">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-3">الموقع الجغرافي</label>
                                <input class="form-control mb-2" name="location" required type="text" value="{{ $informationContacts->where('key', 'location')->first()->description ?? '' }}">

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
