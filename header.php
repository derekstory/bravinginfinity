<!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Ideas and implementations to change the world." />
    <title>BravingInfinity Beta</title>
    <link rel="icon" type="image/png" href="/Style/images/favicon.png" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Style/table.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Style/master.css" />
    <script src="/static/js/breakloop.js"></script>
</head>
<body>
  <div class="wrapper">

<div id="fixedhead2">

</div>


<div id ="fixedhead">



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
                                echo      '<h6 align="right" style="margin-top:-41px; color:#ffffff">Welcome <a href="myprofile.php" class="register" style="color:#9CA4FF"> ' . $_SESSION['user_name'] . ' </a> Not you? <a href="signout.php" class="register" style="color:#9CA4FF">Sign out.</a></h6>
                                <br style="clear: left" />';
                                }
                                else
                                {
                                echo      '<h4 align="right" style="margin-top: -41px; color:#ffffff"><a href="signin.php" class="register" style="color:#9CA4FF">Sign-In</a> or <a href="signup.php" class="register" style="color: #9CA4FF">Register</a></h4>
                                <br style="clear: left" />';
}
?>
<div style="width: 900px; margin-left: auto; margin-right: auto; margin-top: -15px"><a href="index.php"><img width="500px" src="/Style/images/header2.png" style="width: 900px; margin-left: auto, margin-right: auto"/></a></div>
<hr style="width:60%"></hr>

</div>
<div id="menu">
        <ul>
            <li><a href="post.php" style="font-size: 1.3em">New Post</a></li>
            <li><a href="popular.php" style="font-size: 1.3em">Popular</a></li>
            <li><a href="myposts.php" style="font-size: 1.3em" >My Posts</a></li>
            <li><a href="myprofile.php" style="font-size: 1.3em">My Profile</a>
            <li><a href="concept.php" style="font-size: 1.3em">Concept</a></li>
            <li><a href="faq.php" style="font-size: 1.3em">FAQ</a></li>
            <li><a href="http://facebook.com"><img width="20px" src="/Style/images/facebook.png" style="border:0;margin-top:0px;width:20"/></a></li>
            <li><a href="https://twitter.com/bravinginfinity"><img width="20px" src="/Style/images/twitter.png" style="border:0;margin-top:0px;width:20"/></a></li>
       </ul>
</div>




<form method="get" action="/search" id="search">
       <input name="q" type="text" placeholder="Search Keywords..." />
     </form>






