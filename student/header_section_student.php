<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Styles/admin_dashboard.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../Styles/student_evaluation_table.css">
  <link rel="stylesheet" href="../Styles/teacher_evaluation_table.css">
  <link rel="stylesheet" href="../Styles/forums.css">
  <link href="https://fonts.googleapis.com/css?family=Epilogue:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Outfit:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
  
</head>
<body>
  <!-- cec-bgck -->
  <nav class="navbar navbar-expand-lg cec-bgck">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">Cebu Eastern College</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end fs-5 pe-5" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="student_dashboard.php">
          <i class="bi bi-house px-1"></i>Dashboard</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-light" href="evaluate_student.php">
          <i class="bi bi-journal-album px-1"></i>Evaluate</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-gear px-1"></i>Settings
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="update_student_profile.php"><i class="bi bi-person-lines-fill px-1 fs-5"></i>Update Profile</a></li>
            <li><a class="dropdown-item" href="change_student_password.php"><i class="bi bi-shield-lock-fill px-1 fs-5"></i>Change Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../index.php"><i class="bi bi-door-open-fill px-1 fs-5"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>