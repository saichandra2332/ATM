<?php
require_once "atmconfig.php";
session_start();
$main_id3=$_SESSION["main_id"] ;
?>
<style>
        #acno{
                display:none;
        }
        #depin{
                display:none;
        }
        #depin1{
                display:none;
        }
        #invalid{
                display:none;
        }
        #showb{
                 display:none;
        }
        #showb1{
                 display:none;
        }
        #invalidamt{
                 display:none;
        }
</style>
<?php
if(isset($_POST['my'])){
    $pwd1=$_POST['pin'];
    $Getadetails=mysqli_query($conn, "SELECT * FROM acc_details WHERE a_status='1' and u_id='$main_id3'") or die(mysqli_error($conn));
    while($resdetails=mysqli_fetch_object($Getadetails)){
        $Getudetails=mysqli_query($conn, "SELECT * FROM user_details WHERE u_status='1'and u_id='$main_id3'") or die(mysqli_error($conn));
        while($resdetails1=mysqli_fetch_object($Getudetails)){
            $password=$resdetails1->u_pwd;
            if($pwd1!=$password || $pwd1=""){
                ?>
                <style>
                #invalid{
                display:block;
                }
                #ppage{
                display:block;
                } 
                
                </style>
                <?php
          }else{
                ?>
                <style>
                #depin1{
                display:block;
                }
                #ppage{
                display:none;
                } 
                #acno{
                display:none;
                } 
                </style>
                <?php
            }
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
                ?>
                <style>
                #acno{
                display:none;
                }
                #depin{
                display:block;
                }
                #ppage{
                display:none;
                } 
                </style>
                <?php  
}if(isset($_POST['save'])){
        $Getrdetails=mysqli_query($conn, "SELECT * FROM rec_details WHERE r_status='1'and r_accno='$dep1'") or die(mysqli_error($conn));
        $resdetails=mysqli_fetch_object($Getrdetails);
                $accname=$resdetails->r_name;
                $main_id5=$resdetails->r_accno;
                session_start();
                $_SESSION["main_id0"] = $main_id5;
                $main_id0=$_SESSION["main_id0"];
                ?>
                <style>
                #acno{
                display:block;
                }
                #depin{
                display:none;
                }
                #ppage{
                display:none;
                } 
                </style>
                <?php  
}
        if(isset($_POST['save1'])){
                session_start();
                $main_id1 =$_SESSION["main_id0"] ;
                ?>
                <style>
                 #ppage{
                display:none;
                } 
                #depin{
                display:none;
                }
                #depin1{
                display:block;
                }                
                </style>
                <?php 
        }
                if(isset($_POST['save2'])){
                        session_start();
                        $main_id2 =$_SESSION["main_id0"] ;
                        session_start();
                        $main_id4 =$_SESSION["main_id"] ;
                        $depamt=$_POST['dep3'];
                        if($depamt==null||$depamt==string){
                                ?>
                                <style>
                                #invalidamt{
                                        display:block;
                                }
                                #depin1{
                                        display:block;
                                } 
                                #ppage{
                                        display:none;
                                 } 
                                </style>
                                <?php
                          }else{ 
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
                          }
                               $rwithd2=mysqli_query($conn,"UPDATE rec_details set r_name='$accname',r_bal='$recbal3',r_dp='$depamt' where r_status='1'and r_accno='$main_id2' ") or die(mysqli_error($conn));
                        if($rwithd2){                               
                                        ?>
                                    <style>
                                        #ppage{
                                        display:none;
                                        } 
                                        #showb{
                                        display:block;
                                        }  
                                        #depin1{
                                        display:none;
                                        } 
                                        #showb1{
                                                display:none;
                                                } 
                                    </style>
                                    <?php
                                    }
                                
                                         }if(isset($_POST['save8'])){
                                                session_start();
                                                $main_id2 =$_SESSION["main_id0"] ;
                                                session_start();
                                                $main_id4 =$_SESSION["main_id"] ;
                                                $depamt=$_POST['dep3'];
                                                  if($depamt==null){
                                                        ?>
                                                        <style>
                                                        #invalidamt{
                                                                display:block;
                                                        }
                                                        #depin1{
                                                        display:block;
                                                         } 
                                                         #ppage{
                                                        display:none;
                                                         } 
                                                        </style>
                                                        <?php
                                                  } else{                 
                                                $Getrdetails3=mysqli_query($conn, "SELECT * FROM acc_details WHERE a_status='1'and u_id='$main_id4'") or die(mysqli_error($conn));
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
                                                  
                                                        $rwithd3=mysqli_query($conn,"UPDATE acc_details set a_name='$accname1',a_bal='$recbal4',a_dp='$depamt' where a_status='1'and u_id='$main_id4' ") or die(mysqli_error($conn));
                                                        if($rwithd3){   ?>
                                                                    <style>
                                                                        #depin1{
                                                                display:none;
                                                                } 
                                                                        #ppage{
                                                                        display:none;
                                                                        } 
                                                                        #showb{
                                                                        display:none;
                                                                        }  
                                                                        #showb1{
                                                                        display:block;
                                                                        } 
                                                                    </style>
                                                                    <?php
                                                                    }
                                                                 }
                                                                }
                 if (isset($_POST['save5'])) {

                        header( "location:atmwaitingpage11.php" ); 
                    }  
