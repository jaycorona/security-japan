<?php
/*
 *  Template Name: Confirm Mail
 * 
 * */

get_header("custom");





extract($_POST);

if (count($inquiry) > 0) {
	$inquiry = implode(" / ", $inquiry);
}
if (count($location) > 0) {
	$location = implode(" / ", $location);
}
?>

	<div id="container">
		<table border="1" cellpadding="8" cellspacing="1" width="100%">
			<tbody>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">姓</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $last_name; ?></td>
				</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">名</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $first_name; ?></td>
				</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">セイ</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $last_name_phonetic; ?></td>
				</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">メイ</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $first_name_phonetic; ?></td>
				</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">郵便番号</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $postal_code; ?></td>
				</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">ご住所</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $address; ?></td>
				</tr>
				<?php if (strlen(trim($building)) > 0) { ?>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">ビル名・部屋番号</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $building; ?></td>
				</tr>
				<?php } ?>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">お電話番号</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $phone; ?></td>
				</tr>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">Email</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $email; ?></td>
				</tr>
				<?php if (strlen(trim($inquiry)) > 0) { ?>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">お問合せ内容</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $inquiry; ?></td>
				</tr>
				<?php } ?>
				<?php if (strlen(trim($location)) > 0) { ?>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">対応してほしいカギの場所</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $location; ?></td>
				</tr>
				<?php } ?>
				<?php if (strlen(trim($manufacturer)) > 0) { ?>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">自動車の車種・年式</td>
					<td bgcolor="#FFFFFF" align="left"><?php echo $manufacturer; ?></td>
				</tr>
				<?php } ?>
				<?php if (strlen(trim($comment)) > 0) { ?>
				<tr>
					<td bgcolor="#F2F2F2" nowrap="">ご質問ご意見</td>
					<td bgcolor="#FFFFFF" align="left"><pre><?php echo $comment; ?></pre></td>
				</tr>
				<?php } ?>
				<tr>
					<td bgcolor="#F2F2F2" colspan="2">
						<form style="display: inline-block;" method="post" action="送信">
							<input type="hidden" name="data" value="<?php echo urlencode(serialize($_POST)); ?>" />
							<input type="submit" value=" 送 信 " class="contact-button" />
						</form>
						<input type="button" value="もどる" class="contact-button" onclick="history.back()" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>



<style type="text/css">
	#container {
		min-height: 300px;
		text-align: center;
	}
</style>
<?php
get_footer();
