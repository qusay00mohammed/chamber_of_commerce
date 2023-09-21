@extends('layouts.admin')

@section('title', 'إضافة لجنة')

@push('css')
    <style>
        /*
                     * Always set the map height explicitly to define the size of the div element
                     * that contains the map.
                     */
        #map {
            height: 100%;
        }

        /*
                     * Optional: Makes the sample page fill the window.
                     */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            background-color: #fff;
            border: 0;
            border-radius: 2px;
            box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
            margin: 10px;
            padding: 0 0.5em;
            font: 400 18px Roboto, Arial, sans-serif;
            overflow: hidden;
            font-family: Roboto;
            padding: 0;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            /* margin-left: 0px; */
            padding: 5px 11px 5px 13px;
            text-overflow: ellipsis;
            width: 400px;
            border: none;
            outline: none;
            opacity: 0.5;
            transition: 0.2s;
            position: absolute;
            right: 66px;
            top: 12px !important;

        }

        #pac-input:focus {
            opacity: 1;

        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }

        #target {
            width: 345px;
        }

        /* End style search button in map */
        /* ----------------------------- */
        .tagify {
            overflow: auto !important;
            height: 100px !important;
        }

        .tox-statusbar {
            display: none !important;
        }

        .loading {
            height: 100%;
            width: 100%;
            position: absolute;
            background-color: #eee;
            opacity: 0.5;
            display: none;
        }

        .load {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -50px;
            font-size: 20px;
        }

        .gm-style .gm-style-iw-d {
            margin-right: 18px;
        }
    </style>
@endpush

@push('javascript')
    {{-- Start Google Map --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6g9RLFI3-V7NH6UzH33zLRiSaw3a23WI&libraries=places">
    </script>

    {{-- End Google Map --}}
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

    <script>
        // form repeater
        $('#kt_docs_repeater_basic1').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>
    <script>
        var map1;
        var infoWindow;
        var currentMarker;

        var latitude = {{ $currentUserInfo->latitude }}
        var longitude = {{ $currentUserInfo->longitude }}

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



        map1.addListener("click", function(e) {
            if (currentMarker) {
                currentMarker.setMap(null);
            }
            placeMarkerAndPanTo(e.latLng, map1);
        });

        function placeMarkerAndPanTo(latLng, map1) {
            // إنشاء علامة على الموقع المنقر
            var marker = new google.maps.Marker({
                position: latLng,
                map: map1,
            });

            const latitude = document.querySelector("#latitude");
            latitude.value = latLng.lat();


            const longitude = document.querySelector("#longitude");
            longitude.value = latLng.lng();

            // عرض معلومات الموقع في المربع النص
            infoWindow.setContent("الموقع: " + latLng.lat() + ", " + latLng.lng());
            infoWindow.open(map1, marker);

            // تحريك الخريطة إلى الموقع المنقر
            map1.panTo(latLng);

            // تعيين العلامة الحالية إلى العلامة الجديدة
            currentMarker = marker;
        }




        // Dropzone
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            acceptedFiles: ".jpg,.png,.jpeg",
            autoProcessQueue: false,
            url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: null, // MB
            addRemoveLinks: true, // 0!
            accept: function(file, done) {
                "wow.jpg" == file.name ? done("Naha, you don't.") : done();
            }
        });

        // Start Search
        // Create the search box and link it to the UI element.
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);

        map1.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map1.addListener("bounds_changed", () => {
            searchBox.setBounds(map1.getBounds());
        });

        let markers = [];

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach((marker) => {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();

            places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                const icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25),
                };

                // Create a marker for each place.
                markers.push(
                    new google.maps.Marker({
                        map1,
                        icon,
                        title: place.name,
                        position: place.geometry.location,
                    }),
                );
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map1.fitBounds(bounds);
        });
        window.initAutocomplete = initAutocomplete;
        // End Search



        // Store
        function performStore() {

            let data = new FormData();
            data.append('title', $('input[name="title"]').val());
            data.append('address', $('input[name="address"]').val());
            data.append('email', $('input[name="email"]').val());
            data.append('phone_number', $('input[name="phone_number"]').val());
            data.append('longitude', $('input[name="longitude"]').val());
            data.append('latitude', $('input[name="latitude"]').val());
            data.append('members', $('select[name="members"]').val());

            let repeaterData = [];
            $('div[data-repeater-list="kt_docs_repeater_basic1"] div[data-repeater-item]').each(function() {

                repeaterData.push($(this).find('input[data-nameMember="nameMember"]').val());

            });
            data.append('repeaterData', JSON.stringify(repeaterData));

            var files = myDropzone.getAcceptedFiles(); // Get the selected files

            for (var i = 0; i < files.length; i++) {
                data.append('files[]', files[i]); // Append each file to the FormData object
            }


            store('/admin/committees', data);
            document.getElementById('loading').style.display = 'block';
            currentMarker.setMap(null);
            myDropzone.removeAllFiles(true);
        }

        // Publication Date
        // $(document).ready(function() {
        //     $('#status').change(function() {
        //         if ($(this).val() === 'scheduled') {
        //             $('#date').attr('min', "<?php echo date('Y-m-d\TH:i'); ?>");
        //             $('#date').removeAttr('max');
        //             $('#date').val("<?php echo date('Y-m-d\TH:i'); ?>");
        //         } else {
        //             $('#date').attr('max', "<?php echo date('Y-m-d\TH:i'); ?>");
        //             $('#date').removeAttr('min');
        //             $('#date').val("<?php echo date('Y-m-d\TH:i'); ?>");
        //         }
        //     });
        // });
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">اللجان</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">إضافة لجنة</small>
    </h1>
