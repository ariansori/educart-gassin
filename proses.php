<?php
include 'dbcontroller/dbcontroller.php';

$db = new DBController();
$conn = $db->connectDB();

if (isset($_POST['aksi'])) {
    $Code = mysqli_real_escape_string($conn, $_POST['Code']); // Sanitasi input
    $Name = mysqli_real_escape_string($conn, $_POST['Name']); // Sanitasi input
    $Price = mysqli_real_escape_string($conn, $_POST['Price']); // Sanitasi input
    $Image = $_FILES['Image'];
    $tmpFile = $Image['tmp_name'];

    // Path penyimpanan file gambar
    $uploadDir = "img/products/";
    $uploadFile = $uploadDir . basename($Image['name']); // Use original filename

    // Check allowed file types
    $allowedExtensions = array("jpg", "jpeg", "png");
    $extension = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    if (!in_array($extension, $allowedExtensions)) {
        echo "Error: Unsupported file format.";
        exit;
    }

    // Check for upload errors
    if ($Image['error'] !== UPLOAD_ERR_OK) {
        echo "Error: Upload failed with error code " . $Image['error'];
        exit;
    }

    if ($_POST['aksi'] == "add") {
        // Periksa apakah gambar berhasil di-upload
        if (move_uploaded_file($tmpFile, $uploadFile)) {
            $query = "INSERT INTO products (Code, Name, Image, Price) VALUES ('$Code', '$Name', '$uploadFile', '$Price')";
            $sql = mysqli_query($conn, $query);

            if ($sql) {
                header("location: dashboardadmin.php");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Possible file upload attack!";
        }
    } else if ($_POST['aksi'] == "edit") {
        $ItemID = mysqli_real_escape_string($conn, $_POST['ItemID']); // Sanitasi input

        // Jika ada gambar baru yang di-upload, perbarui juga path gambarnya
        if (!empty($tmpFile) && move_uploaded_file($tmpFile, $uploadFile)) {
            $query = "UPDATE products SET Code='$Code', Name='$Name', Image='$uploadFile', Price='$Price' WHERE ItemID='$ItemID'";
        } else {
            $query = "UPDATE products SET Code='$Code', Name='$Name', Price='$Price' WHERE ItemID='$ItemID'";
        }

        $sql = mysqli_query($conn, $query);

        if ($sql) {
            header("location: dashboardadmin.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

if (isset($_GET['hapus'])) {
    $ItemID = mysqli_real_escape_string($conn, $_GET['hapus']); // Sanitasi input
    $query = "DELETE FROM products WHERE ItemID='$ItemID'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("location: dashboardadmin.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>