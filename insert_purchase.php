<?php

require_once 'connect.php';

$category = $_REQUEST['cat'];
$details = $_REQUEST['details'];
$date = $_REQUEST['purchasedate'];
$value = $_REQUEST['value'];

$sql = "INSERT INTO purchases (purchase_category, purchase_details, purchase_date, purchase_value) VALUES ";
$sql .= "('" . $category . "',";
$sql .= "'" . $details . "',";
$sql .= "'" . $date . "',";
$sql .= "'" . $value . "')";

// attempts to run the query at the predefined link, prints successful or not
if(mysqli_query($link, $sql)){
    print("Stored");
} else {
    print("Failed");
}

echo "<script>location.href='index.php'</script>";

?>