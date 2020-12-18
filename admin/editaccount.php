<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; 
   // Include db config
  require_once '../db.php';

  if (isset($_GET['id'])) {
      $result = $pdo->query("SELECT * FROM account WHERE acc_id = ".$_GET['id']);
      $account = $result->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['submit'])) { 
  $id = $_POST['id'];
  $type = $_POST['type'];
  $name = $_POST['name'];
  $number = $_POST['number'];
  $solde = $_POST['solde'];

  // checking empty fields
  if(empty($id) ||empty($type) ||empty($name) || empty($number) || empty($solde)) {
        
    if(empty($id)) {
      echo "<font color='red'>id field is empty.</font><br/>";
    }

    if(empty($type)) {
      echo "<font color='red'>type field is empty.</font><br/>";
    }

if(empty($solde)) {
      echo "<font color='red'>solde field is empty.</font><br/>";
    }

if(empty($name)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
    }

    
    if(empty($number)) {
      echo "<font color='red'>number field is empty.</font><br/>";
    }
    
    //link to the previous page
    echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
  } else { 
    // if all the fields are filled (not empty) 
      
    //insert data to database   
    $sql = "INSERT INTO users(name, age, email) VALUES(:name, :age, :email)";
    $sql = "INSERT INTO `account` (`acc_id`, `acc_type`, `solde`, `acc_name`, `acc_number`) VALUES (:acc_id, :acc_type, :solde, :acc_name, :acc_number);";
    $query = $pdo->prepare($sql);
        
    $query->bindparam(':acc_id', $id);
    $query->bindparam(':acc_type', $type);
    $query->bindparam(':acc_name', $name);
    $query->bindparam(':acc_number', $number);
    $query->bindparam(':solde', $solde);
    // $query->bindparam(':email', $email);
    if($query->execute()){
      header('location: accounts.php');
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
            Add Account
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
      <label>Account ID</label>
      <input type="text" class="form-control" name="id">
    </div>
    <div class="form-group">
      <label>Account Type</label>
      <input type="text" class="form-control" name="type">
    </div>

    <div class="form-group">
      <label>Account Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label>Account Number</label>
      <input type="text" class="form-control" name="number">
    </div>

    <div class="form-group">
      <label>Account solde</label>
      <input type="text" class="form-control" name="solde">
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
