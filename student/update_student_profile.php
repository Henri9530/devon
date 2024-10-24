<?php
  include('header_section_student.php');
  include('../function/student_function.php');
  insertStudent($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Profile</title>
</head>
<body>
 
<div class="container-lg p-5">
    <div class="mb-5">
      <h1><i class="bi bi-person-bounding-box px-3"></i>Update Student Profile</h1>
    </div>
  <form 
    action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>"
    method="POST"
    >
    <div class="mb-3">
      <label
         for="exampleInputEmail1"
          class="form-label fs-5">First Name</label>
      <input 
        type="text" 
        class="form-control" 
        id="exampleInputEmail1" 
        aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label
         for="exampleInputEmail1"
          class="form-label fs-5">Last Name</label>
      <input 
        type="text" 
        class="form-control" 
        id="exampleInputEmail1" 
        aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label 
        for="exampleInputEmail1" 
        class="form-label fs-5">Email</label>
      <input 
        type="email" 
        class="form-control" 
        id="exampleInputEmail1" 
        aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label 
        for="exampleInputEmail1" 
        class="form-label fs-5">Image</label>
      <input 
        type="file" 
        class="form-control" 
        id="exampleInputEmail1" 
        aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary fs-6 w-100">Save Changes Password</button>
  </form>
</div>
</body>
</html>