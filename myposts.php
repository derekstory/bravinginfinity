<?php
include 'connect.php';
include 'header.php';

if($_SESSION['signed_in'] == false)

{
	echo '<h3 style="color:#fff; margin-top:200px; margin-left:50px">You must be signed in to see post you have made. Would you like to <a href="signin.php">sign-in</a>?</h3>
        <h4 style="color:#fff; margin-left: 50px">Not a member yet? <a href="signup.php">Register</a> a new account for free!</h4>';
}
else
{

$sql = "SELECT * FROM post WHERE post_author = '" . $_SESSION['user_name'] . "' LIMIT 0, 1000";

$result = mysql_query($sql);
$count = mysql_num_rows($result);

if($count < 1)
{
	echo '<h3 style="color:#fff; margin-top:200px; margin-left:50px">You have not posted anything yet. Get started <a href="post.php">now</a>!</h3>';
}
else

{

        echo '<h1 align="center" style="background:#000;color:#fff;margin-top:70px;margin-bottom:0px;xwidth:100%;height:50px;padding-top:20px">My Posts</h1>
             <div id="contenttable">
             <table class="width-100 bordered" id="list">
               <thead class="thead-black">
                 <tr class="breakloop">
                    <th class= "text-centered">Views</th>
                    <th class= "text-centered">Goal</th>
                    <th class= "text-centered">Author</th>
                    <th class= "text-centered">Category</th>
                    <th class= "text-centered">Thoughts</th>
                    <th class= "text-centered">Encouragers</th>
                    <th class= "text-centered">Date</th>
                 </tr>
            </thread>';

        while($row = mysql_fetch_assoc($result))

        {
                echo           '<tbody class="breakloop">

                <tr>
                    <td class="centered">' . $row['post_views'] . '</td>
                    <td class="left"><a href="content.php?id='. $row['post_id'] . ' "class="tablelink" style="color:#C4D7FF">' . $row['post_title'] . '</a></td>
                    <td class="centered"><a href="profile.php?id='. $row['post_author'] . ' "class="tablelink" style="color:#FCFFDB; font-size:1em">' . $row['post_author'] . '</a></td>
                    <td class="centered"><a href="category.php?id='. $row['post_cat'] . ' "class="tablelink" style="color:#FFA8A8; font-size:1em">' . $row['post_cat'] . '</a></td>
                    <td class="centered">' . $row['post_replytotal'] . '</td>
                    <td class="centered">' . $row['post_supporters'] . '</td>
                    <td class="centered">' . $row['post_date'] . '</td>
               </tr>';
         }
   }
}
?>

        </tbody>
        </table>
<?php
include 'footer.php';
?>
