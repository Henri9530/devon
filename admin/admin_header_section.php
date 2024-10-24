<?php
  include("../database/dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Styles/admin_dashboard.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Admin Dashboard</title>
</head>
<body>
  <div class="container-full p-3">
    <ul class="nav d-flex justify-content-between align-items-center cec-bgck admin_container">
      <li class="nav-item">
        <button class="btn btn-md text-white fs-3 shadow-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
          <i class="bi bi-list px-3"></i>Dashboard
        </button>
      </li>
    </ul>

    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel"><i class="bi bi-list px-3"></i>Dashboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-flex flex-column justify-content-between align-items-start">
        <div>

          <div class="d-flex justify-evenly align-items-center m-3">
            <div>
              <img src="../Svgs/student_sidebar.svg"
                style="
                  height:60px;
                  width:60px;
                ">
            </div>
            <div class="">
             <a href="student_table.php" class="btn btn-sm fs-5 px-3">Manage Student</a>
            </div>
          </div>

          <div class="d-flex justify-evenly align-items-center m-3">
            <div>
              <img src="../Svgs/teacher_sidebar.svg"
                style="
                  height:60px;
                  width:60px;
                ">
            </div>
            <div>
             <a href="teacher_table.php" class="btn btn-sm fs-5 px-3">Manage Teacher</a>
            </div>
          </div>

          <div class="d-flex justify-evenly align-items-center m-3">
            <div>
              <img src="../Svgs/department_sidebar.svg"
                style="
                  height:50px;
                  width:50px;
                ">
            </div>
            <div>
             <a href="#" class="btn btn-sm fs-5 px-4">Manage Department</a>
            </div>
          </div>

          <div class="d-flex justify-evenly align-items-center m-3">
            <div>
              <img src="../Svgs/academic_sidebar.svg"
                style="
                  height:40px;
                  width:40px;
                ">
            </div>
            <div>
             <a href="#" class="btn btn-sm fs-5  mx-4">Manage Academic</a>
            </div>
          </div>

          <div class="d-flex justify-evenly align-items-center m-3">
            <div>
              <img src="../Svgs/question_sidebar.svg"
                style="
                  height:60px;
                  width:60px;
                ">
            </div>
            <div>
             <a href="admin_questionnaire.php" class="btn btn-sm fs-5 mx-1">Manage Questionnaire</a>
            </div>
          </div>

          <div class="d-flex justify-evenly align-items-center m-3">
            <div>
              <img src="../Svgs/admin_sidebar.svg"
                style="
                  height:40px;
                  width:40px;
                ">
            </div>
            <div>
             <a href="#" class="btn btn-sm fs-5 mx-4">Manage User</a>
            </div>
          </div>

          <div class="d-flex justify-evenly align-items-center m-3">
            <div>
              <img src="../Svgs/archive_sidebar.svg"
                style="
                  height:38px;
                  width:38px;
                ">
            </div>
            <div>
             <a href="#" class="btn btn-sm fs-5 mx-4">Archive</a>
            </div>
          </div>






        </div>
        <div>
          
        <div class="d-flex justify-evenly align-items-center m-3">
            <div>
              <img src="../Svgs/logout_sidebar.svg"
                style="
                  height:38px;
                  width:38px;
                ">
            </div>
            <div>
             <a href="../logout.php" class="btn btn-sm fs-5 mx-4">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
