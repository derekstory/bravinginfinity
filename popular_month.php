<?php
include 'connect.php';
include 'header.php';
?>


<h1 align="center" style="color:#fff; margin-top: 40px; width:100%;height:50px">Most Popular: Last 30 Days</h1>
<h6 align="center" style="color:#fff; margin-top:-25px; margin-bottom:30px;height: 25px">-<a href="popular.php" class="popular" style="color:#C9C9C9">24 Hours</a>-<a href="popular_month.php" class="popular" style="color:#C9C9C9">30 Days</a>-<a href="popular_alltime.php" class="popular" style="color:#C9C9C9">All Time</a>-</h6>


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

$("#content").load("popularmonth_loadmore.php");
$("#loadmore").live("click", function(){
var next = page+=1;

$.get("popularmonth_loadmore.php?page="+next, function(data){
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
  <div style="width: 200px; margin-left: auto; margin-right: auto"><input id="loadmore" type="button" value="Load More"> <input id="pages" type="hidden" value="'.$total_pages.'"></div>';
?>
?>

<?php
include 'footer.php';
?>
