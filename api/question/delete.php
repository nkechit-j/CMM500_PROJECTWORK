<?php
require_once('../db.php');

$id          = trim( $_POST['id']);
$actionType  = trim( $_POST['action_type']);

switch($actionType){

    case 'q':
        $t->deleteQuestion($id);
    break;

    case 'a':
        $t->deleteAnswer($id);
    break;

}





?>