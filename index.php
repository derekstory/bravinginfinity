<?php
include 'connect.php';
include 'header.php'
?>

<h5 align="center" style="background:#000;color:#fff;margin-top:75px;margin-bottom:0px;width:100%;height:28px;padding-top:20px">Add some form of site description or tag-line here.</h5>

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
      <input id="loadmore" type="button" value="Load More"> <input id="pages" type="hidden" value="'.$total_pages.'">';
?>

<?php
include 'footer.php';
?>
