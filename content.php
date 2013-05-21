<?php
include 'connect.php';
include 'header.php';
?>

<?php
$sql = "UPDATE post SET post_views = post_views +1
         WHERE post_id = " . mysql_real_escape_string($_GET['id']). "
         AND post_author != '" . ($_SESSION['user_name']) . "'";
$result = mysql_query($sql);

$editsql = "SELECT * FROM `post` , `users` WHERE post_id = " . mysql_real_escape_string($_GET['id']). " && '" . $_SESSION['user_name'] . "' = post_author OR post_id = " . mysql_real_escape_string($_GET['id']). " && '" . $_SESSION['user_name'] . "' = 'admin'";

$editresult = mysql_query($editsql);

        $row = mysql_fetch_assoc($editresult);
        if(mysql_num_rows($editresult) > 0)
        {
               echo '<div style="margin-bottom: -30px; margin-right: 200px">
                     <h3 align="right""><a href="edit.php?id=' . $row['post_id'] . '" style="color: #577DC2"class="register">EDIT this post.</a></h1>
                     <h3 align="right"><a href="deleteconfirm.php?id=' . $row['post_id'] . '" style="color: #577DC2" class="register">DELETE this post.</a></h1>
                     </div>';
        }
$sql2 = "SELECT *

         FROM
                   `post`,`users`
         WHERE
                   post_id = " . mysql_real_escape_string($_GET['id']). "
         AND
                   post_author = user_name";

$result2 = mysql_query($sql2);
{
        while($row = mysql_fetch_assoc($result2))

        if(!$result2)
     {
        echo '<h1 style="color:#000, margin-top: 600px">The topic could not be displayed, please try again later.</h1>';
     }
     else
     {
        echo '<div id="posthead">
                   <h1 align="left">' . $row["post_title"] . '</h1>
              </div>
              <div id="postauth">
                  <h6 align="left">Author: <a href="profile.php?id='. $row['user_id'] . ' "class="register" style="color:#567ABA; font-size:1em">' . $row['post_author'] . '</a></h6>
              </div>
              <div id="postdate">
                  <h6 align="left">' . $row['post_date'] . '</h6>
              </div>
        </div>

<div id="postresult">';
        echo nl2br(htmlentities($row['post_content']));

    echo '<div sytle="display: inline-block"';
    {
    if (isset($_POST['post_supporters_x']))
         {
         $sqlsupport =  "UPDATE `post`,`users` SET post_supporters = post_supporters +1 WHERE post_id  = " . mysql_real_escape_string($_GET['id']). "";
         $supportresult = mysql_query($sqlsupport);
         }
    }

     echo '<a href="content.php?id=' . $row["post_id"] . '#community" title="Reply" ><img id="communitybutton" style="margin-left: 10px" src="/Style/images/reply.png"></a>';
echo '<form method="post" onsubmit="onSave();return false;">
        <input type="image" name="post_supporters" title="Mark as Abuse or Spam" id="communitybutton" style="margin-left: 10px" src="/Style/images/support.png"/>
     </form>
  </div>
</div>

  <br></br>';
        echo '<hr style="width:80%"></hr>

        <div id="contentreply">
                <h1 align="left" id ="community" style="color:#fff">Community</h1>

                 <div class="reply">
                     <div style="margin-bottom: 20px">
                         <h6 align="Left" style="color:#fff; display: inline; margin-top: -25px">Views: ' . $row['post_views'] . '</h6>
                         <h6 align="Left" style="color:#fff; display: inline; margin-bottom: 30px;margin-left:10px;margin-top:-10px">Supporters: ' .    $row['post_supporters'] . ' </h6>
                     </div>
                <div>

                     <h6 align="Left" style="color:#fff; display: inline">Reply</h6>
                     <h7 align="Left" style="color:#fff; display: inline">Bring something new to the table.</h7>
        </div>';
        }
}

if($_SERVER['REQUEST_METHOD'] != 'POST')
{

     echo '<form method="post" action="content.php?id=' . mysql_real_escape_string($_GET['id']). '#community">
     <textarea name="replies_content" maxLength="2000" style="outline: none"></textarea>
     </div>

          <h6 align="Left" style="color:#fff; display: inline">Contribution</h6>
          <select name="replies_contribution" style="display:inline">
          <option>General</option>
          <option>Research</option>
          <option>Encouragement</option>
          <option>Implementation</option>
          <option>Question</option>
     </select>';
   {
   if($_SESSION['signed_in'] == false)
                {
            echo '<h4 style="color:#fff">You must <a href="signin.php" class="register" style="color: #5870D1"> sign in</a> to post a new topic.</h4>';
                }
   }
   echo '<input type="submit" class="button" value="Post Reply" style="font-size: 1em"/>
     </form>';
}
else
{
                if($_SESSION['signed_in'] == false)
                {
                      echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=content.php?id=' . mysql_real_escape_string($_GET['id']). '"';
                }
                else
                {
                $errors = array();
                if(empty($_POST['replies_content']))
                  {
                      echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=content.php?id=' . mysql_real_escape_string($_GET['id']). '"';
                  }
                  else
                  {
                  $replies = "INSERT INTO
                                                          replies(replies_author,
                                                                  replies_postid,
                                                                  replies_content,
                                                                  replies_contribution,
                                                                  replies_rating)
                              VALUES(                             '" . $_SESSION['user_name'] . "',
                                                                  '" . mysql_real_escape_string($_GET['id']). "',
                                                                  '" . mysql_real_escape_string($_POST['replies_content']) ."',
                                                                  '" . mysql_real_escape_string($_POST['replies_contribution']) ."',
                                                                  0)";
                   $repliesresult = mysql_query($replies);
                   if(!$repliesresult)
                      {
                         echo '<h4 align="center" style="color:#fff">An error has occured. <a href="content.php?id=">Please try again</a></h4>';
                      }
                      else
                      {
                      $replies_postid = mysql_insert_id();
                      $replies = "COMMIT";
                      $repliesresult = mysql_query($replies);
                      echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=content.php?id=' . mysql_real_escape_string($_GET['id']). '">';
                      }
                   }

                }
}
?>

