<?php
require_once "atmconfig.php";
session_start();
$main_id1 =$_SESSION["main_id"] ;
?>
<style>
#saving{
display:none;
}
#mini{
        display:none;
 
}
</style>
<?php
if(isset($_POST['save'])){
    $pwd1=$_POST['bal'];
    $Getadetails=mysqli_query($conn, "SELECT * FROM acc_details WHERE a_status='1' and u_id='$main_id1'") or die(mysqli_error($conn));
    while($resdetails=mysqli_fetch_object($Getadetails)){
        $Getudetails=mysqli_query($conn, "SELECT * FROM user_details WHERE u_status='1'and u_id='$main_id1'") or die(mysqli_error($conn));
        while($resdetails1=mysqli_fetch_object($Getudetails)){
                    $password=$resdetails1->u_pwd;
                    if($pwd1==$password){
                        $accbal1=$resdetails->a_bal;
                        ?>
                                <style>
                                #saving{
                                display:block;
                                }
                                #pin{
                                display:none;
                                }
                                </style>
                                <?php
                                }else {
                                ?>
                                <style>
                                 #pin{
                                display:block;
                                } 
                                
                                </style>
                                <?php
                    }
                }
            }
        }
        if(isset($_POST['save1'])){
            ?>
            <style>
             #mini{
                     display:block;
                     }
            #pin{
                    display:none;
            }
            #saving{
                    display:none;
                    }
            </style>
<?php                   
        }

        if(isset($_POST['cancel'])){
            header ("location:login.php");
    }

    if(isset($_POST['cancel'])){
        header ("location:login.php");
    }

    




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ministatement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <form method="POST" class="form-check">
        
        <p class="display-5" style="top: 0px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #024ea1ba;color: white;text-align: center;" class="display-5" ></p>

        <p class="display-5" style="top: 84px;border: 0pxsolid black;width: 1520px;position: absolute;height: 80px;left: 0px;background-color: #a9a9a9b3;color: black;text-align: center;" class="display-5" >MINI STATEMENT :</p>

       <div id="pin"> <p class="display-6" style=" position: relative;top: 233px;left: 495px;color: #024ea1ba;font-size: 45px;font-weight: 300;">Enter Your ATM Pin Number</p>

        <input type="password" name="bal" id="bal" value="" style="width: 520px;position: relative; top: 241px;left: 500px;height: 40px;"><br><i class="fa-solid fa-keyboard" style="font-size: 40px;position: relative;left: 977px;top: 236px;" ></i>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 287px;left: 450px;" name="save" id="save" value=""><B style="font-size: 22px;">Confirm</B><i class="fa-solid fa-circle-check" style=" font-size: 20px;"></i></button><br><br>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 200px;left: 772px;" name="cancel" id="cancel" value=""><B style="font-size: 22px;">Back To MainMenu</B><i class="fa-solid fa-backward" style=" font-size: 20px;"></i></button><br><br>
        </div>

        <div id="saving">
         <p class="display-6" style="    position: relative;top: 290px;left: 359px;color: #024ea1ba;font-size: 45px;font-weight: 300;">Select Your Account :</p>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 175px;left: 780px;" name="save1" id="save1" value=""><B style="font-size: 22px;">Savings</B><i class="fa-solid fa-bank" style=" font-size: 20px;"></i></button><br><br>

        <button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 175px;left: 780px;" name="save1" id="save1" value=""><B style="font-size: 22px;">Current</B><i class="fa-solid fa-bank" style=" font-size: 20px;"></i></button><br><br>


    </div>



<div id="mini">
    <table border="5px" width="100%"class="table table-hover" style="position: relative;top: 140px">
<tr>    
    <th>S.no</th>
    <th>Name</th>
    <th>A/C Number</th>
    <th>Withdrawn Amount</th>
    <th>Deposited Amount</th>
    <th>Available Balance</th>
    <th>Date & Time</th>
     </tr>

    <?php
        $Getadetails1=mysqli_query($conn, "SELECT * FROM acc_details WHERE a_status='1' and u_id='$main_id1'") or die(mysqli_error($conn));
        while($resdetails1=mysqli_fetch_object($Getadetails1)){
                $acnum=$resdetails1->a_no;
                $Gettdetails1=mysqli_query($conn, "SELECT * FROM tra_details WHERE t_status='1' and t_accno='$acnum' order by t_id DESC limit 5;") or die(mysqli_error($conn));
                while($resdetails2=mysqli_fetch_object($Gettdetails1)){
                        $tid=$resdetails2->t_id;
                        $mname=$resdetails2->t_name;
                        $macno=$resdetails2->t_accno;
                        $wdl=$resdetails2->t_wd;
                        $dpt=$resdetails2->t_dp;
                        $totalbal=$resdetails2->t_tbal;
                        $time=$resdetails2->c_d_t;
                        ?>
<tr>     
    <td><?php echo $tid;?></td>   
    <td><?php echo $mname;?></td>
    <td><?php echo $macno;?></td>
    <td><?php echo $wdl;?></td>
    <td><?php echo $dpt;?></td>
    <td><?php echo $totalbal;?></td>
    <td><?php echo $time;?></td>

</tr>
<?php
                }
        }
        ?>


</table>  
<button style="width: 244px;height: 67px;background-color: #f2b546;border-radius: 30px;position: relative;top: 200px;left: 772px;" name="cancel" id="cancel" value=""><B style="font-size: 22px;">Back To MainMenu</B><i class="fa-solid fa-backward" style=" font-size: 20px;"></i></button><br><br>

</form>




    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/872b658a57.js"crossorigin="anonymous"> </script>

</body>
</html>