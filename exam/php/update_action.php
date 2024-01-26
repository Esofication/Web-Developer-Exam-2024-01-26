<?php
require("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $paintJobId = $_POST["id"];

    $sql = "UPDATE paintjobs SET Action = 'Complete' WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':id', $paintJobId, PDO::PARAM_INT);
    
    if ($statement->execute()) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to update action.'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request.'));
}
?>
