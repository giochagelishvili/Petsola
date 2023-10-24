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
            if (isset($data['petType']))
                getPetBreeds($data['petType']);
            break;
        case "savePet":
            if (isset($data['formData']))
                savePet($data['formData']);
            break;
        case "getAllPets":
            getAllPets();
            break;
        case "deletePets":
            if (isset($data['selectedPets']))
                deletePets($data['selectedPets']);
            break;
        case "updatePet":
            if (isset($data['formData']) && isset($data['petId']))
                updatePet($data['formData'], $data['petId']);
            break;
    }
}

// Updates "pets" table according to pet ID
function updatePet(array $formData, string $petId)
{
    $columnsToUpdate = [];
    $values = [];
    $condition = "pet_id = '$petId'";

    if (isset($formData['petName']) && $formData['petName'] != '') {
        array_push($columnsToUpdate, "pet_name");
        array_push($values, $formData['petName']);
    }

    if (isset($formData['petAge']) && $formData['petAge'] != '') {
        array_push($columnsToUpdate, "pet_age");
        array_push($values, $formData['petAge']);
    }

    if (isset($formData['petWeight']) && $formData['petWeight'] != '') {
        array_push($columnsToUpdate, "pet_weight");
        array_push($values, $formData['petWeight']);
    }

    if (isset($formData['petType']) && $formData['petType'] != '') {
        array_push($columnsToUpdate, "pet_type");
        array_push($values, $formData['petType']);
    }

    if (isset($formData['petBreed']) && $formData['petBreed'] != '') {
        array_push($columnsToUpdate, "pet_breed");
        array_push($values, $formData['petBreed']);
    }

    $db = new Database();
    $db->update($columnsToUpdate, $values, $condition);
}

// Deletes pet(s) from "pets" table according to given pet IDs
function deletePets(array $selectedPets)
{
    $table = "pets";
    $condition = "pet_id = '$selectedPets[0]'";

    if (sizeof($selectedPets) > 1) {
        $condition = "pet_id IN ('$selectedPets[0]'";

        for ($i = 1; $i <= sizeof($selectedPets) - 1; $i++) {
            $condition = $condition . ", '$selectedPets[$i]'";
        }

        $condition = $condition . ");";
    }

    $db = new Database();

    if ($db->delete($table, $condition) === true) {
        echo json_encode(true);
    }
}

// Selects all from "pets" table and returns the result to "PetListView" file
function getAllPets()
{
    $db = new Database();
    $pets = $db->fetch("pets");
    echo json_encode($pets);
}

// Validates form data and saves pet into "pets" table
// In case of invalid form data errors are returned to "PetAddForm" component
function savePet(array $formData)
{
    $errors = [];

    if (
        !isset($formData['petName']) || $formData['petName'] == '' ||
        !isset($formData['petAge']) || $formData['petAge'] == '' ||
        !isset($formData['petWeight']) || $formData['petWeight'] == '' ||
        !isset($formData['petType']) || $formData['petType'] == '' ||
        !isset($formData['petBreed']) || $formData['petBreed'] == ''
    ) {
        array_push($errors, "Please fill out every field!");
        echo json_encode($errors);
        exit();
    }

    if (!is_numeric($formData['petAge']) || !is_numeric($formData['petWeight'])) {
        array_push($errors, "Please provide data of indicated type!");
        echo json_encode($errors);
        exit();
    }

    $petName = $formData['petName'];
    $petAge = $formData['petAge'];
    $petWeight = $formData['petWeight'];
    $petType = $formData['petType'];
    $petBreed = $formData['petBreed'];

    $validator = new Validator();
    $validation = $validator->validateForm($petName, $petAge, $petWeight, $petType, $petBreed);

    if ($validation != true) {
        echo $validation;
        exit();
    }

    $db = new Database();

    $table = "pets(pet_name, pet_age, pet_weight, pet_type, pet_breed)";
    $values = [$petName, $petAge, $petWeight, $petType, $petBreed];

    $db->insert($table, $values);
}

// Selects all from "pet_types" table and returns result to "PetAddForm" / "PetEditForm" component(s)
function getPetTypes()
{
    $db = new Database();
    $petTypes = $db->fetch("pet_types");
    echo json_encode($petTypes);
}

// Selects all from "pet_breeds" table and returns result to "PetAddForm" / "PetEditForm" component(s)
function getPetBreeds(string $petType)
{
    $db = new Database();
    $table = "pet_breeds";
    $condition = "animal = '$petType'";
    $petBreeds = $db->fetch($table, $condition);
    echo json_encode($petBreeds);
}

// Decodes received data
function decodeData()
{
    $postData = file_get_contents("php://input");
    return json_decode($postData, true);
}
