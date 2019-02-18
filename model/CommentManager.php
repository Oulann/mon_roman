<?php
require_once("model/Manager.php");
class CommentManager extends Manager{
    public function getComments($chapterId){
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, title, content, DATEFORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM comment WHERE id_chapter = ? ORDER BY creation_date DESC');
        $comments->execute(array($chapterId));
        return $comments;
    }
}