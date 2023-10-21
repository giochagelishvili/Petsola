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
    }
}

function getPetTypes()
{
    $db = new Database();
    $petTypes = $db->fetchAll("pet_types");
    echo json_encode($petTypes);
}

function decodeData()
{
    $postData = file_get_contents("php://input");
    return json_decode($postData, true);
}
