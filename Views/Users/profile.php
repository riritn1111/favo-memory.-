<?php
require_once(ROOT_PATH.'/Controllers/DiaryController.php');
$id = $_GET["id"];
$prf = "";
$profile = new DiaryController();
$result = $profile->getProfileIndexById();
if(isset($_POST['confirm']))
    {
	$name = $_POST["name"];
	$image = $_FILES['image']['name'];
    if (empty($result['name'])) {
        $prf = "登録";
        $profile->registratorProfile();
        header('Location: index.php?id='.$id);
    }
    else{
        $prf = "編集登録";
        $result = $profile->updateProfile();
        //var_dump($result);
        header('Location: index.php?id='.$id);
    }
	

}





?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<title>マイページ</title>
</head>
<body>
	<header>
		<?php include("header.php");?>
	</header>
    <main class="main">
        <div class="profile">
            <div class="profile_tl">
                <strong>プロフィール</strong>
            </div>

            <div class="profile_list">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="list_name">
                        <p>名前<span>*</span></p>
                        <input placeholder="<?PHP if(empty($result['name'])){echo "山田太郎";}else{echo $result['name'];} ?>" id="list_name" type="text" name="name" value style="width: 10%;">
                    </div>
                    <div class="list_fot">
                        <p>プロフィール写真<span>*</span></p>
                        <input id="fot" type="file" name="image">
                    </div>
                    <div class="list_day">
                        <p>大切な日</p>
                        <input id="day" placeholder="<?PHP if(empty($result['spday'])){echo "例:産まれてから";}else{echo $result['spday'];} ?>" type="text" name="spday" value style="width: 10%;">
                    </div>
                    <div class="list_count">
                        <p>カウントを開始したい日を入れてください<span>*</span></p>
                        <input id="count" type="date" name="users_at" value style="width: 10%;">
                    </div>
                    <div class="pr_button">
    					<input type="submit" name="confirm" value="保存" id="pr_button" value="<?PHP echo $prf; ?>">
    					<input type="button" value="戻る" onclick="history.back(-1)" />
    				</div>
                 </form>
            </div>
        </div>
    </main>

	<footer>
		<?php include("footer.php");?>
	</footer>
</body>
</html>