<?php
include 'connect.php';
?>

<div id="contenttable">
        <table class="width-100 bordered" id="list">
            <thead class="thead-black">
                <tr class="breakloop">
<th class= "text-centered">Views</th>
                    <th class= "text-centered">Title</th>
                    <th class= "text-centered">Author</th>
                    <th class= "text-centered">Category</th>
                    <th class= "text-centered">Thoughts</th>
                    <th class= "text-centered">Encouragers</th>
                    <th class= "text-centered">Date</th>
                </tr>

<?php

if($_GET["page"]){
    $pagenum = $_GET["page"];
} else {
    $pagenum = 1;
}

$rowsperpage = 20;
$offset = ($pagenum - 1) * $rowsperpage;


$q = mysql_query("SELECT * FROM `post`,`users` WHERE post_author = user_name ORDER BY `post_date` DESC LIMIT $offset, $rowsperpage");

$total_q = mysql_query("SELECT * FROM `post`");
$total_nums = mysql_num_rows($total_q);
$total_pages = ceil($total_nums/$rowsperpage);

if($pagenum>=1&&$pagenum<=$total_pages)
{
    while($r=mysql_fetch_array($q))
    {
        $views = $r["post_views"];
        $title = $r["post_title"];
        $author = $r["post_author"];
        $category = $r["post_cat"];
        $replies = $r["post_replytotal"];
        $support = $r["post_supporters"];
        $date = $r["post_date"];
        $id = $r["post_id"];
        $userid = $r["user_id"];


echo           '<tbody class="breakloop">

                <tr>
                    <td class="centered" style="width: 20px">' . $views . '</td>
                    <td class="left" style="width: 40%"><a href="content.php?id='. $id . ' "class="tablelink" style="color:#C4D7FF">' . $title . '</a></td>
                    <td class="centered" style="width:125px"><a href="profile.php?id='. $userid . ' "class="tablelink" style="color:#FCFFDB; font-size:1em">' . $author . '</a></td>
                    <td class="centered" style="width:150px"><a href="category.php?id='. $category . ' "class="tablelink" style="color:#FFA8A8; font-size:1em">' . $category . '</a></td>
                    <td class="centered" style="width: 88px">' . $replies . '</td>
                    <td class="centered" style="width: 20px">' . $support . '</td>
                    <td class="centered" style="width: 150px">' . $date . '</td>
               </tr>';
    }
}

?>

 </tbody>
        </table>