<?php
$comments = "SELECT * FROM `replies`,`users` WHERE replies_postid =  " . mysql_real_escape_string($_GET['id']). " AND replies_author = user_name ORDER BY replies_date DESC LIMIT 0, 1000";

$res = mysql_query($comments);
$total = mysql_num_rows($res);
echo '<h3 align="Left" id="replies" style="color:#fff; display: block;margin-top:30px">Replies ('.$total.')</h3>';
{
     if($total < 1)
     {
        echo '<h1 style="color:#fff">There are currently no comments for this topic.</h1>';
     }
     else
     while($row = mysql_fetch_assoc($res))
     {
     $contribution = $row['replies_contribution'];

         if($contribution == 'General')
         {
      echo '<h5 align="Left" style="color:#fff; display:inline"><a href="profile.php?id='. $row['user_id'] . ' " class="register" style="color:#F59A9A">' . $row['replies_author'] .'</a></h5>
      <h7 align="Left" style="color:#C7EEFF; display: inline">' . $row['replies_contribution'] . '</h7>
      <h6 align="Left" style="color:#fff; display: block;margin-top:0px">' . $row['replies_date'] . '</h6>';
      echo '<div style="color:#C7EEFF; margin-bottom: 30px">';
            echo nl2br(htmlentities($row['replies_content']));
      echo '</div>';
         }
         if($contribution == 'Research')
         {
      echo '<h5 align="Left" style="color:#fff; display:inline"><a href="profile.php?id='. $row['user_id'] . ' " class="register" style="color:#F59A9A">' . $row['replies_author'] .'</a></h5>
      <h7 align="Left" style="color:#E2C7FF; display: inline">' . $row['replies_contribution'] . '</h7>
      <h6 align="Left" style="color:#fff; display: block;margin-top:0px">' . $row['replies_date'] . '</h6>';
      echo '<div style="color:#E2C7FF; margin-bottom: 30px">';
            echo nl2br(htmlentities($row['replies_content']));
      echo '</div>';
         }
         if($contribution == 'Encouragement')
         {
      echo '<h5 align="Left" style="color:#fff; display:inline"><a href="profile.php?id='. $row['user_id'] . ' " class="register" style="color:#F59A9A">' . $row['replies_author'] .'</a></h5>
      <h7 align="Left" style="color:#FFC7D5; display: inline">' . $row['replies_contribution'] . '</h7>
      <h6 align="Left" style="color:#fff; display: block;margin-top:0px">' . $row['replies_date'] . '</h6>';
      echo '<div style="color:#FFC7D5; margin-bottom: 30px">';
            echo nl2br(htmlentities($row['replies_content']));
      echo '</div>';
         }
         if($contribution == 'Implementation')
         {
      echo '<h5 align="Left" style="color:#fff; display:inline"><a href="profile.php?id='. $row['user_id'] . ' " class="register" style="color:#F59A9A">' . $row['replies_author'] .'</a></h5>
      <h7 align="Left" style="color:#C7FFC7; display: inline">' . $row['replies_contribution'] . '</h7>
      <h6 align="Left" style="color:#fff; display: block;margin-top:0px">' . $row['replies_date'] . '</h6>';
      echo '<div style="color:#C7FFC7; margin-bottom: 30px">';
            echo nl2br(htmlentities($row['replies_content']));
      echo '</div>';
         }
         if($contribution == 'Question')
         {
      echo '<h5 align="Left" style="color:#fff; display:inline"><a href="profile.php?id='. $row['user_id'] . ' " class="register" style="color:#F59A9A">' . $row['replies_author'] .'</a></h5>
      <h7 align="Left" style="color:#F8FFC7; display: inline">' . $row['replies_contribution'] . '</h7>
      <h6 align="Left" style="color:#fff; display: block;margin-top:0px">' . $row['replies_date'] . '</h6>';
      echo '<div style="color:#F8FFC7; margin-bottom: 30px">';
            echo nl2br(htmlentities($row['replies_content']));
      echo '</div>';
         }
     }
}
?>

<?php
include 'footer.php';
?>
