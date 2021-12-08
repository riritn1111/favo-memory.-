<?php
require_once(ROOT_PATH.'/Models/Db.php');
class Profile extends Db {
    private $table ='profile';
    public function __construct($dbh = null) {
        parent::__construct($dbh);
   }
   public function updateProfile($user_id,$name,$image,$spday,$users_at){
        $sql = 'UPDATE profile SET user_id = :user_id, name = :name, image = :image, spday = :spday,
                 users_at = :users_at WHERE user_id = :user_id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':user_id',$user_id);
        $sth->bindValue(':name',$name);
        $sth->bindValue(':image',$image);
        $sth->bindValue(':spday',$spday);
        $sth->bindValue(':users_at',$users_at);
        $sth->execute();
        
    }
   public function getIndexById($user_id)
   {
        $sql = 'SELECT * FROM '.$this->table.' WHERE user_id=:user_id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':user_id',$user_id);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
   }
//データ登録
public function registratorProfile($user_id,$name,$image,$spday,$users_at){
        $sql = ' INSERT INTO
            profile(user_id,name, image, spday,users_at)
        VALUES
            (:user_id,:name, :image, :spday,:users_at)';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':user_id',$user_id);
        $sth->bindValue(':name',$name);
        $sth->bindValue(':image',$image);
        $sth->bindValue(':spday',$spday);
        $sth->bindValue(':users_at',$users_at);
        $sth->execute();
    }
     

}