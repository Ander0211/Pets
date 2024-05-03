<?php
   include('../../config/database.php');
   $email =$_POST['email'];
   $passwd =$_POST['password'];
   $enc_pass = md5($passwd);

   $sql="
      select
         *
      from 
         users 
      where
         email = '$email' And
         password = '$enc_pass'
      limit 1
   ";
   
   $result = pg_query($conn,$sql);
   $total = pg_num_rows( $result);

   if($total > 0){
      header("refresh:0;url=../home.php");
   }else{
      echo "credenciales incorrectas";
   }
?>