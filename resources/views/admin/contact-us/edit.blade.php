@extends('layouts.admin')

@section('title', 'تعديل الرسالة')

@push('css')
@endpush

@push('javascript')
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">الرسالة</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل الرسالة</small>
    </h1>
@endsection


@section('content')

@include('layouts.alert')

<div class="row">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <p class="mg-b-20"></p>
                <form action="{{ route('contact-us.update', [$message->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">
                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">
                                <label for="" class="mb-2">الاسم</label>
                                <input class="form-control mb-3" name="fullname" value="{{ $message->fullname }}" placeholder="الاسم كامل" required type="text">
                                <label for="" class="mb-2">الايميل</label>
                                <input class="form-control mb-3" name="email" value="{{ $message->email }}" placeholder="البريد الالكتروني" required type="email">


                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">
                                <label for="" class="mb-2">العنوان</label>
                                <input class="form-control mb-3" name="title" value="{{ $message->title }}" placeholder="عنوان الرسالة" required type="text">
                                <label for="" class="mb-2">سبب المراسلة</label>

                                <select class="form-control mb-3" required name="reason" id="">
                                    <option value="inquiry" {{ $message->reason == 'inquiry' ? 'selected' : '' }}>استفسار</option>
                                    <option value="problem" {{ $message->reason == 'problem' ? 'selected' : '' }}>مشكلة</option>
                                </select>

                            </div>
                        </div>

                        <label for="" class="mb-2">الرسالة</label>
                        <textarea class="form-control mb-3" name="message" placeholder="العنوان" required rows="3">{{ $message->message }}</textarea>
                    </div>
                    <div class="form-group mb-0 mt-3 justify-content-end">
                        <input type="submit" value="تعديل البيانات" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
