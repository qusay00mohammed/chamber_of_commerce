@extends('layouts.website')

@section('title', 'الخدمات')

@section('sub_title', 'خدمات الغرفة')

@section('meta')

<meta name="title" property="og:title" content="خدمات الغرفة">
<meta name="description" property="og:description" content="خدمات الغرفة">
<meta name="keywords" property="og:keywords" content=",خدمات الغرفة,خدمات الغرفة, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset("storage/$service->background_image") }}">
<meta property="og:image" content="{{ asset("storage/$service->background_image") }}">
<meta name="news_keywords" property="og:news_keywords" content="خدمات الغرفة" />
<meta property="og:title" content="الخدمات" />

@endsection

@push('css')
@endpush

@push('js')
@endpush

@section('content')

    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="bodyMedia container mt-5">
                <div class="flexService">
                    <div class="textSideService">
                        <h3 class="titleFlexSec lineTitle fontBold">نموذج طلب الخدمة</h3>
                        <div class="bodyTextS">

                            {!! $service->description !!}

                            <a href="" class="btnS me-0 mt-5 bottom" data-sr-id="8"
                                style="visibility: visible; opacity: 1" data-bs-toggle="modal"
                                data-bs-target="#requestPrice">التقديم على الخدمة
                            </a>
                        </div>
                    </div>
                    <div class="imgSideService">
                        <img src="{{ asset("storage/$service->background_image") }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal modalPro fade" id="requestPrice" tabindex="-1" aria-labelledby="requestPrice" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="fontBold text-center">نموذج طلب الخدمة</h4>
                    <form class="mt-5" action="">
                        <div class="flexModalPro">
                            <div class="inputLP">
                                <label for="">الأسم كاملاً</label>
                                <input type="text" placeholder="الأسم كاملاً" />
                            </div>
                            <div class="inputLP">
                                <label for="">البريد الالكتروني</label>
                                <input type="email" placeholder="البريد الإلكتروني" />
                            </div>
                            <div class="inputLP">
                                <label for="">الدولة</label>
                                <input type="number" placeholder="اسم الدولة" />
                            </div>
                        </div>
                        <div class="flexModalPro mt-3 mt-md-4">
                            <div class="inputLP">
                                <label for="">المدينة</label>
                                <input type="text" placeholder="اسم المدينة" />
                            </div>
                            <div class="inputLP">
                                <label for="">رقم الموبايل</label>
                                <input type="email" placeholder="إدخال رقم الموبايل" />
                            </div>
                            <div class="inputLP">
                                <label for="">اسم المؤسسة</label>
                                <input type="number" placeholder="اسم المؤسسة" />
                            </div>
                        </div>

                        <div class="btnsContactUs mt-5">
                            <button type="submit" class="btnS m-0 mb-2">
                                التقديم على الخدمة
                            </button>
                            <button type="button" data-bs-dismiss="modal" class="btnW m-0 mb-2">
                                إلغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
