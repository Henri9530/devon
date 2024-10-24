<?php
  include('header_section_student.php');
  session_start();

  // Ensure that the session variables are set before using them
  if (isset($_SESSION['fname'])) {
    $fullname = $_SESSION['fname'];
    } else {
    // Handle the case where session variables are not set
    $fullname = "Guest"; // Default value if not logged in
    // Optionally, you could redirect to a login page
    // header('Location: login.php'); exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
</head>
<body>
  <div class="container-lg m-5">
    <div class="fs-5 container">
      <h4>Hello,  <?php echo htmlspecialchars($fullname); ?>!</h4>
        <p>Thank you for taking the time to evaluate your teacher. Your feedback is very important to us and helps improve the quality of education.</p>
        <p>Please take a few moments to fill out the evaluation form carefully and thoughtfully. Your responses will remain confidential.</p>
        <p>When you're ready, click "Proceed" to begin the evaluation.</p>
      </div>
      <a 
        href="evaluate_student.php"
        class="btn btn-primary btn-md m-3">
        <i class="bi bi-journal-album px-1"></i>Proceed
      </a>
  </div>
  
</body>
</html>