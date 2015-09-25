<?php 
include ("./inc/connect.inc.php"); 
session_start();
if(!isset($_SESSION["user_login"])) {
 $user = "";
}
else
{
       $user = $_SESSION["user_login"];
}
?>
<?php
        $get_unread_query = mysql_query("SELECT opened FROM pvt_messages WHERE user_to='$user' && opened='no' ");
        $get_unread= mysql_fetch_assoc($get_unread_query);
        $unread_numrows = mysql_num_rows($get_unread_query);
        $unread_numrows = "(".$unread_numrows.")";
        ?>
<!doctype html>
<html>
     <head>
         <title>myfriends</title>
         <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <script src="./js/main.js" type="text/javascript"></script>
     </head>
     <body>
         <div class= "headerMenu">
            <div id="wrapper">
                <div class="logo">
                  <img src="./img/find_friends_logo.png" />
                </div>
                <div class= "search_box">
                     <form action ="search.php" method="GET" id= "search">
                        <input type="text" name="q" size="60" placeholder= "Search..." />
                    </form>
                </div>
                <?php
                 if (!$user) {
                echo '<div id ="menu">
                    <a href="#" ./>Home</a>
                    <a href="#" ./>About</a>
                    <a href="#" ./>Sign Up</a>
                    <a href="#" ./>Sign In</a>
                </div>';
            } else {
                echo '<div id ="menu">
                    <a href="home.php" ./>Home</a>
                    <a href="'.$user.'" ./>Profile</a>
                    <a href="account_settings.php" ./>Settings</a>
                    <a href="my_messages.php" ./>message '.$unread_numrows. '</a>
                    <a href="#" ./>Sign Up</a>
                    <a href="logout.php" ./>Sign out</a>
                    </div>';
            }
                ?>
            </div>
            <div id="wrapper">
            <br />
            <br />
            <br />
            <br />
            <br />