<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve form data
  $customerName = $_POST["customerName"];
  $customerEmail = $_POST["customerEmail"];
  $menuItems = $_POST["menuItems"];
  $quantity = $_POST["quantity"];
  $date = $_POST["date"];
  $time = $_POST["time"];
  $people = $_POST["people"];



  // You can process and store the order data in your backend/database here

  // Generate the confirmation message
  $confirmationMessage = "Your order will be ready soon, " . $customerName . "!";

  // Return the confirmation message as JSON response
  header("Content-Type: application/json");
  echo json_encode(array("confirmationMessage" => $confirmationMessage));
}
?>
