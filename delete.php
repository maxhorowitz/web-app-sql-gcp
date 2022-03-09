<?php

// connect to server using the host information in 'connect.php'
require_once 'connect.php';

// get the 'id' the user wishes to delete
$id = $_REQUEST['id'];

// string representing the query we will use to delete that entry from the table
$sql = "DELETE FROM purchases WHERE purchase_id = '" . $id . "'";

// if this query finds an entry with that 'id', log that it is stored and we have deleted it or that it doesn't exist
if(mysqli_query($link, $sql)){
    print("Deleted");
} else {
    print("Failed");
}

echo "<script>location.href='index.php'</script>";

?>