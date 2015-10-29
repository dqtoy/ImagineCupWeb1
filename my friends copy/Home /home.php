<?php
include ("./inc/header.inc.php");
echo "Hello", $user;
echo "<br /><br /> Would you Like To Logout? <a href='logout.php'>Logout</a>";
?>
<div class='newsFeed'>
<h2> Your Newsfeed:</h2>
</div>
<?php
$getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to = '$user' ORDER BY id DESC LIMIT 10") or die(mysql_error());
while ($row = mysql_fetch_assoc($getposts)) {
	                   $id = $row['id'];
	                   $body = $row['body'];
	                   $date_added =$row['date_added'];
	                   $added_by = $row['added_by'];
	                   $user_posted_to = $row['user_posted_to'];
                     
                     $get_user_info = mysql_query("SELECT * FROM users WHERE username='$added_by'");
                     $get_info = mysql_fetch_assoc($get_user_info);
                     $profilepic_info = $get_info['profile_pic'];
                     if ($profilepic_info ==""){
                      $profilepic_info ="./img/default_pic.jpg";
                     }
                     else 
                     {
                       $profilepic_info="./userdata/profile_pics/".$profilepic_info;
                     }
                      
                     // Get relvant comments 
                     $get_comments = mysql_query("SELECT * FROM post_comments WHERE post_id='$id' ORDER BY id DESC");
	                  $comment = mysql_fetch_assoc($get_comments); 

                      $comment_body = $comment['post_body'];
                      $posted_to =$comment['posted_to'];
                      $posted_by= $comment['posted_by'];
                      $removed = $comment['post_removed'];
                     ?>
<script language="javascript">
      function toggle<?php echo $id; ?>() {
        var ele = document.getElementById("toggleComment<?php echo $id; ?>");
        var text = document.getElementById("displayComment<?php echo $id; ?>");
        if(ele.style.display == "block"){
          ele.style.display  ="none";
        }
        else
        {
         ele.style.display = "block";
        }
      }
</script>
                      <?php
	                   echo "
	                 <p />
	                 <div class='newsFeedPost'>
	                 <div class='newsFeedPostOptions'>
                    <a href='#' onClick='javascript:toggle$id()'>show commets<a>
                    </div>
                     <div style='float: left;'>
                     <img src='$profilepic_info' height='40'>
                     </div>
	                   <div class='posted_by'><a href= '$added_by'> $added_by</a> posted on proifle </div>
                     <br /><br />
                     <div style =' max-width: 600px;'>
                     $body<br /><br /><p />
                     </div>
                     <div id ='toggleComment$id' style ='display: none;'> 
                     <br />
                     <iframe src='./comment_frame.php?id=$id' frameborder='0' style='max-hieght: 150px; width: 100%; min-height: 10px;'></iframe>
                     </div>
                     <p />
                     </div>
                     <p />
                    "; 

}	                   	                   
?>

