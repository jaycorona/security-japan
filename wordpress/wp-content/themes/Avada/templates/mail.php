<?php
/*
 *  Template Name: Mail
 * 
 * */

get_header("custom");



$data = unserialize(urldecode($_POST["data"]));


extract($data);

$inquiry = implode(" / ", $inquiry);
$location = implode(" / ", $location);

$headers = array(
		"MIME-Version: 1.0",
		"Content-type: text/html;charset=UTF-8",
		"From: $last_name $first_name <$email>"
	);

/* ////////email message for Admin */
$message_admin = "

		▼以下はホームページから送信した内容です。 <br/>
		===ここから======================================= <br/><br/>
		■姓 <br/>
		$last_name <br/><br/>
		■名 <br/>
		$first_name <br/><br/>
		■セイ <br/>
		$last_name_phonetic <br/><br/>
		■メイ <br/>
		$first_name_phonetic <br/><br/>
		■郵便番号 <br/>
		$postal_code <br/><br/>
		■ご住所 <br/>
		$address <br/><br/>
		■ビル名・部屋番号 <br/>
		$building <br/><br/>
		■お電話番号 <br/>
		$phone <br/><br/>
		■Email <br/>
		$email <br/><br/>
		■お問合せ内容 <br/>
		$inquiry <br/><br/>
		■対応してほしいカギの場所 <br/>
		$location <br/><br/>
		■自動車の車種・年式 <br/>
		$manufacturer <br/><br/>
		■ご質問ご意見 <br/>
		$comment <br/><br/>
		
		=======================================ここまで=== <br/>
		後日、ご返信いたしますので、しばらくお待ちください。 <br/>
		１週間以内に返信が無い場合には、メールが届いていな <br/>
		いことが考えられますので、 <br/>
		お手数ですが、もう一度送信してください。 <br/><br/>
		
		よろしくお願いいたします。 <br/><br/>
		
		================================================== <br/>
		 フリーダイヤル：0120-85-9990 <br/>
		「カギの救急車」渋谷店：(03)3498-9990／(03)5466-9969 <br/>
		「カギの救急車」笹塚受付：(03)5485-9969／(03)3583-9969 <br/>
		24時間！出張OK！防犯設備士が対応！見積り無料 <br/>

";
/* ////////////email message for User */
$message_user = "

		<p>カギの救急車　渋谷です。 <br/>
		お問い合わせありがとうございます。</p>
		<br/>
		▼以下はホームページから送信した内容です。  <br/>
		===ここから======================================= <br/><br/>
		■姓 <br/>
		$last_name <br/><br/>
		■名 <br/>
		$first_name <br/><br/>
		■セイ <br/>
		$last_name_phonetic <br/><br/>
		■メイ <br/>
		$first_name_phonetic <br/><br/>
		■郵便番号 <br/>
		$postal_code <br/><br/>
		■ご住所 <br/>
		$address <br/><br/>
		■ビル名・部屋番号 <br/>
		$building <br/><br/>
		■お電話番号 <br/>
		$phone <br/><br/>
		■Email <br/>
		$email <br/><br/>
		■お問合せ内容 <br/>
		$inquiry <br/><br/>
		■対応してほしいカギの場所 <br/>
		$location <br/><br/>
		■自動車の車種・年式 <br/>
		$manufacturer <br/><br/>
		■ご質問ご意見 <br/>
		$comment <br/><br/>
		
		=======================================ここまで=== <br/>
		後日、ご返信いたしますので、しばらくお待ちください。 <br/>
		１週間以内に返信が無い場合には、メールが届いていな <br/>
		いことが考えられますので、 <br/>
		お手数ですが、もう一度送信してください。 <br/><br/>
		
		よろしくお願いいたします。 <br/><br/>
		
		================================================== <br/>
		 フリーダイヤル：0120-85-9990 <br/>
		「カギの救急車」渋谷店：(03)3498-9990／(03)5466-9969 <br/>
		「カギの救急車」笹塚受付：(03)5485-9969／(03)3583-9969 <br/>
		24時間！出張OK！防犯設備士が対応！見積り無料 <br/>
";

$success = wp_mail( get_bloginfo('admin_email'), "カギの救急車渋谷店ホームページからの問い合わせ", $message_admin, $headers);


$success = wp_mail( $email, "カギの救急車　渋谷：ホームページからのお問合せ", $message_user, $headers);


?>

	<div id="container">
		<?php echo $success ? "送信完了いたしました。<br>お問合せありがとうございました。" : "Message not sent.<br><input type=\"button\" value=\"Back\" class=\"contact-button\" onclick=\"history.back()\" />" ; ?>
	</div>



<style type="text/css">
	#container {
		min-height: 300px;
		text-align: center;
	}
</style>
<?php
get_footer();
