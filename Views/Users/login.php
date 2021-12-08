<?php

session_start();

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
	
	// バリデーションした結果何もエラーがなければ
	$result = $controller->getMatchUserIndex();

	if(!$result)
	{
	$err[0] =  "メールアドレス又はパスワードが一致しません";
	}
	else
	{
		$post = filter_input_array(INPUT_POST,$_POST);
		
		$userIndex = $controller->getUserIndexbyEmail();
		$_SESSION['userid'] = $userIndex["id"];
		header('Location: index.php?id='.$userIndex["id"]);
	}


}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<title>ログイン</title>
</head>
<body>
	<header>
		<?php include("login_header.php");?>
	</header>
	<div class="login">
		<div class="login_tl">
			<strong>ログイン</strong>
		</div>

		<form action="" method="post" novalidate>
			<div class="form_email">
				<p>メールアドレス<span>*</span></p>
				<?php if(!empty($err[0])){echo "<a>".$err[0]."</a>";} ?></br>
				<input type="email" name="email" id="login_email" required>
			</div>
			<div class="form_password">
				<p>パスワード<span>*</span></p>
				<?php if(!empty($err[0])){echo "<a>".$err[0]."</a>";} ?></br>
				<input type="text" name="password" id="login_password" required>
			</div>
			<div class="login_button">
				<input type="submit" name="confirm" value="ログイン" id="button" required1>

			</div>
	</div>
		</form>
		<div class="login_menu">
			<div class="new_form">
				<a href="signup.php">新規アカウント登録</a>
			</div>
			<div class="not_form">
				<a href="index.php?id=00000">登録せずに進む</a>
			</div>
		</div>
	
	<footer>
		<?php include("login_footer.php");?>
	</footer>
</body>
</html>