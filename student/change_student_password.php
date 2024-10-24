<?php
  include('header_section_student.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
</head>
<body>
<div class="container-lg p-5">
    <div class="mb-5">
      <h1><i class="bi bi-shield-lock-fill px-1"></i>Change Password</h1>
    </div>
  <form>
    <div class="mb-3">
      <label
         for="exampleInputEmail1"
          class="form-label fs-5">Current Password</label>
      <input 
        type="password" 
        class="form-control" 
        id="exampleInputEmail1" 
        required>
    </div>
    <div class="mb-3">
      <label
         for="exampleInputEmail1"
          class="form-label fs-5">New Password</label>
      <input 
        type="password" 
        class="form-control" 
        id="exampleInputEmail1" 
        required>
    </div>
    <div class="mb-3">
      <label 
        for="exampleInputEmail1" 
        class="form-label fs-5">Confirm New Password</label>
      <input 
        type="password" 
        class="form-control" 
        id="exampleInputEmail1" 
        required>
    </div>
    <button type="submit" class="btn btn-primary fs-6 w-100">Save Changes Password</button>
  </form>
</div>
</body>
</html>