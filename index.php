<?php
include 'connect.php';
include 'header.php';
?>

   <div id="content">
        <table class="width-100 bordered" id="list">
            <thead class="thead-black">
                <tr class="breakloop">
                    <th class= "text-centered">ID</th>
                    <th class= "text-centered">The Loop</th>
                    <th class= "text-centered">Category</th>
                    <th class= "text-centered">Author</th>
                    <th class= "text-centered">Thoughts</th>
                    <th class= "text-centered">Breakers</th>
                    <th class= "text-centered">Date</th>
                </tr>
            </thread>

<?php

$sql = "SELECT * FROM users, posts LIMIT 0, 20 ";

$result = mysql_query($sql);

while($row = mysql_fetch_assoc($result))
{
echo           '<tbody class="breakloop">

                <tr>
                    <td class="centered">
                        <a href="/vdoc/download/00000993">
                        <a href="/vdoc/edit/00000993">00000993</a>
                    </td>
                    <td>' . $row['post_title'] . '</td>
                    <td class="centered">Politics</td>
                        <a href="/vdoc/category/edit/"></a>
                    <td class="centered">' . $row['user_name'] . '</td>
                    </td>
                    <td class="centered">24</td>
                    <td class="centered">8</td>
                    <td class="centered">' . $row['post_date'] . '</td>
               </tr>';
}
?>

        </tbody>
        </table>
<?php
include 'footer.php';
?>
