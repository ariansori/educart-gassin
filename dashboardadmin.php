<?php
include 'dbcontroller/dbcontroller.php';

$db = new DBController();

$query = "SELECT * FROM products;";
$sql = $db->runQuery($query);
$no = 0;

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
        <!--CSS Styles-->
        <link rel="stylesheet" href="css/dashboardadmin.css" type="text/css" />
        <!--End of CSS Styles-->

        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- end bs -->


        <?php include "php/headeradmin.php" ?>
</head>
<body>
    <div class="container-fluid text-bg-info"> 
    <h1 class="mt text-align-">Products Data</h1>
        <figure class="text-center">
    <blockquote class="blockquote">
    <p>Contains data that has been stored in the database</p>
    </blockquote>
    <figcaption class="blockquote-footer">
    CRUD <cite title="Source Title">Create Read Update Delete</cite>
    </figcaption>
</figure>
<a href="manageproduct.php" type="button" class="btn btn-primary mb-3">
<i class="fa fa-plus"></i>   
Add Products
</a>
    <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
            <thead>
            <tr>
                <th><center>ItemID</center></th>
                <th>Code</th>
                <th>Name</th>
                <th>Image</th>
                <th><center>Price</th></center>
                <th><center>Action</center></th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach ($sql as $result) {
                ?>
                <tr>
                    <td><center>
                        <?php echo ++$no;?>.
                    </center></td>
                    <td>
                        <?php echo $result['Code'];?>
                    </td>
                    <td>
                        <?php echo $result['Name'];?>
                    </td>
                    <td><center>
                        <img src="<?php echo $result['Image'];?>" style="width: 120px;">
                    </center></td>
                    <td><center><?php echo $result['Price'];?></center></td>
                    <td>
                        <center>
                            <a href="manageproduct.php?ubah=<?php echo $result['ItemID'];?>" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="proses.php?hapus=<?php echo $result['ItemID'];?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                                <i class="fa fa-trash"></i> 
                            </a>
                        </center>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>