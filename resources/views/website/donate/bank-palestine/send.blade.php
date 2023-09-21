<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form class="mt-5" name="paymentForm" id="paymentForm" action="https://e-commerce-uat.bop.ps/EcomPayment/RedirectAuthLink" method="POST">
        @csrf

        <input type="hidden" name="Version" value="<?= $version?>"><br>
        <input type="hidden" name="MerID" value="<?= $merchantID?>"><br>
        <input type="hidden" name="AcqID" value="<?= $acquirerID?>"><br>
        <input type="hidden" name="MerRespURL" value="<?= $responseURL?>">


        <input type="hidden" name="PurchaseAmt" value="<?=$formattedPurchaseAmt ?>"><br>
        <input type="hidden" name="PurchaseCurrency" value="<?=$currency?>"><br>
        <input type="hidden" name="PurchaseCurrencyExponent" value="<?=$currencyExp?>"><br>

        <input type="hidden" name="OrderID" value="<?= $orderID?>"><br>
        <input type="hidden" name="CaptureFlag" value="<?= $captureFlag?>"><br>
        <input type="hidden" name="Signature" value="<?= $base64Sha1Signature?>"><br>
        <input type="hidden" name="SignatureMethod" value="<?= $signatureMethod?>"><br>


    </form>

        {{-- Automatic submission of request form to upon load using JavaScript --}}
    <script language="JavaScript">
        document.forms["paymentForm"].submit();
    </script>
</body>
</html>
