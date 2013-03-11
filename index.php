<?php
include 'connect.php';
include 'header.php';
?>

   <div id="content">
        <table class="width-100 bordered" id="list">
            <thead class="thead-black">
                <tr class="breakloop">
                    <th class= "text-centered">Goal</th>
                    <th class= "text-centered">Author</th>
                    <th class= "text-centered">Views</th>
                    <th class= "text-centered">Thoughts</th>
                    <th class= "text-centered">Encouragers</th>
                    <th class= "text-centered">Date</th>
                </tr>
            </thread>

<?php

$sql = "SELECT * FROM `toc` LIMIT 0, 30 ";


$result = mysql_query($sql);

while($row = mysql_fetch_assoc($result))
{
echo           '<tbody class="breakloop">

                <tr>
                    <td class="centered">' . $row['toc_title'] . '</td>
                    <td class="centered">' . $row['toc_author'] . '</td>
                    <td class="centered">Views</td>
                    <td class="centered">' . $row['toc_cat'] . '</td>
                    <td class="centered">8</td>
                    <td class="centered">' . $row['toc_date'] . '</td>
               </tr>';
}
?>

        </tbody>
        </table>
<?php
include 'footer.php';
?>
