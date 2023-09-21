@extends('layouts.website')

@section('title', 'test')

@section('sub_title', 'test')
@section('meta')

@endsection

@push('css')
@endpush

@push('js')
@endpush



@section('content')


    <div class="pagesInnerBody mt-5">
      <div class="formPB container">
        <div class="d-flex titleSec flex-column align-items-center">
          <h2 class="titleFlexSec lineTitle fontBold">طلب انتساب</h2>
        </div>
        <div class="mt-5">
          <h5 class="fontBold lineTitle">البيانات الخاصة</h5>

          <form class="" style="margin-top: 35px;" action="">
            <div class="row">
              <div class="col-sm-6 col-lg-4">
                <div class="inputLP mb-3 mb-md-4">
                  <label for="">الأسم كاملاً</label>
                  <input type="text" placeholder="الأسم كاملاً" />
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="inputLP mb-3 mb-md-4">
                  <label for="">البريد الالكتروني</label>
                  <input type="email" placeholder="البريد الإلكتروني" />
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="inputLP mb-3 mb-md-4">
                  <label for="">الدولة</label>
                  <input type="number" placeholder="اسم الدولة" />
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="inputLP mb-3 mb-md-4">
                  <label for="">المدينة</label>
                  <input type="text" placeholder="اسم المدينة" />
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="inputLP mb-3 mb-md-4">
                  <label for="">رقم الموبايل</label>
                  <input type="email" placeholder="إدخال رقم الموبايل" />
                </div>
              </div>


            </div>

            <div class="mt-3" >
              <h5 class="fontBold lineTitle">بيانات الانتساب</h5>
              <div class="row " style="margin-top: 35px;">

                <div class="col-sm-6 col-lg-4">
                    <div class="inputLP mb-3 mb-md-4">
                      <label for="">اسم المؤسسة</label>
                      <input type="email" placeholder="اسم المؤسسة" />
                    </div>
                  </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="inputLP mb-3 mb-md-4">
                      <label for="">القطاع</label>
                      <select class="form-select" name="" id="">
                        <option value="">اسم القطاع</option>
                        <option value="">اسم القطاع</option>
                        <option value="">اسم القطاع</option>
                      </select>
                    </div>
                  </div>

                <div class="col-sm-6 col-lg-4">
                  <div class="inputLP mb-3 mb-md-4">
                    <label for="">المنطقة</label>
                    <input type="email" placeholder="كتابة المنطقة" />
                  </div>
                </div>
            </div>

            <div class="listTextS mt-4">
                <h5 class="fontBold lineTitle">المرفقات المطلوبة للانتساب</h5>
                <ul class="" style="margin-top: 30px;">
                  <li>جواز سفر <span class="graycolor">(إجباري)</span></li>
                  <li>هوية شخصية <span class="graycolor">(إجباري)</span></li>
                  <li>هوية شخصية <span class="graycolor">(إجباري)</span></li>
                </ul>
              </div>

            <div class="btnsContactUs mt-4" style="justify-content: start">
              <button type="submit" class="btnS mb-2">ارسال الطلب</button>
            </div>
          </form>
        </div>
      </div>
    </div>


@endsection
