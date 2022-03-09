<!DOCTYPE html>
<html>    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
        <link rel="stylesheet" href="http://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
        <link rel="stylesheet" href="spending.css" />
        <title>Spending Tracker</title>
    </head>
    <body>
        <div id="container">
            <!-- header -->
            <h2>New Purchase</h2>
            <!-- form -->
            <form action="insert_purchase.php" method="post" autocomplete="off">
                <!-- label for dropdown -->
                <label for="cat">Category</label>
                <!-- dropdown -->
                <select name="cat" id="cat">
                    <option value="0">Travel</option>
                    <option value="1">Hotel</option>
                    <option value="2">Events</option>
                    <option value="3">Food</option>
                    <option value="4">Other</option>
                </select>

                <!-- label for details -->
                <label for="details">Details</label>
                <!-- textarea for details -->
                <textarea name="details" id="details"></textarea>

                <!-- label for date of purchase -->
                <label for="purchasedate">Date of Purchase</label>
                <!-- input of type date -->
                <input type="date" name="purchasedate" id="purchasedate" value="2000-01-01"/>

                <!-- label for amount -->
                <label for="value">Amount</label>
                <!-- input of type number -->
                <input type="number" name="value" id="value" value="100"/>

                <!-- submit button -->
                <button type="submit">Submit Purchase</button>
            </form>

            <?php
            require_once 'connect.php';
            $sql = "SELECT * FROM purchases";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            print("<h2>Recorded Purchases</h2>");

            // Total Purchases counter
            $total = 0;

            // Recorded Purchases
            while($row = mysqli_fetch_array($result)){
                if($row['purchase_category'] == 0){
                    $cat = "Travel";
                } elseif ($row['purchase_category'] == 1){
                    $cat = "Hotel";
                } elseif ($row['purchase_category'] == 2){
                    $cat = "Events";
                } elseif ($row['purchase_category'] == 3){
                    $cat = "Food";
                } elseif ($row['purchase_category'] == 4){
                    $cat = "Other";
                }
                $total += $row['purchase_value'];
                echo "<div class='purchase'>";
                echo "<a href='delete.php?id=" . $row['purchase_id'] . "'><button class='btnDelete'>Delete</button></a>";
                echo "<strong>" . $cat . "</strong>";
                echo "<p>" . $row['purchase_details'] . "</p>Amount: $" . $row['purchase_value'] . ", Date of Purchase: " . $row['purchase_date'];
                echo "</div>";
            }
            echo "<div>";
            echo "<strong>Total spending: $" . $total . "<strong>";
            echo "</div>";
            ?>
        </div>
    </body>
</html>