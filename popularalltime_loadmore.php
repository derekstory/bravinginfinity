<?php
include 'connect.php';

if($_GET["page"]){
    $pagenum = $_GET["page"];
} else {
    $pagenum = 1;
}
$rowsperpage = 20;
$offset = ($pagenum - 1) * $rowsperpage;

$q = mysql_query("SELECT * FROM `post`,`users` WHERE post_author = user_name ORDER BY `post_views` DESC LIMIT $offset, $rowsperpage");

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
        $replies = mysql_query("SELECT * FROM `replies` WHERE replies_postid = ".$id."");
        $repliestotal = (mysql_num_rows($replies));

        echo '<div class="toc">
                   <h2 align=:left" style="color: #fff; display: inline"><a href="content.php?id='. $id . ' " class="register" style="color:#fff">'. $title .'</a></h2>
                          <br></br>
                   <h3 align=:left" style="color: #C9E4FF; font-size: 1.3em; display: inline">' . $category . '</h3>
                   <h3 style="color: #FFFDC9; font-size: 1.5em; margin-top: 0; display: inline;float: right">V'. $views .' - R'. $repliestotal .' - S' . $support . '</h3>
<br></br>
                   <h3 align="left" style="color: #FFF; font-size: 1.3em; display: inline">by <a href="profile.php?id='. $userid . ' " class="register" style="color:#F59A9A">'. $author .'</a></h3>
                   <h3 style="color: #fff; font-size: 1.3em; margin-top: 0;display: inline;float: right">'. $date .'</h3>

                        <hr style="width:100%; border-color:rgba(255,255,255,.1);margin-top: 20px"</hr>
        </div>';
    }
}

?>
