<?php
include("../database/dbconnect.php");
session_start();

if (isset($_SESSION['username'])) {
  $fullname = $_SESSION['username'];
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
  <title>ADMIN DASHBOARD</title>
</head>

<body>
  <section>
    <div class="b_container">
      <?php
      include("admin_header_section.php");
      ?>
      <div class="container-full p-5 m-3 rounded main_container">
        <div>
          <h1 class="fs-1 text-white">Hello, Welcome <?php echo htmlspecialchars($fullname); ?></h1>
          <span>
            <p class="fs-5 text-white">School Year: 2024 - 2025, 1st Semester</p>
            <p class="fs-5 text-white">Status: On-Going</p>
          </span>
        </div>
        <div class="container-full mt-5">
          <div class="row justify-content-start align-items-center">
            <div class="col-4">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h5 class="card-title">Teachers</h5>
                  <h6 class="card-subtitle mb-3 text-muted">Manage Teacher Data</h6>
                  <p class="card-text">To view the data, click "Manage Teacher" below.</p>

                  <div class="d-flex justify-content-between align-items-center">
                    <a href="teacher_table.php" class="btn btn-primary">
                      Manage Teacher
                    </a>
                    <span class="badge bg-dark rounded-full fs-1" style="padding: 0.5em 1em;">
                      <?php
                      $count = 0;
                      $sql = "SELECT COUNT(*) AS total FROM tblteacher";
                      $result = mysqli_query($conn, $sql);

                      if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $count = $row['total'];
                      }
                      echo $count;
                      ?>
                      <span class="visually-hidden">Total Teachers</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h5 class="card-title">Student</h5>
                  <h6 class="card-subtitle mb-3 text-muted">Manage Student Data</h6>
                  <p class="card-text">To view the data, click "Manage Student" below.</p>

                  <div class="d-flex justify-content-between align-items-center">
                    <a href="student_table.php" class="btn btn-primary">
                      Manage Student
                    </a>
                    <span class="badge bg-dark rounded-full fs-1" style="padding: 0.5em 1em;">
                      <?php
                      $count = 0;
                      $sql = "SELECT COUNT(*) AS total FROM tblstudent";
                      $result = mysqli_query($conn, $sql);

                      if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $count = $row['total'];
                      }
                      echo $count;
                      ?>
                      <span class="visually-hidden">Total Teachers</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="card w-100">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h5 class="card-title">Admin</h5>
                  <h6 class="card-subtitle mb-3 text-muted">Manage Admin Data</h6>
                  <p class="card-text">To view the data, click "Manage Admin" below.</p>

                  <div class="d-flex justify-content-between align-items-center">
                    <a href="teacher_table.php" class="btn btn-primary">
                      Manage Admin
                    </a>
                    <span class="badge bg-dark rounded-full fs-1" style="padding: 0.5em 1em;">
                      <?php
                      $count = 0;
                      $sql = "SELECT COUNT(*) AS total FROM admin";
                      $result = mysqli_query($conn, $sql);

                      if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $count = $row['total'];
                      }
                      echo $count;
                      ?>
                      <span class="visually-hidden">Total Teachers</span>
                    </span>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>


</body>

</html>