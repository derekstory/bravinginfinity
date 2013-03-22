<?php
include 'connect.php';
include 'header.php';
?>


<h5 align="center" style="background:#000;color:#fff;margin-top:75px;margin-bottom:-92px;width:100%;height:28px;padding-top:20px">Add some form of site description or tag-line here.</h5>
   <div id="content">
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
            </thread>

<?php

$sql = "SELECT * FROM `post` ORDER BY `post_date` DESC LIMIT 0, 20";

$result = mysql_query($sql);
$post_id = mysql_insert_id();
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
?>

        </tbody>
        </table>
}

<?php
include 'footer.php';
?>
