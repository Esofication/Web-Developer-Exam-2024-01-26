<?php
require("../connection.php");

$limit = 5; 

$sqlPaintJobs = "SELECT * FROM paintjobs WHERE Action = 'Mark as Completed' ORDER BY id ASC LIMIT $limit";
$statementPaintJobs = $conn->prepare($sqlPaintJobs);
$statementPaintJobs->execute();
$rowsPaintJobs = $statementPaintJobs->fetchAll(PDO::FETCH_ASSOC);

$sqlPaintQueue = "SELECT * FROM paintjobs WHERE Action = 'Mark as Completed' ORDER BY id ASC LIMIT :limit OFFSET :offset";
$statementPaintQueue = $conn->prepare($sqlPaintQueue);
$statementPaintQueue->bindParam(':limit', $limit, PDO::PARAM_INT);
$statementPaintQueue->bindParam(':offset', $limit, PDO::PARAM_INT);
$statementPaintQueue->execute();
$rowsPaintQueue = $statementPaintQueue->fetchAll(PDO::FETCH_ASSOC);

$paintJobsTableHTML = '<thead><tr><th>Plate No</th><th>Current Color</th><th>Target Color</th><th>Action</th></tr></thead><tbody>';
foreach ($rowsPaintJobs as $row) {
    $paintJobsTableHTML .= "<tr>";
    $paintJobsTableHTML .= "<td>{$row['PlateNo']}</td>";
    $paintJobsTableHTML .= "<td>{$row['Current_Color']}</td>";
    $paintJobsTableHTML .= "<td>{$row['Target_Color']}</td>";
    $paintJobsTableHTML .= "<td class='complete-action' data-id='{$row['id']}'>{$row['Action']}</td>";
    $paintJobsTableHTML .= "</tr>";
}
$paintJobsTableHTML .= "</tbody>";

$paintQueueTableHTML = '<thead><tr><th>Plate No</th><th>Current Color</th><th>Target Color</th></tr></thead><tbody>';
foreach ($rowsPaintQueue as $row) {
    $paintQueueTableHTML .= "<tr>";
    $paintQueueTableHTML .= "<td>{$row['PlateNo']}</td>";
    $paintQueueTableHTML .= "<td>{$row['Current_Color']}</td>";
    $paintQueueTableHTML .= "<td>{$row['Target_Color']}</td>";
    $paintQueueTableHTML .= "</tr>";
}
$paintQueueTableHTML .= "</tbody>";

echo json_encode(array(
    'paintJobsTableHTML' => $paintJobsTableHTML,
    'paintQueueTableHTML' => $paintQueueTableHTML
));
?>
