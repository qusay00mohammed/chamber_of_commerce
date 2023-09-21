@extends('layouts.website')

@section('title', 'الأتفاقيات والقوانين')

@section('sub_title', 'الأتفاقيات والقوانين')

@section('meta')

<meta name="title" property="og:title" content="الأتفاقيات والقوانين">
<meta name="description" property="og:description" content="الأتفاقيات والقوانين">
<meta name="keywords" property="og:keywords" content=",الأتفاقيات والقوانين,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="الأتفاقيات والقوانين" />
<meta property="og:title" content="الأتفاقيات والقوانين" />

@endsection

@push('css')

@endpush

@push('js')

@endpush



@section('content')


    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="d-flex titleSec flex-column align-items-center text-center">
                <h2 class="titleFlexSec lineTitle fontBold">الاتفاقيات والقوانين</h2>
            </div>

            <div class="bodyMedia bodyAgreement container mt-5">
                <div class="row">
                    @foreach ($conventionLaw as $item)
                    <div class="col-md-6">
                        <div class="cardVersion">
                            <a href="{{ route('agreementsAndLawsDetails', [$item->id]) }}" class="textCardVersion">
                                <h4 class="fontBold mb-0">{{ $item->title }}</h4>
                            </a>
                            <a href="{{ route('agreementsAndLawsDetails', [$item->id]) }}" class="linkP">
                                <span>زيارة الصفحة</span>
                                <div class="arrowIconG">
                                    <i class="bx bx-chevron-left"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            {{-- <nav aria-label="Page navigation ">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link"><i class="bx bx-chevron-right"></i></a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="bx bx-chevron-left"></i></a>
                    </li>
                </ul>
            </nav> --}}

        </div>
    </div>

@endsection
