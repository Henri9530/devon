<?php
include('database/dbconnect.php');
session_start();
function insertAY($conn)
{
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
      $year = $_POST['year'];
      $semester = $_POST['semester'];
      $status = $_POST['status'];

      // Increment year for the next academic year
      $nextYear = $year + 1;

      try {
        $sql = "INSERT INTO tblschoolyear (annual_year, semester, is_status) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $year, $semester, $status); // Adjusted types to 'i' for integer if necessary
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
          header('Location: schoolyear_view.php');
          exit();
        } else {
          echo "Error: Unable to insert academic year.";
        }
      } catch (mysqli_sql_exception $e) {
        error_log('Database error: ' . $e->getMessage());
        echo "Error: " . $e->getMessage(); // Display error message for debugging
      }
    }
  }
}
