<?php
require_once "atmconfig.php";
if(isset($_POST['save'])){
header ("location:enquiry.php");
}
?>

<?php
require_once "atmconfig.php";
if(isset($_POST['sve'])){
header ("location:withdraw.php");
}
?>

<?php
require_once "atmconfig.php";
if(isset($_POST['sves'])){
header ("location:deposit.php");
}
?>

<?php
require_once "atmconfig.php";
if(isset($_POST['saves'])){
header ("location:pin.php");
}
?>

<?php
require_once "atmconfig.php";
if(isset($_POST['savi'])){
header ("location:ministatement.php");
}
?>

<?php
require_once "atmconfig.php";
if(isset($_POST['savesi'])){
header ("location:transactions.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form method="POST" class="form-check">
        <p class="display-5" style="top: 4px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #024ea1ba;color: white;text-align: center;" class="display-5" >MAY I HELP YOU</p>

        <p class="display-5" style="top: 4px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #80808080;color: black;text-align: center;top: 85px;" class="display-5" >Select Your Service:</p>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 237px;left: 372px;" name="save" id="save" value=""><B style="font-size: 22px;">Balance Enquiry</B><i class="fa-solid fa-bank"></i></button><br><br>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 328px;left: 374px;" name="sve" id="save" value=""><B style="font-size: 22px;">With Draw</B><i class="fa-solid fa-bank"></i></button><br><br>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 418px;left: 372px;" name="sves" id="save" value=""><B style="font-size: 22px;">Deposit</B><i class="fa-solid fa-bank"></i></button><br><br>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: -36px;left: 880px;" name="saves" id="save" value=""><B style="font-size: 22px;">Change Pin</B><i class="fa-solid fa-bank"></i></button><br><br>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 53px;left: 880px;" name="savi" id="save" value=""><B style="font-size: 22px;">Mini Statement</B><i class="fa-solid fa-bank"></i></button><br><br>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 145px;left: 880px;" name="savesi" id="save" value=""><B style="font-size: 22px;">Full Transactions</B><i class="fa-solid fa-bank"></i></button>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/872b658a57.js"crossorigin="anonymous"> </script>

</body>

</html>