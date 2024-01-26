<?php
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plateNo = $_POST["plateNo"];
    $currentColor = $_POST["currentColor"];
    $targetColor = $_POST["targetColor"];
    $action = "Mark as Completed";

    $sql = "INSERT INTO paintjobs (PlateNo, Current_Color, Target_Color, Action) VALUES (:plateNo, :currentColor, :targetColor, :action)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':plateNo', $plateNo);
    $stmt->bindParam(':currentColor', $currentColor);
    $stmt->bindParam(':targetColor', $targetColor);
    $stmt->bindParam(':action', $action);

    if ($stmt->execute()) {
        header("Location: paintjobs.php");
        exit(); 
    } else {
        echo "Failed to add paint job!";
    }
} else {
    echo "No data received!";
}
?>
