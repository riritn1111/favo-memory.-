<?php
session_start();
$userid = $_SESSION['userid'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="/js/index.js"></script>
	<title>ログイン</title>
</head>
<body>
	<header>
		<div class="header">
			<div class="header_logo">
				<a href='index.php?id=<?php echo $userid?>'>favo memory</a>
			</div>

			<div class="header_list">
				<div class="list1">
					<a href="profile.php?id=<?php echo $userid?>">マイページ</a>
				</div>
				<div class="list2">
					<a href="week.php?id=<?php echo $userid?>">日記検索</a>
				</div>
				<div class="list3">
					<a href="favo.php?id=<?php echo $userid?>">お気に入り</a>
				</div>
				<div class="list4">
					<a href="/Users/login.php">ログアウト</a>
				</div>
		    </div>
		</div>
	</header>


</body>
</html>