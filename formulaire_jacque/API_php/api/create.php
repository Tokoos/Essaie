<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../class/etudiant.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Etudiant($db);
    $data = json_decode(file_get_contents("php://input"), true);
   
    $item->nom = $data['nom'];
    $item->email = $data['email'];
    $item->telephone = $data['telephone'];
    
    
    if($item->createEtudiant()){
        echo 'Employee created successfully.';
    } else{
        echo 'Employee could not be created.';
    }
?>