<!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Ideas and implementations to change the world." />
    <title>BravingInfinity Beta</title>
    <link rel="icon" type="image/png" href="/Style/images/favicon.png" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Style/table.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Style/master.css" />
</head>

<body>
  <div class="wrapper">

<div id="fixedhead2">

  <div id="menu">
        <ul>

            <li><a href="post.php">New Post</a></li>
            <li><a href="popular.php">Popular</a></li>
            <li><a href="myposts.php">My Posts</a></li>
            <li><a href="myprofile.php">My Profile</a></li>
            <li><a href="http://facebook.com" id="social"><img width="20px" src="/Style/images/facebook.png" style="border:0;margin-top:0px"/></a></li>
            <li><a href="https://twitter.com/bravinginfinity" id="social"><img width="20px" src="/Style/images/twitter.png" style="border:0;margin-top:0px"/></a></li>
       </ul>
  </div>

  <div id="tinymenu">
        <ul>
            <li><a href="post.php">New Post</a></li>
            <li><a href="popular.php">Popular</a></li>
            <li><a href="myposts.php">My Posts</a></li>
            <li><a href="myprofile.php">My Profile</a></li>
       </ul>
  </div>


<?php
 			$sql = "SELECT
						user_id,
						user_name,
						user_level
					FROM
						users
					WHERE
						user_name = '" . ($_SESSION['user_name']) . "'";

			$result = mysql_query($sql);
                        if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
                                {
                                echo      '<h6 align="right" id="barsignin">Welcome <a href="myprofile.php" class="register" style="color:#9CA4FF"> ' . $_SESSION['user_name'] . ' </a> Not you? <a href="signout.php" class="register" style="color:#9CA4FF">Sign out.</a></h6>
                                <br style="clear: left" />
                                <h6 align="left" id="barsignin2">Welcome <a href="myprofile.php" class="register" style="color:#9CA4FF"> ' . $_SESSION['user_name'] . ' </a> Not you? <a href="signout.php" class="register" style="color:#9CA4FF">Sign out.</a></h6>
                                <br style="clear: left" />';
                                }
                                else
                                {
                                echo      '<h4 align="right" id="barsignin"><a href="signin.php" class="register" style="color:#9CA4FF">Sign-In</a> or <a href="signup.php" class="register" style="color: #9CA4FF">Register</a></h4>
                                <br style="clear: left" />
                                <h4 align="left" id="barsignin2"><a href="signin.php" class="register" style="color:#9CA4FF">Sign-In</a> or <a href="signup.php" class="register" style="color: #9CA4FF">Register</a></h4>
                                <br style="clear: left" />';
}
?>

</div>













