<?php
require_once(ROOT_PATH.'/Controllers/DiaryController.php');
$id = $_GET["id"];
$profile = new DiaryController();

if (isset($_POST['confirm'])) {
    $result = $profile->updateProfile();
    var_dump($result);
    header('Location: index.php?id='.$id);
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
<div class="profile">
        <div class="profile_tl">
            <strong>プロフィール</strong>
        </div>

        <div class="profile_list">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="list_name">
                    <p>名前<span>*</span></p>
                    <input placeholder="山田太郎" id="list_name" type="text" name="name" value style="width: 10%;">
                </div>
                <div class="list_fot">
                    <p>プロフィール写真<span>*</span></p>
                    <input id="fot" type="file" name="image" value style="width: 30%;">
                </div>
                <div class="list_day">
                    <p>大切な日</p>
                    <input id="day" placeholder="例:産まれてから" type="text" name="spday" value style="width: 10%;">
                </div>
                <div class="list_count">
                    <p>カウントを開始したい日を入れてください<span>*</span></p>
                    <input id="count" type="date" name="users_at" value style="width: 10%;">
                </div>
                <div class="pr_button">
					<input type="submit" name="confirm" value="登録" id="pr_button">
					<input type="button" value="戻る" onclick="history.back(-1)" />
				</div>
             </form>
        </div>
    </div>


	<footer>
		<?php include("footer.php");?>
	</footer>
</body>
</html>