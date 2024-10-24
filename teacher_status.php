<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Status</title>
</head>
<body>
  <?php
    include 'header.php';
  ?>


  <section>

  <div class="m-5">
    <a href="teacher_evaluation_table.php" class="btn btn-primary">
      <i class="bi bi-arrow-return-left mx-3"></i>Return</a>
  </div>

    <div class="container-lg m-5">
      <div class="row justify-content-center align-items-center">
        <div class="col-5">
          <div class="text-center">
            <img src="Profiles User\Teacher 1.png" class="img-thumbnail" alt="Boss Thanos">
            <h1>
              <div class="m-2">Boss Thanos</div>
            </h1>
            <div class="fs-4">IT Department</div>
          </div>
        </div>
        <div class="col-5">
          <h1>  
            <div class="display-6">Ratings Insight</div>
          </h1>
          <div>
            <h1>
              <span class="ratings-num">3.5</span>
              <i class="bi bi-star-fill star"></i>
              <i class="bi bi-star-fill star"></i>
              <i class="bi bi-star-fill star"></i>
            </h1>
          </div>
          <div>
            <div class="mb-1 mt-4 fs-4">Teaching Quality</div> 
            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar bg-success" style="width: 25%"></div>
            </div>
            <div class="mb-1 mt-4 fs-4">Communication & Skills</div> 
            <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar bg-info" style="width: 50%"></div>
            </div>
            <div class="mb-1 mt-4 fs-4">Classroom Management</div> 
            <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar bg-warning" style="width: 75%"></div>
            </div>
            <div class="mb-1 mt-4 fs-4">Knowledge & Expertise</div> 
            <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
            <div class="mb-1 mt-4 fs-4">Student Engagement</div> 
            <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </section>
</body>
</html>