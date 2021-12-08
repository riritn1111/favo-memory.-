<?php
require_once(ROOT_PATH."Controllers/DiaryController.php");
$controller = new DiaryController();
$email = "";
$pass = "";

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	$email = "";
	$pass = "";
}
else
{
	$post = filter_input_array(INPUT_POST,$_POST);

	$email = $post['email'];
	$pass = $post['password'];

	// バリデーション
	
	//パスワードとメールアドレスが両方よかったらの処理
	
	
	// バリデーションした結果何もエラーがなければ
	$result_email = $controller->getUserIndexbyEmail();
	if($result_email)
	{
		$err[00] = "そのメールアドレスは登録済みです。";
	}
	if (!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9]+'.'+(?:\.[a-zA-Z0-9-]+)*$/",$email)) {
		$err[11] = "正しいメールアドレスを入れてください。";
	}
	if ($pass==="" || 6 < mb_strlen($pass, 'UTF-8') ) {
		$err[22] = "パスワードは６文字以上で入力してください。";
	}
	if (empty($err[00] && $err[11] && $err[22])) {
		$controller->registratorUserInfo();
		header('Location: Login.php');
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>新規登録</title>
</head>
<body>
	<header>
		<?php include("login_header.php");?>
	</header>
	<div class="login">
		<div class="login_tl">
			<strong>新規登録</strong>
		</div>

		<form action="" method="post">
			<div class="form_email">
				<p>新規メールアドレス<span>*</span></p>
				<?php if(!empty($err[00])){echo "<a>".$err[00]."</a>";} ?></br>
				<?php if(!empty($err[11])){echo "<a>".$err[11]."</a>";} ?></br>
				<input type="text" name="email" id="su_email">
			</div>
			<div class="form_password">
				<p>新規パスワード<span>*</span></p>
				<?php if(!empty($err[22])){echo "<a>".$err[22]."</a>";} ?></br>
				<input type="text" name="password" id="su_password">
			</div>
			<div class="login_button">
				<input type="submit" name="confirm" value="登録" id="su_button">
				<input type="button" value="戻る" onclick="history.back(-1)" />
			</div>
	</div>
		</form>
	
	<footer>
		<?php include("login_footer.php");?>
	</footer>

</body>
</html>