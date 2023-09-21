@extends('layouts.website')

@section('title', 'اللجان')

@section('sub_title', $committee->title)
@section('meta')

<meta name="title" property="og:title" content="لجان الغرفة">
<meta name="description" property="og:description" content="لجان الغرفة">
<meta name="keywords" property="og:keywords" content=",لجان الغرفة,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="لجان الغرفة" />
<meta property="og:title" content="لجان الغرفة" />

@endsection
@push('css')
@endpush

@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6g9RLFI3-V7NH6UzH33zLRiSaw3a23WI&libraries=places"></script>
<script>
    var map1;
        var infoWindow;
        var currentMarker;

        var latitude = {{ $committee->latitude }}
        var longitude = {{ $committee->longitude }}

        map1 = new google.maps.Map(document.getElementById("map1"), {
            center: {
                lat: latitude,
                lng: longitude
            },
            zoom: 23,
            mapTypeId: "roadmap",
        });


        var locationLatLng = new google.maps.LatLng(latitude, longitude);
        var marker = new google.maps.Marker({
            position: locationLatLng,
            map: map1
        });


        infoWindow = new google.maps.InfoWindow();
</script>
@endpush



@section('content')


    <div class="pagesInnerBody container mt-5">
        <div class="flexSection">
            <div class="d-flex titleSec flex-column align-items-center text-center">
                <h2 class="titleFlexSec lineTitle fontBold">{{ $committee->title }}</h2>
            </div>
        </div>

        <div class="commissionsB">
            <ul class="nav nav-pills gap-4 mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-members-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-members" type="button" role="tab" aria-controls="pills-members"
                        aria-selected="true">
                        الأعضاء
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-meetings-tab" data-bs-toggle="pill" data-bs-target="#pills-meetings"
                        type="button" role="tab" aria-controls="pills-meetings" aria-selected="false">
                        الاجتماعات
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        جهات الاتصال
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-members" role="tabpanel"
                    aria-labelledby="pills-members-tab" tabindex="0">
                    <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-5 mt-5">

                        @foreach ($committee->members as $item)
                        <div class="col-12">
                            <div class="cardSliderBoard cardSliderBoardpage">
                                <div class="imgCardSliderBoard">
                                    <img src="{{ asset("storage/$item->image_url") }}" alt="" />
                                </div>
                                <h5>{{ $item->full_name }}</h5>
                                <h6>{{ $item->job_title }}</h6>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
                <div class="tab-pane fade accordion accordionCommissions" id="pills-meetings" role="tabpanel"
                    aria-labelledby="pills-meetings-tab" tabindex="0">
                    <div class="accordion cardsmeetingsRow row">
                        <div class="cardmeetingsRow col-12">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        الأجتماع الأول 6/19/2023
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="textBodyAccordion">
                                            <p>
                                                أهم ما تم مناقشته في الاجتماع:
                                                <br />
                                                <br />
                                                - تم تعيين نائبأ لرئيس اللجنة <br />- تم الاتفاق على
                                                الاجراءات الخاصة بتنظيم اجتماعات اللجنة <br />- مناقشة
                                                مبدئية لخطة عمل اللجنة
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cardmeetingsRow col-12">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        الأجتماع الأول 6/19/2023
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="textBodyAccordion">
                                            <p>
                                                أهم ما تم مناقشته في الاجتماع:
                                                <br />
                                                <br />
                                                - تم تعيين نائبأ لرئيس اللجنة <br />- تم الاتفاق على
                                                الاجراءات الخاصة بتنظيم اجتماعات اللجنة <br />- مناقشة
                                                مبدئية لخطة عمل اللجنة
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cardmeetingsRow col-12">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        الأجتماع الأول 6/19/2023
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="textBodyAccordion">
                                            <p>
                                                أهم ما تم مناقشته في الاجتماع:
                                                <br />
                                                <br />
                                                - تم تعيين نائبأ لرئيس اللجنة <br />- تم الاتفاق على
                                                الاجراءات الخاصة بتنظيم اجتماعات اللجنة <br />- مناقشة
                                                مبدئية لخطة عمل اللجنة
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <div class="contactsA">
                        <div class="titleContactsA">
                            <h5 class="fontBold">جهات الاتصال</h5>
                        </div>
                        <div class="rowContactsA">
                            <img src="images/locationG.svg" alt="" />
                            <span>{{ $committee->address }}</span>
                        </div>
                        <div class="rowContactsA">
                            <img src="images/callG.svg" alt="" />
                            <span>{{ $committee->phone_number }}</span>
                        </div>
                        <div class="rowContactsA">
                            <img src="images/smsG.svg" alt="" />
                            <span>{{ $committee->email }}</span>
                        </div>
                    </div>
                    <div class="commissionsLocation">
                        <h2 class="titleFlexSec lineTitle fontBold">الموقع الجغرافي</h2>
                        {{-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.43693000794!2d34.4559101236331!3d31.51215744754646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f0d569ea745%3A0x2898309bb3a687e1!2z2K3Yr9mK2YLZhyAuINmF2YbYqtiy2Ycg2KfZhNio2YTYr9mK2Ycg2LrYstmH!5e0!3m2!1sar!2s!4v1689240568979!5m2!1sar!2s"
                            width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe> --}}
                        <div id="map1" style="width: 100%; height: 450px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
