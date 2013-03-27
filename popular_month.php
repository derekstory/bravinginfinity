<?php
include 'connect.php';
include 'header.php';
?>

<h1 align="center" style="background:#000;color:#fff;margin-top:70px;;width:100%;height:50px;padding-top:20px">Most Popular: Today</h1>
<h6 align="center" style="background:#000;color:#fff; margin-top:-25px; margin-bottom:-0px;height: 25px">-<a href="popular.php" class="popular" style="color:#C9C9C9">Today</a>-<a href="popular_month.php" class="popular" style="color:#C9C9C9">Month</a>-<a href="popular_alltime.php" class="popular" style="color:#C9C9C9">All Time</a>-</h6>

<?php
$rowsperpage = 10;
$total_q = mysql_query("SELECT * FROM `post`");
$total_nums = mysql_num_rows($total_q);
$total_pages = ceil($total_nums/$rowsperpage);
?>

<html>
<head>

<script src="http://wcetdesigns.com/assets/javascript/jquery.js"></script>
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

</head>
<body>
<?php

echo '<div id="content"></div>
<input id="loadmore" type="button" value="Load More"> <input id="pages" type="hidden" value="'.$total_pages.'">';

?>

 </tbody>
        </table>


<?php
include 'footer.php';
?>
