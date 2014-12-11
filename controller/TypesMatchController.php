<?php


class TypesMatchController {
   
     private $typesMatchManager;

    public function __construct($typesMatchManager) {
        $this->typesMatchManager = $typesMatchManager;
    }

    public function addTypeMatch() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $typeMatch = new TypesMatchs();

            $typeMatch->setIdTypeMatch($_POST['idTypeMatch']);
            $typeMatch->setTypeMatch($_POST['typeMatch']);
                        
            $this->typesMatchManager->createTypesMatch($typeMatch);
            $_SESSION["flash"] = "Type match  " . $typeMatch->getTypeMatch() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/typeMatch/ajout-typeMatch-form.php';
    }

    public function getById($id){
        $typeMatch = $this->typesMatchManager->get($id);
        return $typeMatch;
    }
    public function listAll() {
        return $this->typesMatchManager->listAllTypesMatch();
    }

    public function listTypeMatch() {
        return '/view/typeMatch/list-typeMatch.php';
    }

    public function editTypeMatch() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $typeMatch = new TypesMatchs();

            $typeMatch->setIdTypeMatch($_POST['idTypeMatch']);
            $typeMatch->setTypeMatch($_POST['typeMatch']);

            $this->typesMatchManager->updateTypesMatch ($typeMatch);


            $_SESSION["flash"] = "Type match  " . $typeMatch->getTypeMatch() . " édité avec succès";
            return "/view/bienvenue.php";
        }
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idTypeMatch"] = $id;
        
        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/typeMatch/editer-typeMatch.php";
    }

    public function deleteTypeMatch($id) {
        $this->check($id);

        $this->typesMatchManager->deleteTypesMatch($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "Type match  " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }



    public function check($var) {
        if (!isset($var)) {
            header("Location: index.php");
        }
        return $var;
    }
}
