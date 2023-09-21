@extends('layouts.website')

@section('title', 'برامج الغرفة')

@section('sub_title', 'برامج الغرفة')
@section('meta')

<meta name="title" property="og:title" content="برامج الغرفة">
<meta name="description" property="og:description" content="برامج الغرفة">
<meta name="keywords" property="og:keywords" content=",برامج الغرفة,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="برامج الغرفة" />
<meta property="og:title" content="برامج الغرفة" />

@endsection
@push('css')
@endpush

@push('js')
@endpush



@section('content')


    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="d-flex titleSec flex-column align-items-center text-center">
                <h2 class="titleFlexSec lineTitle fontBold">برامج الغرفة</h2>
                <p>
                    تلتزم الغرفة التجارية بتقديم التميز في برامجها، حيث تم وضعها من قبل
                    الخبراء العاملون معنا
                </p>
            </div>

            <div class="bodyMedia cardsChamberCommitteesPage container mt-5">
                <div class="row container m-auto">

                    @foreach ($programs as $item)
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <a href="{{ route('website.roomProgramsDetails', ['id'=>$item->id]) }}" class="cardChamberCommitteesS">
                                <img src="{{ asset("storage/$item->image_icon") }}" alt="" />
                                <h3 class="">{{ $item->title }}</h3>
                                <div class="arrowC">
                                    <i class="bx bx-arrow-back"></i>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


@endsection
