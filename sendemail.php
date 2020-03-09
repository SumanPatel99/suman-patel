<?php

$error=false;
if (!isset($_POST['name']) or empty($_POST['name'])) {
	$arr['status'] = 1;
	$arr['message'] = '1. Please enter your name.<br>';
}
if (!isset($_POST['email']) or empty($_POST['email'])) {
	$arr['status'] = 1;
	$arr['message'] .= '2. Please enter your email id.<br>';
}
if (!isset($_POST['contact']) or empty($_POST['contact'])) {
	$arr['status'] = 1;
	$arr['message'] .= '3. Please enter your contact number.<br>';
}
if (!isset($_POST['class']) or empty($_POST['class'])) {
	$arr['status'] = 1;
	$arr['message'] = '4. Please enter your class.<br>';
}
if (!isset($_POST['school']) or empty($_POST['school'])) {
	$arr['status'] = 1;
	$arr['message'] .= '5. Please enter your email id.<br>';
}
// if (!isset($_POST['location']) or empty($_POST['location'])) {
// 	$arr['status'] = 1;
// 	$arr['message'] .= '6. Please enter your message.<br>';
// }
/*
// echo json_encode($_FILES); exit;
if (!isset($_FILES['file']['name']) or empty($_FILES['file']['name'])) {
	$arr['status'] = 1;
	$arr['message'] .= '7. Please choose a file to upload.<br>';
}
if(isset($arr['status']) and $arr['status']==1) {
	exit(json_encode($arr));
}

// Upload File PHP Script
$base_url = "http://blocklogy.org/";
$target_dir = "uploads/campaign/";
$file = $_FILES["file"]["name"];
$target_file = 
$target_dir.pathinfo($file,PATHINFO_FILENAME).'-'.time().'.'.pathinfo($file,PATHINFO_EXTENSION);

$uploadOk = 0;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["file"]["tmp_name"]);
if($check == false) {
    $uploadMsg = "File is not an image.";
    $uploadOk = 1;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadMsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 1;
}
/*
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
    $uploadMsg = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $uploadMsg = "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    } else {
        $uploadMsg = "Sorry, there was an error uploading your file.";
        $uploadOk = 1;
    }
}
$arr['status'] = $uploadOk;
$arr['message'] = $uploadMsg;
*/
if ($arr['status']==1) {
	exit(json_encode($arr));
}

require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/SMTP.php');
require_once('PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = new PHPMailer();

//Server settings
$email->SMTPDebug = 0; // 3;
$email->isSMTP();
$email->Host = "smtpout.asia.secureserver.net";
$email->SMTPAuth = true;
$email->Username = "no-reply@blocklogy.com";
$email->Password = "Mobile@123451114";
$email->SMTPSecure = "ssl";
$email->Port = 465; // (ssl)
$email->isHTML(true);

$email->SetFrom('no-reply@blocklogy.com', 'No-Reply Blocklogy'); //Name is optional
$email->Subject   = 'Contact form submitted on www.blocklogy.org ';
$email->Body      = '
<style type="text/css">
a:hover, a:active a:focus { text-decoration: underline; color: #a0040b; }
a { text-decoration: none; color: #333; font-weight: bold; }
.btn-activate { background:#a0040b; color: #fff; height: 35px; width: 80px; box-shadow: 1px 2px #333; padding: 7px 10px;
}
.btn-activate:hover, .btn-activate:active, .btn-activate:focus
{ background: #4b4b4d;color: #fff; height: 35px; width: 80px; box-shadow: 1px 2px #333; padding: 7px 10px; }
</style>
<table cellpadding="0" cellspacing="0" border="0" style="background: #fff; border-radius: 3px;" height="300" width="90%" align="center">
	<tr>
		<td align="center" style="padding: 15px;">
			<p><span style="color: #a0040b; font-size: 24px; font-weight: bold;">Blocklogy Form submitted</span></p>
		</td>
	</tr>
	<tr>
		<td style="padding: 0; margin: 0;"><img src="'.$base_url.$target_file.'" alt="'.basename($target_file).'"/ width="90%"></td>
	</tr>
	<tr>
		<td style="padding: 0; margin: 0;"><h2>Name: '.$_POST["name"].'</h2></td>
	</tr>
	<tr>
		<td style="padding: 0; margin: 0;"><h3 style="margin: 0 0 6px 0;">Email: '.$_POST["email"].'</h3></td>
	</tr>
	<tr>
		<td style="padding: 0; margin: 0;"><h3 style="margin: 0 0 6px 0;">Contact: '.$_POST["contact"].'</h3></td>
	</tr>
	<tr>
		<td style="padding: 0; margin: 0;"><h3 style="margin: 0 0 6px 0;">Class  : '.$_POST["class"].'</h3></td>
	</tr>
	<tr>
		<td style="padding: 0; margin: 0;"><h3 style="margin: 0 0 6px 0;">School : '.$_POST["school"].'</h3></td>
	</tr>
	
	<tr style="height: 60px;"><td></td></tr>
	<tr>
		<td colspan=2 style="height: 60px; font-size: 18px; text-align: center;">Kmpards<br><u><span style="color:deepskyblue!important;">info@kmpards.com<span></u>
		</td>
	</tr>
</table>
';
	// <tr>
	// 	<td style="padding: 0; margin: 0;"><h3 style="margin: 0 0 6px 0;">Location: '.$_POST["location"].'</h3></td>
	// </tr>

$email->AddAddress( 'KMPARDSFoundation@gmail.com', 'KMPARDS Foundation' );
$email->AddCc( 'prafull@kmpards.com');

// $file_to_attach = $target_file; //$_FILES['file']['tmp_name'];

// $email->AddAttachment( $file_to_attach , basename($target_file) );//$_FILES['file']['name'] );

if( $email->Send() ) {
	$arr['status'] = 0;
	$arr['message'] = "Thank you for contacting us,\nYour message has been forwarded to concern department.";
} else {
	$arr['status'] = 1;
	$arr['message'] = "There are some error submitting the page.\nPlease try argain later.";	
}
exit(json_encode($arr));
