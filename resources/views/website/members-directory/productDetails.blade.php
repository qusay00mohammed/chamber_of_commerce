@extends('layouts.website')

@section('title', 'test')

@section('sub_title', 'test')
@section('meta')

@endsection

@push('css')
@endpush

@push('js')
<script>
    Fancybox.bind("[data-fancybox]", {
        Thumbs: {
            type: "classic",
        },
        Carousel: {
            direction: "rtl",
        },

        Toolbar: {
            display: {
                rigtht: ["infobar"],
                Thumbs: {
                    type: "classic",
                },
                middle: [],
                right: ["slideshow", "download", "thumbs", "close"],
            },
        },
    });
</script>
@endpush



@section('content')



    <div class="pagesInnerBody container mt-5">
        <div class="flexSection">
            <div class="d-flex titleSec flex-column align-items-center text-center">
                <h2 class="titleFlexSec lineTitle fontBold">تفاصيل المنتج</h2>
            </div>
        </div>

        <div class="commissionsB">
            <div class="btnsCs">
                <button data-bs-toggle="modal" data-bs-target="#requestPrice" class="btnS">
                    <img src="images/money-send.svg" alt="" />
                    <span>طلب المنتج</span>
                </button>
                <button data-bs-toggle="modal" data-bs-target="#requestTrialVersion" class="btnS">
                    <img src="images/keyboard-open.svg" alt="" />
                    <span>طلب نسخة تجيربية</span>
                </button>
            </div>
            <div class="mt-4">
                <div class="contactsA">
                    <div class="flexC">
                        <div class="imgC">
                            <img src="images/Image4.svg" alt="" />
                        </div>
                        <div class="bodyC">
                            <h5 class="fontBold">نظام مخصص لإدارة العملاء</h5>
                            <hr />

                            <div class="bodyCText">
                                <p class="fontBold">
                                    تطوير داخلي متكامل لإدارة علاقات العملاء ويلبي احتياجات
                                    الشركات والمؤسسات التي تقدم منتجات / خدمات ويسهل سير العمل
                                    الداخلي ويبقي على اتصال مع العملاء باستخدام أكثر أدوات
                                    الاتصالات شيوعا (البريد الإلكتروني / الرسائل القصيرة VOIP /
                                    GCM).
                                </p>
                                <div class="">
                                    <h6 class="fontBold">صور من النظام</h6>
                                    <div class="imgflexP mt-4">
                                        <a href="images/ii1.png" data-fancybox="gallery">
                                            <img src="images/Image5.png" alt="" />
                                        </a>
                                        <a href="images/ii2.png" data-fancybox="gallery">
                                            <img src="images/Image6.png" alt="" />
                                        </a>
                                        <a href="images/ii3.png" data-fancybox="gallery">
                                            <img src="images/Image7.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="sliderNews mt-5">
        <div class="container">
            <h3 class="mb-4 fontBold lineTitle">أنظمة قد تهمك</h3>
        </div>

        <div class="sliderNews sliderProduct">
            <!-- Swiper -->
            <div class="swiper-button-next button-next-swiperNews"></div>
            <div class="swiper-button-prev button-prev-swiperNews"></div>
            <div class="swiper swiperNews container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="cardP">
                            <div class="cardProductsImage">
                                <img class="" src="images/Image4.svg" alt="" />
                            </div>
                            <a href="" class="titleP fontBold mb-3">نظام مخصص لإدارة العملاء</a>
                            <span class="tapP">نظم إدارية وحاسوبية</span>
                            <div class="locationP">
                                <img src="images/locationG.svg" alt="" />
                                <p>مدينة غزة - الجلاء</p>
                            </div>
                            <p>السعر: $250</p>
                            <a href="" class="btnS">تعرف على المزيد</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cardP">
                            <div class="cardProductsImage">
                                <img class="" src="images/imagep2.svg" alt="" />
                            </div>
                            <a href="" class="titleP fontBold mb-3">التصميم الجرافيكي</a>
                            <span class="tapP">التصميم الجرافيكي</span>
                            <div class="locationP">
                                <img src="images/locationG.svg" alt="" />
                                <p>مدينة غزة - الجلاء</p>
                            </div>
                            <p>السعر: $250</p>
                            <a href="" class="btnS">تعرف على المزيد</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cardP">
                            <div class="cardProductsImage">
                                <img class="" src="images/Ellipse7.svg" alt="" />
                            </div>
                            <a href="" class="titleP fontBold mb-3">LogesTechs</a>
                            <span class="tapP">نظم إدارية وحاسوبية</span>
                            <div class="locationP">
                                <img src="images/locationG.svg" alt="" />
                                <p>مدينة غزة - الجلاء</p>
                            </div>
                            <p>السعر: $250</p>
                            <a href="" class="btnS">تعرف على المزيد</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cardP">
                            <div class="cardProductsImage">
                                <img class="" src="images/imagep4.svg" alt="" />
                            </div>
                            <a href="" class="titleP fontBold mb-3">Outbound Services</a>
                            <span class="tapP">التسويق عبر الهاتف</span>
                            <div class="locationP">
                                <img src="images/locationG.svg" alt="" />
                                <p>مدينة غزة - الجلاء</p>
                            </div>
                            <p>السعر: $250</p>
                            <a href="" class="btnS">تعرف على المزيد</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cardP">
                            <div class="cardProductsImage">
                                <img class="" src="images/Image4.svg" alt="" />
                            </div>
                            <a href="" class="titleP fontBold mb-3">نظام مخصص لإدارة العملاء</a>
                            <span class="tapP">نظم إدارية وحاسوبية</span>
                            <div class="locationP">
                                <img src="images/locationG.svg" alt="" />
                                <p>مدينة غزة - الجلاء</p>
                            </div>
                            <p>السعر: $250</p>
                            <a href="" class="btnS">تعرف على المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal modalPro fade" id="requestPrice" tabindex="-1" aria-labelledby="requestPrice"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="fontBold text-center">طلب سعر للمنتج</h4>
                    <form class="mt-5" action="">
                        <div class="flexModalPro">
                            <div class="inputLP">
                                <label for="">الأسم كاملاً</label>
                                <input type="text" placeholder="" />
                            </div>
                            <div class="inputLP">
                                <label for="">البريد الالكتروني</label>
                                <input type="email" placeholder="" />
                            </div>
                            <div class="inputLP">
                                <label for="">رقم التواصل</label>
                                <input type="number" placeholder="" />
                            </div>
                        </div>
                        <div class="flexModalPro mt-4">
                            <div class="inputLP">
                                <label for="">ملاحظات</label>
                                <textarea name="" id="" cols="30" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="checksP mt-4">
                            <label for="">هل انت زبون لدينا؟</label>
                            <div class="checkP">
                                <input class="form-check-input" type="radio" name="checkP" id="checkP1" />
                                <label for="checkP1">نعم</label>
                            </div>
                            <div class="checkP">
                                <input class="form-check-input" type="radio" name="checkP" id="checkP2" />
                                <label for="checkP2" for="">لا</label>
                            </div>
                        </div>
                        <div class="btnsContactUs mt-4">
                            <button class="btnS m-0 mb-2" data-bs-dismiss="modal">
                                إرسال
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

    <!-- Modal -->
    <div class="modal modalPro fade" id="requestTrialVersion" tabindex="-1" aria-labelledby="requestTrialVersion"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="fontBold text-center">طلب نسخة تجيربية</h4>
                    <form class="mt-5" action="">
                        <div class="flexModalPro">
                            <div class="inputLP">
                                <label for="">الأسم كاملاً</label>
                                <input type="text" placeholder="" />
                            </div>
                            <div class="inputLP">
                                <label for="">البريد الالكتروني</label>
                                <input type="email" placeholder="" />
                            </div>
                            <div class="inputLP">
                                <label for="">رقم التواصل</label>
                                <input type="number" placeholder="" />
                            </div>
                        </div>
                        <div class="flexModalPro mt-4">
                            <div class="inputLP">
                                <label for="">ملاحظات</label>
                                <textarea name="" id="" cols="30" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="checksP mt-4">
                            <label for="">هل انت زبون لدينا؟</label>
                            <div class="checkP">
                                <input class="form-check-input" type="radio" name="checkP" id="checkP1" />
                                <label for="checkP1">نعم</label>
                            </div>
                            <div class="checkP">
                                <input class="form-check-input" type="radio" name="checkP" id="checkP2" />
                                <label for="checkP2" for="">لا</label>
                            </div>
                        </div>
                        <div class="btnsContactUs mt-4">
                            <button class="btnS m-0 mb-2" data-bs-dismiss="modal">
                                إرسال
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
