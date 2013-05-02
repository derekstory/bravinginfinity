<?php
include 'connect.php';
include 'header.php';

echo '<a href="index.php"><img src="/Style/images/header2.png" id="logo2"/></a>';

$featured = "SELECT *

         FROM
                   `post`,`users`
         WHERE
                   post_id = 46
         AND
                   post_author = user_name";
$feat = mysql_query($featured);
$featrow = mysql_fetch_assoc($feat);

  echo '<div id="sidebar">
     <h1 style="color: #B5D0FF">Concept</h1>
     <p>Lorem ipsum dolor sit amet, eam ad virtute propriae eloquentiam, no decore soleat legimus sit. Hinc feugait volutpat sed an, pri nobis iracundia ad. Ad sit cibo paulo, ius no paulo eleifend, modo oblique singulis pro cu. Prodesset omittantur ex pri, vix at iudico reprimique. Verear iisque similique quo at, vel te nisl delenit habemus. Suas purto mea an, vim ad nominavi appareat voluptaria. Possit vocent convenire pri ne. Duis brute assueverit has ex.</p>

     <h1 style="color: #B5D0FF">Featured</h1>
     <h6><a href="content.php?id=' . $featrow['post_id'] . ' " class="register" style="color:#FFFBC2">'. $featrow['post_title'] .'</a></h6>
     <h5 style="margin-top: -5px; font-size: 1em">by  <a href="profile.php?id='. $featrow['user_id'] . ' "class="register" style="color:#F59A9A; font-size:1.2em">' . $featrow['post_author'] . '</a></h5>';
     echo nl2br(htmlentities($featrow['post_content']));

     echo '<input id="support" type="button" value="Support">';

  echo '</div>';
?>



<?php
$rowsperpage = 20;
$total_q = mysql_query("SELECT * FROM `post`");
$total_nums = mysql_num_rows($total_q);
$total_pages = ceil($total_nums/$rowsperpage);
?>

<script src="/Scripts/jqueryload.js"></script>
<script>
$(function(){
var page = 1;
var pages = $("#pages").val();

$("#content").load("index_loadmore.php");
$("#loadmore").live("click", function(){
var next = page+=1;

$.get("index_loadmore.php?page="+next, function(data){
if(next==pages){
$("#loadmore").remove();
}
$("#content").append(data);
});
});
});
</script>

<?php

echo '<div id="content"></div>
      <div class="index">
      <div style="width: 200px; margin-left: auto; margin-right: auto"><input id="loadmore" type="button" value="Load More"> <input id="pages" type="hidden" value="'.$total_pages.'"></div>';


?>

<?php
include 'footer.php';
?>
