<?php
ob_start();
include 'connect.php';
include 'header.php';
?>
     <div id="signin">
     <h1 style="color:#fff;margin-top:200px">-Sign-In-</h1>

<?php
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
        echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
}
else
{
	if($_SERVER['REQUEST_METHOD'] != 'POST')
        {
                echo '<form method="post" action="">
                      User Name: <input type="text" name="user_name" style="height:50px;text-align:left; width:100%; font-size: 1.3em; background: rgba(255,255,255,.05); color: #fff; border: none; outline: none" /><br />
                      Password: <input type="password" name="user_pass" style="height:50px;text-align:left; width: 100%; font-size: 1.3em;background: rgba(255,255,255,.05); color: #fff; border: none; outline: none"/><br />
                      <input type="submit" value="Sign-In" id="submit"/><br />
                      <h4 style="color:#fff">Not a member yet? <a href="signup.php" class="register" style="color: #5870D1">Register</a> a new account for free!</h4>
                </form>';
        }
        else
	{
		$errors = array();

		if(empty($_POST['user_name']))
		{
			$errors[] = die('The username field must not be empty. Please <a href="signin.php" class="register" style="color: #5870D1">try again</a>.');
		}

		if(empty($_POST['user_pass']))
		{
			$errors[] = die('The password field must not be empty. Please <a href="signin.php" class="register" style="color: #5870D1">try again</a>.');
		}
		if(!empty($errors))
		{
			$die;
                        echo 'Uh-oh.. a couple of fields are not filled in correctly. Please <a href="signin.php" class="register" style="color: #5870D1">try again</a>.<br /><br />';
			echo '<ul>';
			foreach($errors as $key => $value)
			{
				echo '<li>' . $value . '</li>';
			}
			echo '</ul>';
		}
		else
		{
			$sql = "SELECT
						user_id,
						user_name,
						user_level
					FROM
						users
					WHERE
						user_name = '" . mysql_real_escape_string($_POST['user_name']) . "'
					AND
						user_pass = '" . sha1($_POST['user_pass']) . "'";

			$result = mysql_query($sql);
			if(!$result)
			{
				echo 'Something went wrong while signing in. Please try again later.';
			}
			else
			{
				if(mysql_num_rows($result) == 0)
				{
					echo 'You have supplied a wrong user/password combination.  Please <a href="signin.php" class="register" style="color: #5870D1">try again</a>.<br /><br />';
				}
				else
				{
					$_SESSION['signed_in'] = true;

					while($row = mysql_fetch_assoc($result))
					{
						$_SESSION['user_id'] 	= $row['user_id'];
						$_SESSION['user_name'] 	= $row['user_name'];
						$_SESSION['user_level'] = $row['user_level'];
					}
                                        header('location:index.php');
				}
			}
		}
	}

}

?>


</div>
<?php
ob_end_flush();
include 'footer.php';
?>
