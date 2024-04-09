<?php

require_once '..\Model\database.php';
require_once 'ProgramDeterminer.php';

class FormSubmitter {
    public function submitForm($formData) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = connect();
            
            $members = $_POST["members"];
            $income = $_POST["income"];
            $district = ($_POST["district"] == "yes") ? 1 : 0; 
            $primary_owner = ($_POST["primary_owner"] == "yes") ? 1 : 0; 
            $first_nations = ($_POST["first_nations"] == "yes") ? 1 : 0; 
            $solar = ($_POST["solar"] == "yes") ? 1 : 0; 

            $sql = "INSERT INTO responses (members, income, district, primary_owner, first_nations, solar) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssiiii", $members, $income, $district, $primary_owner, $first_nations, $solar);

            if ($stmt->execute() === TRUE) {
                $programDeterminer = new ProgramDeterminer();
                $applicablePrograms = $programDeterminer->determineApplicablePrograms($formData);

                foreach ($applicablePrograms as $programId) {
                    $sql = "UPDATE program_applicability SET times_applicable = times_applicable + 1 WHERE program_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $programId);
                    $stmt->execute();
                }
                echo "Response recorded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    
            $stmt->close();
            $conn->close();
        }
    }
}

      
