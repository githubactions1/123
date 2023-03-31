<?php
  if(isset($_POST['register']))
  {
    include("db.php");
    
    $mobileno = $_POST['mobileno'];
    //print_r($mobileno);exit;
    
    //
    if($mobileno != '')
    {

      $sql = query(" select * from customers where mobileno='$mobileno'");
      $rowcount = $sql->num_rows;

      if($rowcount != 0)
      {
        //print_r('aaaaaaaaaa');exit;
        $r = $sql->fetch_object();
        //print_r($r);exit;
        $_SESSION['tranuserid'] = $r->id;
        //$_SESSION['type'] = $r->type;
        echo '<script>alert("OTP");</script>';
        exit();
      }
      else
      {
        echo '<script>alert("Username or Password Invalid")</script>';
        exit();
      }
    }
    else
    {
      echo '<script>alert("Username or Password Invalid");window.location.href="index.php";</script>';
      exit();
    }
  }
?>