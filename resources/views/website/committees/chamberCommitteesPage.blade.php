@extends('layouts.website')

@section('title', 'اللجان')

@section('sub_title', 'لجان الغرفة')
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

@endpush



@section('content')

    <div class="pagesInnerBody container mt-5">
      <div class="flexSection">
        <div class="d-flex titleSec flex-column align-items-center text-center">
          <h2 class="titleFlexSec lineTitle fontBold">لجان الغرفة</h2>
          <p>
            تلعب اللجان المتخصصة دورًا حيويًا في تعزيز الفعالية والكفاءة في
            العمل، حيث تسهم في تحسين التخطيط والتنظيم واتخاذ القرارات
            الاستراتيجية. كما تعمل هذه اللجان على توسيع نطاق المعرفة والخبرات في
            المجالات المختصة، وتحقيق التوازن بين الاهتمامات المختلفة داخل الشركة
          </p>
        </div>
      </div>

      <div class="cardsChamberCommitteesS cardsChamberCommitteesPage mt-5">
        <div class="row justify-content-center">

            @foreach ($committees as $item)
            <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
                <a href="{{ route('commissionsPage', ['id'=>$item->id]) }}" class="cardChamberCommitteesS">
                  <img src="{{ asset("storage/files/committes/$item->image_url") }}" alt="" />
                  <h3 class="">{{ $item->title }}</h3>
                  <div class="arrowC">
                    <i class="bx bx-arrow-back"></i>
                  </div>
                </a>
            </div>
            @endforeach


          {{-- <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
            <a href="commissionsPage.html" class="cardChamberCommitteesS">
              <img src="images/imgcc2.png" alt="" />
              <h3 class="">لجنة الإعلام</h3>
              <div class="arrowC">
                <i class="bx bx-arrow-back"></i>
              </div>
            </a>
          </div>
          <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
            <a href="commissionsPage.html" class="cardChamberCommitteesS">
              <img src="images/imgcc3.png" alt="" />
              <h3 class="">العلاقات الخارجية</h3>
              <div class="arrowC">
                <i class="bx bx-arrow-back"></i>
              </div>
              <div class="arrowC">
                <i class="bx bx-arrow-back"></i>
              </div>
            </a>
          </div>
          <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
            <a href="commissionsPage.html" class="cardChamberCommitteesS">
              <img src="images/imgcc4.png" alt="" />
              <h3 class="">التطوير والتدريب</h3>
              <div class="arrowC">
                <i class="bx bx-arrow-back"></i>
              </div>
            </a>
          </div>
          <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
            <a href="commissionsPage.html" class="cardChamberCommitteesS">
              <img src="images/imgcc5.png" alt="" />
              <h3 class="">لجنة المعابر</h3>
              <div class="arrowC">
                <i class="bx bx-arrow-back"></i>
              </div>
            </a>
          </div>
          <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
            <a href="commissionsPage.html" class="cardChamberCommitteesS">
              <img src="images/imgcc6.png" alt="" />
              <h3 class="">رجال الأعمال</h3>
              <div class="arrowC">
                <i class="bx bx-arrow-back"></i></div
            ></a>
          </div>
          <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
            <a href="commissionsPage.html" class="cardChamberCommitteesS">
              <img src="images/imgcc7.png" alt="" />
              <h3 class="">العلاقات العامة</h3>
              <div class="arrowC">
                <i class="bx bx-arrow-back"></i>
              </div>
            </a>
          </div>
          <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
            <a href="commissionsPage.html" class="cardChamberCommitteesS">
              <img src="images/imgcc8.png" alt="" />
              <h3 class="">لجنة الرقمنة</h3>
              <div class="arrowC">
                <i class="bx bx-arrow-back"></i>
              </div>
            </a>
          </div>
          <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
            <a href="commissionsPage.html" class="cardChamberCommitteesS">
              <img src="images/imgcc9.png" alt="" />
              <h3 class="">لجنة المشتريات</h3>
              <div class="arrowC">
                <i class="bx bx-arrow-back"></i>
              </div>
            </a>
          </div>
          <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
            <a
              href="commissionsPage.html"
              class="cardChamberCommitteesS cardChamberCommitteesSPage"
            >
              <img src="images/imgcc10.png" alt="" />
              <h3 class="">اللجنة الاجتماعية</h3>
              <div class="arrowC">
                <i class="bx bx-arrow-back"></i>
              </div>
            </a>
          </div> --}}

        </div>
      </div>
    </div>

    @endsection
