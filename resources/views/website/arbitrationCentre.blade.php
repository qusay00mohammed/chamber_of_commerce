@extends('layouts.website')

@section('title', 'test')

@section('sub_title', 'test')
@section('meta')



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
            مركز التحكيم وحل النزاعات التجارية
          </h2>
        </div>

        <div class="bodyMedia container mt-5">
          <div class="d-flex flexG align-items-start">
            <div
              class="nav flex-column nav-pills "
              id="v-pills-tab"
              role="tablist"
              aria-orientation="vertical"
            >
              <button
                class="nav-link active"
                id="v-pills-home-tab"
                data-bs-toggle="pill"
                data-bs-target="#v-pills-home"
                type="button"
                role="tab"
                aria-controls="v-pills-home"
                aria-selected="true"
              >
                نبذة عن مركز تسوية المنازعات التجارية
              </button>
              <button
                class="nav-link"
                id="v-pills-profile-tab"
                data-bs-toggle="pill"
                data-bs-target="#v-pills-profile"
                type="button"
                role="tab"
                aria-controls="v-pills-profile"
                aria-selected="false"
              >
                شروط الحصول على الخدمة
              </button>
              <button
                class="nav-link"
                id="v-pills-messages-tab"
                data-bs-toggle="pill"
                data-bs-target="#v-pills-messages"
                type="button"
                role="tab"
                aria-controls="v-pills-messages"
                aria-selected="false"
              >
                الوثائق المطلوبة للحصول على الخدمة
              </button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
              <div
                class="tab-pane fade show active"
                id="v-pills-home"
                role="tabpanel"
                aria-labelledby="v-pills-home-tab"
                tabindex="0"
              >
                <div class="bodyText">
                  <p class="fontBold">نبذة عن مركز تسوية المنازعات التجارية</p>
                  <hr />
                  <p>
                    أن "مركز تسوية المنازعات التجارية"، هو مركزاً للتسوية
                    والتوفيق في المنازعات التجارية التي تنشأ بين أعضاء الغرفة أو
                    بين أعضائها والغير أو بين من يتفق على إحالة منازعاتهما إليه
                    للفصل فيها،
                  </p>
                  <br />
                  <p class="fontBold colG">يتكون المركز من:</p>
                  <hr />

                  <p class="fontBold">- مجلس الأمناء:</p>
                  <p>
                    يتكون مجلس الأمناء من خمسة أعضاء يصدر بتسميتهم قرار من مجلس
                    إدارة الغرفة ويُسمي القرار رئيساً للمجلس، على أن يراعى في
                    تعيين أعضاء مجلس الأمناء أن يكونوا من ذوي الإختصاص والخبرة
                    ومن المشهود لهم بالإستقلالية والحياد، وتكون مدة عضوية مجلس
                    الأمناء ثلاث سنوات قابلة للتجديد بقرار من رئيس الغرفة
                  </p>
                  <br />
                  <p class="fontBold">
                    - هيئة الإشراف على تسوية المنازعات التجارية:
                  </p>
                  <p>
                    تشكل هيئة الإشراف على تسوية المنازعات التجارية من ثلاثة
                    أعضاء من مجلس أمناء المركز يصدر بتسميتهم قرار من مجلس إدارة
                    الغرفة ويُسمي القرار رئيساً للهيئة، وتكون مدة عضوية أعضاء
                    هذه الهيئة ثلاث سنوات قابلة للتجديد بقرار من رئيس الغرفة
                  </p>
                  <br />
                  <p class="fontBold">
                    - هيئة الإشراف على تسوية المنازعات التجارية:
                  </p>
                  <p>
                    تشكل هيئة الإشراف على تسوية المنازعات التجارية من ثلاثة
                    أعضاء من مجلس أمناء المركز يصدر بتسميتهم قرار من مجلس إدارة
                    الغرفة ويُسمي القرار رئيساً للهيئة، وتكون مدة عضوية أعضاء
                    هذه الهيئة ثلاث سنوات قابلة للتجديد بقرار من رئيس الغرفة
                  </p>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="v-pills-profile"
                role="tabpanel"
                aria-labelledby="v-pills-profile-tab"
                tabindex="0"
              >
                <div class="bodyText">
                  <p class="fontBold">نبذة عن مركز تسوية المنازعات التجارية</p>
                  <hr />
                  <p>
                    أن "مركز تسوية المنازعات التجارية"، هو مركزاً للتسوية
                    والتوفيق في المنازعات التجارية التي تنشأ بين أعضاء الغرفة أو
                    بين أعضائها والغير أو بين من يتفق على إحالة منازعاتهما إليه
                    للفصل فيها،
                  </p>
                  <br />
                  <p class="fontBold colG">يتكون المركز من:</p>
                  <hr />

                  <p class="fontBold">- مجلس الأمناء:</p>
                  <p>
                    يتكون مجلس الأمناء من خمسة أعضاء يصدر بتسميتهم قرار من مجلس
                    إدارة الغرفة ويُسمي القرار رئيساً للمجلس، على أن يراعى في
                    تعيين أعضاء مجلس الأمناء أن يكونوا من ذوي الإختصاص والخبرة
                    ومن المشهود لهم بالإستقلالية والحياد، وتكون مدة عضوية مجلس
                    الأمناء ثلاث سنوات قابلة للتجديد بقرار من رئيس الغرفة
                  </p>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="v-pills-messages"
                role="tabpanel"
                aria-labelledby="v-pills-messages-tab"
                tabindex="0"
              >
              <div class="bodyText">
                <p class="fontBold">نبذة عن مركز تسوية المنازعات التجارية</p>
                <hr />
                <p>
                  أن "مركز تسوية المنازعات التجارية"، هو مركزاً للتسوية
                  والتوفيق في المنازعات التجارية التي تنشأ بين أعضاء الغرفة أو
                  بين أعضائها والغير أو بين من يتفق على إحالة منازعاتهما إليه
                  للفصل فيها،
                </p>
                <br />
                <p class="fontBold colG">يتكون المركز من:</p>
                <hr />

                <p class="fontBold">- مجلس الأمناء:</p>
                <p>
                  يتكون مجلس الأمناء من خمسة أعضاء يصدر بتسميتهم قرار من مجلس
                  إدارة الغرفة ويُسمي القرار رئيساً للمجلس، على أن يراعى في
                  تعيين أعضاء مجلس الأمناء أن يكونوا من ذوي الإختصاص والخبرة
                  ومن المشهود لهم بالإستقلالية والحياد، وتكون مدة عضوية مجلس
                  الأمناء ثلاث سنوات قابلة للتجديد بقرار من رئيس الغرفة
                </p>
                <br>
                <p class="fontBold">- مجلس الأمناء:</p>
                <p>
                  يتكون مجلس الأمناء من خمسة أعضاء يصدر بتسميتهم قرار من مجلس
                  إدارة الغرفة ويُسمي القرار رئيساً للمجلس، على أن يراعى في
                  تعيين أعضاء مجلس الأمناء أن يكونوا من ذوي الإختصاص والخبرة
                  ومن المشهود لهم بالإستقلالية والحياد، وتكون مدة عضوية مجلس
                  الأمناء ثلاث سنوات قابلة للتجديد بقرار من رئيس الغرفة
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
