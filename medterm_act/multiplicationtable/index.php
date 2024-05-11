<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
</head>
<body>
    <form method="post">
        <h2>Multiplication Table - Cedrick Alegsao</h2>
        <label for="rows">Number of rows:</label>
        <input type="number" id="rows" name="rows" min="1"><br>
        <label for="columns">Number of columns:</label>
        <input type="number" id="columns" name="columns" min="1"><br>
        <input type="submit" value="Display">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 0;
        $columns = isset($_POST['columns']) ? intval($_POST['columns']) : 0;

        if ($rows > 0 && $columns > 0) {
            echo "<table border='1'>";
            for ($i = 1; $i <= $rows; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= $columns; $j++) {
                    echo "<td>" . ($i * $j) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p></p>Invalid numbers for rows and columns.</p>";
        }
    }
    ?>
</body>
</html>