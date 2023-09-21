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


    <div class="pagesInnerBody container mt-5">
      <div class="flexSection">
        <div class="d-flex titleSec flex-column align-items-center text-center">
          <h2 class="titleFlexSec lineTitle fontBold">تفاصيل الشركة</h2>
        </div>
      </div>

      <div class="commissionsB">
        <ul class="nav nav-pills gap-4" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="pills-aboutCompany-tab"
              data-bs-toggle="pill"
              data-bs-target="#pills-aboutCompany"
              type="button"
              role="tab"
              aria-controls="pills-aboutCompany"
              aria-selected="true"
            >
              عن الشركة
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="pills-services-tab"
              data-bs-toggle="pill"
              data-bs-target="#pills-services"
              type="button"
              role="tab"
              aria-controls="pills-services"
              aria-selected="false"
            >
              الخدمات
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="pills-products-tab"
              data-bs-toggle="pill"
              data-bs-target="#pills-products"
              type="button"
              role="tab"
              aria-controls="pills-products"
              aria-selected="false"
            >
              المنتجات
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="pills-ustomers-tab"
              data-bs-toggle="pill"
              data-bs-target="#pills-ustomers"
              type="button"
              role="tab"
              aria-controls="pills-ustomers"
              aria-selected="false"
            >
              الزبائن
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="pills-contact-tab"
              data-bs-toggle="pill"
              data-bs-target="#pills-contact"
              type="button"
              role="tab"
              aria-controls="pills-contact"
              aria-selected="false"
            >
              تواصل معنا
            </button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="pills-aboutCompany"
            role="tabpanel"
            aria-labelledby="pills-aboutCompany-tab"
            tabindex="0"
          >
            <div class="mt-5">
              <div class="contactsA">
                <div class="flexC">
                  <div class="imgC">
                    <img src="images/companyImage.png" alt="" />
                  </div>
                  <div class="bodyC">
                    <h6 class="fontBold">شركه TOO POP TECH</h6>
                    <hr />
                    <div class="bodyCText">
                      <p class="fontBold">
                        شركة فلسطينية رائدة في مجال الأمن السيبراني و الذكاء
                        الاصطناعي
                      </p>
                      <div class="">
                        <div class="flexOC mt-4">
                          <span
                            ><span class="fontBold ps-1">رقم المشتغل:</span
                            >562762138</span
                          >
                          <span
                            ><span class="fontBold ps-1">القطاع:</span>تكنولوجيا
                            المعلومات</span
                          >
                          <span
                            ><span class="fontBold ps-1">المهنة:</span>تكنولوجيا
                            المعلومات</span
                          >
                          <span
                            ><span class="fontBold ps-1">سنة التأسيس:</span
                            >2022</span
                          >
                          <span
                            ><span class="fontBold ps-1">المنطقة:</span
                            >غزة</span
                          >
                        </div>
                      </div>
                      <div class="tapsC">
                        <span>المالية والدفع الإلكتروني</span>
                        <span>الترفيه والإعلام</span>
                        <span> البرمجيات</span>
                        <span>الماكتروني</span>
                        <span>العمل عن بعد</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade accordion accordionCommissions"
            id="pills-services"
            role="tabpanel"
            aria-labelledby="pills-services-tab"
            tabindex="0"
          >
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="cardservices">
                  <div class="imgcardservices">
                    <img src="images/web-development.svg" alt="" />
                  </div>
                  <h5>تطوير شبكة الويب</h5>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="cardservices">
                  <div class="imgcardservices">
                    <img src="images/content.svg" alt="" />
                  </div>
                  <h5 class="">إدارة صفحات التواصل الإجتماعي</h5>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="cardservices">
                  <div class="imgcardservices">
                    <img src="images/app-development.svg" alt="" />
                  </div>
                  <h5>تطوير تطبيقات الهاتف المحمول</h5>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="cardservices">
                  <div class="imgcardservices">
                    <img src="images/web-development2.svg" alt="" />
                  </div>
                  <h5>تصميم المواقع الإلكترونية</h5>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="cardservices">
                  <div class="imgcardservices">
                    <img src="images/shield.svg" alt="" />
                  </div>
                  <h5>أمن سيبراني</h5>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="cardservices">
                  <div class="imgcardservices">
                    <img src="images/business.svg" alt="" />
                  </div>
                  <h5>الاستشارات و التدريب</h5>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-products"
            role="tabpanel"
            aria-labelledby="pills-products-tab"
            tabindex="0"
          >
            <div class="row cardsProducts">
              <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="cardP">
                  <div class="cardProductsImage">
                    <img class="" src="images/Image4.svg" alt="" />
                  </div>
                  <a href="productDetails.html" class="titleP fontBold mb-3"
                    >نظام مخصص لإدارة العملاء</a
                  >
                  <span class="tapP">نظم إدارية وحاسوبية</span>
                  <div class="locationP">
                    <img src="images/locationG.svg" alt="" />
                    <p>مدينة غزة - الجلاء</p>
                  </div>
                  <p>السعر: $250</p>
                  <a href="productDetails.html" class="btnS">تعرف على المزيد</a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="cardP">
                  <div class="cardProductsImage">
                    <img class="" src="images/imagep2.svg" alt="" />
                  </div>
                  <a href="productDetails.html" class="titleP fontBold mb-3"
                    >التصميم الجرافيكي</a
                  >
                  <span class="tapP">التصميم الجرافيكي</span>
                  <div class="locationP">
                    <img src="images/locationG.svg" alt="" />
                    <p>مدينة غزة - الجلاء</p>
                  </div>
                  <p>السعر: $250</p>
                  <a href="productDetails.html" class="btnS">تعرف على المزيد</a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="cardP">
                  <div class="cardProductsImage">
                    <img class="" src="images/Ellipse7.svg" alt="" />
                  </div>
                  <a href="productDetails.html" class="titleP fontBold mb-3"
                    >LogesTechs</a
                  >
                  <span class="tapP">نظم إدارية وحاسوبية</span>
                  <div class="locationP">
                    <img src="images/locationG.svg" alt="" />
                    <p>مدينة غزة - الجلاء</p>
                  </div>
                  <p>السعر: $250</p>
                  <a href="productDetails.html" class="btnS">تعرف على المزيد</a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="cardP">
                  <div class="cardProductsImage">
                    <img class="" src="images/imagep4.svg" alt="" />
                  </div>
                  <a href="productDetails.html" class="titleP fontBold mb-3"
                    >Outbound Services</a
                  >
                  <span class="tapP">التسويق عبر الهاتف</span>
                  <div class="locationP">
                    <img src="images/locationG.svg" alt="" />
                    <p>مدينة غزة - الجلاء</p>
                  </div>
                  <p>السعر: $250</p>
                  <a href="productDetails.html" class="btnS">تعرف على المزيد</a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="cardP">
                  <div class="cardProductsImage">
                    <img class="" src="images/imagep4.svg" alt="" />
                  </div>
                  <a href="productDetails.html" class="titleP fontBold mb-3"
                    >Outbound Services</a
                  >
                  <span class="tapP">التسويق عبر الهاتف</span>
                  <div class="locationP">
                    <img src="images/locationG.svg" alt="" />
                    <p>مدينة غزة - الجلاء</p>
                  </div>
                  <p>السعر: $250</p>
                  <a href="productDetails.html" class="btnS">تعرف على المزيد</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-ustomers"
            role="tabpanel"
            aria-labelledby="pills-ustomers-tab"
            tabindex="0"
          >
            <div class="row">
              <div class="col-md-6 col-xl-4">
                <div class="cardUstomers">
                  <img src="images/Ellipse17.png" alt="" />
                  <h6 class="fontBold">شركه البراري للتجارة والمقاولات</h6>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="cardUstomers">
                  <img src="images/Ellipse17.png" alt="" />
                  <h6 class="fontBold">شركه البراري للتجارة والمقاولات</h6>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="cardUstomers">
                  <img src="images/Ellipse17.png" alt="" />
                  <h6 class="fontBold">شركه البراري للتجارة والمقاولات</h6>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="cardUstomers">
                  <img src="images/Ellipse17.png" alt="" />
                  <h6 class="fontBold">شركه البراري للتجارة والمقاولات</h6>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="cardUstomers">
                  <img src="images/Ellipse17.png" alt="" />
                  <h6 class="fontBold">شركه البراري للتجارة والمقاولات</h6>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="cardUstomers">
                  <img src="images/Ellipse17.png" alt="" />
                  <h6 class="fontBold">شركه البراري للتجارة والمقاولات</h6>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="cardUstomers">
                  <img src="images/Ellipse17.png" alt="" />
                  <h6 class="fontBold">شركه البراري للتجارة والمقاولات</h6>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="cardUstomers">
                  <img src="images/Ellipse17.png" alt="" />
                  <h6 class="fontBold">شركه البراري للتجارة والمقاولات</h6>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="pills-contact"
            role="tabpanel"
            aria-labelledby="pills-contact-tab"
            tabindex="0"
          >
            <div class="contactsA">
              <div class="flexC">
                <div class="imgC">
                  <img src="images/companyImage.png" alt="" />
                </div>
                <div class="bodyC">
                  <h6 class="fontBold">شركه TOO POP TECH</h6>
                  <hr />
                  <div class="rowContactsA">
                    <img src="images/locationG.svg" alt="" />
                    <span
                      >غزة - عمارة الجاردينز - الطابق 6 - مقابل منتزه بلدية
                      غزة</span
                    >
                  </div>
                  <div class="rowContactsA">
                    <img src="images/callG.svg" alt="" />
                    <span>08 289 8899</span>
                  </div>
                  <div class="rowContactsA">
                    <img src="images/smsG.svg" alt="" />
                    <span>toopop.tech</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="commissionsLocation">
              <h2 class="titleFlexSec lineTitle fontBold">الموقع الجغرافي</h2>
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.43693000794!2d34.4559101236331!3d31.51215744754646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f0d569ea745%3A0x2898309bb3a687e1!2z2K3Yr9mK2YLZhyAuINmF2YbYqtiy2Ycg2KfZhNio2YTYr9mK2Ycg2LrYstmH!5e0!3m2!1sar!2s!4v1689240568979!5m2!1sar!2s"
                width="600"
                height="450"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
