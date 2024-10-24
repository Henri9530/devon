<?php
include('../database/dbconnect.php');
include("../function/questionnaire_function.php");
include("../function/criteria_function.php");
session_start();

// Process form submission to create a question
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['submit'])) {
    $school_year_id = $_POST['school_year_id'];
    $question = $_POST['question'];
    $criteria_id = $_POST['criteria_id'];

    // Validate input
    if (!empty($criteria_id) && !empty($question) && !empty($school_year_id)) {
      createQuestion($school_year_id, $question, $criteria_id);
      header('location:admin_questionnaire.php');
      exit();
    }
  }
}

// Fetch the list of questions grouped by criteria
$questionList = displayCriteriaWithQuestions();
$criteriaList = displayCriteria();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Create Questions</title>
</head>

<body>
  <div class="container-lg m-5">
   

    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mb-4 shadow border">
          <div class="grid-item p-4 rounded">
            <h1>Create Questions</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mb-4 p-1">
              <div class="form-group">
                <label for="school_year_id">School Year</label>
                <select name="school_year_id" id="school_year_id" class="form-control" required>
                  <option value="" disabled selected>Select School Year</option>
                  <?php
                  $schoolYears = $conn->query("SELECT * FROM tblschoolyear ORDER BY annual_year ASC");
                  while ($row = $schoolYears->fetch_assoc()):
                    ?>
                    <option value="<?php echo $row['school_year_id']; ?>">
                      <?php echo htmlspecialchars($row['annual_year'] . " - " . ($row['annual_year'] + 1)); ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="criteria_id">Criteria</label>
                <select name="criteria_id" id="criteria_id" class="form-control" required>
                  <option value="" disabled selected>Select Criteria</option>
                  <?php
                  $criteria = $conn->query("SELECT * FROM tblcriteria ORDER BY abs(order_by) ASC");
                  while ($row = $criteria->fetch_assoc()):
                    ?>
                    <option value="<?php echo $row['criteria_id']; ?>"><?php echo htmlspecialchars($row['criteria']); ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>

              <div class="form-group">
                <input type="text" name="question" placeholder="Create question" required class="form-control" autocomplete="off" />
              </div>

              <button type="submit" name="submit" class="btn btn-primary shadow">Create Question</button>
              <a href="admin_dashboard.php" class="btn btn-warning shadow">Return</a>
            </form>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="grid-item p-4 shadow border rounded h-100">
            <?php include("admin_ques_criteria.php"); ?>
          </div>
        </div>
      </div>
    </div>





    <div class="card mt-4">
      <div class="card-body shadow">
        <h3 class="card-title">Questions List</h3>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Criteria</th>
                <th>Questions</th>
                <th>Rating</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($questionList) > 0): ?>
                <?php foreach ($questionList as $criteria => $questions): ?>
                  <?php foreach ($questions as $index => $listQuestion): ?>
                    <tr>
                      <td><?php echo htmlspecialchars($criteria); ?></td>
                      <td><?php echo htmlspecialchars($listQuestion); ?></td>
                      <td>
                        <div>
                          <?php for ($i = 1; $i <= 5; $i++): ?>
                            <label class="mr-2">
                              <input type="radio" name="rating[<?php echo $index; ?>]" value="<?php echo $i; ?>" required>
                              <?php echo $i; ?>
                            </label>
                          <?php endfor; ?>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3" class="text-center bg-dark text-light rounded border shadow">No Questions Available</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- <div class="mt-4">
      <textarea name="comment" class="form-control" placeholder="Add your comments..."></textarea>
      <button type="submit" name="submit" class="btn btn-success mt-2">Submit Evaluation</button>
    </div> -->
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>