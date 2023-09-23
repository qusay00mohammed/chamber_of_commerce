@extends('layouts.website')

@section('title', 'المركز الإعلامي')

@section('sub_title', 'المركز الإعلامي')
@section('meta')

<meta name="title" property="og:title" content="مكتبة الفيديو">
<meta name="description" property="og:description" content="مكتبة الفيديو">
<meta name="keywords" property="og:keywords" content=",مكتبة الفيديو,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="مكتبة الفيديو" />
<meta property="og:title" content="مكتبة الفيديو" />

@endsection
@push('css')
@endpush

@push('js')
@endpush



@section('content')

<script src="{{ asset('assets/website/js/jqueryLibrary.js') }}"></script>
    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="d-flex titleSec flex-column align-items-center text-center">
                <h2 class="titleFlexSec lineTitle fontBold">المركز الإعلامي</h2>
            </div>

            <div class="menuMediaLink mt-4">
                <div class="container">
                    <ul>
                        <li class=""><a href="{{ route('mediaCenterNews') }}">الأخبار</a></li>
                        <li><a href="{{ route('mediaCenterEvents') }}">أنشطة وفعاليات</a></li>
                        <li><a href="{{ route('mediaCenterImage') }}">ألبوم الصور</a></li>
                        <li class="active">
                            <a href="{{ URL::current() }}">مكتبة الفيديو</a>
                        </li>
                        <li><a href="{{ route('website.mediaCenterVersions') }}">إصدارات الغرفة</a></li>
                    </ul>
                </div>
            </div>

            <div class="searchMedia container">
                <form class="searchSide">
                    <button type="submit">
                        <img src="{{ asset('assets/website/images/searchIconB.svg') }}" alt="" />
                    </button>
                    <input type="text" placeholder="عن ماذا تبحث؟" />
                    <button class="btnS">بحث</button>
                </form>
            </div>

            <div class="bodyMedia container mt-5">
                <div class="row">
                    @foreach ($videos as $item)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ $item->basicFile }}" class="cardM"
                            data-caption="{{ $item->short_description }}">
                            <?php $parts = parse_url($item->basicFile); parse_str($parts['query'], $query); $videoID = $query['v']; ?>
                            <img src="http://i3.ytimg.com/vi/{{ $videoID }}/hqdefault.jpg" alt="" />
                            <div class="wacthVIcon">
                                <i class="bx bx-play"></i>
                            </div>
                            <div class="textCardM">
                                <p id="video{{ $item->id }}"></p>
                                <span>{{ $item->created_at->format('Y:m:d') }}</span>
                                <script>
                                    $(document).ready(function() {
                                        var id_video = "{{ $videoID }}";
                                        $.getJSON('https://www.googleapis.com/youtube/v3/videos', {
                                            id: id_video,
                                            key: 'AIzaSyCtyZ5dt1kITGMxuJFieAdY5qY60Tqct_Q',
                                            part: 'snippet'
                                        }, function(data) {
                                            var videoTitle = data.items[0].snippet.title;
                                            console.log(videoTitle);
                                            $('#video{{ $item->id }}').text(videoTitle);
                                        });
                                    });
                                </script>
                            </div>
                        </a>
                    </div>
                    @endforeach


                </div>
            </div>
            {{-- pagination --}}
            {{ $videos->links('website.paginations.paginate') }}
        </div>
    </div>

@endsection
