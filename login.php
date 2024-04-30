<?php
require_once "atmconfig.php";
if(isset($_POST['sub'])){
        $loginid1=$_POST['lid'];
        $pwd2=$_POST['pwd'];
        $Getdetails=mysqli_query($conn, "SELECT u_id FROM user_details WHERE u_status='1'and u_mail='$loginid1' and u_pwd='$pwd2'") or die(mysqli_error($conn));
        $resdetails=mysqli_fetch_object($Getdetails);
        $main_id=$resdetails->u_id;
        session_start();
        $_SESSION["main_id"] = $main_id;
        $count=mysqli_num_rows($Getdetails);
        if($count > 0){
            header ("location:languages.php");
            } 
        else {
            echo "<h2>Login failed</h2>";
    }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="background-color:">
    <!-- <div>
    <img  src="sky login.jpg" style="width: 1511px;height: 740px;position: absolute;">
    </div> -->
<div class="row">
<div class="row"><img src="indian-bank-logo.png" style="width: 22%;height: 280px;margin-top: -99px;margin-left: -13px;"></div>
<div style="width: 1224px;height: 81px;background-color: #024ea1;margin-left: 297px;margin-top: -181px;color:white;text-align: center;" class="display-5">WELCOME TO INDIAN BANK</div><img src="logo.png" style="width: 144px; position: absolute; height: 81px;left: 1213px;">
        <div class="col-xl-5 col-lg-4 col-4"></div>
        <div class="col-xl-4 col-lg-4 col-4">
        <h3 style="margin-top: 62px;margin-left: 100px;font-size: 35px;">Login ID</h3><br>
        </div>
        <div class="row">
        <div class="col-xl-4 col-lg-4 col-4"></div>
        <form method="POST" class="form-check" style="position: relative;left: 700px;">
        <div class="col-xl-4 col-lg-4 col-4">
        <!-- <form method="POST" class="form-check" action="languages.php" style="position: relative;left: 200px;">-->
        User Name :<br><input type="text" name="lid" id="lid" value="" placeholder="User name"><br><br>
        Pass Word :<br><input type="password" name="pwd" id="pwd" value="" placeholder=" "><br>
        <button style="width: 180px;height: 50px;background-color: #f2b546;border-radius: 30px;position: relative;top: 8px;" name="sub" id="save" value=""><b>SUBMIT</b> <i class="fa-solid fa-language" style="font-size: 22px;"></i></button><br><br><br>
       </form>
</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/872b658a57.js"crossorigin="anonymous"> </script>


</body>
</html>