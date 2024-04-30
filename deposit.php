<?php
require_once "atmconfig.php";
session_start();
$main_id3=$_SESSION["main_id"] ;
?>
    
  
    <?Php
if(isset($_POST['my'])){
    $pwd1=$_POST['pin'];
    $Getadetails=mysqli_query($conn, "SELECT * FROM acc_details WHERE a_status='1' and u_id='$main_id3'") or die(mysqli_error($conn));
    while($resdetails=mysqli_fetch_object($Getadetails)){
        $Getudetails=mysqli_query($conn, "SELECT * FROM user_details WHERE u_status='1'and u_id='$main_id3'") or die(mysqli_error($conn));
        while($resdetails1=mysqli_fetch_object($Getudetails)){
            $password=$resdetails1->u_pwd;
        }
    }
}
$dep1=$_POST['dep'];
if(isset($_POST['save3'])){
        $Getrdetails7=mysqli_query($conn, "SELECT * FROM rec_details WHERE r_status='1'and r_accno='$dep1'") or die(mysqli_error($conn));
        $resdetails7=mysqli_fetch_object($Getrdetails7);
                $accname1=$resdetails7->r_name;
                $main_id9=$resdetails7->r_accno;
                session_start();
                $_SESSION["main_id0"] = $main_id9;
                $main_id10=$_SESSION["main_id0"];
}
if(isset($_POST['save'])){
    $Getrdetails=mysqli_query($conn, "SELECT * FROM rec_details WHERE r_status='1'and r_accno='$dep1'") or die(mysqli_error($conn));
    $resdetails=mysqli_fetch_object($Getrdetails);
            $accname=$resdetails->r_name;
            $main_id5=$resdetails->r_accno;
            session_start();
            $_SESSION["main_id0"] = $main_id5;
            $main_id0=$_SESSION["main_id0"];
}
if(isset($_POST['save1'])){
    session_start();
    $main_id1 =$_SESSION["main_id0"] ;
}

if(isset($_POST['save2'])){
    session_start();
    $main_id2 =$_SESSION["main_id0"] ;
    session_start();
    $main_id4 =$_SESSION["main_id"] ;
    $depamt=$_POST['dep3'];
    $Getrdetails1=mysqli_query($conn, "SELECT * FROM rec_details WHERE r_status='1'and r_accno='$main_id2'") or die(mysqli_error($conn));
    $resdetails1=mysqli_fetch_object($Getrdetails1);   
            $accname=$resdetails1->r_name;
            $recbal=$resdetails1->r_bal;
            $racno=$resdetails1->r_accno;
            $recbal3=$recbal+$depamt;                     
    
           $insertra1=mysqli_query($conn,"INSERT into tra_details(t_name,t_accno,t_dp,t_tbal)values('$accname','$main_id2','$depamt','$recbal3')");
           $Getrdetails4=mysqli_query($conn, "SELECT * FROM atmbal_details WHERE atm_status='1'") or die(mysqli_error($conn));
            $resdetails4=mysqli_fetch_object($Getrdetails4);
            $atmavbal=$resdetails4->atm_tbal;
            $n2000=$resdetails4->n_2000;
            $n500=$resdetails4->n_500;
            $n200=$resdetails4->n_200;
            $n100=$resdetails4->n_100;
           $atm2000=$depamt/2000;
           $atmr1=$depamt%2000;
           $atm500=$atmr1/500;
           $atmr2=$atmr1%500;
           $atm200=$atmr2/200;
           $atmr3=$atmr2%200;
           $atm100=$atmr3/100;
           $atmr4=$atmr3%100;
           $nof2000=$n2000+$atm2000;
           $nof500=$n500+$atm500;
           $nof200=$n200+$atm200;
           $nof100=$n100+$atm100;
            $atmavbal1=$atmavbal+$depamt;
           $rwithd1=mysqli_query($conn,"UPDATE atmbal_details set atm_tbal='$atmavbal1',n_2000='$nof2000',n_500='$nof500',n_200 ='$nof200',n_100='$nof100' where atm_status='1'") or die(mysqli_error($conn));
           $rwithd2=mysqli_query($conn,"UPDATE rec_details set r_name='$accname',r_bal='$recbal3',r_dp='$depamt' where r_status='1'and r_accno='$main_id2' ") or die(mysqli_error($conn));
}

