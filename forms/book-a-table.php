<?php
// Check if form is submitted before accessing $_POST data
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Replace with the correct path to the PHP Email Form library
  $php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';

  if (file_exists($php_email_form_path)) {
    include($php_email_form_path);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  // Create a new instance of PHP_Email_Form
  $book_a_table = new  rm;

  // Enable AJAX mode
  $book_a_table->ajax = true;

  // Set the receiving email address
  $receiving_email_address = 'diningdelight721@gmail.com';

  // Set the recipient's email address
  $book_a_table->to = $receiving_email_address;

  // Sanitize and set the sender's name and email from the form data
  $book_a_table->from_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $book_a_table->from_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

  // Set the subject of the email
  $book_a_table->subject = "New table booking request from the website";

  // Set the SMTP configuration
  $book_a_table->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );

  // Add form data as email message content
  $book_a_table->add_message($_POST['name'], 'Name');
  $book_a_table->add_message($_POST['email'], 'Email');
  $book_a_table->add_message($_POST['phone'], 'Phone', 4);
  $book_a_table->add_message($_POST['date'], 'Date', 4);
  $book_a_table->add_message($_POST['time'], 'Time', 4);
  $book_a_table->add_message($_POST['people'], '# of people', 1);
  $book_a_table->add_message($_POST['message'], 'Message');

  // Send the email and echo the result (success or error)
  echo $book_a_table->send();
} else {
  // If the form is not submitted, handle this situation accordingly (e.g., show a form to be filled)
  // You can display an HTML form here.
  // For example:
  // echo '<form method="post"> ... </form>';
}
?>
