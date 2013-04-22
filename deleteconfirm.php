<?php
include 'connect.php';
include 'header.php';

$sql = "SELECT *

        FROM
                  `post`
        WHERE
                   post_id = " . mysql_real_escape_string($_GET['id']). " && post_author = '" . $_SESSION['user_name'] . "'
        OR
                   post_id = " . mysql_real_escape_string($_GET['id']). " && '" . $_SESSION['user_name'] . "' = 'admin'";

$result = mysql_query($sql);

        if($_SESSION['signed_in'] == true)
        while($row = mysql_fetch_assoc($result))
{
echo '<h1 align="center" style="padding-top: 50px;color:#fff">Are you sure you want to delete this topic?</h1>';
echo '<h1 align="center" style="padding-top: 50px;color:#fff">Yes,<a href="delete.php?id=' . $row['post_id'] . '" class="register"> DELETE this listing.</a></h1>';
}
include 'footer.php';
?>
