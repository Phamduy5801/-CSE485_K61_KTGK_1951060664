<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Bai thi giua ki</title>
</head>
<body>

<div class="container">
        <a href="index.php" value="">Back</a>
        <br />
        <h1>Add drug</h1>
        <form method="POST" action="add-drug.php" enctype="multipart/form-data">
            Name: <input class="form-control" type="text" name="name" /><br>
            Type: <input class="form-control" type="text" name="type1" /><br>
            Barcode: <input class="form-control" type="text" name="barcode" /><br>
            Dose: <input type="text" class="form-control" name="dose"><br>
            Code: <input type="text" class="form-control" name="code1"><br>
            Cost_price: <input type="text" class="form-control" name="cost_price"><br>
            Selling_price: <input type="text" class="form-control" name="selling_price"><br>         
            Expiry: <input type="text" class="form-control" name="expiry"><br>
            Company_name: <input type="text" class="form-control" name="companyname"><br>  
            Production_date: <input type="date" class="form-control" name="prod_date"><br>
            Expiration_date: <input type="date" class="form-control" name="expira_date"><br>
            Place: <input type="text" class="form-control" name="place"><br>
            Quantity: <input type="text" class="form-control" name="quantity"><br>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>


    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
<?php
if (isset($_REQUEST['name'])) {

    $id = $_GET['id'];

    include "config.php";
    $conn = new mysqli($hn, $username, $password, $db);
    if ($conn->connect_error) {
        die($conn->connect_error);
    }
    $query = "INSERT INTO `DRUGS` (`name`, `type`, `barcode`, `dose`,`code`,`cost_price`,`selling_price`,`expiry`,`company_name`,`production_date`,`expiration_date`,`place`,`quantity`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = $conn->prepare($query);

    $name = $_POST['name'];
    $type = $_POST['type1'];
    $barcode = $_POST['barcode'];
    $dose = $_POST['dose'];
    $code = $_POST['code1'];
    $cost_price = $_POST['cost_price'];
    $selling_price = $_POST['selling_price'];
    $expiry = $_POST['expiry'];
    $company_name = $_POST['companyname'];
    $prod_date = $_POST['prod_date'];
    $expira_date = $_POST['expira_date'];
    $place = $_POST['place'];
    $quantity = $_POST['quantity'];

    $stmt->bind_param('sssdsddsssssd', $name, $type, $barcode, $dose, $code, $cost_price, $selling_price, $expiry, $company_name, $prod_date,  $expira_date,  $place, $quantity);
    $stmt->execute();
    $conn->close();
    header("Location: ListDrug.php");
}
?>