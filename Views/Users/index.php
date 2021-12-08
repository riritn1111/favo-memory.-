<?php

require_once(ROOT_PATH.'/Controllers/DiaryController.php');
	$id = $_GET['id'];
	$controller = new DiaryController();
	$result = $controller->getProfileIndexById();
	if (!empty($result['users_at'])) {
		$users_at = $result['users_at'];
		date_default_timezone_set('Asia/Tokyo');
		$today = new DateTime('now');
		$day = new DateTime($users_at);
		$diff = $day->diff($today);
}

$timestamp = time();



if(isset($_POST['confirm']))
    {
    $_SESSION['index'] = $_POST['diary'] .$_FILES['image1']['name'];
    $controller->getindexByDiary();
	header('Location: week.php?id='.$id);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<title>メイン</title>
</head>
<body>
	<header>
		<?php include("header.php");?>
	</header>

	<main>
		<div class="main">
			<div class="main1">
				<div class="main_name">
					<p><?php if (!empty($result["name"])) {
							echo $result["name"];
						}else{echo "名前";} ?></p>
				</div>
				<div class="main_fot">
					<?PHP if (empty($result["image"])) {
							echo '<img src="/cafe/img/apple.png" alt="">';
						}else{echo '<img src="/cafe/img/IMG_0520.JPG" alt="">';} ?>
				</div>
				<div class="main_tex">
					<p><?php if (!empty($result["spday"])) {
							echo '~'.$result["spday"].'~';
						}else{echo "○○してから";} ?></p>
				</div>
				<div class="main_day">
					<strong><?php if (!empty($diff->days)) {
							echo $diff->days;
						}else{echo "00000";} ?>日</strong>
				</div>
				<div class="main_prf">
					<a href="profile.php?id=<?php echo $id; ?>">プロフィールを編集する</a>
				</div>
			</div>
			<div class="main2">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="diary_tl">
						<strong>日記</strong>
					</div>
					<input type="hidden" name="ymd" value="<?php echo date("Y-m-d"); ?>">
					<textarea name="diary" id="diary" cols="50" rows="20"></textarea>
					<div>
						<input id="font" type="file" name="image1";>
					</div>
                    	<input type="submit" name="confirm" value="登録" class="button_main">
				</form>
			</div>
		</div>
	</main>


	<footer>
		<?php include("footer.php");?>
	</footer>
</body>
</html>