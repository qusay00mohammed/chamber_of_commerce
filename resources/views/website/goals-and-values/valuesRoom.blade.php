@extends('layouts.website')

@section('title', 'قيمنا')

@section('sub_title', 'قيمنا')
@section('meta')

<meta name="title" property="og:title" content="قيمنا">
<meta name="description" property="og:description" content="قيمنا">
<meta name="keywords" property="og:keywords" content=",قيمنا,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="قيمنا" />
<meta property="og:title" content="قيمنا" />

@endsection
@push('css')
@endpush

@push('js')
@endpush



@section('content')


    <div class="pagesInnerBody mt-5">
      <div class="flexSection">
        <div class="d-flex titleSec flex-column align-items-center text-center">
          <h2 class="titleFlexSec lineTitle fontBold">القيم</h2>
        </div>

        <div class="bodyMedia bodyValues container mt-5">
          <div class="row">


            @foreach ($values as $key => $item)
            <div class="col-md-6 col-lg-4">
                <div class="cardVersion cardObjective">
                  <h1 class="numCard">0{{ ++$key }}</h1>
                  <h5>{{ $item->title }}</h5>
                  <p>{{ $item->description }}</p>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>


@endsection
