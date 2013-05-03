<?php
include 'connect.php';
include 'header.php';
if($_SESSION['signed_in'] == false)
{
	echo '<h3 style="color:#fff; margin-left:50px; margin-top: 100px">You must be signed in to create a new post. Would you like to <a href="signin.php" class="register" style="color: #5870D1">sign-in</a>?</h3>
        <h4 style="color:#fff; margin-left: 50px">Not a member yet? <a href="signup.php" class="register" style="color: #5870D1">Register</a> a new account for free!</h4>';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        echo'<div id="contentpost">
        <form method="post" action="">
        <h1 align="center" style="color:#fff">Start a new goal.</h1>
         <div class="headerarea">
             <h6 align="Left" style="color:#fff; display: inline">Header</h6>
             <h7 align="Left" style="color:#fff">Limited to 55 characters. Be creative.</h7>
             <textarea name="post_title" maxLength="55" ></textarea>
         </div>';

        echo '<div class="postarea">
           <h6 align="Left" style="color:#fff;display:inline">Content</h6>
           <h7 align="Left" style="color:#fff">No character limit. Keep it smart. Keep it elegant.</h7>
           <textarea name="post_content"></textarea>
       </div>';

       echo '<h6 align="Left" style="color:#fff; display: inline; padding-top:20px">Category</h6>
         <select name="post_cat">
            <option></option>
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
            <option></option>
            <option>Reason One</option>
            <option>Reason Two</option>
            <option>Reason Three</option>
            <option>Reason Four</option>
            <option>Reason Five</option>
            <option>Reason Six</option>
            <option>Reason Seven</option>
         </select>';

      echo '<h6 align="Left" style="color:#fff; display: block; padding-left:0px">Keywords/Tags</h6>
        <textarea name="post_keywords" maxLength="40" style="height:20px;width:40%;display:inline;background:rgba(255,255,255,.1);color:#fff;border-style:none;border-color:transparent;resize:none; outline: none"></textarea>';

      echo '<div class="submit">
         <input type="submit" value="Submit" id="submit" /></p>
</form>';
echo '</div>';
}
else
{
        if($_SESSION['signed_in'] == false)
        {
            echo '<h2 style="color:#fff; margin-left: 50px; margin-top: 100px">You must <a href="signin.php" class="register" style="color: #5870D1"> sign in</a> to post a new topic.</h2>';
        }
        else
        {
        $errors = array();
            if(mysql_num_rows($q) != 0)
            {
                echo '<h4 style="color:#fff; margin-left: 50px; margin-top: 100px">A post with this title already exist. <a href="post.php" class="register" style="color: #5870D1">Try again</a> with all of the fields filled in.</h4>';
                $errors[] = die;
            }
            if(empty($_POST['post_title']))
            {
                echo '<h4 style="color:#fff; margin-left: 50px; margin-top: 100px">You must enter the title of your post in the header area. <a href="post.php" class="register" style="color: #5870D1">Try again</a> with all of the fields filled in.</h4>';
                $errors[] = die;
            }
            if(strlen($_POST['post_title']) > 55)
            {
                echo '<h4 style="color:#fff; margin-left: 50px; margin-top: 100px">The header area can only contain 55 characters.<a href="post.php" class="register" style="color: #5870D1">Try again</a></h4>';
                $errors[] = die;
            }
            if(empty($_POST['post_content']))
            {
                echo '<h4 style="color:#fff; margin-left: 50px; margin-top: 100px">You must fill out the content section. <a href="post.php" class="register" style="color: #5870D1">Try again</a> with all of the fields filled in.</h4>';
                $errors[] = die;
            }
            if(strlen($_POST['post_content']) < 200)
            {
                echo '<h4 style="color:#fff; margin-left: 50px; margin-top: 100px">The content section must contain at least 200 characters. <a href="post.php" class="register" style="color: #5870D1">Try again</a> and put some more thought into it!</h4>';
                $errors[] = die;
            }
            if(empty($_POST['post_cat']))
            {
                echo '<h4 style="color:#fff; margin-left: 50px; margin-top: 100px">You must choose a category from the dropdown menu. <a href="post.php" class="register" style="color: #5870D1">Try again</a> with all of the fields filled in.</h4>';
                $errors[] = die;
            }
            if(empty($_POST['post_reason']))
            {
                echo '<h4 style="color:#fff; margin-left: 50px; margin-top: 100px">You must choose a reason for posting from the dropdown menu. <a href="post.php" class="register" style="color: #5870D1">Try again</a> with all of the fields filled in.</h4>';
                $errors[] = die;
            }
            if(strlen($_POST['post_keywords']) > 40)
            {
                echo '<h4 style="color:#fff; margin-left: 50px; margin-top: 100px">You can only have 40 characters in the keywords section. Choose them carefully. <a href="post.php" class="register" style="color: #5870D1">Try again</a></h4>';
                $errors[] = die;
            }
            else
            {
			$sql = "INSERT INTO
						      post(post_title,
                                                           post_content,
							   post_cat,
							   post_reason,
                                                           post_keywords,
                                                           post_author,
                                                           post_views,
                                                           post_supporters,
                                                           post_replytotal)
				   VALUES('" . mysql_real_escape_string($_POST['post_title']) . "',
							   '" . mysql_real_escape_string($_POST['post_content']) . "',
							   '" . mysql_real_escape_string($_POST['post_cat']) . "',
                                                           '" . mysql_real_escape_string($_POST['post_reason']) . "',
                                                           '" . mysql_real_escape_string($_POST['post_keywords']) . "',
							   '" . $_SESSION['user_name'] . "',
							   0,
                                                           0,
                                                           0)";
			$result = mysql_query($sql);
			if(!$result)
			{
                                echo '<h4 align="center" style="color:#fff; margin-top: 100px">An error has occured. <a href="post.php" class="register" style="color: #5870D1">Please try again</a></h4>';
			}
                        else
                        {
                                $post_id = mysql_insert_id();
                                $sql = "COMMIT";
		               	$result = mysql_query($sql);

				echo '<h4 align="center" style="color:#fff; margin-top: 100px">You have succesfully created <a href="content.php?id='. $post_id . '" class="register" style="color: #5870D1">your new topic.</a></h4>.';
			}
              }
        }
    }
}
include 'footer.php';
?>
