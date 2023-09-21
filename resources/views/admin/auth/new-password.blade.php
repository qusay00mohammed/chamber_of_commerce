<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>غرفة تجارة وصناعة محافظة غزة</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="bodyW">
        <div class="logoSide">

            <div class="logoC">
                <img class="logoImg" src="images/logo.svg" alt="">
                <h2>غرفة تجارة وصناعة محافظة غزة</h2>
                <p>GAZA CHAMBER OF COMMERCE & INDUSTRY</p>
            </div>


            <span class="developmentL"> تطوير شركة <a href="https://www.toopop.tech/" target="_blank"> TOOPOP TECH </a>   </span>
        </div>
        <div class="formSide">

            <img class="logoM" src="images/logoM.svg" alt="">

            <div class="formL mb-auto">

                <form class="w-100"  action="">

                    <h3 class="text-center mb-5">استعادة كلمة المرور</h3>

                    <div class="inputLable">
                        <label for="">كلمة المرور الجديدة</label>
                        <div class="d-flex">
                            <input
                              class="passwordInput inputForm"
                              type="password"
                              placeholder="كلمة المرور الجديدة"
                            />
                            <img  class="imgeye eyeForm" src="images/ionic-ios-eye.svg" alt="" />
                        </div>

                    </div>

                    <div class="inputLable">
                        <label for="">تأكيد كلمة المرور الجديدة</label>
                        <div class="d-flex">
                            <input
                              class="passwordInput passwordInput2 inputForm"
                              type="password"
                              placeholder="تأكيد كلمة المرور الجديدة"
                            />
                            <img  class="imgeye eyeForm2" src="images/ionic-ios-eye.svg" alt="" />
                        </div>

                    </div>


                    <button type="submit" class="btnSubmit">ارسال </button>
                </form>

            </div>


        </div>

    </div>

    <script src="js/jqueryLibrary.js"></script>

    <script type="text/javascript">
    $(".eyeForm").click(function () {
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
    <script type="text/javascript">
    $(".eyeForm2").click(function () {
        $(".passwordInput2").attr(
          "type",
          $(".passwordInput2").attr("type") === "password" ? "text" : "password"
        );
        if ($(".passwordInput2").attr("type") == "password") {
          $(this).attr("src", "images/ionic-ios-eye.svg");
        } else {
          $(this).attr("src", "images/eyy.svg");
        }
      });
    </script>

</body>
</html>
