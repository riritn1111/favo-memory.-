<?php

$name = htmlspecialchars($_POST["name"],ENT_QUOTES,"UTF-8") ;
  $image =htmlspecialchars($_POST["image"],ENT_QUOTES,"UTF-8");
  $spday = htmlspecialchars($_POST["spday"],ENT_QUOTES,"UTF-8");
  $users_at = htmlspecialchars($_POST["users_at"],ENT_QUOTES,"UTF-8");


$dbh = new PDO('mysql:dbname=Memories;host=localhost;charset=utf8','root','root',);


$sql =  'INSERT INTO
            profile(name, image, spday, users_at)
        VALUES
            (:name, :image, :spday, :users_at)';
    $stmt = $dbh->prepare($sql);

 $params = array(':name' => $name,':image' => $image,':spday' => $spday, ':users_at' => $users_at);
 $stmt->execute($params);


?>