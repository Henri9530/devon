<?php
include("../database/dbconnect.php");
include("../function/student_function.php");
session_start();
insertStudent($conn);
searchStudent($conn);
include("../admin/header_table_section.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <section>
    <div class="container-full p-3">
      <div class="container-full rounded shadow bg-light">
        <div class="fs-3 p-3 d-flex justify-content-between align-items-center cec-bgck text-white rounded-top">
          <div>
            <h1 class="h3">Student Evaluation Status</h1>
          </div>
          <div>
            <form class="d-flex" role="search" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-light fs-6 text-black fw-semibold" type="submit">Search</button>
            </form>
          </div>
        </div>

        <div class="table-responsive p-2">
          <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-info text-center">
              <tr>
                <th scope="col">School_ID</th>
                <th scope="col">Profile</th>
                <th scope="col">FullName</th>
                <th scope="col">Email</th>
                <th scope="col">Year & Section</th>
                <th scope="col">Department</th>
                <th scope="col">Subject</th>
                <th scope="col">Teacher_Count</th>
                <th scope="col">Is_Done</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
              <?php 
                displayStudent($conn);
              ?>
          </table>

        </div>

        <div class="container-full m-3 p-3">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeacher">
            Add Student
          </button>
          <a href="admin_dashboard.php" class="btn btn-md btn-primary">Return</a>

          <!-- Modal -->
          <div class="modal modal-lg fade" id="addTeacher" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                    enctype="multipart/form-data">
                    <div class="row g-4">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="school_id" class="form-label">School Id:</label>
                          <input type="text" class="form-control" id="school_id" name="school_id" minlength="7"
                            maxlength="7" autocomplete="off" placeholder="Enter your school id" required>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Name:</label>
                          <div class="d-flex gap-2">
                            <input type="text" class="form-control" name="fname" autocomplete="off"
                              placeholder="First name" required>
                            <input type="text" class="form-control" name="lname" autocomplete="off"
                              placeholder="Last name" required>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="email" class="form-label">E-mail:</label>
                          <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                            placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                          <label for="department_id" class="form-label">Department:</label>
                          <select name="department_id" class="form-select" required>
                            <option value="" disabled selected>Select Department</option>
                            <?php
                            $department = $conn->query("SELECT * FROM tbldepartment");
                            while ($row = $department->fetch_assoc()): ?>
                              <option value="<?php echo $row['department_id']; ?>">
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
                            placeholder="Enter your year" required>
                        </div>

                        <div class="mb-3">
                          <label for="section" class="form-label">Section:</label>
                          <input type="number" class="form-control" id="section" name="section" autocomplete="off"
                            placeholder="Enter your section" required>
                        </div>

                        <div class="mb-3">
                          <label for="subject" class="form-label">Subject:</label>
                          <input type="text" class="form-control" id="subject" name="subject" autocomplete="off"
                            placeholder="Enter your subject" required>
                        </div>

                        <div class="mb-3">
                          <div class="d-flex justify-content-center align-items-center mb-2">
                            <div
                              class="border border-3 border-secondary"
                              style="height: 150px; width: 150px; position: relative;">
                              <img src="" id="imgss" class="img-fluid"
                                style="display: none; height: 100%; width: 100%; object-fit: cover;"
                                alt="Profile Preview">
                            </div>
                          </div>
                          <input type="file" name="hen" id="hen" accept=".jpeg, .jpg, .png, .svg" class="form-control"
                            onchange="previewImage(event)" hidden>
                          <label for="hen" class="btn btn-outline-primary w-100">Upload Image</label>
                        </div>

                        <div class="d-flex justify-content-between">
                          <button type="submit" class="btn btn-primary w-100" name="submit">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    function previewImage(event) {
      const imgElement = document.getElementById('imgss');
      const file = event.target.files[0];
      if (file) {
        imgElement.src = URL.createObjectURL(file);
        imgElement.style.display = 'block'; // Show the image once uploaded
      } else {
        imgElement.style.display = 'none'; // Hide if no file is selected
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>