if(isset($_POST['save8'])){
    // session_start();
    // $main_id4 =$_SESSION["main_id"] ;
    $depamt=$_POST['dep3'];
                        
    $Getrdetails3=mysqli_query($conn, "SELECT * FROM acc_details WHERE a_status='1'and u_id='$main_id3'") or die(mysqli_error($conn));
    $resdetails3=mysqli_fetch_object($Getrdetails3);                                 
            $accname1=$resdetails3->a_name;
            $acno12=$resdetails3->a_no;
            $recbal1=$resdetails3->a_bal;
            $recbal4=$recbal1+$depamt;
           $insertra=mysqli_query($conn,"INSERT into tra_details(t_name,t_accno,t_dp,t_tbal)values('$accname1','$acno12','$depamt','$recbal4')");
           $Getrdetails4=mysqli_query($conn, "SELECT * FROM atmbal_details WHERE atm_status='1'") or die(mysqli_error($conn));
            $resdetails4=mysqli_fetch_object($Getrdetails4);
            $atmavbal=$resdetails4->atm_tbal;
            $n2000=$resdetails4->n_2000;
            $n500=$resdetails4->n_500;
            $n200=$resdetails4->n_200;
            $n100=$resdetails4->n_100;
           $atm2000=$depamt/2000;
           $atmr1=$depamt%2000;
           $atm500=$atmr1/500;
           $atmr2=$atmr1%500;
           $atm200=$atmr2/200;
           $atmr3=$atmr2%200;
           $atm100=$atmr3/100;
           $atmr4=$atmr3%100;
           $nof2000=$n2000+$atm2000;
           $nof500=$n500+$atm500;
           $nof200=$n200+$atm200;
           $nof100=$n100+$atm100;
            $atmavbal1=$atmavbal+$depamt;
           $rwithd1=mysqli_query($conn,"UPDATE atmbal_details set atm_tbal='$atmavbal1',n_2000='$nof2000',n_500='$nof500',n_200 ='$nof200',n_100='$nof100' where atm_status='1'") or die(mysqli_error($conn));
           
            $rwithd3=mysqli_query($conn,"UPDATE acc_details set a_name='$accname1',a_bal='$recbal4',a_dp='$depamt' where a_status='1'and u_id='$main_id3' ") or die(mysqli_error($conn));
}
?>
                           
              

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEPOSIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
    <body>

    <form method="POST" class="form-check">

        <p class="display-5" style="top: 0px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #a9a9a9b3;color: black;text-align: center;" class="display-5" >WELCOME</p>

        <p class="display-5" style="top: 84px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #024ea1ba;color: white;text-align: center;" class="display-5" >Deposit Your Cash</p>

<div id="ppage">  
        
       <p class="display-6" style="    position: relative;top: 185px;left: 85px;color: #024ea1ba;font-size: 35px;font-weight: 300;">Enter Your Pin :</p>

        <input type="password" name="pin" id="pin" value="" style="    width: 433px;position: relative; top: 118px;left: 346px;height: 40px;">

        <div id="invalid" ><p><span style="color:red;">Invalid Password</span></p></div>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 0px;left: 0px;" name="my" id="my" value=""><B style="font-size: 22px;">To my A/C</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 225px;left: -356px;" name="save" id="save" value=""><B style="font-size: 22px;">To others A/C</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 223px;left: -348px;" name="cancel" id="cancel" value=""><B style="font-size: 22px;">Cancel</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button><br><br>
</div>

