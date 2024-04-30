<?php
require_once "atmconfig.php";
if(isset($_POST['save'])){
$loginid1=$_POST['lid'];
header ("location:savings.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Languages page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="row">
<div class="col-xl-4 col-lg-4 col-4"></div>
<div class="col-xl-4 col-lg-4 col-4">
    <form method="POST" class="form-check">
        <p class="display-5" style="top: 4px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #f2b546;text-align: center;" class="display-5" >Select your Language :</p>
        <div style=" position: absolute;margin-top: 150px;margin-left: 145px;">
        <button style="width: 180px;height: 50px;background-color: #f2b546;border-radius: 30px;" name="save" id="save" value=""><b>TELUGU</b> <i class="fa-solid fa-language" style="font-size: 22px;"></i></button><br><br><br>

        <button style="width: 180px;height: 50px;background-color: #f2b546;border-radius: 30px;" name="save" id="save" value=""><b>ENGLISH</b><i class="fa-solid fa-language"></i></button><br><br><br>

        <button style="width: 180px;height: 50px;background-color: #f2b546;border-radius: 30px;" name="save" id="save" value=""><b>HINDI</b> <i class="fa-solid fa-language"></i></button><br><br><br>

        <button style="width: 180px;height: 50px;background-color: #f2b546;border-radius: 30px;" name="save" id="save" value=""><b>KANNADA</b> <i class="fa-solid fa-language"></i></button><br><br><br>

        <button style="width: 180px;height: 50px;background-color: #f2b546;border-radius: 30px;" name="save" id="save" value=""><b>TAMIL</b> <i class="fa-solid fa-language"></i></button><br><br><br>

        <button style="width: 180px;height: 50px;background-color: #f2b546;border-radius: 30px;" name="save" id="save" value=""><b>MARATI</b> <i class="fa-solid fa-language"></i></button><br><br><br>

    </div>
    
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/872b658a57.js"crossorigin="anonymous"> </script>
    
</body>
</html>