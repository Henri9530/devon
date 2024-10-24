<?php
include("../database/dbconnect.php");
function insertStudent($conn)
{
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $school_id = $_POST['school_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $fname . " " . $lname;
    $email = $_POST['email'];
    $department_id = $_POST['department_id'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $password = $_POST['password'];

    $default_pass = $school_id;

    if ($password === $default_pass) {
      echo "Your password is:" . $default_pass;
    } else {

      echo "does not match";
    }

    if ($_FILES['hen']['error'] === 4) {
      echo "<script>alert('Image not exist');</script>";
    } else {
      // File data
      $imgname = $_FILES['hen']['name'];
      $imgsize = $_FILES['hen']['size'];
      $imgtmp = $_FILES['hen']['tmp_name'];

      // Validate image extension
      $imgvalid = ['jpeg', 'jpg', 'png', 'svg'];
      $imgEx = explode('.', $imgname);
      $imgEx = strtolower(end($imgEx));

      // Validate extension and size
      if (!in_array($imgEx, $imgvalid)) {
        echo "<script>alert('Invalid extension');</script>";
      } else if ($imgsize > 1000000) {
        echo "<script>alert('Image is too large');</script>";
      } else {
        // Create a unique filename
        $newimg = uniqid() . '.' . $imgEx;
        move_uploaded_file($imgtmp, '../pic/pics' . $newimg);

        // Prepared statement to insert the data
        $sql = "INSERT INTO `tblstudent` (school_id, fname, lname, email, password, department_id, year, section, subject, image) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
          // Bind parameters to the prepared statement
          $stmt->bind_param('ssssssiiss', $school_id, $fname, $lname, $email, $default_pass, $department_id, $year, $section, $subject, $newimg);

          // Execute the prepared statement
          if ($stmt->execute()) {
            echo "<script>alert('Teacher Successfully Added');</script>";
            header('Location: ../admin/student_table.php');
            exit();
          } else {
            echo "<script>alert('Error: Could not execute query.');</script>";
          }

          // Close the statement
          $stmt->close();
        } else {
          echo "<script>alert('Error: Could not prepare query.');</script>";
        }
      }
    }
  }
}

function updateStudent($conn) {
  // Get student ID from URL
  $student_id = isset($_GET["student_id"]) ? $_GET["student_id"] : null;

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
      // Collect updated data from the form
      $school_id = $_POST['school_id'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $department_id = $_POST['department_id'];
      $year = $_POST['year'];
      $section = $_POST['section'];
      $subject = $_POST['subject'];
      $default_pass = $school_id; // Set default password

      // Initialize image variable
      $newimg = null;

      if (isset($_FILES['hen']) && $_FILES['hen']['error'] !== 4) {
          // File data
          $imgname = $_FILES['hen']['name'];
          $imgsize = $_FILES['hen']['size'];
          $imgtmp = $_FILES['hen']['tmp_name'];

          // Validate image extension
          $imgvalid = ['jpeg', 'jpg', 'png', 'svg'];
          $imgEx = strtolower(pathinfo($imgname, PATHINFO_EXTENSION));

          // Validate extension and size
          if (!in_array($imgEx, $imgvalid)) {
              echo "<script>alert('Invalid extension. Only jpeg, jpg, png, or svg are allowed.');</script>";
              return;
          } elseif ($imgsize > 1000000) {
              echo "<script>alert('Image is too large. Maximum size is 1MB.');</script>";
              return;
          } else {
              // Create a unique filename
              $newimg = uniqid('', true) . '.' . $imgEx;
              if (!move_uploaded_file($imgtmp, '../pic/pics/' . $newimg)) {
                  echo "<script>alert('Failed to upload image.');</script>";
                  return;
              }
          }
      }

      // Prepare SQL query
      $sql = "UPDATE `tblstudent` SET school_id = ?, fname = ?, lname = ?, email = ?, password = ?, department_id = ?, year = ?, section = ?, subject = ?" . ($newimg ? ", image = ?" : "") . " WHERE student_id = ?";

      if ($stmt = $conn->prepare($sql)) {
          // Determine number of parameters for binding
          $params = [$school_id, $fname, $lname, $email, $default_pass, $department_id, $year, $section, $subject];
          if ($newimg) {
              $params[] = $newimg;
          }
          $params[] = $student_id;

          // Create type string
          $types = 'ssssssiis' . ($newimg ? 's' : '') . 's';
          
          // Bind parameters to the prepared statement
          $stmt->bind_param($types, ...$params);

          // Execute the prepared statement
          if ($stmt->execute()) {
              echo "<script>alert('Student Successfully Updated');</script>";
              header('Location: ../admin/student_table.php');
              exit();
          } else {
              echo "<script>alert('Error: Could not execute query.');</script>";
          }

          // Close the statement
          $stmt->close();
      } else {
          echo "<script>alert('Error: Could not prepare query.');</script>";
      }
  }
}





