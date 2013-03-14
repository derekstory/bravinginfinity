<?php
include 'connect.php';
include 'header.php';
?>


<div id="signin">
     <h1 style="color:#fff;margin-top:200px">-Sign-In-</h1>
 <form>
  <form action="#">
           <p><label for="user_name">User Name</label> <input type="text" id="user_name" style="height:50px;text-align:left; width:100%" /></p>
           <p><label for="user_pass">Password</label> <input type="PASSWORD" id="user_pass" style="height:50px;text-align:left; width: 100%"/></p>
                    <p class="submit"><input type="submit" value="Sign-In" style="height:25px;width:100px;background:#fff;color:#000;display:block" /></p>
 </form>
    <h4 style="color:#fff">Not a member yet? <a href="signup.php">Register</a> a new account for free!</h4>
</div>
?>

</div>



<?php
include 'footer.php';
?>
