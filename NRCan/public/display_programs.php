<?php
require_once '..\Controller\ProgramDeterminer.php';
require_once '..\Model\database.php';

$formData = $_POST;

$programDeterminer = new ProgramDeterminer();
$applicablePrograms = $programDeterminer->determineApplicablePrograms($formData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NRCan Web App</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link href="../public/style.css" rel="stylesheet">
</head>
<body>
    <div class="content">
        <h1 class="webTitle">Home Energy Program</h1>
        <h1 class="subTitle">Questionnaire</h1>
    </div>
    <br>
    <div class="contentContainer">
        <div class="paraContainer">
            <div class="introPara">
                <h2>Your response has been recorded. Thank you.</h2>
                <p>As previously mentioned, please check with the official groups administering these programs for more information.</p>
                <p>Based on your responses, the following programs are most suitable to you and your household:</p>


                <?php
                require_once '..\Model\database.php';

                $applicablePrograms = isset($_GET['programs']) ? $_GET['programs'] : [];

                $programDetails = [];

                if (!empty($applicablePrograms)) {
                    $conn = connect();

                    $sql = "SELECT program_name, website, phoneNum, email FROM program_applicability WHERE program_id IN (" . implode(',', $applicablePrograms) . ")";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $programDetails[] = $row;
                        }
                    }
                    $conn->close();
                }

                foreach ($programDetails as $program) {
                    echo '<div class="program-box">';
                    echo "<h2>{$program['program_name']}</h2>";
                    echo "<p>{$program['website']}</p>";
                    echo "<p>{$program['phoneNum']}</p>";
                    echo "<p>{$program['email']}</p>";
                    echo '</div>';
                }
                ?>


            </div>
        </div>
        <div class="container">
            <div class="image-container">
                <img src="../images/neighbourhood.jpg" alt="Image of Neighbourhood">
            </div>
        </div>
    </div>
</body>
</html>
