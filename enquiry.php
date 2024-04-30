<?php
require_once "atmconfig.php";
session_start();
$main_id1 =$_SESSION["main_id"] ;
?>
<style>
#b1{
display:none;
}
</style>
<?php
if(isset($_POST['save'])){
    $pwd1=$_POST['pwd'];
    $ab = 0.00;
    $errorMessage ="";
    $Getadetails=mysqli_query($conn, "SELECT * FROM acc_details WHERE a_status='1' and u_id='$main_id1'") or die(mysqli_error($conn));
    echo  "SELECT * FROM acc_details WHERE a_status='1' and u_id='$main_id1'";
    while($resdetails=mysqli_fetch_object($Getadetails)){
        $Getudetails=mysqli_query($conn, "SELECT u_pwd,u_id FROM user_details WHERE u_status='1'and u_id='$main_id1'") or die(mysqli_error($conn));
        "SELECT u_pwd,u_id FROM user_details WHERE u_status='1'and u_id='$main_id1'";
        while($resdetails1=mysqli_fetch_object($Getudetails)){
            $password=$resdetails1->u_pwd;
            if($pwd1==$password){
                ?>
                <style>
                    #b1{
                        display:block;
                    }
                </style>

                <?php
                
                $ab= $resdetails->a_bal;
                echo $ab ;


            }else{
                $errorMessage ="Incorrect pin .please try again.";
            }
        }
    }
}




    if(isset($_POST['cancel'])){
         session_unset();
        session_destroy();
        header ("location:login.php");
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form method="POST" class="form-check">
        <p class="display-5" style="top: 4px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #f2b546;text-align: center;" class="display-5" >ENQUIRY</p>

        <p class="display-5" style="width: 625px;position: absolute;height: 80px; left: 39px;background-color: #024ea1ba;color: white;text-align: center;top: 132px;color: white;text-align: center;top: 205px;" class="display-5" >Enter Your ATM Pin :</p>

        <input type="password" name="pwd" id="pwd" value="" style="position: relative;top: 353px;left: 39px;width: 624px;height: 43px;">

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 533px;left: -384px;" name="save" id="save" value=""><B style="font-size: 30px;" >Continue</B><i class="fa-solid fa-bank"></i></button><br><br>

 <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 442px;left: 943px;" name="cancel" id="cancel" value=""><B style="font-size: 22px;" >Back to Mainmenu</B><i class="fa-solid fa-bank"></i></button><br><br>

 <p style="margin-top: 234px; margin-left: 41px;" class="text-danger"><?php echo $errorMessage; ?></p>

<div id="b1"> <p class="display-5" style="width: 625px;position: absolute;height: 80px; left: 839px;background-color: #024ea1ba;color: white;text-align: center;top: 132px;color: white;text-align: center;top: 205px;" class="display-5" >BALANCE :</p>

        <p style="color: #467eba;font-size: 27px;position: relative;top: -100px;left: 844px;">Ledger Balance</p>

        <input type="decimal" name="lb" id="lb" value="0.00" style="position: relative;top: -147px;left: 1035px;width: 260px;height: 34px;">

        <p style="color: #467eba;font-size: 27px;position: relative;top: -100px;left: 844px;">Available Balance</p> 

        <input type="decimal" name="ab" id="ab" value="<?php echo $ab;?>" style="position: relative;top: -166px;left: 1058px;width: 260px;height: 34px;">
        
        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 442px;left: 943px;" name="cancel" id="cancel" value=""><B style="font-size: 22px;" >Back to Mainmenu</B><i class="fa-solid fa-bank"></i></button><br><br>


    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/872b658a57.js"crossorigin="anonymous"> </script>
 
</body>
</html>