<div id="note">
        
     <img src="deposit.jpg" style="top: 256px;position: relative;height: 425px;">

        <p class="display-6" style=" position: relative;top: -183px;left:665px;color: #024ea1ba;font-size: 35px;font-weight: 300;">Available Notes in Machine :</p>

        <p class="display-6" style=" position: relative;top: -183px;left:665px;color: black;font-size: 35px;font-weight: 400;">Rs.100</p>

        <p class="display-6" style=" position: relative;top: -183px;left:665px;color: black;font-size: 35px;font-weight: 400;">Rs.200</p>

        <p class="display-6" style=" position: relative;top: -183px;left:665px;color: black;font-size: 35px;font-weight: 400;">Rs.500</p>

        <p class="display-6" style=" position: relative;top: -183px;left:665px;color: black;font-size: 35px;font-weight: 400;">Rs.2000</p>

        <div id="acno">

        <p class="display-6" style="position: relative;top: -199px;left: 494px;color: #024ea1ba;font-size: 54px;font-weight: 300;">Enter Your Account No:</p>

        <input type="text" name="dep" id="dep" value="" style="   width: 433px;position: relative; top: -275px;left: 1037px;height: 40px;">

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: -179px;left: 166px;" name="save3" id="save3" value="">Confirm<i class="fa-solid fa-circle-check" ></i></button>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: -179px;left: 266px;" name="cancel" id="cancel" value=""><B style="font-size: 22px;">Cancel</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button>
</div>

<div id="depin">

        <p class="display-6" style="position: relative;top: -157px;left: 258px;color: #024ea1ba;font-size: 54px;font-weight: 300;">Account Holder Name :</p>

        <input type="text" name="dep1" id="dep1" value="<?php echo $accname1;?>" style="    width: 433px;position: relative; top: -217px;left: 800px;height: 40px;">

        <p class="display-6" style="position: relative;top: -157px;left: 500px;color: #024ea1ba;font-size: 54px;font-weight: 300;">Account No :</p>

        <input type="text" name="dep2" id="dep2" value="<?php echo $dep1;?>" style="    width: 433px;position: relative; top: -217px;left: 800px;height: 40px;">

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: -179px;left: 166px;" name="save1" id="save1" value=""><B style="font-size: 22px;">Confirm</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: -179px;left: 266px;" name="cancel1" id="cancel1" value=""><B style="font-size: 22px;">Cancel</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button>
</div>

<div id="depin1">
            
     <p class="display-6" style=" position: relative;top: -187px;left: 661px;color: #024ea1ba;font-size: 43px;font-weight: 300;">Enter Your Amount :</p>

        <input type="text" name="dep3" id="dep3" value="" style="    width: 433px;position: relative; top: -260px;left: 1037px;height: 40px;">

        <div id="invalidamt" ><p><span style="color:red;">Please enter a valid amount</span></p></div>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: -160px;left: 803px;" name="cancel2" id="cancel2" value=""><B style="font-size: 22px;">Confirm</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button><br><br>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: -250px;left: 672px;" name="save8" id="save8" value=""><B style="font-size: 22px;"> Confirm to my A/C</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: -250px;left: 709px;" name="save2" id="save2" value=""><B style="font-size: 22px;">Confirm to others A/C</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button>
</div>

<div id="oth">
        
        <p class="display-6" style="position: relative;top: -200px;left: 623px;color: #024ea1ba;font-size: 54px;font-weight: 300;">Available Balance:</p>

          <input type="text" name="av" id="av" value="<?php echo $recbal3?>" style="    width: 433px;position: relative; top: -260px;left: 1037px;height: 40px;">

          <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: -202px;left: 478px;" name="" id="" value=""><B style="font-size: 22px;">Back to Mainmenu</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button>
</div>
       
<div id="my">   
        
        <p class="display-6" style="position: relative;top: -200px;left: 623px;color: #024ea1ba;font-size: 54px;font-weight: 300;">Available Balance:</p>

          <input type="text" name="av1" id="av1" value="<?php echo $recbal4?>" style="    width: 433px;position: relative; top: -260px;left: 1037px;height: 40px;">

          <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: -190px;left: 500px;" name="" id="" value=""><B style="font-size: 22px;">Back to Mainmenu</B><i class="fa-solid fa-circle-check" style="    width: 35px;height: 23px;"></i></button>
</div>

</form>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/872b658a57.js"crossorigin="anonymous"> </script>

    </body>

</html>