<?php
require_once "atmconfig.php";
session_start();
$main_id1 =$_SESSION["main_id"];
if(isset($_POST['cancel'])){
$pwd1=$_POST['pin'];
$pwd2=$_POST['pin1'];
$pwd3=$_POST['pin2'];
$Getudetails=mysqli_query($conn, "SELECT * FROM user_details WHERE u_status='1'and u_id='$main_id1'") or die(mysqli_error($conn));
while($resdetails1=mysqli_fetch_object($Getudetails)){
    $password=$resdetails1->u_pwd;
    if($pwd1==$password && $pwd2==$pwd3){
        $updpin=mysqli_query($conn, "update user_details set u_pwd='$pwd2' WHERE  u_id='$main_id1'");
    }
    header ("location:login.php");

}
}

// if(isset($_POST['cancel'])){
//     session_unset();
//    session_destroy();
//    header ("location:login.php");
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form method="POST" class="form-check">
        <p class="display-5" style="top: 0px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #f2b546;color: white;text-align: center;" class="display-5" ></p>

        <p class="display-5" style="top: 84px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #024ea1ba;color: white;text-align: center;" class="display-5" >Change Your Pin</p>

        <p class="display-6" style="    position: relative;top: 233px;left: 400px;color: #024ea1ba;font-size: 35px;font-weight: 300;">Enter Your Old Pin :</p>

        <input type="password" name="pin" id="pin" value="" style=" width: 375px;position: relative; top: 180px;left: 700px;height: 40px;"><br>

        <p class="display-6" style="    position: relative;top: 233px;left: 400px;color: #024ea1ba;font-size: 35px;font-weight: 300;">Enter Your New Pin :</p>

        <input type="password" name="pin1" id="pin1" value="" style="    width: 375px;position: relative; top: 180px;left: 705px;height: 40px;"><br>

        <p class="display-6" style="    position: relative;top: 233px;left: 400px;color: #024ea1ba;font-size: 35px;font-weight: 300;">Re-Enter Your New Pin :</p>

        <input type="password" name="pin2" id="pin2" value="" style="    width: 375px;position: relative; top: 180px;left: 757px;height: 40px;"><br>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 220px;left: 700px;" name="cancel" id="cancel" value=""><B style="font-size: 22px;">Confirm</B><i class="fa-solid fa-bank" style=" font-size: 20px;"></i></button><br><br>

    </form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/872b658a57.js"crossorigin="anonymous"> </script>

</body>
</html>