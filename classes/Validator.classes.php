<?php

class Validator
{
    private array $errors = [];

    // Returns true if all the data is valid
    // Else returns errors array
    public function validateForm(string $petName, int $petAge, int $petWeight, string $petType, string $petBreed)
    {
        if ($this->validateName($petName) != true) {
            array_push($this->errors, "Pet name should only contain lettes and less than 20 characters.");
        }

        if ($this->validateAge($petAge) != true) {
            array_push($this->errors, "Age must be greater than 0 and less than 80.");
        }

        if ($this->validateWeight($petWeight) != true) {
            array_push($this->errors, "Weight must be greater than 0 and less than 100");
        }

        if ($this->validateType($petType) != true) {
            array_push($this->errors, "Invalid pet type.");
        }

        if ($this->validateBreed($petBreed) != true) {
            array_push($this->errors, "Invalid breed.");
        }

        // Return true if there are no errors
        // Else return errors array
        if (!empty($this->errors)) {
            echo json_encode($this->errors);
        } else {
            return true;
        }
    }

    // Checks if passed pet breed exists in the database
    // Returns true if breed exists / else returns false
    private function validateBreed(string $petBreed)
    {
        $table = "pet_breeds";
        $condition = "breed = '$petBreed'";

        $db = new Database();
        $result = $db->fetch($table, $condition);

        if (count($result) > 0) {
            $fetchedPetBreed = $result[0]['breed'];

            if (strcmp($petBreed, $fetchedPetBreed) === 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Checks if passed pet type exists in the database
    // Returns true if type exists / else returns false
    private function validateType(string $petType)
    {
        $table = "pet_types";
        $condition = "pet_type_name = '$petType'";

        $db = new Database();
        $result = $db->fetch($table, $condition);

        if (count($result) > 0) {
            $fetchedPetType = $result[0]['pet_type_name'];

            if (strcmp($petType, $fetchedPetType) === 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Returns true if passed weight is greater than 0 and less than 100
    // Else returns false
    private function validateWeight(int $petWeight)
    {
        if ($petWeight > 0 && $petWeight < 100) {
            return true;
        } else {
            return false;
        }
    }

    // Returns true if passed age is greater than 0 and less than 80
    // Else returns false
    private function validateAge(int $petAge)
    {
        if ($petAge > 0 && $petAge < 80) {
            return true;
        } else {
            return false;
        }
    }

    // Returns true if passed name contains only letters and is less than 20 characters long
    // Else returns false
    private function validateName(string $petName)
    {
        if (ctype_alpha($petName) === true && strlen($petName) < 20) {
            return true;
        } else {
            return false;
        }
    }
}
