
<?php
include("../database/dbconnect.php");


// Function to create the question in the database
function createQuestion($school_year_id, $question, $criteria_id)
{
  global $conn; // Access the $conn variable from the global scope
  try {

    $csql = "SELECT * FROM tblquestion WHERE question =?";
    $stmtc = $conn->prepare($csql);
    $stmtc->bind_param("s", $question);
    $stmtc->execute();
    $stmtc->store_result();

    if ($stmtc->num_rows() > 0) {
      echo "<script>
              alert('Question already exists.');
            </script>";
    } else {
      $sql = "INSERT INTO tblquestion (school_year_id, question, criteria_id) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("isi", $school_year_id, $question, $criteria_id);
      if ($stmt->execute()) {
        // Success message
        echo "<script>alert('Question successfully created.');</script>";
      } else {
        // Handle the failure
        echo "Error: Unable to insert question.";
      }

      // Close the statement
      $stmt->close();
    }
    $stmtc->close();
  } catch (mysqli_sql_exception $e) {
    // Log error and display a generic message
    error_log("Insert Failed: " . $e->getMessage());
    echo "Error during question creation.";
  }
}

// Function to display questions grouped by criteria
function displayCriteriaWithQuestions()
{
  global $conn; // Access the $conn variable from the global scope
  try {
    $sql = "SELECT c.criteria, q.question 
                FROM tblcriteria c 
                LEFT JOIN tblquestion q ON c.criteria_id = q.criteria_id"; // Adjusted join condition
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $questionList = [];

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $criteria = $row['criteria'];
        $question = $row['question'];

        // Add criteria to the array if it doesn't already exist
        if (!isset($questionList[$criteria])) {
          $questionList[$criteria] = [];
        }

        // If a question exists, add it to the corresponding criteria
        if ($question !== null) {  // Ensure question is not null
          $questionList[$criteria][] = $question;
        }
      }
    }
    return $questionList;
  } catch (mysqli_sql_exception $e) {
    error_log("Error fetching criteria with questions: " . $e->getMessage());
    return [];
  }
}

// Function to save answers
// function submitAnswer($school_year_id, $question_id, $answer)
// {
//   global $conn;
//   try {
//     $sql = "INSERT INTO tblanswer (school_year_id, question_id, answer) VALUES (?, ?, ?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("iis", $school_year_id, $question_id, $answer);
//     $stmt->execute();
//     $stmt->close();
//   } catch (mysqli_sql_exception $e) {
//     error_log("Answer insert failed: " . $e->getMessage());
//     echo "Error saving answer.";
//   }
// }

?>
