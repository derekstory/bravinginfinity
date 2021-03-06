<!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Ideas and implementations to change the world." />
    <title>BravingInfinity Beta</title>
    <link rel="icon" type="image/png" href="/Style/images/favicon.png" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Style/table.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/Style/master.css" />
    <link rel="stylesheet" type="text/css" href="/CssDropDown/Menu1/dropMenu.css">
</head>

<body>
  <div class="wrapper">


<ul id="nav" class="drop">
<form>

  <li style="background: rgba(0,0,0,0)">
   <span id='SrchBox'>
    <input id='mnuSrch' type='text' placeholder="Search for images, users and people..." style="color: #fff">
    <input type='image' src='../../images/MagnifyingGlassClear.png' style="background: #919191; border-right: 2px solid #222; border-top: 2px solid #222;border-bottom: 2px solid #222;border-left: 1px solid rgba(0,0,0,.25)"/>
   </span>
  </li>

  <li>
    <span>
      <a href="#">
        <img id="logo" src='/Style/images/header2.png' height="40px" style="margin-top: -15px">
      </a>
    </span>
  </li>


 <li class="menudrops" style="border-right: 1px solid #000">
   <span>Browse</span>
     <img src='../../images/arrow_white.png'>
       <ul>
         <li class="dir"><a href="popular.php">Most Views</a>
           <ul>
             <li><a href="popular.php">Today</a></li>
             <li><a href="popular_month.php">30 Days</a></li>
             <li><a href="popular_alltime.php">All Time</a></li>
           </ul>
         </li>
         <li><a href="#">Most Support</a>
           <ul>
             <li><a href="support.php">Today</a></li>
             <li><a href="support_month.php">30 Days</a></li>
             <li><a href="support_alltime.php">All Time</a></li>
           </ul>
       </li>
         <li><a href="#">Users</a>
           <ul>
             <li><a href="users_rating.php">High Rating</a></li>
             <li><a href="users_name.php">By Name</a></li>
           </ul>
       </li>
    </ul>
  </li>

  <li>
    <span>
      <a href="#">
        <img width="20px" src="/Style/images/facebook.png" style="border:0;margin-top:0px"/>
      </a>
    </span>
  </li>

  <li>
    <span>
      <a href="#">
        <img width="20px" src="/Style/images/twitter.png" style="border:0;margin-top:0px"/>
      </a>
    </span>
  </li>

 <div id="rightmenu" style="float:right">

 <li class="menudrops" id="newpost"><a href="post.php">New Post</a></li>



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
               echo '<li style="margin-right: 20px; margin-top: 0px; margin-bottom: 0px;" class="menudrops">
               <span>
                   <div style="float: left; display: inline"><p style="margin-left: 10px; margin-right: 5px;; color: #fff; display: inline; font-family: courier, monsospace">' . $_SESSION['user_name'] . '</p></div>
                   <img src="../../images/arrow_white.png">
                 </span>';

                echo ' <ul style="margin-top: 3px; width: 100px">
                   <li><a href="myprofile.php">Profile</a></li>
                   <li><a href="settings.php">Settings</a></li>
                   <li><a href="signout.php">Sign Out</a></li>
                 </ul>
               </li>';
               }
               else
               {
               echo '<li style="margin-right: 20px; margin-top: 0px; margin-bottom: 0px;" class="menudrops">
               <span>
                   <div style="float: left; display: inline"><p style="margin-left: 10px; margin-right: 5px;; color: #fff; display: inline; font-family: courier, monsospace">Sign-in / Register</p></div>
                   <img src="../../images/arrow_white.png">
                 </span>';

                echo ' <ul style="margin-top: 3px; width: 200px">
                   <li><a href="signin.php">Sign-In</a></li>
                   <li><a href="signup.php">Register</a></li>
                 </ul>
               </li>';
               }
?>









 </div>
</ul>
</div>

</form>
