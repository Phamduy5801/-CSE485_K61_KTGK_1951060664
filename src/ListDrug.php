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
    
    <a class="btn btn-primary bt-add" href="add-drug.php">Add new drug </a>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Barcode</th>
                <th>Dose</th>
                <th>Code</th>
                <th>Cost_price</th>
                <th>Selling_price</th>
                <th>Expiry</th>
                <th>Company_name</th>
                <th>Production_date</th>
                <th>Exipiration_date</th>
                <th>Place</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php
            include "config.php";
            $conn = new mysqli($hn, $username, $password, $db);
            if ($conn->connect_error) {
                die($conn->connect_error);
            }
            $query = "Select * from drugs";
            $result = $conn->query("$query");
            if (!$result) {
                die($conn->error);
            }
            $drugs = array();
            while ($r = $result->fetch_array(MYSQLI_BOTH)) {
                $drugs[] = $r;
            }
            for ($i = 0; $i < count($drugs); $i++) {
                $drug = $drugs[$i];
            ?>
                <tr>
                    <td><?php echo $drug['id'] ?></td>
                    <td><?php echo $drug['name'] ?></td>
                    <td><?php echo $drug['type'] ?></td>
                    <td><?php echo $drug['barcode'] ?></td>
                    <td><?php echo $drug['dose'] ?></td>
                    <td><?php echo $drug['code'] ?></td>
                    <td><?php echo $drug['cost_price'] ?></td>
                    <td><?php echo $drug['selling_price'] ?></td>
                    <td><?php echo $drug['expiry'] ?></td>
                    <td><?php echo $drug['company_name'] ?></td>
                    <td><?php echo $drug['production_date'] ?></td>
                    <td><?php echo $drug['expiration_date'] ?></td>
                    <td><?php echo $drug['place'] ?></td>
                    <td><?php echo $drug['quantity'] ?></td>
                    <td>
                        <a class="btn btn-success bt-add" href="update-drug.php?id=<?php echo $drug['id'] ?>"  value="">Update</a>
                        <a onclick="return confirm('Sure ?')" class="btn btn-danger" href="delete-drug.php?id=<?php echo $drug['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </table>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
