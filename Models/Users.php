<?php
require_once(ROOT_PATH.'/Models/Db.php');
class Users extends Db {
    private $table ='users';
    public function __construct($dbh = null) {
        parent::__construct($dbh);
   }
//データ登録
public function registrator($email,$pass){
        $sql = 'INSERT INTO
            users(email,password)
        VALUES
            (:email, :password)';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':email',$email);
        $sth->bindValue(':password',$pass);
        $sth->execute();
    }
public function getIndexByEmail($email)
{
    $sql = 'SELECT * FROM '.$this->table.' WHERE email=:email';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':email',$email);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}

public function getMatchIndex($email,$pass)
{
    $sql = 'SELECT * FROM '.$this->table.' WHERE password=:password AND email=:email';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':email',$email);
    $sth->bindValue(':password',$pass);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}
public function getIndex()
{
    $sql = 'SELECT * FROM'.$this->table;
    $sth = $this->dbh->prepare($sql);
    $sth->execute();

    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
}