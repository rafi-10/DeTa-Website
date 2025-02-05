<?php
require_once('tcpdf/tcpdf.php');


if (isset($_POST['bookTickets'])) {
  $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
  $date = isset($_POST['dateSelect']) ? $_POST['dateSelect'] : '';
  $time = isset($_POST['timeSelect']) ? $_POST['timeSelect'] : '';
  $quantity = isset($_POST['quantitySelect']) ? $_POST['quantitySelect'] : '';
  $selectedSeats = isset($_POST['selectedSeats']) ? $_POST['selectedSeats'] : '';

  // Create a new PDF instance
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  // Set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('Your Name');
  $pdf->SetTitle('Movie Ticket Booking');
  $pdf->SetSubject('Movie Ticket Details');
  $pdf->SetKeywords('Tickets, Movie, Booking');

  // Add a page
  $pdf->AddPage();

  // Set some content to display in the PDF
  $content = "
        <h1>Movie Ticket Booking Details</h1>
        <p><strong>Full Name:</strong> $fullName</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone Number:</strong> $phoneNumber</p>
        <p><strong>Date:</strong> $date</p>
        <p><strong>Time Slot:</strong> $time</p>
        <p><strong>Quantity:</strong> $quantity</p>
        <p><strong>Selected Seats:</strong> $selectedSeats</p>
        ";

  // Output the content to PDF
  $pdf->writeHTML($content, true, false, true, false, '');

  // Output PDF as a file named movie_ticket.pdf
 

  // Redirect the user back to the previous page after generating the PDF
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit();
} else {
  // Handle the case where the form is not submitted properly
  echo "Form submission error!";
}
?>