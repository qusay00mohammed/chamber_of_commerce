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
                <h2 class="titleFlexSec lineTitle fontBold">دليل الأعضاء</h2>
            </div>

            <div class="searchMedia container">
                <form class="searchSide">
                    <button type="submit">
                        <img src="images/searchIconB.svg" alt="" />
                    </button>
                    <div class="searchA">
                        <input type="text" placeholder="عن ماذا تبحث؟" />
                    </div>

                    <button class="btnS">بحث</button>
                </form>
            </div>

            <div class="bodyMedia container mt-5">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table align-middle text-center">
                            <thead>
                                <tr>
                                    <td>رقم المشتغل</td>
                                    <td>الشركة</td>
                                    <td>القطاع</td>
                                    <td>المهنة</td>
                                    <td>سنة التأسيس</td>
                                    <td>المنطقة</td>
                                    <td>حالة العضوية</td>
                                    <td>صفحة الشركة</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>562762138</td>
                                    <td>
                                        <a href="companyDetails.html" class="imgCompany">
                                            <img src="images/companyImage.png" alt="" />
                                            <span> شركه TOO POP TECH </span>
                                        </a>
                                    </td>
                                    <td>تكنولوجيا المعلومات</td>
                                    <td>الأمن السيبراني و الذكاء الاصطناعي</td>
                                    <td>2022</td>
                                    <td>غزة - مقابل منتزه البلدية</td>
                                    <td>
                                        <div class="checkT">
                                            <div class="checkTable">
                                                <i class="bx bx-check"></i>
                                            </div>
                                            <span>نشط</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="companyDetails.html" class="arrowT">
                                            <span>زيارة الصفحة</span>
                                            <div class="arrowTable">
                                                <i class="bx bx-chevron-left"></i>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>562762138</td>
                                    <td>
                                        <a href="companyDetails.html" class="imgCompany">
                                            <img src="images/companyImage2.png" alt="" />
                                            <span> مول مترو التجاري </span>
                                        </a>
                                    </td>
                                    <td>تجارة مواد غذائية</td>
                                    <td>تجارة عامة</td>
                                    <td>2012</td>
                                    <td>غزه شارع الشهداء</td>
                                    <td>
                                        <div class="checkT">
                                            <div class="checkTable">
                                                <i class="bx bx-check"></i>
                                            </div>
                                            <span>نشط</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="companyDetails.html" class="arrowT">
                                            <span>زيارة الصفحة</span>
                                            <div class="arrowTable">
                                                <i class="bx bx-chevron-left"></i>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>562762138</td>
                                    <td>
                                        <a href="companyDetails.html" class="imgCompany">
                                            <img src="images/companyImage.png" alt="" />
                                            <span> شركه TOO POP TECH </span>
                                        </a>
                                    </td>
                                    <td>تكنولوجيا المعلومات</td>
                                    <td>الأمن السيبراني و الذكاء الاصطناعي</td>
                                    <td>2022</td>
                                    <td>غزة - مقابل منتزه البلدية</td>
                                    <td>
                                        <div class="checkT">
                                            <div class="checkTable">
                                                <i class="bx bx-check"></i>
                                            </div>
                                            <span>نشط</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="companyDetails.html" class="arrowT">
                                            <span>زيارة الصفحة</span>
                                            <div class="arrowTable">
                                                <i class="bx bx-chevron-left"></i>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>562762138</td>
                                    <td>
                                        <a href="companyDetails.html" class="imgCompany">
                                            <img src="images/companyImage.png" alt="" />
                                            <span> شركه TOO POP TECH </span>
                                        </a>
                                    </td>
                                    <td>تكنولوجيا المعلومات</td>
                                    <td>الأمن السيبراني و الذكاء الاصطناعي</td>
                                    <td>2022</td>
                                    <td>غزة - مقابل منتزه البلدية</td>
                                    <td>
                                        <div class="checkT">
                                            <div class="checkTable">
                                                <i class="bx bx-check"></i>
                                            </div>
                                            <span>نشط</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="companyDetails.html" class="arrowT">
                                            <span>زيارة الصفحة</span>
                                            <div class="arrowTable">
                                                <i class="bx bx-chevron-left"></i>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>562762138</td>
                                    <td>
                                        <a href="companyDetails.html" class="imgCompany">
                                            <img src="images/companyImage.png" alt="" />
                                            <span> شركه TOO POP TECH </span>
                                        </a>
                                    </td>
                                    <td>تكنولوجيا المعلومات</td>
                                    <td>الأمن السيبراني و الذكاء الاصطناعي</td>
                                    <td>2022</td>
                                    <td>غزة - مقابل منتزه البلدية</td>
                                    <td>
                                        <div class="checkT notcheckT">
                                            <div class="checkTable">
                                                <i class="bx bx-check"></i>
                                            </div>
                                            <span>غير نشط</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="companyDetails.html" class="arrowT">
                                            <span>زيارة الصفحة</span>
                                            <div class="arrowTable">
                                                <i class="bx bx-chevron-left"></i>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
