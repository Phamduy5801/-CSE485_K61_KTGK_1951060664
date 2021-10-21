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
        <h1>Edit drug</h1>
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
        $caulenh = "Select * from drugs where id=?";
        $stmt = $conn->prepare($caulenh);
        $stmt->bind_param("d", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result) {
            die($conn->error);
        }
        $drug = $result->fetch_array(MYSQLI_BOTH);
        $result->close();
        $conn->close();
        ?>
        <form method="POST" action="update-drug.php?id=<?php echo $drug['id'] ?>" enctype="multipart/form-data">
            Name: <input class="form-control" type="text" name="name" value="<?php echo $drug['name'] ?>"/><br>
            Type: <input class="form-control" type="text" name="type1" value="<?php echo $drug['type'] ?>"/><br>
            Barcode: <input class="form-control" type="text" name="barcode" value="<?php echo $drug['barcode'] ?>"/><br>
            Dose: <input type="text" class="form-control" name="dose" value="<?php echo $drug['dose'] ?>"><br>
            Code: <input type="text" class="form-control" name="code1" value="<?php echo $drug['code'] ?>"><br>
            Cost_price: <input type="text" class="form-control" name="cost_price" value="<?php echo $drug['cost_price'] ?>"><br>
            Selling_price: <input type="text" class="form-control" name="selling_price" value="<?php echo $drug['selling_price'] ?>"><br>
            Expiry: <input type="text" class="form-control" name="expiry" value="<?php echo $drug['expiry'] ?>"><br>
            Company_name: <input type="text" class="form-control" name="companyname" value="<?php echo $drug['company_name'] ?>"><br>
            Production_date: <input type="date" class="form-control" name="prod_date" value="<?php echo $drug['production_date'] ?>"><br>
            Expiration_date: <input type="date" class="form-control" name="expira_date" value="<?php echo $drug['expiration_date'] ?>" ><br>
            Place: <input type="text" class="form-control" name="place" value="<?php echo $drug['place'] ?>"><br>
            Quantity: <input type="text" class="form-control" name="quantity" value="<?php echo $drug['quantity'] ?>"><br>
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
    $query = "UPDATE `DRUGS` SET `name`=?, `type`=?, `barcode`=?, `dose`=?,`code`=?,`cost_price`=?,`selling_price`=?,`expiry`=?,`company_name`=?,`production_date`=?,`expiration_date`=?,`place`=?,`quantity`=? WHERE id = ?;";
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

    $stmt->bind_param('sssdsddsssssdd', $name, $type, $barcode, $dose, $code, $cost_price, $selling_price, $expiry, $company_name, $prod_date,  $expira_date,  $place, $quantity,$id);
    $stmt->execute();
    $conn->close();
    header("Location: ListDrug.php");
}
?>