<?php
include 'connect.php';
include 'header.php';
?>
<script type="text/javascript" src="/Scripts/jquery.js"></script>

<?php
$sql = "SELECT *

         FROM
                   users
         WHERE
                   user_id = " . mysql_real_escape_string($_GET['id']). "";

$result = mysql_query($sql);
{
while($row = mysql_fetch_assoc($result))
if(!result)
    {
	echo '<h3 style="color:#fff; margin-top:600px; margin-left:50px">Oops! This user does not exist.</h3>
        <h4 style="color:#fff; margin-left: 50px">Want to sign-up with this user name? <a href="signup.php">Register</a> a new account for free!</h4>';
}
else
{

        {
        echo '<div id="profileheader">
             <h1 align="left" id="authorname" style="display:block">'. $row['user_name'] .'</h1>
             <h4 align="left" style="display;block;margin-top:-10px">Rating: '. $row[user_rating] .'</h4>
             <h5 align="left" style="display;block;margin-top:-10px">Member since: ' . $row['user_date'] .'</h5>
             </div>
             <hr style="width:60%;margin-top:30px;margin-bottom:0px"></hr>';
        }
        echo '<div id="profbutton"">
             <input id="authored" type="button" value="Posts Authored" style="display: inline" onclick="fade(profileactivity, this)"/>
             <input id ="authored" type="button" value="Replies Authored" style="display: inline" onclick="fade(profileactivity2, this)"/>
             <input id="authored" type="button" value="Support Given" style="display: inline" onclick="fade(profileactivity3, this)"/>
             <input id="authored" type="button" value="Statistics" style="display: inline" onclick="fade(profileactivity4, this)"/>
             </div>';
       }
}
?>

<div id="profileactivity">

<?php
$sql = "SELECT *

         FROM
                   `users`,`post`
         WHERE
                    user_name = post_author
         AND
                     user_id = " . mysql_real_escape_string($_GET['id']). "";
$posttitle = mysql_query("SELECT post_title FROM `post`,`users` WHERE user_name = post_author AND  user_id = " . mysql_real_escape_string($_GET['id']). "");
$postnum = mysql_num_rows($posttitle);
$result = mysql_query($sql);
if($postnum < 1)
{
        echo '<h1 align="left" style="display:block; font-size: 3.2em">This user has not authored any orginal posts.</h1>';
}
        else
        echo '<h1 align="left" style="display:block; font-size: 3.2em">Posts Authored</h1>';
{
        while($row = mysql_fetch_assoc($result))
        {
        echo    '<h5 align="left" style="display:block;margin-top:20p"><a href="content.php?id='. $row['post_id'] . ' "class="register" style="color:#567ABA">' .   $row['post_title'] . '</a></h5>
                <h5 align="left" style="display:block;margin-top:-10px">'. $row['post_date'] .'</h3>';
        }
}
?>
</div>
<div id="profileactivity2" class="hidden">

<?php

$repliescount = mysql_query("SELECT * FROM `replies`,`users`,`post` WHERE replies_author = user_name AND user_id = " . mysql_real_escape_string($_GET['id']). " AND post_id = replies_postid");
$repliesnum = mysql_num_rows($repliescount);
$resultreplies = mysql_query($sql);
if($repliesnum < 1)
{
        echo    '<h1 align="left" style="display:block; font-size: 3.2em">This user has not authored any replies to other users.</h1>';
}
else
{
        echo    '<h1 align="left" style="display:block; font-size: 3.2em">Replies Authored</h1>';
  {
        while($r = mysql_fetch_assoc($repliescount))
        {
        echo    '<h5 align="left" style="display:block;margin-top:40px; color: #fff">Replied to "<a href="content.php?id='. $r['replies_postid'] . '" class="register" style="color:#B8F5EE">' .   $r['post_title'] . '</a>" by<a style="color:#B8D9F5"> ' . $r['post_author'] . '</a></h5><br>
<div style="dispaly: inline-block; margin-top: -25px; margin-bottom: -25px"><h5 style="display: inline">Contribution:</h5><h5 align="left" style="display:inline; color: #888"> '. $r['replies_contribution'] .'</h5></div>
                 <h5 align="left" style="display:block">'. $r['replies_date'] .'</h5>';
        }
  }
}
?>
</div>

<div id="profileactivity3" class="hidden">

<?php
$sql = "SELECT *

         FROM
                   `users`,`post`
         WHERE
                    user_name = post_author
         AND
                     user_id = " . mysql_real_escape_string($_GET['id']). "";

$posttitle = mysql_query("SELECT post_title FROM `post`,`users` WHERE user_name = post_author AND   user_id = " . mysql_real_escape_string($_GET['id']). "");
$postnum = mysql_num_rows($posttitle);
$result = mysql_query($sql);

if($postnum < 1)
{
        echo    '<h1 align="left" style="display:block; font-size: 3.2em">This user has not offered any support to other users.</h1>';
}
        else
        echo    '<h1 align="left" style="display:block; font-size: 3.2em">Support Given</h1>';
{
        while($row = mysql_fetch_assoc($result))
        {
        echo    '<h5 align="left" style="display:block;margin-top:20p"><a href="content.php?id='. $row['post_id'] . ' "class="register" style="color:#E88080">' .   $row['post_title'] . '</a></h5>
                 <h5 align="left" style="display:block;margin-top:-10px">'. $row['post_date'] .'</h3>';
        }
}
?>
</div>

<div id="profileactivity4" class="hidden">
<?php
$sql = "SELECT *

         FROM
                   `users`,`post`
         WHERE
                    user_name = post_author
         AND
                     user_id = " . mysql_real_escape_string($_GET['id']). "";

$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
{
        echo    '<h1 align="left" style="color:#fff; font-size: 3.2em">Statistics</h1>
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
       		$('#profileactivity4').hide('slow');
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
