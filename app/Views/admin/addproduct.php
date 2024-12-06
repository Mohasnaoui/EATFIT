<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "optitrend";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['add'])) {
    $productname = $_POST['productname'];
    $designation = $_POST['designation'];
    $productprice = $_POST['productprice'];
    $quantity = $_POST['quantity'];
    $style = $_POST['style'];
    $sex = $_POST['sex'];
    $brand_name = $_POST['brand']; // Assuming 'brand' is the name from the form
    $category_name = $_POST['category']; // Assuming 'category' is the name from the form
    $imagepath = $_POST['imagepath']; // Assuming 'imagepath' is the path from the form

    // Check if brand exists in Brands table and get brand_id
    $brand_id = null;
    $sql_check_brand = "SELECT brand_id FROM Brands WHERE brand_name = '$brand_name'";
    $result_check_brand = $conn->query($sql_check_brand);

    if ($result_check_brand->num_rows > 0) {
        // Brand exists, get brand_id
        $row = $result_check_brand->fetch_assoc();
        $brand_id = $row['brand_id'];
    } else {
        // Brand does not exist, insert it and get brand_id
        $sql_insert_brand = "INSERT INTO Brands (brand_name) VALUES ('$brand_name')";
        if ($conn->query($sql_insert_brand) === TRUE) {
            $brand_id = $conn->insert_id;
        } else {
            echo "Error inserting brand: " . $conn->error;
            exit; // Exit script if brand insertion fails
        }
    }

    // Check if category exists in Categories table and get category_id
    $category_id = null;
    $sql_check_category = "SELECT category_id FROM Categories WHERE category_name = '$category_name'";
    $result_check_category = $conn->query($sql_check_category);

    if ($result_check_category->num_rows > 0) {
        // Category exists, get category_id
        $row = $result_check_category->fetch_assoc();
        $category_id = $row['category_id'];
    } else {
        // Category does not exist, handle this case as per your requirements
        echo "Category '$category_name' does not exist in the database.";
        exit; // or handle the error as needed
    }

    // Insert into Products table
    $sql_insert_product = "INSERT INTO Products (name, description, price, stock, style, sex, brand_id, category_id) 
                           VALUES ('$productname', '$designation', '$productprice', '$quantity', '$style', '$sex', '$brand_id', '$category_id')";

    if ($conn->query($sql_insert_product) === TRUE) {
        // Get the product_id of the newly inserted product
        $product_id = $conn->insert_id;

        // Insert into ProductImages table
        $sql_insert_image = "INSERT INTO product_images (product_id, path_image	) VALUES ('$product_id', '$imagepath')";
        if ($conn->query($sql_insert_image) === TRUE) {
            echo "New product and image created successfully";
        } else {
            echo "Error inserting image: " . $conn->error;
        }
    } else {
        echo "Error inserting product: " . $conn->error;
    }

    $conn->close();
}
?>
