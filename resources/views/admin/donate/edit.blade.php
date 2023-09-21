@extends('layouts.admin')

@section('title', 'تعديل التبرع')

@push('css')
@endpush

@push('javascript')
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">التبرعات</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل تبرع</small>
    </h1>
@endsection


@section('content')




<div class="row">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <p class="mg-b-20"></p>
                <form action="{{ route('support-us.update', [$donate->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">
                                <label for="" class="mb-2">الاسم</label>
                                <input class="form-control mb-3" name="fullname" value="{{ $donate->fullname }}" placeholder="الاسم كامل" required type="text">
                                <label for="" class="mb-2">الايميل</label>
                                <input class="form-control mb-3" name="email" value="{{ $donate->email }}" placeholder="البريد الالكتروني" required type="email">


                                <label for="" class="mb-2">حالة الدفع</label>
                                <select class="form-control mb-3" name="status" required>
                                    <option value="paid" {{ $donate->status == 'paid' ? 'selected' : '' }}>مدفوعة</option>
                                    <option value="unpaid" {{ $donate->status == 'unpaid' ? 'selected' : '' }}>غير مدفوعة</option>
                                </select>

                                {{-- <label for="" class="mb-2">الرسالة</label>
                                <textarea class="form-control mb-3" name="message" placeholder="العنوان" rows="3">{{ $donate->payment_id }}</textarea> --}}
                            </div>
                        </div>




                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                            <div class="form-group mg-b-0">
                                <label for="" class="mb-2">رقم الجوال</label>
                                <input class="form-control mb-3" name="phone_number" value="{{ $donate->phone_number }}" placeholder="رقم الجوال" required type="text">
                                <label for="" class="mb-2">المبلغ</label>
                                <input class="form-control mb-3" type="amount" required name="amount" value="{{ $donate->amount }}">

                                <label for="" class="mb-2">ذكر معلومات المتبرع</label>
                                <select class="form-control mb-3" name="mention_my_name" required>
                                    <option value="1" {{ $donate->mention_my_name == 1 ? 'selected' : '' }}>نعم</option>
                                    <option value="0" {{ $donate->mention_my_name == 0 ? 'selected' : '' }}>لا</option>
                                </select>

                            </div>
                        </div>
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
