<?php
  include('header_section_student.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Evaluation Form</title>
</head>
<body>
<section>

  <div class="container-lg mt-5 p-5">
    <div class="row justify-content-between align-items-start g-5">
      <div class="col-12 p-3">
        <h1 class="mb-4">
          <div>Teacher's List</div>
        </h1>
        <div class="row justify-content-center aling-items-center profile-js">

        </div>

        <div class="mt-5">
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label lead">Instructor Name</label>
              <input 
                type="text" 
                class="form-control"
                required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label lead">Subject</label>
              <input 
                type="text" 
                class="form-control"
                required>
            </div>
            <input type="submit" value="Evaluate Teacher" class="btn btn-primary btnSubmit">
          </form>
        </div>
      </div>

      <!-- Question 1 -->
      <div class="col-12">
        <div class="m-2">
          <div class="m-2">1. Teaching Quality</div>
          <p class="m-2">How would you rate the teacher's knowledge of the subject?</p>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="Excellent">
            <label class="form-check-label" for="Excellent">Excellent</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="Good">
            <label class="form-check-label" for="Good">Good</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="Average">
            <label class="form-check-label" for="Average">Average</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="Poor">
            <label class="form-check-label" for="Poor">Poor</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="Very Poor">
            <label class="form-check-label" for="Very Poor">Very Poor</label>
          </div>
        </div>
      </div>

      <!-- Question 2 -->
      <div class="col-12">
        <div class="m-2">
          <div class="m-2">2. Clarity of Instruction</div>
          <p class="m-2">How effectively does the teacher explain complex topics in a way that is easy to understand?</p>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="Excellent">
            <label class="form-check-label" for="Excellent">Excellent</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="Good">
            <label class="form-check-label" for="Good">Good</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="Average">
            <label class="form-check-label" for="Average">Average</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="Poor">
            <label class="form-check-label" for="Poor">Poor</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="Very Poor">
            <label class="form-check-label" for="Very Poor">Very Poor</label>
          </div>
        </div>
      </div>

      <!-- Question 3 -->
      <div class="col-12">
        <div class="m-2">
          <div class="m-2">3. Classroom Management</div>
          <p class="m-2">How well does the teacher maintain a productive and respectful learning environment?</p>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Excellent">
            <label class="form-check-label" for="Excellent">Excellent</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Good">
            <label class="form-check-label" for="Good">Good</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Average">
            <label class="form-check-label" for="Average">Average</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Poor">
            <label class="form-check-label" for="Poor">Poor</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Very Poor">
            <label class="form-check-label" for="Very Poor">Very Poor</label>
          </div>
        </div>
      </div>

      <!-- Question 4 -->
      <div class="col-12">
        <div class="m-2">
          <div class="m-2">4. Engagement with Students</div>
          <p class="m-2">How well does the teacher engage students and encourage participation in class discussions?</p>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Excellent">
            <label class="form-check-label" for="Excellent">Excellent</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Good">
            <label class="form-check-label" for="Good">Good</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Average">
            <label class="form-check-label" for="Average">Average</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Poor">
            <label class="form-check-label" for="Poor">Poor</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Very Poor">
            <label class="form-check-label" for="Very Poor">Very Poor</label>
          </div>
        </div>
      </div>

       <!-- Question 5 -->
       <div class="col-12">
        <div class="m-2">
          <div class="m-2">5. Support and Availability</div>
          <p class="m-2">Is the teacher available and approachable when you need help outside of class hours?</p>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Excellent">
            <label class="form-check-label" for="Excellent">Excellent</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Good">
            <label class="form-check-label" for="Good">Good</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Average">
            <label class="form-check-label" for="Average">Average</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Poor">
            <label class="form-check-label" for="Poor">Poor</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="Very Poor">
            <label class="form-check-label" for="Very Poor">Very Poor</label>
          </div>
        </div>
      </div>


      <div class="col-12 mt-3"> 
        <div class="form-floating">
          <textarea class="form-control comment-box" style="height: 100px;" placeholder="Leave a comment here" id="floatingTextarea2"></textarea>
          <label for="floatingTextarea2">Comments</label>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-sm mt-3 btn-primary btnSubmit">Submit Evaluation</button>
      </div>
    </div>
  </div>
</section>

<script type="module" src="Scripts/profiles.js"></script>
</body>
</html>
