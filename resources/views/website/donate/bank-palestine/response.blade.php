<html>

<head>
    <title> Response</title>
</head>

<body>
    <!--
        Show the response from and the result of signature verification.
        Usually a merchant will need to manipulate this data and
        present it in a format appropriate for his system
    -->

    <table>
        <tr>
            <td>Merchant ID:</td>
            <td><?= $MerID ?></td>
        </tr>
        <tr>
            <td>Acquirer ID:</td>
            <td><?= $AcqID ?></td>
        </tr>
        <tr>
            <td>Order ID:</td>
            <td><?= $OrderID ?></td>
        </tr>
        <tr>
            <td>Response Code:</td>
            <td><?= $ResponseCode ?></td>
        </tr>
        <tr>
            <td>Reason Code:</td>
            <td><?= $ReasonCode ?></td>
        </tr>
        <tr>
            <td>Reason Code Description:</td>
            <td><?= $ReasonDescr ?></td>
        </tr>
        <tr>
            <td>Reference Number:</td>
            <td><?= $Ref ?></td>
        </tr>
        <tr>
            <td>Padded Card Number:</td>
            <td><?= $PaddedCardNo ?></td>
        </tr>
        <tr>
            <td>Signature:</td>
            <td><?= $Signature ?></td>
        </tr>
        <tr>
            <td>Signature Verified:</td>
            <td><?= $verifySignature ?></td>
        </tr>
        <!-- Show the authorization code only in case of successful transaction -->
        <?php
    if ($ResponseCode==1 && $ReasonCode==1){
    ?>
        <tr>
            <td>Authorization Code:</td>
            <td><?= $AuthNo ?></td>
        </tr>
        <?php
    }
    ?>
    </table>
</body>

</html>
