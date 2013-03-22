<?php
include 'connect.php';
include 'header.php';
?>

<h1 align="center" style="background:#000;color:#fff;margin-top:70px;;width:100%;height:50px;padding-top:20px">Most Popular: Today</h1>
<h6 align="center" style="background:#000;color:#fff; margin-top:-25px; margin-bottom:-92px;height: 25px">-<a href="popular.php" class="popular" style="color:#C9C9C9">Today</a>-<a href="popular_month.php" class="popular" style="color:#C9C9C9">Month</a>-<a href="popular_alltime.php" class="popular" style="color:#C9C9C9">All Time</a>-</h6>

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

$sql = "SELECT * FROM `post` WHERE post_date > DATE_SUB(NOW(), INTERVAL 24 HOUR) ORDER BY `post_views` DESC LIMIT 0, 20";

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
