<?php
include 'connect.php';
include 'header.php';
?>

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

$sql = "SELECT * FROM `post` ORDER BY `post_date` DESC LIMIT 0, 20 ";

$result = mysql_query($sql);

while($row = mysql_fetch_assoc($result))
{
echo           '<tbody class="breakloop">

                <tr>
                    <td class="centered">' . $row['post_views'] . '</td>
                    <td class="centered">' . $row['post_title'] . '</td>
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
<?php
include 'footer.php';
?>
