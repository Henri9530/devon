<?php 
include("../database/dbconnect.php");
include("../function/student_function.php");
updateStudent($conn);

$student_id = $_GET['student_id'];

// Fetch existing student data
$sql = "SELECT * FROM `tblstudent` WHERE student_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param('i', $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {  
        $row = $result->fetch_assoc();
        $school_id = $row['school_id'];
        $profile = $row['image'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $department = $row['department_id'];
        $year = $row['year']; 
        $section = $row['section']; 
        $subject = $row['subject'];  
    } else {
        echo "<script>alert('Student not found.'); window.location.href='student_table.php';</script>";
        exit;
    }
    $stmt->close();
} else {
    echo "<script>alert('Error: Could not prepare query.');</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Update Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <header class="bg-primary text-white text-center py-4">
    <h1>Student Update Profile</h1>
    <p class="lead">Update your profile information below</p>
  </header>
  <div class="container m-3">
    <a href="student_table.php" class="btn btn-sm btn-dark fs-6">Return</a>
  </div>
  <div class="container m-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h2 class="text-center mb-4">Registration Form</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?student_id=' . $student_id); ?>" enctype="multipart/form-data">
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="school_id" class="form-label">School ID:</label>
                    <input type="text" class="form-control" id="school_id" name="school_id" minlength="7" maxlength="7"
                      placeholder="Enter your school ID" value="<?php echo htmlspecialchars($school_id); ?>" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <div class="d-flex gap-2">
                      <input type="text" class="form-control" name="fname" placeholder="First name" value="<?php echo htmlspecialchars($fname); ?>" required>
                      <input type="text" class="form-control" name="lname" placeholder="Last name" value="<?php echo htmlspecialchars($lname); ?>" required>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="department_id" class="form-label">Department:</label>
                    <select name="department_id" class="form-select" required>
                      <option value="" disabled>Select Department</option>
                      <?php
                      $department = $conn->query("SELECT * FROM tbldepartment");
                      while ($dep_row = $department->fetch_assoc()): ?>
                        <option value="<?php echo $dep_row["department_id"]; ?>" <?php echo ($dep_row["department_id"] == $department) ? 'selected' : ''; ?>>
                          <?php echo htmlspecialchars($dep_row["department_name"]); ?>
                        </option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="year" class="form-label">Year:</label>
                    <input type="number" class="form-control" id="year" name="year" placeholder="Enter your year" value="<?php echo htmlspecialchars($year); ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="section" class="form-label">Section:</label>
                    <input type="number" class="form-control" id="section" name="section" placeholder="Enter your section" value="<?php echo htmlspecialchars($section); ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="subject" class="form-label">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your subject" value="<?php echo htmlspecialchars($subject); ?>" required>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-100 mt-3" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function previewImage(event) {
      const file = event.target.files[0];
      const img = document.getElementById('imgss');
      const message = document.getElementById('image-message');

      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          img.src = e.target.result;
          img.style.display = 'block';
          message.style.display = 'none'; // Hide the message when an image is uploaded
        }
        reader.readAsDataURL(file);
      } else {
        img.style.display = 'none';
        message.style.display = 'block'; // Show message if no image
      }
    }
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
