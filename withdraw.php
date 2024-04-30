<?php
require_once "atmconfig.php";
session_start();
$main_id1 =$_SESSION["main_id"] ;
?>
<style>
    #b2{
        display:none;
    }
    #b3{
        display:none;
    }
</style>
<?php
if(isset($_POST['save'])){
    $pwd1=$_POST['pwd'];
    $ab = 0.00;
    $errorMessage ="";
    $Getadetails=mysqli_query($conn, "SELECT * FROM acc_details WHERE a_status='1' and u_id='$main_id1'") or die(mysqli_error($conn));
    while($resdetails=mysqli_fetch_object($Getadetails)){
        $Getudetails=mysqli_query($conn, "SELECT u_pwd,u_id FROM user_details WHERE u_status='1'and u_id='$main_id1'") or die(mysqli_error($conn));
        while($resdetails1=mysqli_fetch_object($Getudetails)){
            $password=$resdetails1->u_pwd;
            if($pwd1==$password){ 
                $accbal1= $resdetails->a_bal;
                ?>
<style>
    #b1{
        display:none;
    } #b2{
        display:block;
    }
    #b3{
        display:none;
    }
</style>
<?php
            }else{
                $errorMessage ="Incorrect pin .please try again.";
            }
        }
    }
}

if (isset($_POST['save1'])) {
    $am1 = $_POST['amt'];
    $Getadetails2 = mysqli_query($conn, "SELECT * FROM atmbal_details WHERE atm_status='1'") or die(mysqli_error($conn));

    while ($resdetails4 = mysqli_fetch_object($Getadetails2)) {
        $atmbal=$resdetails4->atm_tbal;
        $n2000=$resdetails4->n_2000;
        $n500=$resdetails4->n_500;
        $n200=$resdetails4->n_200;
        $n100=$resdetails4->n_100;

    $Getadetails1 = mysqli_query($conn, "SELECT * FROM acc_details WHERE a_status='1' AND u_id='$main_id1'") or die(mysqli_error($conn));

    while ($resdetails3 = mysqli_fetch_object($Getadetails1)) {
        $acname = $resdetails3->a_name;
        $acnum = $resdetails3->a_no;
        $accbal1 = $resdetails3->a_bal;
        $accbal2 = $accbal1 - $am1;
        if($atmbal<=$am1){
            ?><style>
                 #amountin{
                display:block;
                }
            #invalid2{
                display:block
            }
            #ppage{
                display:block;
                }  
            </style>
            <?php
        }
        if ($accbal1 <= $am1) {
            ?>
            <style>
                #b1{
                display:none;
                }  
                #b2{
                display:none;
                }
                #b3 {
                    display: block;
                }
            </style>
            <?php
        }else{
            $insertra = mysqli_query($conn, "INSERT INTO tra_details (t_name, t_accno, t_wd, t_tbal) VALUES ('$acname', '$acnum', '$am1', '$accbal2')");
            $atm2000=$am1/2000;
            $atmr1=$am1%2000;
            $atm500=$atmr1/500;
            $atmr2=$atmr1%500;
            $atm200=$atmr2/200;
            $atmr3=$atmr2%200;
            $atm100=$atmr3/100;
            $atmr4=$atmr3%100;
            $nof2000=$n2000-$atm2000;
            $nof500=$n500-$atm500;
            $nof200=$n200-$atm200;
            $nof100=$n100-$atm100;
            $atmavbal1=$atmbal-$am1;
            $rwithd=mysqli_query($conn,"UPDATE atmbal_details set atm_tbal='$atmavbal1',n_2000='$nof2000',n_500='$nof500',n_200 ='$nof200',n_100='$nof100' where atm_status='1'") or die(mysqli_error($conn));
            $withd = mysqli_query($conn, "UPDATE acc_details SET a_wd='$am1', a_bal='$accbal2' WHERE u_id='$main_id1'") or die(mysqli_error($conn));
            
            if ($withd) {
                
            }
            
            ?>
            <style>
                #b1{
                display:none;
                }  
                #b2{
                display:none;
                }
                #b3 {
                    display: block;
                }
            </style>
            <?php
            }
                
        } 
        
}
}
if(isset($_POST['save6']))
                header ("location:login.php");




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form method="POST" class="form-check">

        <p class="display-5" style="top: 4px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #024ea1ba;color: white;text-align: center;" class="display-5" >MAY I HELP YOU</p>

        <p class="display-5" style="top: 85px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #a9a9a9b3;color: #024ea1ba;text-align: center;" class="display-5" >WITHDRAW</p>

       <div id="b1"> <p class="display-6" style="    position: relative;top: 200px;left: 85px;color: #024ea1ba;font-size: 54px;font-weight: 300;">Enter Your ATM Pin</p>

        <input type="password" name="pwd" id="pwd" value="" style="    width: 433px;position: relative; top: 241px;left: 83px;height: 40px;">

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 200px;left: 420px;" name="save" id="save" value=""><B style="font-size: 22px;">Continue</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button><br><br>
        <p style="margin-top: 234px; margin-left: 41px;" class="text-danger"><?php echo $errorMessage; ?></p>

</div>
     <div id="b2">   <p class="display-6" style="position: relative;top: 230px;left: 85px;color: #024ea1ba;font-size: 54px;font-weight: 300;">Enter Your Amount</p>

        <input type="text" name="amt" id="amt" value="" style="    width: 433px;position: relative; top: 241px;left: 83px;height: 40px;">

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 205px;left: 240px;" name="save1" id="save1" value=""><B style="font-size: 22px;">Confirm</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button><br><br>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 115px;left: 1000px;" name="cancel" id="cancel" value=""><B style="font-size: 22px;">Cancel</B><i class="fa-solid fa-circle-xmark" style="    width: 35px;height: 23px;"></i></button><br><br>
</div>
      <div id="b3">  <p class="display-6" style="position: relative;top: 230px;left: 85px;color: #024ea1ba;font-size: 54px;font-weight: 300;">Available Balance:</p>

<input type="decimal" name="av" id="av" value="<?php echo $accbal2;?>" style="    width: 433px;position: relative; top: 241px;left: 83px;height: 40px;">

<button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 205px;left: 240px;" name="save6" id="save6" value=""><B style="font-size: 22px;">Back To Mainmenu</B><i class="fa-solid fa-backward" style="    width: 35px;height: 23px;"></i></button><br><br>
</div>
  </form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/872b658a57.js"crossorigin="anonymous"> </script>


</body>
</html>