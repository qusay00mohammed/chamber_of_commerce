@extends('layouts.website')

@section('title', 'التعميمات')

@section('sub_title', 'التعميمات')
@section('meta')

<meta name="title" property="og:title" content="التعميمات">
<meta name="description" property="og:description" content="التعميمات">
<meta name="keywords" property="og:keywords" content=",التعميمات,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="التعميمات" />
<meta property="og:title" content="التعميمات" />

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
                    تعميمات الغرفة التجارية
                </h2>
            </div>

            <div class="bodyMedia bodyAgreement container mt-5">
                <div class="row">

                    @foreach ($generalizations as $item)
                    <div class="col-md-6 col-xl-4">
                        <a href="{{ route('generalizationsDetails', [$item->id]) }}" class="cardpdfD cardG">
                            <div class="textCardfD">
                                <h5 class="fontBold">{{ $item->title }}</h5>
                                <span>{{ $item->created_at }}</span>
                            </div>
                            <span href="{{ route('generalizationsDetails', [$item->id]) }}" class="btnS">تعرف على المزيد</span>
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
