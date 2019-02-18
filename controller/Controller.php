<?php

require_once('model/ChapterManager.php');

require_once('model/CommentManager.php');

class Controller{
    private $commentManager;
    private $chapterManager;

    public function __construct(){
        $this->commentManager = new CommentManager();
        $this->chapterManager = new ChapterManager();
    }


function listChapters()
{
     // Création d'un objet
    $posts = $this->chapterManager->getChapters();

    require('view/indexView.php');
}

function post()
{
    
    $chapt = $this->chapterManager->getChapter($_GET['id']);
    $comments = $this->commentManager->getComments($_GET['id']);

    require('view/postView.php');
}

function addComment($postId, $author, $comment){
   
    $plusComment = $this->commentManager->postComment($postId, $author, $comment);
    if ($plusComment === false) {

        die('Impossible d\'ajouter le commentaire !');

    }

    else {

        header('Location: index.php?action=post&id=' . $postId);

    }

}
}