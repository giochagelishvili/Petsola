<?php

require_once("Headers.php");
require_once("Includes.php");

$data;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = decodeData();
}

if (isset($data["action"])) {
    $action = $data["action"];

    switch ($action) {
        case "getPetTypes":
            getPetTypes();
            break;
        case "getPetBreeds":
            if (isset($data['petType'])) {
                getPetBreeds($data['petType']);
            }
            break;
        case "savePet":
            if (isset($data['formData'])) {
                savePet($data['formData']);
            }
            break;
    }
}

function savePet(array $formData)
{
    print_r($formData);
}

function getPetTypes()
{
    $db = new Database();
    $petTypes = $db->fetchAll("pet_types");
    echo json_encode($petTypes);
}

function getPetBreeds(string $petType)
{
    $db = new Database();
    $table = "pet_breeds";
    $condition = "animal = '$petType'";
    $petBreeds = $db->fetchAll($table, $condition);
    echo json_encode($petBreeds);
}

function decodeData()
{
    $postData = file_get_contents("php://input");
    return json_decode($postData, true);
}