if(isset($_POST['cancel'])){
session_unset();
session_destroy();
header ("location:atmservicepage4.php");
}
if(isset($_POST['cancel1'])){
        session_unset();
        session_destroy();
        header ("location:atmservicepage4.php");
}
        if(isset($_POST['cancel2'])){
                session_unset();
                session_destroy();
                header ("location:atmservicepage4.php");
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atmpage8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Calistoga&family=Sansita&display=swap" rel="stylesheet">
</head>
<body style="background-color:#d7d7d7;font-family: 'Sansita', sans-serif;">
<form method="POST">
<div class="row" style="background-color:#991a4f;height:40px;"></div>
<div class="row">
        <div class="col-xl-4"></div>
                <div class="col-xl-6">
                        <h1><span style="text-align:centre;color:#991a4f;">Deposit your Cash</span></h1></div></div>
                        <div id="ppage">
                        <div class="row mt-5 mb-5">
                                <div class="col-xl-2 col-lg-2 col-md-2"></div>
                                <div class="col-xl-2 col-lg-2 col-md-2 mt-5"><h4><span style="color:#991a4f;">Enter your pin :</span></h4></div>

                                <div class="col-xl-5 col-lg-5 col-md-5 mt-5">                        
                                        <tr>                                                
                                        <td><input class="form-control" type="password" name="pin" id="pin" value="" ><span style="color:#991a4f;font-size:50px;"><i class="bi bi-keyboard-fill"></i></span><div id="invalid" ><p><span style="color:red;">Invalid Password</span></p></div></td>
                                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:25px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="my" id="my" value=""><i class="bi bi-check-circle"></i>    To my A/C</button></td>
                                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:25px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="save" id="save" value=""><i class="bi bi-check-circle"></i>    To others A/C</button></td>
                                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:25px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="cancel" id="cancel" value=""><i class="bi bi-x-circle"></i>    Cancel</button></td>
                                </tr>
                                </div>
</div> 
                        </div>
                        <div id="acno">
                                <div class="row mt-5 mb-5">
                                        <div class="col-xl-2 col-lg-2 col-md-2"></div>
                                        <div class="col-xl-3 col-lg-3 col-md-3 mt-5"><h4><span style="color:#991a4f;">Enter account number:</span></h4></div>

                                        <div class="col-xl-3 col-lg-3 col-md-3 mt-5">                        
                                                <tr>                                                
                                                <td><input class="form-control" type="tel" name="dep" id="dep" value="" ><span style="color:#991a4f;font-size:50px;"><i class="bi bi-keyboard-fill"></i></span></td>
                                                <td></td>
                                                </tr>
                                        </div>
                                        <div class="col-xl-1 col-lg-1 col-md-1"></div>
                                        <div class="col-xl-3 col-lg-3 col-md-3 mt-5 ">  
                                                <table> 
                                                        <tr>                                                        
                                                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:25px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="save3" id="save3" value=""><i class="bi bi-check-circle"></i>    Continue</button></td>
                                                        </tr>
                                                        <tr>                                                        
                                                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:25px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="cancel" id="cancel" value=""><i class="bi bi-x-circle"></i>    Cancel</button></td>
                                                        </tr>
                                                </table>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>               
<div id="depin">
        <div class="row mt-5 mb-5">
                <div class="col-xl-2 col-lg-2 col-md-2 mt-5"></div>

                <div class="col-xl-5 col-lg-5 col-md-5 mt-5">
                
                        <table>         
                                <tr>
                                <td><span style="color:#991a4f;font-size:20px;">Name</span></td>
                                <td><span style="color:#991a4f;font-size:20px;">:</span></td>
                                <td><input class="form-control mb-4 text-capitalize" type="text" name="dep1" id="dep1" value="<?php echo $accname1;?>"disabled></td>    
                                </tr>                    
                                <tr>
                                <td><span style="color:#991a4f;font-size:20px;">Account Number</span></td>
                                <td><span style="color:#991a4f;font-size:20px;">:</span></td>
                                <td><input class="form-control" type="tel" name="dep2" id="dep2" value="<?php echo $dep1;?>"disabled ></td>    
                                </tr>
                        </table>
        
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                
                        <table>         
                                <tr>                
                                <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:20px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="save1" id="save1" value=""><i class="bi bi-check-circle"></i>Yes</button></td>
                                </tr>                    
                                <tr>                
                                <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:20px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="cancel1" id="cancel1" value=""><i class="bi bi-x-circle"></i>No</button></td>
                                </tr>
                        </table>

                </div>

        </div>
        
</div>

<div id="depin1">
        <div class="row mt-5 mb-5">
                <div class="col-xl-1 col-lg-1 col-md-1 mt-5"></div>
                <div class="col-xl-5 col-lg-5 col-md-5 mt-5"><img src="images/New-Year-2022-ATM-Cash-withdrawals-Becomes-Expensive-from-today-1st-January-2022-more-fees-will-be-charged-in-the-new-year.avif" style="width:400px;height:300px"></div>
                <div class="col-xl-5 col-lg-5 col-md-5 mt-5"><h4><span style="color:#991a4f;">Available Denominations in Machine</span></h4>
                        <div style="word-spacing:70px;"><h3>Rs.100.   Rs.200.<br>Rs.500.   Rs.2000.</h3></div>
                                <table>      
                                        <tr>
                                        <td><span style="color:#991a4f;font-size:20px;">Enter Amount</span></td>
                                        <td><span style="color:#991a4f;font-size:20px;">:</span></td>
                                        <td><input class="form-control" type="tel" name="dep3" id="dep3" value=""><div id="invalidamt" ><p><span style="color:red;">Please enter a valid amount</span></p></div></td>                        
                                        </tr>   
                                        <tr>                                
                                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:20px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="save2" id="save2" ><i class="bi bi-check-circle"></i>conform to others A/C</button></td>
                                        </tr><tr>                                
                                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:20px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="save8" id="save8" ><i class="bi bi-check-circle"></i>Conform to my A/C</button></td>
                                        </tr>
                                        <tr>             
                                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:20px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="cancel2" id="cancel2" ><i class="bi bi-x-circle"></i>Cancel</button></td>
                                        </tr>
                                </table>
                        </div>
                </div>
        </div>
</div> 
<div id="showb">
<div class="row mt-5 mb-5">
        <div class="col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xl-2 col-lg-2 col-md-2 mt-5"><h4><span style="color:#991a4f;">Available Balance:</span></h4></div>

        <div class="col-xl-3 col-lg-3 col-md-3 mt-5">                        
                <tr>                                                
                <td><input class="form-control" type="tel" name="av" id="av" value="<?php echo $recbal3?>"disabled ></td>
                <td></td>
                </tr>
        </div>
        <div class="col-xl-1 col-lg-1 col-md-1"></div>
        <div class="col-xl-3 col-lg-3 col-md-3 mt-5 ">  
                <table> 
                        <tr>                                                        
                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:25px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="save5" id="save5" value=""><i class="bi bi-check-circle"></i>    Ok</button></td>
                        </tr>
                        <tr>                                                        
                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:25px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="cancel" id="cancel" value=""><i class="bi bi-x-circle"></i>    Cancel</button></td>
                        </tr>
                </table>
        </div>
</div>
</div>  <div id="showb1">
<div class="row mt-5 mb-5">
        <div class="col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xl-2 col-lg-2 col-md-2 mt-5"><h4><span style="color:#991a4f;">Available Balance:</span></h4></div>

        <div class="col-xl-3 col-lg-3 col-md-3 mt-5">                        
                <tr>                                                
                <td><input class="form-control" type="tel" name="av1" id="av1" value="<?php echo $recbal4?>"disabled ></td>
                <td></td>
                </tr>
        </div>
        <div class="col-xl-1 col-lg-1 col-md-1"></div>
        <div class="col-xl-3 col-lg-3 col-md-3 mt-5 ">  
                <table> 
                        <tr>                                                        
                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:25px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="save5" id="save5" value=""><i class="bi bi-check-circle"></i>    Ok</button></td>
                        </tr>
                        <tr>                                                        
                        <td><button style="background-color:#991a4f;text-align:centre;height:45px;font-size:25px;border-radius:100px;color:white;"class="btn btn-pill mt-3"name="cancel" id="cancel" value=""><i class="bi bi-x-circle"></i>    Cancel</button></td>
                        </tr>
                </table>
        </div>
</div>
</div>       
<div class="row"><img src="images/cropbg.jpg" style="width:100%;height:80px;margin-top:20px;"></div>

</form>

</body>
</html>