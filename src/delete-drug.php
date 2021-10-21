<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ListDrug.php");
}
include "config.php";
$conn = new mysqli($hn, $username, $password, $db);
if ($conn->connect_error) {
    die($conn->connect_error);
}
$query = "delete from drugs where id = ?";
$stmt = $conn->prepare($query);     
if(!$conn->error) {
    $stmt->bind_param("d", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: ListDrug.php");
} else {
    echo "Lỗi: ".$conn->error;
    $conn->close();
}   
?>