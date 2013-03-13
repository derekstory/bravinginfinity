<?php
include 'connect.php';
include 'header.php';
?>


<div id="contentsignup">
<h1 style="color:#fff">-Register-</h1>

<?php
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
echo '<form method="post" action="">
           User Name<input type="text" name="user_name"style="height:50px;text-align:left; width:100%"/><br />
           Password<input type="PASSWORD" name="user_pass" style="height:50px;text-align:left; width: 100%"/><br />
           Repeat Password<input type="PASSWORD" name="user_pass_check"style="height:50px;text-align:left;width:100%"/><br />
           E-mail Address<input type="text" name="user_email" style="height:50px;text-align:left;width:100%" /><br />
 <h6><style="color:#fff;display:inline">By clicking "Register", I acknowledge that I have read and agree with the:</h6>
 <h5><a href="termsandconditions.php"><style="color:#fff;display:inline">Terms and Conditions</a></h5>
           <input type="submit" value="Register" style="height:25px;width:100px;background:#fff;color:#000;display:block" /></p>
 </form>';
}

else
{
	$errors = array();
        if(isset($_POST['user_name']))
        {
               if(empty($_POST['user_name']))
               {
               $errors[] = die('The username field must not be empty. Please <a href="signup.php">try again</a>.');
               }
               if(!ctype_alnum($_POST['user_name']))
               {
			$errors[] = 'The username can only contain letters and digits.';
               }
 	       if(strlen($_POST['user_name']) > 30)
               {
                        $errors[] = 'The username cannot be longer than 30 characters.';
               }
        }
 	if(isset($_POST['user_pass']))
        {
               if($_POST['user_pass'] != $_POST['user_pass_check'])
               {
                        $errors[] = 'The two passwords did not match.';
               }
               if(empty($_POST['user_pass']))
               {
                        $errors[] = die('The password field cannot be empty. Please <a href="signup.php">try again</a>.');
               }
        }
        if(isset($_POST['user_email']))
        {
               if(empty($_POST['user_email']))
               {
                        $errors [] = die('The E-Mail Address field must not be empty. Please <a href="signup.php">try again</a>.');
               }
        }
        if(!empty($errors))
        {
                $die;
                echo 'Uh-oh.. a couple of fields are not filled in correctly. Please <a href="signup.php">try again</a>.<br /><br />';
		echo '<ul>';
		foreach($errors as $key => $value)
		{
			echo '<li>' . $value . '</li>';
		}
		echo '</ul>';
	}
        else

        {
                $sql = "INSERT INTO
                        users(user_name, user_pass, user_email ,user_date, user_level)
                        VALUES('" . ($_POST['user_name']) . "',
                        '" . sha1($_POST['user_pass']) . "',
		        '" . mysql_real_escape_string($_POST['user_email']) . "',
	                NOW(),
	                0)";
		$result = mysql_query($sql);
                if(!$result)
                {
                        echo 'The username already exist, please <a href="signup.php">try again</a>.';
                }
                else
                {
			echo 'Succesfully registered. You can now <a href="signin.php">sign in</a> and start posting!';
                }
         }

}
?>

</div>



<?php
include 'footer.php';
?>
