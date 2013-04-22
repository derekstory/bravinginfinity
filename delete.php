<?php
include 'connect.php';
include 'header.php';

if($_SESSION['signed_in'] == false)
{
echo '<h1 align="center" style="padding-top: 50px;color:#fff">You must sign-in to delete a listing.</h1>';
}
else
{
$sql = "DELETE FROM
                        `post`
        WHERE
                        post_id = " . mysql_real_escape_string($_GET['id']). " && post_author = '" . $_SESSION['user_name'] . "'
        OR
                        post_id = " . mysql_real_escape_string($_GET['id']). " && '" . $_SESSION['user_name'] . "' = 'admin'";

$result = mysql_query($sql);

        {
        echo '<h1 align="center" style="padding-top: 50px;color:#fff">Your topic has been deleted.</h1>';

        }
}
include 'footer.php';
?>
