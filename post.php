<?php
include 'connect.php';
include 'header.php';
?>


<div id="contentpost">

<form>
<h1 align="center" style="color:#fff">Start a new goal.</h1>
<div class="headerarea">
  <h6 align="Left" style="color:#fff; display: inline">Header</h6>
  <h7 align="Left" style="color:#fff">Limited to 55 characters. Be creative.</h7>
     <textarea maxLength="55" id="txt"></textarea>
</div>

<div class="postarea">
  <h6 align="Left" style="color:#fff;display:inline">Content</h6>
  <h7 align="Left" style="color:#fff">No character limit. Keep it smart. Keep it elegant.</h7>
      <textarea></textarea>
</div>

<h6 align="Left" style="color:#fff; display: inline; padding-top:20px">Category</h6>
  <select>
    <option>Category One</option>
    <option>Category Two</option>
    <option>Category Three</option>
    <option>Category Four</option>
    <option>Category Five</option>
    <option>Category Six</option>
    <option>Category Seven</option>
  </select>

<h6 align="Left" style="color:#fff; display: inline; padding-left:30px;margin-top:100px">Reason</h6>
  <select style="display:inline">
    <option>Reason One</option>
    <option>Reason Two</option>
    <option>Reason Three</option>
    <option>Reason Four</option>
    <option>Reason Five</option>
    <option>Reason Six</option>
    <option>Reason Seven</option>
  </select>

<h6 align="Left" style="color:#fff; display: block; padding-left:0px">Keywords/Tags</h6>
    <textarea maxLength="40" style="height:20px;width:40%;display:inline;background:rgba(255,255,255,.1);color:#fff;border-style:none;border-color:transparent;resize:none"></textarea>




  <div class="submit">
   <p class="submit"><input type="submit" value="Submit" style="height:25px;width:100px;background:rgba(255,255,255,.9);margin-top: 60px;color:#001D73; display:block;margin-left:0px"/></p>

</form>
</div>
</div>


</div>

<?php
include 'footer.php';
?>
