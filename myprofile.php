<?php
include 'connect.php';
include 'header.php';
?>
<script type="text/javascript" src="/Scripts/jquery.js"></script>


<?php
if($_SESSION['signed_in'] == false)
{
	echo '<h3 style="color:#fff; margin-left:50px">You must be signed in to see posts you have made. Would you like to <a href="signin.php">sign-in</a>?</h3>
        <h4 style="color:#fff; margin-left: 50px">Not a member yet? <a href="signup.php">Register</a> a new account for free!</h4>';
}
else
{
$sql = "SELECT * FROM users WHERE user_name = '" . $_SESSION['user_name'] . "'";
$result = mysql_query($sql);

        while($row = mysql_fetch_assoc($result))
        {
        echo '<div id="profileheader">
            <h1 align="left" id="authorname" style="display:block">'. $row['user_name'] .'</h1>
            <h4 align="left" style="display;block;margin-top:-10px">Rating: '. $row[user_rating] .'</h4>
            <h5 align="left" style="display;block;margin-top:-10px">Member since: ' . $row['user_date'] .'</h5>
            </div>
            <hr style="width:100%;margin-top:30px;margin-bottom:0px"></hr>';
        }
}
?>
<?php
if($_SESSION['signed_in'] == true)
{
echo    '<div id="profileheader" style="margin-top: 15px">
        <input id="authored" type="button" value="Posts Authored" style="display: inline" onclick="fade(profileactivity, this)"/>
        <input id ="authored" type="button" value="Replies Authored" style="display: inline" onclick="fade(profileactivity2, this)"/>
               <input id="authored" type="button" value="Support Given" style="display: inline" onclick="fade(profileactivity3, this)"/>
               <input id="authored" type="button" value="Statistics" style="display: inline" onclick="fade(profileactivity4, this)"/>
         </div>';
}
?>

<div id="profileactivity">

<?php

$sql = "SELECT * FROM post WHERE post_author = '" . $_SESSION['user_name'] . "'";
$posttitle = mysql_query("SELECT post_title FROM `post` WHERE post_author = '" . $_SESSION['user_name'] . "'");
$postnum = mysql_num_rows($posttitle);
$result = mysql_query($sql);
if($_SESSION['signed_in'] == false)
{
$die;
}
else
if($postnum < 1)
{
        echo '<h1 align="left" style="display:block; font-size: 3.2em">You have not authored any orginal posts.</h1>';
}
        else
        echo    '<h1 align="left" style="display:block; font-size: 3.2em">Posts Authored</h1>';
{
        while($row = mysql_fetch_assoc($result))
        {
        echo    '<h5 align="left" style="display:block;margin-top:20p"><a href="content.php?id='. $row['post_id'] . ' "class="register" style="color:#567ABA">' . $row['post_title'] . '</a></h5>
         <h5 align="left" style="display:block;margin-top:-10px">'. $row['post_date'] .'</h3>';
        }
}
?>
</div>

<div id="profileactivity2" class="hidden">

<?php
$sql = "SELECT * FROM post WHERE post_author = '" . $_SESSION['user_name'] . "'";
$posttitle = mysql_query("SELECT post_title FROM `post` WHERE post_author = '" . $_SESSION['user_name'] . "'");
$postnum = mysql_num_rows($posttitle);
$result = mysql_query($sql);
if($postnum < 1)
{
        echo '<h1 align="left" style="display:block; font-size: 3.2em">You have not authored any replies.</h1>';
}
        else
        echo '<h1 align="left" style="display:block; font-size: 3.2em">Posts Authored</h1>';
{
        while($row = mysql_fetch_assoc($result))
        {
        echo '<h5 align="left" style="display:block;margin-top:20p"><a href="content.php?id='. $row['post_id'] . ' "class="register" style="color:#A6D690">' . $row['post_title'] . '</a></h5>
             <h5 align="left" style="display:block;margin-top:-10px">'. $row['post_date'] .'</h3>';
        }
}
?>
</div>

<div id="profileactivity3" class="hidden">

<?php
$sql = "SELECT * FROM post WHERE post_author = '" . $_SESSION['user_name'] . "'";
$posttitle = mysql_query("SELECT post_title FROM `post` WHERE post_author = '" . $_SESSION['user_name'] . "'");
$postnum = mysql_num_rows($posttitle);
$result = mysql_query($sql);
if($postnum < 1)
{
        echo '<h1 align="left" style="display:block; font-size: 3.2em">You have not offered any support to other users.</h1>';
}
        else
        echo '<h1 align="left" style="display:block; font-size: 3.2em">Posts Authored</h1>';
{
        while($row = mysql_fetch_assoc($result))
        {
        echo '<h5 align="left" style="display:block;margin-top:20p"><a href="content.php?id='. $row['post_id'] . ' "class="register" style="color:#E88080">' . $row['post_title'] . '</a></h5>
             <h5 align="left" style="display:block;margin-top:-10px">'. $row['post_date'] .'</h3>';
        }
}
?>
</div>

<div id="profileactivity4" class="hidden">

<?php
if($_SESSION['signed_in'] == true)
{
echo   '<h1 align="left" style="color:#fff">Statistics</h1>
        <h3 align="Left" style="color:#fff; display:block; margin-top:20px">Posts Authored</>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">New Posts Authored: 10</h6>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Support Received: 67</h6>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Replies Received: 34</h6>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Total Views: 430</h6>
        <h3 align="Left" style="color:#fff; display:block; margin-top:20px">Replies Authored</>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Total: 89</h6>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Encouragement: 13</h6>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Research: 2</h6>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Implementation: 0</h6>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Networking: 0</h6>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Curiosity/Other: 14</h6>
        <h3 align="Left" style="color:#fff; display:block; margin-top:20px">Other Community Stats</>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Supported Others: 50</h6>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Achievements: 90</h6>
          <h6 align="Left" style="color:#fff; display:block; margin-top:-5px">Accused of Spam or Abuse: 0</h6>';
}
?>
</div>
<SCRIPT>
function fade(div_id, button)
{
	if(button.value == 'Posts Authored'){
       		$('#profileactivity2').hide('slow');
       		$('#profileactivity').show('slow');
       		$('#profileactivity3').hide('slow');
       		$('#profileactivity4').hide('slow');
                }
	if(button.value == 'Replies Authored'){
       		$('#profileactivity').hide('slow');
       		$('#profileactivity2').show('slow');
       		$('#profileactivity3').hide('slow');
       		$('#profilesactivity4').hide('slow');
                }
	if(button.value == 'Support Given'){
       		$('#profileactivity3').show('slow');
       		$('#profileactivity2').hide('slow');
       		$('#profileactivity').hide('slow');
       		$('#profileactivity4').hide('slow');
                }
	if(button.value == 'Statistics'){
       		$('#profileactivity2').hide('slow');
       		$('#profileactivity').hide('slow');
       		$('#profileactivity3').hide('slow');
       		$('#profileactivity4').show('slow');
                }
}
</SCRIPT>

<?php
include 'footer.php';
?>
