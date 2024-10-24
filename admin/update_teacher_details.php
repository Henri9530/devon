<?php
include("../database/dbconnect.php");
include("../function/teacher_function.php");
updateTeacher($conn);

// Check if teacher_id is provided
if (isset($_GET['teacher_id'])) {
  $teacher_id = $_GET['teacher_id'];

  // Fetch existing teacher data for the given teacher_id
  $sql = "SELECT * FROM `tblteacher` WHERE `teacher_id` = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $teacher_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result && mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $school_id = $row["school_id"];
    $fname = $row["fname"];
    $lname = $row["lname"];
    $email = $row["email"];
    $image = $row["image"];
    $department_id = $row["department_id"];
    $year = $row["year"];
    $section = $row["section"];
    $subject = $row["subject"];
  } else {
    die("No teacher found with that ID.");
  }
} else {
  die("Teacher ID is missing.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Teacher Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container m-5">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?teacher_id=' . $teacher_id); ?>"
      enctype="multipart/form-data">
      <div class="container mt-5">
        <h2 class="mb-4">Update Teacher Information</h2>
        <div class="row g-4">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="school_id" class="form-label">School ID:</label>
              <input type="text" class="form-control" id="school_id" name="school_id" minlength="7" maxlength="7"
                autocomplete="off" placeholder="Enter your school ID" required
                value="<?php echo htmlspecialchars($school_id); ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">Name:</label>
              <div class="d-flex gap-2">
                <input type="text" class="form-control" name="fname" autocomplete="off" placeholder="First name"
                  required value="<?php echo htmlspecialchars($fname); ?>">
                <input type="text" class="form-control" name="lname" autocomplete="off" placeholder="Last name" required
                  value="<?php echo htmlspecialchars($lname); ?>">
              </div>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">E-mail:</label>
              <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                placeholder="Enter your email" required value="<?php echo htmlspecialchars($email); ?>">
            </div>

            <div class="mb-3">
              <label for="department_id" class="form-label">Department:</label>
              <select name="department_id" class="form-select" required>
                <option disabled>Select Department</option>
                <?php
                $department = $conn->query("SELECT * FROM `tbldepartment`");
                while ($row = $department->fetch_assoc()): ?>
                  <option value="<?php echo $row['department_id']; ?>" <?php if ($row['department_id'] == $department_id)
                       echo 'selected'; ?>>
                    <?php echo htmlspecialchars($row['department_name']); ?>
                  </option>
                <?php endwhile; ?>
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label for="year" class="form-label">Year:</label>
              <input type="number" class="form-control" id="year" name="year" autocomplete="off"
                placeholder="Enter your year" required value="<?php echo htmlspecialchars($year); ?>">
            </div>

            <div class="mb-3">
              <label for="section" class="form-label">Section:</label>
              <input type="number" class="form-control" id="section" name="section" autocomplete="off"
                placeholder="Enter your section" required value="<?php echo htmlspecialchars($section); ?>">
            </div>

            <div class="mb-3">
              <label for="subject" class="form-label">Subject:</label>
              <input type="text" class="form-control" id="subject" name="subject" autocomplete="off"
                placeholder="Enter your subject" required value="<?php echo htmlspecialchars($subject); ?>">
            </div>


            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-primary w-100" name="submit">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function previewImage(event) {
      const img = document.getElementById('imgss');
      img.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>

</body>

</html>