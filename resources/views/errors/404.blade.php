<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/website/image/favicon.ico') }}">
    <title>غرفة تجارة وصناعة محافظة غزة</title>
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}" />
</head>
<body>

    <div class="bodyPageO">
        <div class="flexPage container">
            <div class="rightSideP ">
                <div>
                    <div class="logoP">
                        <img src="{{ asset('assets/website/images/logo.png') }}" alt="">
                    </div>
                    <h1>عفواً هذه الصفحة غير متوفرة</h1>
                    <div class="btnsE">
                        <a href="{{ url()->previous() }}" class="btnE">العودة للخلف</a>
                        <a href="{{ route('website.home') }}" class="btnE btnH">الصفحة الرئيسية</a>
                    </div>
                </div>

            </div>
            <div class="lineFlexPage"></div>
            <div class="leftSideP ">
                <img class="imgerror" src="{{ asset('assets/website/images/error404Img.png') }}" alt="">
            </div>
        </div>
    </div>


</body>
</html>
