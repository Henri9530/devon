<?php
 session_start();
  include("./database/dbconnect.php");  
  include("./admin/admin_login.php");
 

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
  
     adminLogin($username, $password);

      $sql = "SELECT school_id, fname FROM `tblstudent` WHERE school_id = ? AND password = ?";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      $result = $stmt->get_result();


      if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $_SESSION["school_id"] = $student["school_id"];
        $_SESSION["fname"] = $student["fname"];
        header("Location: ./student/student_dashboard.php");
        exit;
    } else {
      $error = "Invalid username or password";
  }

  }
  $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
          background-color: #e7f3ff;
        }
        section {
            padding: 100px 0;
        }
    </style>
</head>

<body>

<section>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 text-center text-lg-left">
                <h1 class="display-4 font-weight-bold">Welcome to Cebu Eastern College Evaluation System</h1>
                <p class="lead mt-4">
                    We're glad to have you here. Please log in to access your evaluation dashboard. 
                    Your input plays a vital role in shaping a better learning experience for everyone.
                </p>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group">
                                <label for="schoolID" class="fs-4">School ID</label>
                                <input type="text" id="schoolID" name="username" class="form-control" placeholder="School ID" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="fs-4">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
