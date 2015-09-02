<?php
/*
 *  Template Name: Mail
 * 
 * */

get_header();





extract($_POST);

$inquiry = implode(" / ", $inquiry);
$location = implode(" / ", $location);
//$comment = nl2br($comment);

$headers = array(
		"MIME-Version: 1.0",
		"Content-type: text/html;charset=UTF-8",
		"From: $last_name $first_name <$email>"
	);



$message = <<<EMAIL

<html>
	<head>
		<title>Contact</title>
	</head>
	<body>
		<table border="1" cellpadding="8" cellspacing="1" width="100%">
			<tbody>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">姓</td>
					<td bgcolor="#FFFFFF" align="left">$last_name</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">名</td>
					<td bgcolor="#FFFFFF" align="left">$first_name</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">セイ</td>
					<td bgcolor="#FFFFFF" align="left">$last_name_phonetic</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">メイ</td>
					<td bgcolor="#FFFFFF" align="left">$first_name_phonetic</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">郵便番号</td>
					<td bgcolor="#FFFFFF" align="left">$postal_code</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">ご住所</td>
					<td bgcolor="#FFFFFF" align="left">$address</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">ビル名・部屋番号</td>
					<td bgcolor="#FFFFFF" align="left">$building</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">お電話番号</td>
					<td bgcolor="#FFFFFF" align="left">$phone</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">Email</td>
					<td bgcolor="#FFFFFF" align="left">$email</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">お問合せ内容</td>
					<td bgcolor="#FFFFFF" align="left">$inquiry</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">対応してほしいカギの場所</td>
					<td bgcolor="#FFFFFF" align="left">$location</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">自動車の車種・年式</td>
					<td bgcolor="#FFFFFF" align="left">$manufacturer</td>
					</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">ご質問ご意見</td>
					<td bgcolor="#FFFFFF" align="left">$comment</td>
					</tr>
			</tbody>
		</table>
	</body>
</html>

EMAIL;



$success = wp_mail( "trd.paolo@gmail.com", "Hello World", $message, $headers);





?>

	<div id="container">
		<?php echo $success ? "Message sent!" : "Message not sent." ; ?>
	</div>



<style type="text/css">
	#container {
		min-height: 300px;
		text-align: center;
	}
</style>
<?php
get_footer();
