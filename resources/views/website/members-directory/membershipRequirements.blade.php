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
        <div class="flexSection">
            <div class="d-flex titleSec flex-column align-items-center text-center">
                <h2 class="titleFlexSec lineTitle fontBold">متطلبات العضوية</h2>
            </div>

            <div class="bodyMedia container mt-5">
                <div class="d-flex flexG align-items-start">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">
                            تفاصيل الخدمة
                        </button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">
                            شروط الحصول على الخدمة
                        </button>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-messages" type="button" role="tab"
                            aria-controls="v-pills-messages" aria-selected="false">
                            الوثائق المطلوبة للحصول على الخدمة
                        </button>
                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-settings" type="button" role="tab"
                            aria-controls="v-pills-settings" aria-selected="false">
                            إجراءات الحصول على الخدمة
                        </button>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab" tabindex="0">
                            <div class="bodyText">
                                <p>
                                    <span class="fontBold">الخدمة :</span> الحصول على المستندات
                                    عن الملف التجاري
                                </p>
                                <p>
                                    <span class="fontBold">الوحدة التنظيمية :</span> الادارة
                                    العامة للشركات
                                </p>
                                <p>
                                    <span class="fontBold">الخدمة :</span> حصول المواطن صاحب
                                    السجل الفردي وأصحاب الشركات العاملة في قطاع غزة على أي مستند
                                    من الملف التجاري من الإدارة مصدق لتقديمة للجهات ذات العلاقة
                                    مثل البنوك، الغرف التجارية، الهيئات التجارية (هيئة تنسيق
                                    البضائع)
                                </p>
                                <p><span class="fontBold">معلومات اضافية: </span> .لا يوجد</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab" tabindex="0">
                            ...
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab" tabindex="0">
                            ...
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab" tabindex="0">
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
