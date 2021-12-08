<?php

require_once(ROOT_PATH.'/Controllers/DiaryController.php');
$id = $_GET['id'];
$controller = new DiaryController();
$result = $controller->getIndexByFavoDiary();
$btnStr = "";
$controller->resetFavo();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<title>お気に入り</title>
</head>
<body>
	<header>
		<?php include("header.php");?>
	</header>

	<main>
		<div class="main">
			<form action="" method="post">
				<div class="main_name">
					<strong>お気に入り</strong>
				</div>
				
					<?php foreach($result as $re): ?>

						<input type="hidden" name="id" value=<?php echo $re['id'] ?>>

					<div class="weeek_li">
						<div class="item">
							<strong><?php if (!empty($re["created_time"])) {
								echo $re["created_time"];} ?>
							</strong>
						</div>

						<textarea name="diary" id="diaryop" cols="50" rows="20" ><?php if (!empty($re["memory"])) {
								echo $re["memory"];} ?>
						</textarea>

						<div class="favo_img">
								<?php if (!empty($re["image"])) {
							echo '<img src="/cafe/img/IMG_0493.JPG" alt="">';
						} ?>
						</div>

					</div>


					<div class="item2">

						<a id = "favoreset" href="favo.php?id=<?php echo $id ?>&postId=<?php echo $re['id']?>">お気に入り解除</a>

					</div>

					<?php endforeach;?>
				
			</form>
		</div>
	</main>
