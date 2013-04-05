<?php
include 'connect.php';
?>

<div id="contenttable">
        <table class="width-100 bordered" id="list">
            <thead class="thead-black">
                <tr class="breakloop">
                </tr>

<?php
if($_GET["page"]){
    $pagenum = $_GET["page"];
} else {
    $pagenum = 1;
}

$rowsperpage = 20;
$offset = ($pagenum - 1) * $rowsperpage;

$q = mysql_query("SELECT * FROM `post`,`users` WHERE post_author = user_name AND post_date >= now() - INTERVAL 30 DAY ORDER BY `post_views` DESC LIMIT $offset, $rowsperpage");

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
              <td class="centered">V' . $views . ' - R' .$replies. ' - S' . $support . '</td>
              <td class="left" style="width: 750px">
                  <a href="content.php?id='. $id . ' "class="tablelink" style="color:#FFF; font-size: 1.4em; display: inline; margin-bottom:10px">' . $title . '</a>
                  <a href="category.php?id='. $category . ' "class="tablelink" style="color:#FFA8A8; font-size:.8em">' . $category . '</a>
                  <a href="profile.php?id='. $userid . ' "class="tablelink" style="color:#FCFFDB; font-size:1.2em; margin-right: 0px; display: block">' . $author . '</a>
                  <div style="font-size: .8em, display: inline">' .$date . '</div>
              </td>

              </tr>';

    }
}

?>

 </tbody>
        </table>
