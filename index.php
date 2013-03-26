<?php
include 'connect.php';
include 'header.php'
?>

<h5 align="center" style="background:#000;color:#fff;margin-top:75px;margin-bottom:0px;width:100%;height:28px;padding-top:20px">Add some form of site description or tag-line here.</h5>
<div id="contenttable">



</div>

<?php
$rowsperpage = 6; //MAXIMUM RESULTS PER PAGE
$total_q = mysql_query("SELECT * FROM `post`"); //FOR ALL RESULTS
$total_nums = mysql_num_rows($total_q); //TOTAL NUMBER OF RESULTS
$total_pages = ceil($total_nums/$rowsperpage); //NUMBER OF PAGE FOR RESULTS
?>



<html>
<head>


<script src="http://wcetdesigns.com/assets/javascript/jquery.js"></script>
<script>
$(function(){
var page = 1;
var pages = $("#pages").val(); //TOTAL NUMBER OF PAGES

$("#content").load("index_loadmore.php");
//WHEN THE 'LOAD MORE' BUTTON IS PRESSED
$("#loadmore").live("click", function(){
var next = page+=1;

$.get("index_loadmore.php?page="+next, function(data){
if(next==pages){
$("#loadmore").remove(); //IF ALL PAGES ARE LOADED, THE BUTTON WILL BE REMOVED
}
$("#content").append(data); //LOADS THE NEW PAGE OF CONTENT UNDER THE REST
});
});
});
</script>
<style>
#loadmore {
background: #ffffff;
border: 1px #32baed solid;
color: #32baed;
font: 100% Century Gothic;
font-size: 14px;
}
#loadmore:hover {
background: #32baed;
border: 1px #12495d solid;
color: #ffffff;
cursor: pointer;
font: 100% Century Gothic;
font-size: 14px;
}
#loadmore:active {
background: #12495d;
border: 1px #12495d solid;
color: #ffffff;
font: 100% Century Gothic;
font-size: 14px;
}
</style>
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
