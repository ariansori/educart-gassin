<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <!--CSS Styles-->
	<link rel="stylesheet" href="css/dashboardadmin.css" type="text/css" />
	<!--End of CSS Styles-->

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include "php/headeradmin.php" ?>
</head>
<body >
<div class="container">
    <?php
    include 'dbcontroller/dbcontroller.php'; 
//Inisialisasi Variable   
$itemID = '';
$code = '';
$name = '';
$price = '';
$image = '';

    $db = new DBController();
    $conn = $db->connectDB();
    
    if (isset($_GET['ubah'])) {
        $itemID = $_GET['ubah'];
        $query = "SELECT * FROM products WHERE ItemID = '$itemID'";
        $sql = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($sql);

        $code = $data['Code'];
        $name = $data['Name'];
        $price = $data['Price'];
        $image = $data['Image'];
    }
    ?>
    <form method="POST" action="proses.php" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="ItemID" class="col-sm-2 col-form-label mt-3 text-light">ItemID</label>
            <div class="col-sm-10">
                <input type="text" name="ItemID" class="form-control mt-3" id="ItemID" placeholder="ex: 12345" value="<?php echo $itemID; ?>" <?php echo isset($_GET['ubah']) ? 'readonly' : ''; ?>>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Code" class="col-sm-2 col-form-label mt-3 text-light">Code</label>
            <div class="col-sm-10">
                <input type="text" name="Code" class="form-control mt-3" id="Code" placeholder="ex: LMT" value="<?php echo $code; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Name" class="col-sm-2 col-form-label mt-3 text-light">Name</label>
            <div class="col-sm-10">
                <input type="text" name="Name" class="form-control mt-3" id="Name" placeholder="ex: Lem Inikol Takol" value="<?php echo $name; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Image" class="col-sm-2 col-form-label mt-3 text-light">Image</label>
            <div class="col-sm-10">
                <input class="form-control mt-3" type="file" name="Image" id="Image">
                <?php if (isset($_GET['ubah']) && !empty($image)): ?>
                    <img src="<?php echo $image; ?>" alt="Current Image" class="img-thumbnail mt-3" style="max-width: 200px;">
                <?php endif; ?>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Price" class="col-sm-2 col-form-label mt-3 text-light">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mt-3" name="Price" id="Price" placeholder="ex: 1750" value="<?php echo $price; ?>">
            </div>
        </div>
        <div class="mb-3 row mt-4">
            <div class="col">
                <?php if (isset($_GET['ubah'])): ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> 
                        Save
                    </button>
                    <input type="hidden" name="ItemID" value="<?php echo $itemID; ?>">
                <?php else: ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> 
                        Add
                    </button>
                <?php endif; ?>
                <a href="dashboardadmin.php" type="button" class="btn btn-danger">
                    <i class="fa fa-reply" aria-hidden="true"></i> cancelled
                </a>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>
</body>
</html>