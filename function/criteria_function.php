<?php

function createCriteria($criteria)
{
  global $conn; // Access the $conn variable from the global scope
  try {

    $csql = "SELECT * FROM tblcriteria WHERE criteria =?";
    $stmtc = $conn->prepare($csql);
    $stmtc->bind_param("s", $criteria);
    $stmtc->execute();
    $stmtc->store_result();

    if ($stmtc->num_rows() > 0) {
      echo "<script>
              alert('Criteria already exists.');
            </script>";
    } else {
      $sql = "INSERT INTO tblcriteria (criteria) VALUES (?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $criteria);
      if ($stmt->execute()) {
        // Success message
        echo "<script>
             alert('Criteria successfully created.');
            </script>";
      } else {
        // Handle the failure
        echo "Error: Unable to insert criteria.";
      }
      header("Location: admin_questionnaire.php");
      // Close the statement
      $stmt->close();
    }
    $stmtc->close();
  } catch (mysqli_sql_exception $e) {
    // Log error and display a generic message
    error_log("Insert Failed: " . $e->getMessage());
    echo "Error during criteria creation.";
  }
}


function displayCriteria()
{
  global $conn; // Access the $conn variable from the global scope
  try {
    $sql = "SELECT * FROM tblcriteria";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $criteriaList = [];

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $criteriaList[] = $row['criteria']; // Assuming 'criteria' is the column name
      }
    }
    return $criteriaList;
  } catch (mysqli_sql_exception $e) {
    error_log("Error fetching criteria: " . $e->getMessage());
    return [];
  }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['submit'])) {
    $criteria = $_POST['criteria'];

    if (!empty($criteria)) {
      createCriteria($criteria);
      header('loacation: criteria_view.php');
      exit();
    }
  }
}
$criteriaList = displayCriteria();

?>