<?php
require_once(ROOT_PATH.'/Controllers/DiaryController.php');
$controller = new DiaryController();

	$btnStr = "";


	if(isset($_POST['confirm']))
    {
	    $result = $controller->getIndexByDiaryId();
	    $result2 = $_POST['calender'];
	}

	if(isset($_POST['edit']))
    {
    	$controller->updateDiary();
	}

	if(isset($_POST['favo']))
	{
		$controller->updateFavo();
	}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<title>検索</title>
</head>
<body>
	<header>
		<?php include("header.php");?>
	</header>

	<main>
		<div class="main">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="main1">
					<div class="main_name">
						<strong></strong>
					</div>
					<div class="weel_btn">
						<input type="date" name="calender" value=<?php if (!empty($result2)) {
							echo $result2;}?>>
						<input type="submit" name="confirm" value="検索">
					</div>
				</div>
				<div class="weeek_li">
					<div class="item">
						<strong><?php if (!empty($result["created_time"])) {
							echo $result["created_time"];
						} ?></strong>
					</div>
					
						<textarea name="diary" id="diaryop" cols="50" rows="20" ><?php if (!empty($result["memory"])) {
							echo $result["memory"];}?>
						</textarea>
						<div class="week_img">
							<?php if (!empty($result["image"])) {
							echo '<img src="/cafe/img/IMG_0493.JPG" alt="">';
						} ?></div>
							<input type="file" name="image1">
						
					<div class="item2">
						<input type="submit" name="edit" value="編集保存" id="button_week" >
						<?php if(!empty($result)):?>
							<?php if($result['favo_flg'] == 0)
							{
								$btnStr = "お気に入り";
							}
							else if ($result['favo_flg'] == 1)
							{
								$btnStr = "お気に入り削除";
							}
							?>
						
						<button type = "submit" name="favo" id="button_week"><?php echo $btnStr;?></button>
						<?php endif;?>
						
					</div>
			</form>
		</div>
	</main>


	<footer>
		<?php include("footer.php");?>
	</footer>
</body>
</html>