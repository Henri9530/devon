<!-- <?php
      // $dbhost = "localhost";
      // $dbserver = 'root';
      // $dbpass = '';
      // $dbname = 'db_evaluation';

      // // $config = include("configuration.php");
      // // $conn = mysqli_connect($config['dbhost'], $config['dbserver'], $config['dbpass'], $config['dbname']);

      // $conn = mysqli_connect($dbhost, $dbserver, $dbpass, $dbname);
      // if (!$conn) {
      //   error_log("Connection Failed: " . $conn = mysqli_connect_error());
      //   die("Database Connection Error");
      // }
      ?> -->

<!-- <?php
      // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      // $dbhost = "localhost";
      // $dbserver = 'root';
      // $dbpass = '';
      // $dbname = 'db_evaluation';

      // try {
      //   $conn = new mysqli($dbhost, $dbserver, $dbpass, $dbname);
      // } catch (mysqli_sql_exception $e) {
      //   error_log("Connection Failed: " . $e->getMessage());
      //   die("Database Connection Error"); // Display user-friendly message
      // }
      ?> -->

<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$config = include("configuration.php");

try {
  $conn = new mysqli($config['dbhost'], $config['dbserver'], $config['dbpass'], $config['dbname']);
} catch (mysqli_sql_exception $e) {
  error_log("Connection Failed: " . $e->getMessage());
  die("Database Connection Error"); // Display user-friendly message
}
?>