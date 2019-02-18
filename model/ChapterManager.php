<?php
require_once("model/Manager.php");

class ChapterManager extends Manager{
    public function getChapters(){
    
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, content, creation_date, number FROM chapter ORDER BY creation_date DESC LIMIT 0, 5');
return $req;
}

    public function getChapter($id){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM chapter WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();

        return $post;


    }
}