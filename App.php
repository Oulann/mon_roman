<?php
require('controller/Controller.php');
class App{
    private $controller;
    public function __construct(){
    $this->controller = new Controller();
    }
    public function run()
    {
        try {
            if (!isset($_GET['action'])){
                $this->controller->listChapters();
            }
            
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'listPosts') {
                    $this->controller->listChapters();
                } 
                elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->controller->post();
                    }                 
                    else {
                        echo 'Erreur : aucun identifiant de billet envoyé';
                    }
                }
                elseif ($_GET['action'] == 'addComment') {

                    if (isset($_GET['post']) && $_GET['post'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $this->controller->addComment($_GET['post'], $_POST['author'], $_POST['comment']);
                        }
                        else {
                            echo 'Erreur : tous les champs ne sont pas remplis !';
                        }
                    }
                    else {
                        echo 'Erreur : aucun identifiant de billet envoyé';
                    }

                }
            }
        }
        catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}
