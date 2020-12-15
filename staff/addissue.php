<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; 
   // Include db config
  require_once '../db.php';

  
if(isset($_POST['submit'])) { 
  $empid = $_SESSION['id'];
  $c_name = $_POST['name'];
  $c_number = $_POST['number'];
  $status = $_POST['status'];
  $issue_desc = $_POST['issue_desc'];

  // checking empty fields
  if(empty($empid) ||empty($c_name) || empty($c_number) || empty($status) || empty($issue_desc)) {
        
    
    //link to the previous page
    echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
  } else { 
    // if all the fields are filled (not empty) 
      
    //insert data to database   
    $sql = "INSERT INTO `issues`( `empid`, `issue_description`, `client_name`, `client_number`, `status`)  VALUES (:empid, :issue_desc, :c_name, :c_number, :status);";
    $query = $pdo->prepare($sql);
        
    $query->bindparam(':empid', $empid);
    $query->bindparam(':status', $status);
    $query->bindparam(':c_name', $c_name);
    $query->bindparam(':c_number', $c_number);
    $query->bindparam(':issue_desc', $issue_desc);
    // $query->bindparam(':email', $email);

    if($query->execute()){
      header('location: issues.php');
    }else{
      var_dump($pdo->errorInfo());
      echo '<br>';
      echo 'INSERT INTO `issues`( `empid`, `issue_description`, `client_name`, `client_number`, `status`)  VALUES ("'.$empid.'", "'.$issue_desc.'", "'.$c_name.'", "'.$c_number.'", "'.$status.'");';
      echo '<br>';

      die('something went wrong');
    }
    
    
  }
}?>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

<?php include_once 'static/navbar.php'; ?>
<?php include_once 'static/sidebar.php'; ?>
    
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            Report Issue
          </h4>   
    
      </div>
    </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <div class="col-md-7" style="min-width: 400px">

<section class="card">
  <form method="post" class="card-body">
    <div class="form-group">
      <label>Status</label>
      <select class="form-control" name="status" required>
        <option>pending</option>
        <option>processing</option>
        <option>solved</option>
      </select>
    </div>

    <div class="form-group">
      <label>Client Name</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
      <label>Client Number</label>
      <input type="text" class="form-control" name="number" required>
    </div>

    <div class="form-group">
      <label>Issue Description</label>
      <textarea class="form-control" name="issue_desc" required></textarea>
    </div>

    <button name="submit" class="btn btn-primary">Submit</button>
  </form>
</section>          
         
          
        </div>
      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
<?php include_once 'static/footer.php'; ?>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

</body>

</html>
