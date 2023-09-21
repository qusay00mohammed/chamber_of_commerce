@extends('layouts.admin')

@section('title', 'السجلات')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1, h3 {
        text-align: center;
        margin-bottom: 20px;
    }

    h3 {
        color: teal
    }

    .news-list {
        list-style: none;
        padding: 0;
    }

    .news-item {
        margin-bottom: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
    }

    .news-item h2 {
        margin-top: 0;
    }

    .news-item .actions {
        text-align: center;
    }

    /* .btn {
        display: inline-block;
        padding: 8px 16px;
        margin: 5px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    } */

    /* .btn:hover {
        background-color: #0056b3;
    }

    .btn.delete {
        background-color: #dc3545;
    }

    .btn.delete:hover {
        background-color: #bd2130;
    } */
</style>
@endpush

@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox]', {
        //
    });
</script>
@endpush


@section('toolbar')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الغرفة التجارية
    <!--begin::Separator-->
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
    <!--end::Separator-->
    <!--begin::Description-->
    <small class="text-muted fs-7 fw-bold my-1 ms-1">السجلات</small>
    <!--end::Description-->
</h1>
@endsection


@section('content')

    {{-- <h1>جميع العمليات</h1> --}}
    <h3>{{ $media->title }}</h3>
    <ul class="news-list">

        @forelse ($logs as $item)

            <li class="news-item" style="position: relative">

                <div class="ribbon ribbon-end" style="position: absolute; left: 5px; top: 20px">
                    <div>
                        @if ($item->event == 'created')
                            <div class="ribbon-label bg-success">إضافة</div>
                        @elseif ($item->event == 'updated')
                            <div class="ribbon-label bg-primary">تعديل</div>
                        @elseif ($item->event == 'deleted')
                            <div class="ribbon-label bg-danger">حذف</div>
                        @elseif ($item->event == 'restored')
                            <div class="ribbon-label bg-infp">استرجاع</div>
                        @endif
                    </div>
                </div>

                <div class="row row-sm">
                    <?php $user = App\Models\User::findOrFail($item->causer_id) ?? '' ?>
                    <div class="col-lg-6">
                        <div style="{{ $item->causer_id ?? 'display: none'  }}">
                            <p><span style="  margin-left: 15px; font-size: 17px">اسم المستخدم: </span><span style="">{{ $user->name ?? ''}}</span></p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div style="{{ $item->causer_id ?? 'display: none'  }}">
                            <p><span style="  margin-left: 15px; font-size: 17px">البريد الالكتروني: </span><span style="">{{ $user->email ?? ''}}</span></p>
                        </div>
                    </div>

                </div>

                <div class="row row-sm">

                    <div class="col-lg-6">
                        <div style="{{ $date = json_decode($item->properties)->attributes->updated_at ?? 'display: none'  }}">
                            <p><span style="  margin-left: 15px; font-size: 17px">تاريخ  الحركة : </span><span style="">{{ date('d-m-Y H:i:s', strtotime($date)) ?? ''}}</span></p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div style="{{ json_decode($item->properties)->attributes->publication_at ?? 'display: none'  }}">
                            <p><span style="  margin-left: 15px; font-size: 17px">تاريخ النشر : </span><span style="">{{ json_decode($item->properties)->attributes->publication_at ?? ''}}</span></p>
                        </div>
                    </div>

                </div>










                <div style="{{ json_decode($item->properties)->attributes->title ?? 'display: none'  }}">
                    <p><span style="  margin-left: 15px; font-size: 17px">العنوان: </span><span style="">{{ json_decode($item->properties)->attributes->title ?? ''}}</span></p>
                </div>

                <div style="{{ json_decode($item->properties)->old->deleted_at ?? 'display: none'  }}">
                    <p><span style="  margin-left: 15px; font-size: 17px">تاريخ الارشفة: </span><span style="">{{ date('d-m-Y', strtotime(json_decode($item->properties)->old->deleted_at ?? '')) }}  </span></p>
                </div>

                <div style="{{ $filename = json_decode($item->properties)->attributes->basicFile ?? 'display: none'  }}">
                    <p>
                        <span style="  margin-left: 15px; font-size: 17px">الصورة: </span>
                        @if ($media->type == 'news')
                            <span style="">
                                <a href="{{ asset("storage/files/news/$filename") }}" data-fancybox >
                                    <i class="fa-solid fa-image" style="color: #e4e6ef; font-size: 25px; "></i>
                                </a>
                            </span>
                        @elseif ($media->type == 'activity')
                        <span style="">
                            <a href="{{ asset("storage/files/activities/$filename") }}" data-fancybox >
                                <i class="fa-solid fa-image" style="color: #e4e6ef; font-size: 25px; "></i>
                            </a>
                        </span>
                        @elseif ($media->type == 'erez')
                        <span style="">
                            <a href="{{ asset("storage/$filename") }}" data-fancybox >
                                <i class="fa-solid fa-image" style="color: #e4e6ef; font-size: 25px; "></i>
                            </a>
                        </span>

                        @elseif ($media->type == 'rafah')
                        <span style="">
                            <a href="{{ asset("storage/$filename") }}" data-fancybox >
                                <i class="fa-solid fa-image" style="color: #e4e6ef; font-size: 25px; "></i>
                            </a>
                        </span>

                        @elseif ($media->type == 'image')
                        <span style="">
                            <a href="{{ asset("storage/files/images/$filename") }}" data-fancybox >
                                <i class="fa-solid fa-image" style="color: #e4e6ef; font-size: 25px; "></i>
                            </a>
                        </span>

                        @elseif ($media->type == 'keremShalom')
                        <span style="">
                            <a href="{{ asset("storage/$filename") }}" data-fancybox >
                                <i class="fa-solid fa-image" style="color: #e4e6ef; font-size: 25px; "></i>
                            </a>
                        </span>
                        @endif
                    </p>
                </div>

                <div style="{{ json_decode($item->properties)->attributes->status ?? 'display: none'  }}">
                    <p><span style="  margin-left: 15px; font-size: 17px">حالة النشر: </span><span style="">{{ json_decode($item->properties)->attributes->status ?? ''}}</span></p>
                </div>

                <div style="{{ json_decode($item->properties)->attributes->showInSlider ?? 'display: none'  }}">
                    <p><span style="  margin-left: 15px; font-size: 17px">حالة العرض داخل السلايدر : </span><span style="">{{ json_decode($item->properties)->attributes->showInSlider ?? ''}}</span></p>
                </div>

                <div style="{{ json_decode($item->properties)->attributes->short_description ?? 'display: none'  }}">
                    <p><span style="  margin-left: 15px; font-size: 17px">الوصف المختضر: </span><span style="">{{ json_decode($item->properties)->attributes->short_description ?? ''}}</span></p>
                </div>

                <div style="{{ json_decode($item->properties)->attributes->description ?? 'display: none'  }}">
                    <p><span style="  margin-left: 15px; font-size: 17px">الوصف: </span><span style="">{!!  json_decode($item->properties)->attributes->description ?? '' !!}</span></p>
                </div>

            </li>

        @empty
            <p>لا يوجد اي عمليات</p>
        @endforelse

    </ul>

@endsection