@endsection


@section('content')

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="loading" id="loading">
                    <div class="spinner-border text-success load" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="create_form" onsubmit="event.preventDefault(); performStore();">
                        @csrf
                        <div class="row row-sm">


                            <label for="" class="mb-3">عنوان اللجنة</label>
                            <input class="form-control mb-2" name="title" required type="text"
                                placeholder="عنوان اللجنة">

                            <label for="" class="mb-3">الموقع الجغرافي</label>
                            <input class="form-control mb-2" name="address" required type="text"
                                placeholder="عنوان الموقع الجغرافي">


                            <div class="col-lg-6">
                                <label for="" class="mb-3">البريد الاكتروني</label>
                                <input class="form-control mb-2" name="email" style="direction: inherit;" required
                                    type="email" placeholder="البريد الاكتروني">
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">
                                    <label for="" class="mb-3">رقم الجوال</label>
                                    <input class="form-control mb-2" name="phone_number" required type="text"
                                        placeholder="رقم الجوال">
                                </div>
                            </div>

                            {{-- <label for="" class="mb-3">وصف اللجنة</label>
                            <textarea id="editor" name="description" class="tox-target" placeholder="وصف اللجنة"></textarea> --}}
                        </div>



                        <p class="text-danger mt-3">* صيغة المرفق jpeg , jpg , png </p>

                        <h5 class="card-title">المرفق</h5>
                        {{-- <br> --}}
                        <!--begin::Form-->
                        {{-- <form class="form" action="#" method="post"> --}}
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="kt_dropzonejs_example_1">
                                <!--begin::Message-->
                                <div class="dz-message needsclick">
                                    <!--begin::Icon-->
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                    <!--end::Icon-->

                                    <!--begin::Info-->
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">قم بإسقاط الملفات هنا أو انقر للتحميل.
                                        </h3>
                                        <span class="fs-7 fw-bold text-gray-400">تحميل ما يصل إلى 1 ملفات</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!--end::Input group-->
                        {{-- </form> --}}
                        <!--end::Form-->

                        <br>

                        <input id="pac-input" class="controls" type="text" placeholder="أبحث هنا" />
                        <div id="map1" style="width: 100%; height: 450px"></div>
                        <div id="info"></div>
                        <br>

                        <div class="row row-sm">
                            <div class="col-lg-6">
                                {{-- <label for="" class="mb-3">الطول</label> --}}
                                <input class="form-control mb-2" id="longitude" disabled
                                    value="{{ $currentUserInfo->longitude }}" name="longitude" required type="hidden"
                                    placeholder="Longitude">
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">
                                    {{-- <label for="" class="mb-3">العرض</label> --}}
                                    <input class="form-control mb-2" id="latitude" disabled
                                        value="{{ $currentUserInfo->latitude }}" name="latitude" required type="hidden"
                                        placeholder="Latitude">
                                </div>
                            </div>
                        </div>


                        <div class="row row-sm">
                            <div class="col-lg-6">
                                <label for="" class="mb-3">الأعضاء المسجلة مسبقا</label>


                                <select name="members" class="form-select form-select-sm form-select-solid"
                                    data-control="select2" data-placeholder="Select an option" data-allow-clear="true"
                                    multiple="multiple">

                                    <optgroup label="اعضاء مجلس الإدارة">
                                        @foreach ($members as $item)
                                            @if ($item->type == 'council')
                                                <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>

                                    <optgroup label="اعضاء في لجان اخرى">
                                        @foreach ($members as $item)
                                            @if ($item->type == 'external')
                                                <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>



                                </select>


                            </div>

                            <div class="col-lg-6">
                                <!--begin::Repeater-->
                                <div id="kt_docs_repeater_basic1">
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                        <div data-repeater-list="kt_docs_repeater_basic1" id="repeaterLinks">
                                            <div data-repeater-item>
                                                <div class="form-group row">
                                                    <div class="col-md-9">
                                                        <label class="form-label">اسم العضو الجديد :</label>
                                                        <input type="text" data-nameMember="nameMember"
                                                            style="direction: inherit;"
                                                            class="form-control mb-2 mb-md-0 link"
                                                            placeholder="ادخل اسم العضو الجديد" />
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" data-repeater-delete
                                                            class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                            <i class="ki-duotone ki-trash fs-5"><span
                                                                    class="path1"></span><span
                                                                    class="path2"></span><span
                                                                    class="path3"></span><span
                                                                    class="path4"></span><span class="path5"></span></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Form group-->

                                    <!--begin::Form group-->
                                    <div class="form-group mt-5">
                                        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                            <i class="ki-duotone ki-plus fs-3"></i>
                                            Add
                                        </a>
                                    </div>
                                    <!--end::Form group-->
                                </div>
                                <!--end::Repeater-->


                            </div>
                        </div>





                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <input type="submit" value="حفظ البيانات" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
