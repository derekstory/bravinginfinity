<?php
include 'connect.php';
include 'header.php';


if($_SESSION['signed_in'] == false)
{
	echo '<h3 style="color:#fff; margin-left:50px">You must be signed in to edit posts you have made. Would you like to <a href="signin.php">sign-in</a>?</h3>
        <h4 style="color:#fff; margin-left: 50px">Not a member yet? <a href="signup.php">Register</a> a new account for free! And quit trying to edit posts that are not yours!</h4>';
}
else
{
$post_title = $_POST["post_title"];
$sql =            "SELECT *

                  FROM
                       `post`
                  WHERE
                        post_id = " . mysql_real_escape_string($_GET['id']). " && '" . $_SESSION['user_name'] . "' = post_author
                  OR
                        post_id = " . mysql_real_escape_string($_GET['id']). " && '" . $_SESSION['user_name'] . "' = 'admin'";

$q = mysql_query($sql);


if($_SERVER['REQUEST_METHOD'] != 'POST' && $_SESSION['signed_in'] == true)
while($row = mysql_fetch_assoc($q))
  {
        echo'<div id="contentpost">
        <form method="post" action="">
        <h1 align="center" style="color:#fff">Edit your post.</h1>
         <div class="headerarea">
             <h6 align="Left" style="color:#fff; display: inline">Header</h6>
             <h7 align="Left" style="color:#fff">Limited to 55 characters. Be creative.</h7>
             <textarea name="post_title" maxLength="55"">' . $row['post_title'] . '</textarea>
         </div>';

        echo '<div class="postarea">
           <h6 align="Left" style="color:#fff;display:inline">Content</h6>
           <h7 align="Left" style="color:#fff">No character limit. Keep it smart. Keep it elegant.</h7>
           <textarea name="post_content">' . $row['post_content'] . '</textarea>
       </div>';

       echo '<h6 align="Left" style="color:#fff; display: inline; padding-top:20px">Category</h6>
         <select name="post_cat">
            <option>' . $row['post_cat'] . '</option>
            <option>Category One</option>
            <option>Category Two</option>
            <option>Category Three</option>
            <option>Category Four</option>
            <option>Category Five</option>
            <option>Category Six</option>
            <option>Category Seven</option>
         </select>';

      echo '<h6 align="Left" style="color:#fff; display: inline; padding-left:30px;margin-top:100px">Reason</h6>
         <select name="post_reason" style="display:inline">
            <option>' . $row['post_reason'] . '</option>
            <option>Reason One</option>
            <option>Reason Two</option>
            <option>Reason Three</option>
            <option>Reason Four</option>
            <option>Reason Five</option>
            <option>Reason Six</option>
            <option>Reason Seven</option>
         </select>';

      echo '<h6 align="Left" style="color:#fff; display: block; padding-left:0px">Keywords/Tags</h6>
        <textarea name="post_keywords" maxLength="40" style="height:20px;width:40%;display:inline;background:rgba(255,255,255,.1);color:#fff;border-style:none;border-color:transparent;resize:none">' . $row['post_keywords'] . '</textarea>';

      echo '<div class="submit">
         <input type="submit" value="Submit" style="height:25px;width:100px;background:rgba(255,255,255,.9);margin-top: 60px;color:#001D73; display:block;margin-left:0px" /></p>
</form>';
echo '</div>';
}
else
{

        {
            $errors = array();
            if(empty($_POST['post_title']))
            {
                echo '<h4 style="color:#fff; margin-left: 50px">You must enter the title of your post in the header area. <a href="edit.php?id=' . mysql_real_escape_string($_GET['id']). '">Try again</a> with all of the fields filled in.</h4>';
                $errors[] = die;
            }
            if(strlen($_POST['post_title']) > 55)
            {
                echo '<h4 style="color:#fff; margin-left: 50px">The header area can only contain 55 characters.<a href="edit.php?id=' . mysql_real_escape_string($_GET['id']). '">Try again</a></h4>';
                $errors[] = die;
            }
            if(empty($_POST['post_content']))
            {
                echo '<h4 style="color:#fff; margin-left: 50px">You must fill out the content section. <a href="edit.php?id=' . mysql_real_escape_string($_GET['id']). '">Try again</a> with all of the fields filled in.</h4>';
                $errors[] = die;
            }
            if(strlen($_POST['post_content']) < 200)
            {
                echo '<h4 style="color:#fff; margin-left: 50px">The content section must contain at least 200 characters. <a href="edit.php?id=' . mysql_real_escape_string($_GET['id']). '">Try again</a> and put some more thought into it!</h4>';
                $errors[] = die;
            }
            if(empty($_POST['post_cat']))
            {
                echo '<h4 style="color:#fff; margin-left: 50px">You must choose a category from the dropdown menu. <a href="edit.php?id=' . mysql_real_escape_string($_GET['id']). '">Try again</a> with all of the fields filled in.</h4>';
                $errors[] = die;
            }
            if(empty($_POST['post_reason']))
            {
                echo '<h4 style="color:#fff; margin-left: 50px">You must choose a reason for posting from the dropdown menu. <a href="edit.php?id=' . mysql_real_escape_string($_GET['id']). '">Try again</a> with all of the fields filled in.</h4>';
                $errors[] = die;
            }
            if(strlen($_POST['post_keywords']) > 40)
            {
                echo '<h4 style="color:#fff; margin-left: 50px">You can only have 40 characters in the keywords section. Choose them carefully. <a href="edit.php?id=' . mysql_real_escape_string($_GET['id']). '">Try again</a></h4>';
                $errors[] = die;
            }
            else
            {
			$editsql = "UPDATE
						           post
                                    SET
                                                           post_title ='" . mysql_real_escape_string($_POST['post_title']) . "',
                                                           post_content = '" . mysql_real_escape_string($_POST['post_content']) . "',
							   post_cat =  '" . mysql_real_escape_string($_POST['post_cat']) . "',
							   post_reason =  '" . mysql_real_escape_string($_POST['post_reason']) . "',
                                                           post_keywords =  '" . mysql_real_escape_string($_POST['post_keywords']) . "'
                                    WHERE
                                                           post_id = " . mysql_real_escape_string($_GET['id']). "";


			$editresult = mysql_query($editsql);
			if(!$editresult)
			{
                                echo '<h4 align="center" style="color:#fff">An error has occured. <a href="post.php">Please try again</a></h4>';
			}
                        else
                        {
                                $post_id = mysql_insert_id();
                                $editsql = "COMMIT";
		               	$editresult = mysql_query($editsql);

				echo '<h4 align="center" style="color:#fff">You have succesfully edited <a href="content.php?id=' . mysql_real_escape_string($_GET['id']). '">your topic.</a></h4>.';
			}
              }
        }
  }
}

include 'footer.php';
?>
