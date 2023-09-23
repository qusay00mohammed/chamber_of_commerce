@extends('layouts.website')

@section('title', $agreementsAndLawsDetail->title)

@section('sub_title', 'الأتفاقيات والقوانين')
@section('meta')

<meta name="title" property="og:title" content="{{ $agreementsAndLawsDetail->title }}">
<meta name="description" property="og:description" content="الأتفاقيات والقوانين">
<meta name="keywords" property="og:keywords" content=",الأتفاقيات والقوانين,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="الأتفاقيات والقوانين" />
<meta property="og:title" content="{{ $agreementsAndLawsDetail->title }}" />

@endsection
@push('css')
@endpush

@push('js')
@endpush



@section('content')




    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="d-flex titleSec flex-column align-items-center text-center">
                <h2 class="titleFlexSec lineTitle fontBold">
                    {{ $agreementsAndLawsDetail->title }}
                </h2>
            </div>

            <div class="bodyMedia bodyAgreement container mt-5">
                <div class="row">

                    @foreach ($agreementsAndLawsDetails as $item)
                    <div class="col-md-6 col-xl-4">
                        <a href="{{ asset("storage/$item->file_name") }}" data-fancybox class="cardpdfD">
                            <div class="imgCardpdfD">
                                <img src="{{ asset("assets/website/images/pdf-svgrepo-com.svg") }}" alt="" />
                            </div>
                            <div class="textCardfD">
                                <h5 class="fontBold">{{ $item->title }}</h5>

                                <span>كيلوبايت {{ round(filesize(public_path("storage/$item->file_name")) / 1024, 2) }} </span> {{-- ، 26 الصفحات  --}}
                                <span>{{ $item->created_at->format('Y:m:d') }}</span>
                            </div>
                            <img class="eye" src="{{ asset('assets/website/images/eye.svg') }}" alt="" />
                        </a>
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
