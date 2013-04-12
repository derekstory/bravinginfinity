<?php
include 'connect.php';
include 'header.php';

$sql = "UPDATE post SET post_views = post_views +1
         WHERE post_id = " . mysql_real_escape_string($_GET['id']). "
         AND post_author != '" . ($_SESSION['user_name']) . "'";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
?>
<?php

$sql = "SELECT *

         FROM
                   `post`,`users`
         WHERE
                   post_id = " . mysql_real_escape_string($_GET['id']). "
         AND
                   post_author = user_name";

$result = mysql_query($sql);
{
        while($row = mysql_fetch_assoc($result))

        if(!$result)
     {
        echo '<h1 style="color:#000, margin-top: 600px">The topic could not be displayed, please try again later.</h1>';
     }
     else
     {
        echo '<div id="posthead">
                   <h1 align="left">' . $row["post_title"] . '</h1>
              </div>';

        echo '<div id="postauth">
                  <h6 align="left">Author: <a href="profile.php?id='. $row['user_id'] . ' "class="tablelink" style="color:#567ABA; font-size:1em">' . $row['post_author'] . '</a></h6>
              </div>';

        echo '<div id="postdate">
                  <h6 align="left">' . $row['post_date'] . '</h6>
              </div>';

        echo '<div id="postresult">';
        echo nl2br(htmlentities($row['post_content']));
        echo '</div>';

        echo '<form>
                <hr style="width:80%; margin-top:30px"></hr>
             <div id="contentreply">
                <h1 align="left" style="color:#fff">Community</h1>

             <div class="reply">
                  <h6 align="Left" style="color:#fff; display: block; margin-left: 210px;margin-top:-50px">Views: ' . $row['post_views'] . '</h6>
                  <h6 align="Left" style="color:#fff; display: block;margin-top: -5px; margin-bottom: 30px;margin-left:210px;margin-top:-10px">Supporters: ' .    $row['post_supporters'] . ' </h6>
                  <h6 align="Left" style="color:#fff; display: inline">Reply</h6>
                  <h7 align="Left" style="color:#fff">Bring something new to the table.</h7>';
    }
}
?>
                 <textarea id="txt"></textarea>
        </div>

        <h6 align="Left" style="color:#fff; display: inline">Contribution</h6>
             <select style="display:inline">
             <option>Reason One</option>
             <option>Reason Two</option>
             <option>Reason Three</option>
             <option>Reason Four</option>
             <option>Reason Five</option>
             <option>Reason Six</option>
             <option>Reason Seven</option>
        </select>

        <div class="submit">
             <p class="submit"><input type="submit" value="Submit" style="height:25px;width:100px;background:rgba(255,255,255,.9);margin-top: 20px;color:#001D73; display:block;margin-left:0px"/></p>
        </form>

        <h3 align="Left" style="color:#fff; display: block;margin-top:30px">Replies (4)</h3>
             <h5 align="Left" style="color:#fff; display:inline">jerry.seinfield</h5>
                 <h7 align="Left" style="color:#FFA8A8; display: inline">Encourager</h7>
                 <h6 align="Left" style="color:#fff; display: block;margin-top:0px">2/28/12</h6>
                     <p style="color:#FFA8A8">Lorem ipsum dolor sit amet, soluta facilisis eam ei, at essent petentium nec. Veniam tantas oporteat duo et, pro ad libris vocibus reprehendunt. Alterum impedit intellegat duo ad. Elit delenit mel no. Ut mea democritum definitionem, cu prima quando recteque nam. Quod veniam ornatus nec cu, ne ius delenit contentiones.</p>

                     <p style="color:#FFA8A8">Eu cetero tractatos persecuti vel, velit possim ornatus per te. Ex pri nibh aperiri euripidis, te ius prima fuisset mnesarchum. Qui no molestie rationibus omittantur. Lorem tritani accusam his ei, per eu doming nusquam sapientem, quo ei tollit consulatu interpretaris. Usu ullum virtute meliore id, postea incorrupte scribentur sed ut, pri cu etiam urbanitas.</p>


             <h5 align="Left" style="color:#fff; display: inline">johnnybravo</h5>
                 <h7 align="Left" style="color:#A8B0FF; display: inline">Researcher</h7>
                 <h6 align="Left" style="color:#fff; display: block;margin-top:0px">2/28/12</h6>
                     <p style="color:#A8B0FF">Eu cetero tractatos persecuti vel, velit possim ornatus per te. Ex pri nibh aperiri euripidis, te ius prima fuisset mnesarchum. Qui no molestie rationibus omittantur. Lorem tritani accusam his ei, per eu doming nusquam sapientem, quo ei tollit consulatu interpretaris. Usu ullum virtute meliore id, postea incorrupte scribentur sed ut, pri cu etiam urbanitas.</p>

             <h5 align="Left" style="color:#fff; display:inline">jerry.seinfield</h5>
                 <h7 align="Left" style="color:#FFA8A8; display: inline">Encourager</h7>
                     <h6 align="Left" style="color:#fff; display: block;margin-top:0px">2/28/12</h6>
                     <p style="color:#FFA8A8">Lorem ipsum dolor sit amet, soluta facilisis eam ei, at essent petentium nec. Veniam tantas oporteat duo et, pro ad libris vocibus reprehendunt. Alterum impedit intellegat duo ad. Elit delenit mel no. Ut mea democritum definitionem, cu prima quando recteque nam. Quod veniam ornatus nec cu, ne ius delenit contentiones.</p>

<p style="color:#FFA8A8">Eu cetero tractatos persecuti vel, velit possim ornatus per te. Ex pri nibh aperiri euripidis, te ius prima fuisset mnesarchum. Qui no molestie rationibus omittantur. Lorem tritani accusam his ei, per eu doming nusquam sapientem, quo ei tollit consulatu interpretaris. Usu ullum virtute meliore id, postea incorrupte scribentur sed ut, pri cu etiam urbanitas.</p>


             <h5 align="Left" style="color:#fff; display: inline">johnnybravo</h5>
                 <h7 align="Left" style="color:#A8B0FF; display: inline">Researcher</h7>
                 <h6 align="Left" style="color:#fff; display: block;margin-top:0px">2/28/12</h6>
                     <p style="color:#A8B0FF">Eu cetero tractatos persecuti vel, velit possim ornatus per te. Ex pri nibh aperiri euripidis, te ius prima fuisset mnesarchum. Qui no molestie rationibus omittantur. Lorem tritani accusam his ei, per eu doming nusquam sapientem, quo ei tollit consulatu interpretaris. Usu ullum virtute meliore id, postea incorrupte scribentur sed ut, pri cu etiam urbanitas.</p>



           </form>



       </div>



<?php
include 'footer.php';
?>
