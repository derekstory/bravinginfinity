<?php
include 'connect.php';
include 'header.php';
?>

<h1 align="center" style="background:#000;color:#fff;margin-top:70px;margin-bottom:-92px;width:100%;height:50px;padding-top:20px">Today's Most Popular</h1>
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

$sql = "SELECT * FROM `post` ORDER BY `post_views` DESC LIMIT 0, 20";

$result = mysql_query($sql);
$post_id = mysql_insert_id();
while($row = mysql_fetch_assoc($result))

{
echo           '<tbody class="breakloop">
                <tr>
                    <td class="centered">' . $row['post_views'] . '</td>
                    <td class="left"><a href="content.php?id='. $row['post_id'] . '" style ="font-size:1.3em;">' . $row['post_title'] . '</a></td>
                    <td class="centered">' . $row['post_author'] . '</td>
                    <td class="centered">' . $row['post_cat'] . '</td>
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
