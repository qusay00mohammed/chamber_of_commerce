@extends('layouts.admin')

@section('title', 'الصفحة الرئيسية')

@push('css')
    <style>
        #chartdiv3 {
            width: 100%;
            height: 500px;
        }
    </style>

@endpush

@push('javascript')
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>


    <script>
        am5.ready(function() {

            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv3");


            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);


            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX",
                layout: root.verticalLayout
            }));


            // Data
            var colors = chart.get("colors");

            var data = [

                @foreach ($visits as $visit)
                    {
                        country: "{{ $visit->country }}",
                        visits: {{ $visit->visits_count }},
                        // icon: "https://www.amcharts.com/wp-content/uploads/flags/south-korea.svg",
                        columnSettings: {
                            fill: colors.next()
                        }
                    },
                @endforeach

            ];


            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            })

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                categoryField: "country",
                renderer: xRenderer,
                bullet: function(root, axis, dataItem) {
                    return am5xy.AxisBullet.new(root, {
                        location: 0.5,
                        sprite: am5.Picture.new(root, {
                            width: 24,
                            height: 24,
                            centerY: am5.p50,
                            centerX: am5.p50,
                            src: dataItem.dataContext.icon
                        })
                    });
                }
            }));

            xRenderer.grid.template.setAll({
                location: 1
            })

            xRenderer.labels.template.setAll({
                paddingTop: 20
            });

            xAxis.data.setAll(data);

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                renderer: am5xy.AxisRendererY.new(root, {
                    strokeOpacity: 0.1
                })
            }));


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "visits",
                categoryXField: "country"
            }));

            series.columns.template.setAll({
                tooltipText: "{categoryX}: {valueY}",
                tooltipY: 0,
                strokeOpacity: 0,
                templateField: "columnSettings"
            });

            series.data.setAll(data);


            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();
            chart.appear(1000, 100);

        }); // end am5.ready()
    </script>
@endpush


@section('toolbar')

    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">احصائيات النظام</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')
@include('layouts.alert')
    <div class="row g-5 g-xl-8">

        <div class="col-xl-3">
            <a href="{{ route('news.index') }}" class="card hoverable card-xl-stretch mb-xl-8" style="background-color: #d1f1e4; border-radius: 10px">
                <div class="card-body" style=" text-align: center">
                    <i class="fas fa-bullhorn" style="color: #5fc5a3 !important; font-size: 4rem"></i>
                    {{-- <img src="{{ asset('assets/images/news.png') }}" width="80px" height="80px" alt=""> --}}
                    <div class=" fw-bolder fs-2 mb-2 mt-5" style="color: #004b50; font-size: 2rem !important;">{{ $news_count }}</div>
                    <div class="fw-bold" style="color: #4c8786; font-size: 0.875rem;">عدد الاخبار</div>
                </div>
            </a>
        </div>

        <div class="col-xl-3">
            <a href="{{ route('support-us.index') }}" class="card hoverable card-xl-stretch mb-xl-8" style="background-color: #d4f6fa; border-radius: 10px">
                <div class="card-body" style=" text-align: center">
                    <i class="fa-solid fa-hand-holding-dollar" style="color: #50c3db !important; font-size: 4rem"></i>
                    <div class=" fw-bolder fs-2 mb-2 mt-5" style="color: #003768; font-size: 2rem !important;">{{ $donates->count() }}</div>
                    <div class="fw-bold" style="color: #4c7b9c; font-size: 0.875rem;">عدد التبرعات الناجحة</div>
                    <span class="op-7" style="color: #4c7b9c; font-size: 0.875rem;">{{ $donates->sum('amount') }} $</span>
                </div>
            </a>
        </div>

        <div class="col-xl-3">
            <a href="{{ route('services.index') }}" class="card hoverable card-xl-stretch mb-xl-8" style="background-color: #fff1d2; border-radius: 10px">
                <div class="card-body" style=" text-align: center">
                    <i class="fas fa-server" style="color: #fdd27c !important; font-size: 4rem"></i>
                    <div class=" fw-bolder fs-2 mb-2 mt-5" style="color: #7a4100; font-size: 2rem !important;">{{ $services_count }}</div>
                    <div class="fw-bold" style="color: #aa814c; font-size: 0.875rem;">الخدمات الالكترونية</div>
                </div>
            </a>
        </div>

        <div class="col-xl-3">
            <a href="{{ route('contact-us.index') }}" class="card hoverable card-xl-stretch mb-xl-8" style="background-color: #ffe4dc; border-radius: 10px">
                <div class="card-body" style=" text-align: center">
                    <i class="fas fa-envelope-open-text" style="color: #fcb2a0 !important; font-size: 4rem"></i>
                    <div class=" fw-bolder fs-2 mb-2 mt-5" style="color: #7a0916; font-size: 2rem !important;">{{ $messages_count }}</div>
                    <div class="fw-bold" style="color: #aa595e; font-size: 0.875rem;">الرسائل والاستفسارات</div>
                </div>
            </a>
        </div>

    </div>



    <div id="chartdiv3" dir="ltr"></div>

@endsection
