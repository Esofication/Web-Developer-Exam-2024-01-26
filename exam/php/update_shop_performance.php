<?php
require("../connection.php");

$sqlTotalCarsPainted = "SELECT COUNT(*) AS totalCarsPainted FROM paintjobs WHERE Action = 'Complete'";
$statementTotalCarsPainted = $conn->prepare($sqlTotalCarsPainted);
$statementTotalCarsPainted->execute();
$totalCarsPainted = $statementTotalCarsPainted->fetch(PDO::FETCH_ASSOC)['totalCarsPainted'];

$sqlBreakdownByColor = "SELECT 
                            SUM(CASE WHEN Current_Color = 'Red' OR Target_Color = 'Red' THEN 1 ELSE 0 END) AS RedCount,
                            SUM(CASE WHEN Current_Color = 'Green' OR Target_Color = 'Green' THEN 1 ELSE 0 END) AS GreenCount,
                            SUM(CASE WHEN Current_Color = 'Blue' OR Target_Color = 'Blue' THEN 1 ELSE 0 END) AS BlueCount
                        FROM paintjobs WHERE Action = 'Complete'";
$statementBreakdownByColor = $conn->prepare($sqlBreakdownByColor);
$statementBreakdownByColor->execute();
$breakdownByColor = $statementBreakdownByColor->fetch(PDO::FETCH_ASSOC);

$shopPerformanceHTML = '';
$shopPerformanceHTML .= "<div id='headerWrapper'>";
$shopPerformanceHTML .= "<h4>SHOP PERFORMANCE</h4>";
$shopPerformanceHTML .= "</div>";
$shopPerformanceHTML .= "<div id='colorBreakdownContainer'>";
$shopPerformanceHTML .= "<div id='colorBreakdown'>";
$shopPerformanceHTML .= "<p>Total Cars Painted: $totalCarsPainted</p>";
$shopPerformanceHTML .= "<p>Breakdown:</p>";
$shopPerformanceHTML .= "<ul>";
$shopPerformanceHTML .= "<li><span>Blue:</span> {$breakdownByColor['BlueCount']}</li>";
$shopPerformanceHTML .= "<li><span>Red:</span> {$breakdownByColor['RedCount']}</li>";
$shopPerformanceHTML .= "<li><span>Green:</span> {$breakdownByColor['GreenCount']}</li>";
$shopPerformanceHTML .= "</ul>";
$shopPerformanceHTML .= "</div>";
$shopPerformanceHTML .= "</div>";

echo json_encode(array(
    'shopPerformanceHTML' => $shopPerformanceHTML
));
?>