function displayStudent($conn)
{
  $sql = "SELECT * FROM `tblstudent`";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Table starts
    echo '

      <tbody>';

    foreach ($result as $row) {
      echo '
      <tr>
        <td class="fs-6 text-center">' . ($row['school_id']) . '</td>
        <td class="text-[15px]">
          <div class="avatar d-flex justify-content-center align-items-center">
            <div class="w-20">
              <img src="../pic/pics' . ($row['image']) . '" alt="Profile" style="height:60px; width:60px;">
            </div>
          </div>
        </td>
        <td class="text-[15px] w-[150px]">' . ($row['fname'] . ' ' . $row['lname']) . '</td>
        <td class="fs-6 text-center">' . ($row['email']) . '</td>
        <td class="fs-6 text-center">' . ($row['department_id']) . '</td>
        <td class="fs-6 text-center">' . ($row['year'] . ' - ' . $row['section']) . '</td>
        <td class="fs-6 text-center">' . ($row['subject']) . '</td>
        <td class="fs-6 text-center">' . ($row['teacher_count']) . '</td>
        <td class="fs-6 text-center">' . ($row['is_done']) . '</td>
        
        <td class="text-[15px] d-flex flex-column justify-content-center align-items-center ">
          <div>
            <a role="button" class=" mt-1 mx-1 px-3 btn btn-sm btn-outline btn-primary text-[16px]"
              href="../admin/update_student_details.php?student_id=' . $row['student_id'] . '">
               <i class="bi bi-gear px-1 fs-6"></i>Update
            </a> 
          </div>
          <div>
            <a role="button" class=" mt-1 mx-1 px-3 btn btn-sm btn-outline btn-danger text-[16px]">
             
              <i class="bi bi-trash px-1 fs-6"></i>Remove</a>  
          </div>
        </td>
      </tr>';
    }

    // Table ends
    echo '
      </tbody>
    </table>';
  } else {
    echo '<p class="bg-danger p-3 text-white rounded fs-5"><i class="bi bi-person-x-fill px-1"></i>No Data found.</p>';
  }
}


function searchStudent($conn)
{
  $searchTerm = '';
  $sql = "SELECT DISTINCT school_id, fname, lname, email, department_id, year, section, subject, image  FROM `tblstudent`"; // Default SQL to display all students
  if (isset($_GET['enter']) && !empty($_GET['search'])) { // If search is submitted and is not empty
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
    if (is_numeric($searchTerm)) {
      // Search for school_id as a number
      $sql = "SELECT * FROM `tblstudent`
            WHERE `school_id` LIKE '%$searchTerm%'";
    } else {
      $searchTerm = strtolower($searchTerm); // Convert search term to lowercase
      $sql = "SELECT * FROM `tblstudent`
            WHERE LOWER(`school_id`) LIKE '%$searchTerm%'
            OR LOWER(`fname`) LIKE '%$searchTerm%'
            OR LOWER(`lname`) LIKE '%$searchTerm%'
            OR LOWER(`email`) LIKE '%$searchTerm%'
            OR LOWER(`school_id`) LIKE '%$searchTerm%'
            OR LOWER(`department_id`) LIKE '%$searchTerm%'
            OR LOWER(`year`) LIKE '%$searchTerm%'
            OR LOWER(`section`) LIKE '%$searchTerm%'
            OR LOWER(`subject`) LIKE '%$searchTerm%'";
    }
  }
  $result = mysqli_query($conn, $sql);
}

function studentLogin($password, $username)
{
  global $conn; // Access the $conn variable from the global scope
  try {
    // Query to select the student by school ID
    $sql = "SELECT * FROM `tblstudent` WHERE school_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the student exists
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      // Verify the password (assuming passwords are hashed)
      if (password_verify($password, $row['password'])) {
        // Store student name in session if login is successful
        $_SESSION['student_name'] = $row['fname'] . " " . $row['lname'];
        header('Location: ../student/student_dashboard.php');
        exit();
      } else {
        // Invalid password
        echo "Invalid student credentials.";
      }
    } else {
      // Student ID not found
      echo "Invalid student credentials.";
    }
  } catch (mysqli_sql_exception $e) {
    error_log("Login Failed: " . $e->getMessage());
    echo "Error during student login.";
  }
}

?>