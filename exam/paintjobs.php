<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>New Paint Job</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
$(document).ready(function() {
    $(document).on("click", ".complete-action", function() {
        var $button = $(this);
        var id = $button.data("id");
        $.ajax({
            url: "php/update_action.php",
            method: "POST",
            data: { id: id },
            success: function(response) {
                if (response == "success") {
                    $button.text("Complete");
                } else {
                    alert("Status Updated.");
                }
            }
        });
    });
});

    </script>
</head>
<body>
    <div class="container">
        <div class="column">
            <h2>Paint Jobs</h2>

            <h3>Paint Jobs in Progress</h3>
            <table id="paintJobsTableWithAction" style="width:100%">
                <thead>
                    <tr>
                        <th>Plate No</th>
                        <th>Current Color</th>
                        <th>Target Color</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                        require("connection.php");
                        $limit = 5;
                        $sql = "SELECT * FROM paintjobs WHERE Action = 'Mark as Completed' ORDER BY id ASC LIMIT :limit";
                        $statement = $conn->prepare($sql);
                        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
                        $statement->execute();
                        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                        if (count($rows) > 0) {
                            foreach ($rows as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['PlateNo']; ?></td>
                                    <td><?php echo $row['Current_Color']; ?></td>
                                    <td><?php echo $row['Target_Color']; ?></td>
                                    <td class="complete-action" data-id="<?php echo $row['id']; ?>"><?php echo $row['Action']; ?></td>
                                </tr>
                                <?php
                            }
                
                            if (count($rows) > $limit) {
                                $remainingRows = count($rows) - $limit;
                                echo "<script>document.getElementById('paintJobsTableWithoutAction').style.display = 'block';</script>";
                            } else {
                                echo "<script>document.getElementById('paintJobsTableWithoutAction').style.display = 'none';</script>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No paint jobs in progress</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="column">
                <h3>Paint Queue</h3>
                <table id="paintJobsTableWithoutAction" style="width:100%">
                    <thead>
                        <tr>
                            <th>Plate No</th>
                            <th>Current Color</th>
                            <th>Target Color</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlQueue = "SELECT * FROM paintjobs WHERE Action = 'Mark as Completed' ORDER BY id ASC LIMIT :limit OFFSET :offset";
                        $statementQueue = $conn->prepare($sqlQueue);
                        $statementQueue->bindParam(':limit', $limit, PDO::PARAM_INT);
                        $statementQueue->bindParam(':offset', $limit, PDO::PARAM_INT);
                        $statementQueue->execute();
                        $rowsQueue = $statementQueue->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($rowsQueue as $rowQueue) {
                            ?>
                            <tr>
                                <td><?php echo $rowQueue['PlateNo']; ?></td>
                                <td><?php echo $rowQueue['Current_Color']; ?></td>
                                <td><?php echo $rowQueue['Target_Color']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                    </div>


                <div class="column">
        <div id="shopPerformanceContainer">
            <div id="headerWrapper">
                <h4>SHOP PERFORMANCE</h4>
            </div>
            <div id="colorBreakdownContainer">
                <div id="colorBreakdown">
                    <p><span>Total Cars Painted:</span> <span id="totalCarsPainted"></span></p>
                    <p>Breakdown:</p>
                    <ul>
                        <li><span>Blue:</span></li>
                        <li><span>Red:</span></li>
                        <li><span>Green:</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="scripts/script.js"></script>
    <script src="scripts/paintrefresh.js"></script>
</body>
</html>
