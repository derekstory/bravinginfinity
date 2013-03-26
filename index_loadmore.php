<?php
include 'connect.php';
?>

<div id="contenttable">
        <table class="width-100 bordered" id="list">
            <thead class="thead-black">
                <tr class="breakloop">
<th class= "text-centered" style="min-width:150px; max-width:10%">Views</th>
                    <th class= "text-centered" style="width:40%">Title</th>
                    <th class= "text-centered" style="width: 15%">Author</th>
                    <th class= "text-centered" style="width: 12%">Category</th>
                    <th class= "text-centered" style="width: px">Thoughts</th>
                    <th class= "text-centered">Encouragers</th>
                    <th class= "text-centered">Date</th>
                </tr>


<?php

if($_GET["page"]){
    $pagenum = $_GET["page"];
} else {
    $pagenum = 1;
}

$rowsperpage = 6;
$offset = ($pagenum - 1) * $rowsperpage;

//FOR RESULTS OF THE PAGE
$q = mysql_query("SELECT * FROM `post` ORDER BY `post_date` DESC LIMIT $offset, $rowsperpage");

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

echo           '<tbody class="breakloop">

                <tr>
                    <td class="centered" style="min-width:150px">' . $views . '</td>
                    <td class="left" style="width: 40%"><a href="content.php?id='. $id . ' "class="tablelink" style="color:#C4D7FF">' . $title . '</a></td>
                    <td class="centered" style="width:15%"><a href="profile.php?id='. $author . ' "class="tablelink" style="color:#FCFFDB; font-size:1em">' . $author . '</a></td>
                    <td class="centered" style="width: 12%"><a href="category.php?id='. $category . ' "class="tablelink" style="color:#FFA8A8; font-size:1em">' . $category . '</a></td>
                    <td class="centered" style="width: 88px">' . $replies . '</td>
                    <td class="centered" style="width: 272px">' . $support . '</td>
                    <td class="centered">' . $date . '</td>
               </tr>';
    }
}

?>

 </tbody>
        </table>
