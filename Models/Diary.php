<?php
require_once(ROOT_PATH.'/Models/Db.php');
class Diary extends Db {
    private $table ='diary';
    public function __construct($dbh = null) {
        parent::__construct($dbh);
   }
   public function resetFavo($user_id,$postId)
   {
    $sql = 'UPDATE '.$this->table.' SET favo_flg = :favo WHERE user_id = :user_id AND id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':user_id',$user_id);
    $sth->bindValue(':id',$postId);
    $sth->bindValue(':favo',0);
    $sth->execute();

   }

   public function updatefavo($user_id,$created_at){
        $sql = 'SELECT * FROM '.$this->table.' WHERE user_id = :user_id AND created_at = :created_at';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':user_id',$user_id);
        $sth->bindValue(':created_at',$created_at);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $insertFlg = 0;
            $flg = $result['favo_flg'];
            if($flg)
            {
                $insertFlg = 0;
            }
            else
            {
                $insertFlg = 1;
            }

            $sql = 'UPDATE '.$this->table.' SET favo_flg = :favoFlg WHERE user_id = :user_id AND created_at = :created_at';
            $sth = $this->dbh->prepare($sql);
            $sth->bindValue(':user_id',$user_id);
            $sth->bindValue(':created_at',$created_at);
            $sth->bindValue(':favoFlg',$insertFlg);
            $sth->execute();
        }
   }
    public function updateDiary($user_id,$memory,$image1,$created_at){
        $sql = 'UPDATE diary SET user_id = :user_id, memory = :memory, image = :image1 WHERE user_id = :user_id and created_at = :created_at';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':user_id',$user_id);
        $sth->bindValue(':memory',$memory);
        $sth->bindValue(':image1',$image1);
        $sth->bindValue(':created_at',$created_at);
        $sth->execute();
    }
    public function getIndexByDiaryId($user_id,$created_at)
   {
        $sql = 'SELECT * FROM '.$this->table.' WHERE user_id=:user_id and created_at=:created_at';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':user_id',$user_id);
        $sth->bindValue(':created_at',$created_at);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
   }
//データ登録
    public function getindexByDiary($user_id,$memory,$image1,$created_at){
        $sql = 'INSERT INTO
            diary(user_id,memory,image,created_at)
        VALUES
            (:user_id,:memory,:image,:created_at)';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':user_id',$user_id);
        $sth->bindValue(':memory',$memory);
        $sth->bindValue(':image',$image1);
        $sth->bindValue(':created_at',$created_at);
        $sth->execute();
    }
    public function getIndexByFavoDiary($user_id)
    {
        $sql = 'SELECT * FROM '.$this->table.' WHERE user_id = :user_id AND favo_flg = 1 ORDER BY created_time desc';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':user_id',$user_id);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}