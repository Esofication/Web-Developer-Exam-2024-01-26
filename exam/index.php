<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>New Paint Job</title>
</head>
<body>
    <div class="container">
        <h1>New Paint Job</h1>
        <img id="carImage" src="Images/AutoPaintExam.jpg" alt="Auto Paint Exam Image">
        <form action="addpaint.php" method="POST">
            <label for="carDetails"><strong>Car Details:</strong></label>
            <br>
            <div class="form-group">
                <label for="plateNo">Plate No.</label>
                <input type="text" id="plateNo" name="plateNo" placeholder="" required>
            </div>

            <div class="form-group">
                <label for="currentColor">Current Color</label>
                <select id="currentColor" name="currentColor" required>
                    <option value="" selected disabled></option>
                    <option value="Red">Red</option>
                    <option value="Green">Green</option>
                    <option value="Blue">Blue</option>
                </select>
            </div>

            <div class="form-group">
                <label for="targetColor">Target Color</label>
                <select id="targetColor" name="targetColor" required>
                    <option value="" selected disabled></option>
                    <option value="Red">Red</option>
                    <option value="Green">Green</option>
                    <option value="Blue">Blue</option>
                </select>
            </div>

            <button type="submit">Submit</button>
        </form>

     
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>
