<?php
require_once "atmconfig.php";
if(isset($_POST['save'])){
header ("location:service.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCOUNTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <form method="POST" class="form-check">
        <p class="display-5" style="top: 4px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #f2b546;text-align: center;" class="display-5" >ACCOUNTS</p>

        <img src="savings logo1.jpg" style="width: 1519px;height: 468px;position: relative;top: 89px;">

        <p class="display-5" style="top: 557px;border: 0pxsolid black;width: 1520px;position: absolute;height: 170px;left: 0px;background-color: #f2b546;text-align: center;" class="display-5" ></p>

        <button style="width: 244px;height: 67px;background-color: #ecef2e;border-radius: 30px;position: relative;top: 145px;left: 384px;" name="save" id="save" value=""><B>Savings Account</B><i class="fa-solid fa-bank"></i></button>

        <button style="width: 244px;height: 67px;background-color: #ecef2e;border-radius: 30px;position: relative;top: 145px;left: 630px;" name="save" id="save" value=""><B>Current Account</B><i class="fa-solid fa-bank"></i></button>
        
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/872b658a57.js"crossorigin="anonymous"> </script>

</body>
</html>