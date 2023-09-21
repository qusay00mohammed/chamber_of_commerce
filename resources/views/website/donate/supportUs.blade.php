@extends('layouts.website')

@section('title', 'ادعمنا')

@section('sub_title', 'ادعمنا')

@push('css')
<link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

@endpush

@push('js')
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>

    <script>
        $(".imgPaym").click(function() {
            $(".imgPaym").removeClass("active");
            $(this).addClass("active");
        });

        $(".cardChooseAmountF").click(function() {
            $(".cardChooseAmountF").removeClass("active");
            $(this).addClass("active");
            var amount = $(this).data("amount");
            if (amount == 'custom') {
                $("#amount_number").prop("readonly", false);
                $('#amount_number').val('');
            }
            else {
                $('#amount_number').val(amount);
                $("#amount_number").prop("readonly", true);
            }
        });
    </script>
@endpush


@section('content')
@include('layouts.alert')
    <div class="pagesInnerBody mt-5">
        <div class="formPB container">
            <div class="d-flex titleSec flex-column align-items-center">
                <h2 class="titleFlexSec lineTitle fontBold">إدعمنا</h2>
            </div>
            {{-- <div class=""> --}}

                <form method="post" action="{{ route('supportUs.post') }}">
                    @csrf
                    <h5 class="fontBold">طرق الدعم المتوفرة</h5>

                    <div class="imagePay">

                        {{-- <div class="imgPaym active" style="position: relative; transform: translateY(-12px)">
                            <div class="checkG"><i class="bx bx-check"></i></div>
                            <img src="{{ asset('assets/website/images/mastercard.svg') }}" alt="" />
                            <input type="radio" value="mastercard" name="payment_way" checked
                                style="position: absolute; width:100%; height:100%; transform: translateY(-100%); opacity: 0; cursor: pointer;">
                        </div>

                        <div class="imgPaym" style="position: relative; transform: translateY(-12px)">
                            <div class="checkG"><i class="bx bx-check"></i></div>
                            <img src="{{ asset('assets/website/images/visa-svgrepo-com.svg') }}" alt="" />
                            <input type="radio" value="visa" name="payment_way"
                                style="position: absolute; width:100%; height:100%; transform: translateY(-100%); opacity: 0; cursor: pointer;">
                        </div> --}}

                        <div class="imgPaym" style="position: relative; transform: translateY(-12px)">
                            <div class="checkG"><i class="bx bx-check"></i></div>
                            <img src="{{ asset('assets/website/images/stripe-purple.svg') }}" alt="" />
                            <input type="radio" value="stripe" name="payment_way"
                                style="position: absolute; width:100%; height:100%; transform: translateY(-100%); opacity: 0; cursor: pointer;">
                        </div>

                        {{-- <div class="imgPaym" style="position: relative; transform: translateY(-12px)">
                            <div class="checkG"><i class="bx bx-check"></i></div>
                            <img src="{{ asset('assets/website/images/payImg.svg') }}" alt="" />
                            <input type="radio" value="jawwalpay" name="payment_way"
                                style="position: absolute; width:100%; height:100%; transform: translateY(-100%); opacity: 0; cursor: pointer;">
                        </div> --}}

                        <div class="imgPaym active" style="position: relative; transform: translateY(-12px)">
                            <div class="checkG"><i class="bx bx-check"></i></div>
                            <img src="{{ asset('assets/website/images/palestineImg.svg') }}" alt="" />
                            <input type="radio" value="bankPalestine" name="payment_way" checked
                                style="position: absolute; width:100%; height:100%; transform: translateY(-100%); opacity: 0; cursor: pointer;">
                        </div>

                        {{-- <div class="imgPaym" style="position: relative; transform: translateY(-12px)">
                            <div class="checkG"><i class="bx bx-check"></i></div>
                            <img src="{{ asset('assets/website/images/palpayImg.svg') }}" alt="" />
                            <input type="radio" value="palpay" name="payment_way"
                                style="position: absolute; width:100%; height:100%; transform: translateY(-100%); opacity: 0; cursor: pointer;">
                        </div> --}}

                    </div>

                    <br><br>

                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="inputLP mb-3 mb-md-4">
                                <label for="">الأسم كاملاً</label>
                                <input type="text" name="fullname" required placeholder="الأسم كاملاً" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="inputLP mb-3 mb-md-4">
                                <label for="">البريد الالكتروني</label>
                                <input type="email" name="email" required placeholder="البريد الإلكتروني" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="inputLP mb-3 mb-md-4">
                                <label for="">الدولة</label>
                                <input type="text" name="country" required placeholder="اسم الدولة" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="inputLP mb-3 mb-md-4">
                                <label for="">المدينة</label>
                                <input type="text" name="city" required placeholder="اسم المدينة" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="inputLP mb-3 mb-md-4">
                                <label for="">رقم الموبايل</label>
                                <input type="text" name="phone_number" required placeholder="إدخال رقم الموبايل" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="row align-items-end">
                                <div class="inputLP mb-3 mb-md-4">
                                    <label for="">المبلغ</label>
                                    <input type="number" name="amount" min="1" max="999999" id="amount_number" required placeholder="ادخال المبلغ" />
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="mt-3">
                        <h5 class="fontBold">اختر المبلغ المراد التبرع به</h5>
                        <div class="chooseAmountF">
                            <div class="cardChooseAmountF" data-amount="2000">
                                <div class="checkG"><i class="bx bx-check"></i></div>
                                <h5>$2000</h5>
                            </div>
                            <div class="cardChooseAmountF" data-amount="50">
                                <div class="checkG"><i class="bx bx-check"></i></div>
                                <h5>$50</h5>
                            </div>
                            <div class="cardChooseAmountF" data-amount="100">
                                <div class="checkG"><i class="bx bx-check"></i></div>
                                <h5>$100</h5>
                            </div>
                            <div class="cardChooseAmountF" data-amount="150">
                                <div class="checkG"><i class="bx bx-check"></i></div>
                                <h5>$150</h5>
                            </div>
                            <div class="cardChooseAmountF" data-amount="200">
                                <div class="checkG"><i class="bx bx-check"></i></div>
                                <h5>$200</h5>
                            </div>

                            <div class="cardChooseAmountF active" data-amount="custom">
                                <div class="checkG "><i class="bx bx-check"></i></div>
                                <h5>مبلغ أخر</h5>
                            </div>
                        </div>
                    </div>

                    <div class="flexCheckD">
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="yes" name="mention_my_name" type="checkbox" role="switch"
                                id="flexSwitchCheckChecked" checked />
                            <div class="textLabD">
                                <label class="form-check-label fontBold" for="flexSwitchCheckChecked">التعريف
                                    بالمتبرع</label><label for="flexSwitchCheckChecked">لا بأس بذكر اسمي في لوائح الشرف
                                    والشكر</label>
                            </div>
                        </div>
                    </div>












                    <div class="btnsContactUs mt-4" style="justify-content: start">
                        <button type="submit" class="btnS mb-2">تبرع الآن</button>
                    </div>
                </form>
            {{-- </div> --}}
        </div>
    </div>


@endsection
