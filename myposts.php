<?php
include 'connect.php';
include 'header.php';

if($_SESSION['signed_in'] == false)

{
	echo '<h3 style="color:#fff;margin-left:50px">You must be signed in to see your profile. Would you like to <a href="signin.php">sign-in</a>?</h3>
              <h4 style="color:#fff; margin-left: 50px">Not a member yet? <a href="signup.php">Register</a> a new account for free!</h4>';
}
else
{
$sql = "SELECT * FROM post WHERE post_author = '" . $_SESSION['user_name'] . "'";
$result = mysql_query($sql);
$count = mysql_num_rows($result);


if($count < 1)
   {
	echo '<h3 style="color:#fff; margin-left:50px">You have not posted anything yet. Get started <a href="post.php">now</a>!</h3>';
   }
   else
   {


         while($row = mysql_fetch_assoc($result))
        {
        $views = $row["post_views"];
        $title = $row["post_title"];
        $author = $row["post_author"];
        $category = $row["post_cat"];
        $replies = $row["post_replytotal"];
        $support = $row["post_supporters"];
        $date = $row["post_date"];
        $id = $row["post_id"];
        $userid = $row["user_id"];
        $replies = mysql_query("SELECT * FROM `replies` WHERE replies_postid = ".$id."");
        $repliestotal = (mysql_num_rows($replies));

        echo '<div class="toc">
                   <h2 align=:left" style="color: #fff; display: inline"><a href="content.php?id='. $id . ' " class="register" style="color:#fff">'. $title .'</a></h2>
                          <br></br>
                   <h3 align=:left" style="color: #C9E4FF; font-size: 1.3em; display: inline">' . $category . '</h3>
                   <h3 style="color: #FFFDC9; font-size: 1.5em; margin-top: 0; display: inline;float: right">V'. $views .' - R'. $repliestotal .' - S' . $support . '</h3>
<br></br>
                   <h3 align="left" style="color: #FFF; font-size: 1.3em; display: inline">by <a href="profile.php?id='. $userid . ' " class="register" style="color:#F59A9A">'. $author .'</a></h3>
                   <h3 style="color: #fff; font-size: 1.3em; margin-top: 0;display: inline;float: right">'. $date .'</h3>

                        <hr style="width:100%; border-color:rgba(255,255,255,.1);margin-top: 20px"</hr>
        </div>';
        }
   }
}
?>

<?php
include 'footer.php';
?>
