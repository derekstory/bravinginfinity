<!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Ideas and implementations to change the world." />
    <title>BravingInfinity Beta</title>
    <link rel="icon" type="image/png" href="/Style/images/favicon.png" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Style/table.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Style/master.css" />
     <script type="text/javascript">
        // Fallback for CDN jQueryUI CSS, jQuery, jQueryUI
        if (typeof jQuery == 'undefined') {
            document.write(unescape('%3Clink rel="stylesheet" type="text/css"\
                href="/static/css/jquery-ui.css" /%3E'));
            document.write(unescape("%3Cscript src='/static/js/jquery.min.js' type='text/javascript'%3E%3C/script%3E"));
            document.write(unescape("%3Cscript src='/static/js/jquery-ui.min.js' type='text/javascript'%3E%3C/script%3E"));
        }
    </script>
    <script src="/static/js/breakloop.js"></script>

</head>
<body>
  <div id="wrapper">

 <div class="signin">
  </div>

<div id="logo">
   <a href="index.php"><img width="300px" src="/Style/images/header.png"/></a>
     <form method="get" action="/search" id="search">
       <input name="q" type="text" placeholder="Search Keywords..." />
     </form>
</div>
</div>



<?php


{
echo   '<div id="menu">
        <ul>
            <li><a href="post.php">New Post</a></li>
            <li><a href="popular.php">Popular</a></li>
            <li><a href="myposts.php">My Posts</a></li>
            <li><a href="myprofile.php">My Profile</a>
            <li><a href="following.php">Following</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="concept.php">Concept</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="http://facebook.com"><img width="20px" src="/Style/images/facebook.png" style="border:0;margin-top:0px;width:20"/></a></li>
            <li><a href="https://twitter.com/bravinginfinity"><img width="20px" src="/Style/images/twitter.png" style="border:0;margin-top:0px;width:20"/></a></li>
                </ul>';
            {
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
                                echo      '<h6 align="right" style="width:30%;margin-top:-37px; margin-left:auto;margin-right:40px">Welcome <a href="myprofile.php" class="register"> ' . $_SESSION['user_name'] . ' </a> Not you? <a href="signout.php" class="register">Sign out.</a></h6>
                                <br style="clear: left" />';
                                }
                                else
                                {
                                echo      '<h4 align="right" style="width:30%;margin-top:-37px; margin-left:auto;margin-right:40px"><a href="signin.php" class="register">Sign-In</a> or <a href="signup.php" class="register">Register</a></h4>
                                <br style="clear: left" />';
                                }
              }
}
?>
</div>


