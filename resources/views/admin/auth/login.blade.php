<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>غرفة تجارة وصناعة محافظة غزة</title>
    <link rel="stylesheet" href="{{ asset('assets/login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/login/css/style.css') }}">

    {{-- Metronic --}}
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    @include('layouts.alert')
    <div class="bodyW">
        <div class="logoSide">

            <div class="logoC">
                <img class="logoImg" src="{{ asset('assets/login/images/logo.svg') }}" alt="">
                <h2>غرفة تجارة وصناعة محافظة غزة</h2>
                <p>GAZA CHAMBER OF COMMERCE & INDUSTRY</p>
            </div>


            <span class="developmentL"> تطوير شركة <a href="https://www.toopop.tech/" target="_blank"> TOOPOP TECH </a>
            </span>
        </div>
        <div class="formSide">

            <img class="logoM" src="{{ asset('assets/login/images/logoM.svg') }}" alt="">

            <div class="formL">

                <form class="w-100" action="{{ route('login.store') }}" method="POST">
                    @csrf

                    <div class="inputLable">
                        <label for="">البريد الإلكتروني</label>
                        <input class="inputForm" name="email" type="email" placeholder="ادخل بريدك الإلكتروني هنا"
                            value="qusay@example.com" required>
                    </div>
                    <div class="inputLable">
                        <label for="">كلمة المرور</label>
                        <div class="d-flex">
                            <input class="passwordInput inputForm" name="password" type="password" value="123123123"
                                placeholder="كلمة المرور" required />
                            <img class="imgeye eyeForm" src="{{ asset('assets/login/images/ionic-ios-eye.svg') }}"
                                alt="" />
                        </div>

                    </div>
                    <div class="checkAndPassword">
                        <div class="inputCheck">
                            <input class="form-check-input" type="checkbox" id="CheckD">
                            <label for="CheckD">
                                تذكرني
                            </label>
                        </div>
                        <a href="">نسيت كلمة المرور</a>
                    </div>
                    <button type="submit" class="btnSubmit">تسجيل دخول</button>
                </form>

            </div>
            <div class="homeBack">
                <img src="{{ asset('assets/login/images/arrow-alt-left.svg') }}" alt="">
                <a href="">العودة للموقع الإكتروني</a>
            </div>


        </div>

    </div>
    {{-- Metronic --}}
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>

    <script src="{{ asset('assets/login/js/jqueryLibrary.js') }}"></script>

    <script type="text/javascript">
        $(".eyeForm").click(function() {
            $(".passwordInput").attr(
                "type",
                $(".passwordInput").attr("type") === "password" ? "text" : "password"
            );
            if ($(".passwordInput").attr("type") == "password") {
                $(this).attr("src", "images/ionic-ios-eye.svg");
            } else {
                $(this).attr("src", "images/eyy.svg");
            }
        });
    </script>

</body>

</html>
