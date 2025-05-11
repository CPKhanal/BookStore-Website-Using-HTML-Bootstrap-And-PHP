<?php
session_start();

// Function to add item to cart
function addToCart($itemName, $price)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if item already exists in cart
    $itemIndex = array_search($itemName, array_column($_SESSION['cart'], 'Item_Name'));

    if ($itemIndex !== false) {
        echo "<script>alert('Item Already Added'); window.location.href='index.php';</script>";
    } else {
        $_SESSION['cart'][] = [
            'Item_Name' => htmlspecialchars($itemName),
            'Price' => floatval($price),
            'Quantity' => 1
        ];
        header("Location: index.php");
        exit();
    }
}

// Function to remove item from cart
function removeItem($itemName)
{
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['Item_Name'] === $itemName) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
            header("Location: mycart.php");
            exit();
        }
    }
}

// Function to modify quantity
function modifyQuantity($itemName, $newQuantity)
{
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['Item_Name'] === $itemName) {
            $_SESSION['cart'][$key]['Quantity'] = intval($newQuantity);
            header("Location: mycart.php");
            exit();
        }
    }
}

// Handling POST Requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['Add_To_Cart'])) {
        addToCart($_POST['Item_Name'], $_POST['Price']);
    }

    if (isset($_POST['Remove_Item'])) {
        removeItem($_POST['Item_Name']);
    }

    if (isset($_POST['Mod_Quantity'])) {
        modifyQuantity($_POST['Item_Name'], $_POST['Mod_Quantity']);
    }
}
?>
