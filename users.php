<?php
include 'connect.php';
include 'header.php';
?>

<?php
$sql = "SELECT * FROM users";
$result = mysql_query($sql);
$count = mysql_num_rows($result);

echo '<h1 align="center" style="background:#000;color:#fff;margin-top:70px;margin-bottom:0px;xwidth:100%;height:50px;padding-top:20px">Users: ' . $count . '</h1>';
?>


        <div id="contenttable">
             <table class="width-100 bordered" id="list">
               <thead class="thead-black">
                 <tr class="breakloop">
                    <th class= "text-centered">Rating</th>
                    <th class= "text-centered">User Name</th>
                    <th class= "text-centered">Total Posts</th>
                    <th class= "text-centered">Support Received</th>
                    <th class= "text-centered">Member Since</th>
                 </tr>
            </thread>

<?php
$sql = "SELECT * FROM users LIMIT 0, 20";
$result = mysql_query($sql);
        while($row = mysql_fetch_assoc($result))
        {
                echo           '<tbody class="breakloop">

                <tr>
                    <td class="centered">' . $row['user_rating'] . '</td>
                    <td class="centered" style="width:125px"><a href="profile.php?id='. $row['user_id'] . ' "class="tablelink" style="color:#FCFFDB; font-size:1em">' . $row['user_name'] . '</a></td>
                    <td class="centered">' . $row['user_totalposts'] . '</td>
                    <td class="centered">' . $row['user_support'] . '</td>
                    <td class="centered">' . $row['user_date'] . '</td>
               </tr>';
         }
?>





        </tbody>
        </table>
<?php
include 'footer.php';
?>
