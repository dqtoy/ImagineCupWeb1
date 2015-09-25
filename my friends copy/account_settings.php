<?php
 include ("./inc/header.inc.php");
 if ($user) {
 }
 else {
 	die ("you must be logged in");
 }
?>
<?php
 $senddata = @$_POST['senddata'];

 // Password variable
 $old_password = strip_tags (@$_POST['oldpassword']);
 $new_password = strip_tags (@$_POST['newpassword']);
 $repeat_password = strip_tags (@$_POST['newpassword2']);

 if ($senddata) {
 	// if the form is submitted

 	$password_query = mysql_query("SELECT * FROM users WHERE username='$user'");
 	while ( $row = mysql_fetch_assoc($password_query)){
          $db_password = $row ['password'];

          //md5 the old password before we check if it matches 
          $old_password_md5 = md5($old_password);

          //check whether old password equals $db_password
          if ($old_password_md5 == $db_password) {
          	//continue changing the users password
            //check whether the 2 new passwords match 
           if ($new_password == $repeat_password) {
           	if (strlen($new_password) <= 4) {
           		echo "sorry but your passord must be more than 4 characters long";
           	}
           	else
           	{
             //md5 the new password before we add it to the database 
           	 $new_password_md5 = md5($new_password);
           	 //great! update the users passwords!
           	 mysql_query ("UPDATE users SET password='$new_password_md5' WHERE username='$user'");

           	 echo "done your password was updated";
           	}
           }
           else
           {
           	echo "Your new password don't match";
           }
          }
          else
          {
           echo "the old passowrd is incorrect";
          }
 	}
 }
 else
 {
 	echo "";
 }

 $updateinfo = @$_POST['updateinfo'];

 // first name, last name and about the user query 
  $get_info = mysql_query("SELECT first_name, last_name, bio FROM users WHERE username='$user'");
  $get_row = mysql_fetch_assoc($get_info);
  $db_firstname = $get_row['first_name'];
  $db_last_name = $get_row['last_name'];
  $db_bio = $get_row['bio'];

  //submit what the user types into database
 if ($updateinfo) {
    $firstname = strip_tags (@$_POST['fname']);
    $lastname = strip_tags (@$_POST ['lname']);
    $bio = @$_POST['bio'];

    if (strlen ($firstname) < 3 ) {
    	echo "your first name should more than 3 characters";
    }
    else 
    if (strlen ($lastname) < 3 ) {
    	echo "your last name should more than 3 characters";
    }
    else
    {
      //submit the form to the database
    	$info_submit_query = mysql_query("UPDATE users SET first_name='$firstname', last_name='$lastname', bio='$bio' WHERE username='$user'");
    	echo " Your profile information has been updated!";
    	header("location: account_settings.php");
    }
 }
 else
 {
   // do nothing
 }
 //check whether the user has uploaded a profile pci or not 
 $check_pic = mysql_query("SELECT profile_pic FROM users WHERE username='$user'");
 $get_pic_row = mysql_fetch_assoc($check_pic);
 $profile_pic_db = $get_pic_row['profile_pic'];
 if ($profile_pic_db == "") 
 {
   $profile_pic= "img/default_pic.jpg";
 }
 else
 {
   $profile_pic= "./userdata/profile_pics/".$profile_pic_db;
 }
  //profile image uplaod script 
 if (isset($_FILES['profilepic'])) {
 	if (((@$_FILES["profilepic"]["type"] =="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"] =="image/gif")) && (@$_FILES["profilepic"]["size"] < 1048576)); //1 megabyte
 	{
     $chars= "abscdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
     $rand_dir_name = substr(str_shuffle($chars), 0, 15);
     mkdir("./userdata/profile_pics/$rand_dir_name");

     if (file_exists("./userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
     {
       echo @$_FILES["profilepic"] ["name"]."Already exists";
     }
 	else
 	{
     move_uploaded_file(@$_FILES["profilepic"]["tmp_name"], "userdata/profile_pics/$rand_dir_name/".$_FILES["profilepic"]["name"]);
     //echo " Upload and stored in: userdata/profile_pics/$rand_dir_name/" .@$_FILES['profilepic']["name"];
     $profile_pic_name = @$_FILES["profilepic"]["name"];
     $profile_pic_query= mysql_query("UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");
     header("Location: account_settings.php");
 	//else{
      echo "invalid file! your image must be no longer than 1mb and it must be either a .jpeg, .jpeg, .png or .gif";
    }
}
}
?>
<h2>edit your profile settings</h2>
<hr />
<p>Upload Your Porfile Picture</p>
<form action="" method="POST" enctype="multipart/form-data">
<img src= "<?php echo $profile_pic ?>" width="70"/>
<input type ="file" name="profilepic" /><br />
<input type="submit" name="uploadpic" value="Upload Image">
</form>
<hr />
<form action="account_settings.php" method="post">
<p>change your password</p> <br />
Your old password: <input type= "text" name="oldpassword" id="oldpassword" size="30"><br />
Your New password: <input type= "text" name="newpassword" id="newpassword" size="30"><br />
Repeat password: <input type= "text" name="newpassword2" id="newpassword2" size="30"><br />
<input type="submit" name="senddata" id="senddata" value="update information">
</form>
<hr />
<form action= "account_settings.php" method="post">
<p>UPDATE YOUR PROFILE</p> <br />
First name: <input type= "text" name="fname" id="fname" size="40" value="<?php echo $db_firstname; ?>"><br />
Last name: <input type= "text" name="lname" id="lname" size="40" value="<?php echo $db_last_name; ?>"><br />
About You: <textarea name="bio" id="bio" rows="7" cols="60"><?php echo $db_bio; ?></textarea>
 
<hr />
<input type="submit" name="updateinfo" id="updateinfo" value="update information">
</form>
<br />
<br />