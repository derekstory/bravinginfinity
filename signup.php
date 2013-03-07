<?php
include 'connect.php';
include 'header.php';
?>

<h1 style="color:#fff;margin-top:200px;margin-left:30px;margin-bottom:-80px">-Sign-In-</h1>
<div id="signin">
 <form>
  <form action="#">
           <p><label for="user_name">User Name</label> <input type="text" id="username" style="height:50px;text-align:left; width:100%" /></p>
           <p><label for="user_email">Password</label> <input type="PASSWORD" id="user_password" style="height:50px;text-align:left; width: 100%"/></p>
                    <p class="submit"><input type="submit" value="Sign-In" style="height:25px;width:100px;background:#fff;color:#000;display:block" /></p>
 </form>
</div>


<div id="contentsignup">
<h1 style="color:#fff">-Register-</h1>


 <form>
  <form action="#">
           <p><label for="user_name">User Name</label> <input type="text" id="username" style="height:50px;text-align:left; width:100%" /></p>
           <p><label for="user_email">Password</label> <input type="PASSWORD" id="user_password" style="height:50px;text-align:left; width: 100%"/></p>
           <p><label for="user_email">Repeat Password</label> <input type="PASSWORD" id="user_password"style="height:50px;text-align:left;width:100%" /></p>
           <p><label for="user_email">E-mail Address</label> <input type="text" id="user_email" style="height:50px;text-align:left;width:100%" /></p>

 <h6><style="color:#fff;display:inline">By clicking "Register", I acknowledge that I have read and agree with the:</h6>
 <h5><a href="termsandconditions.php"><style="color:#fff;display:inline">Terms and Conditions</a></h5>
           <p class="submit"><input type="submit" value="Register" style="height:25px;width:100px;background:#fff;color:#000;display:block" /></p>

 </form>
</div>



<?php
include 'footer.php';
?>
