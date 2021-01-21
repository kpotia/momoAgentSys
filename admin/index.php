<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; 

// load DB
require_once '../db.php';

// fetch transaction count
$trans_q = 'SELECT type, COUNT(type) as count,sum(amount) as amount  FROM transaction GROUP BY type';
$trans_sth = $pdo->query($trans_q);
$trans_count = $trans_sth->fetchAll();
// fetch transaction count
$iss_q = 'SELECT status, COUNT(*) as count FROM issues GROUP BY status';
$iss_sth = $pdo->query($iss_q);
$iss_count = $iss_sth->fetchAll();
  $trans_sum = 0;
  $iss_sum = 0;
  foreach ($trans_count as $trans) {
    $trans_sum += $trans['count'];
  }


  foreach ($iss_count as $iss) {
    $iss_sum += $iss['count'];
  }
  // die;

?>

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
            <a href="#" >Admin</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>
        </div>
      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row ">

        <section class="col-md-12 mb-4">
          <div class="card">
            <div class="card-body">
            <a href="adduser.php" class="btn btn-grey">Add User</a>
            <a href="addaccount.php" class="btn btn-primary">Add Account</a>
            <a href="addpurchase.php" class="btn btn-grey">Add Purchases</a>
            <a href="issues.php" class="btn btn-primary">View Issues</a>
            <a href="logs.php" class="btn btn-grey">View Logs</a>
              
            </div>
          </div>
        </section>
        <!-- Transactions -->
        <section class="col-md-5">
          <div class="card">
            <div class="card-header">
              <h2>Transaction</h2>
              <a href="transactions.php" class="btn btn-grey">View All</a>
            </div>
            <div class="card-body">
              <section class="row">
              <div class="col-4">
                <div class="card">
                  <div class="card-body">
                    <h3><?=$trans_sum?></h3>
                  </div>
                  <div class="card-footer">Count</div>
                </div>
              </div>
              <?php foreach ($trans_count as $trans): ?>
                <div class="col-4">
                <div class="card">
                  <div class="card-body">
                    <h3><?=$trans['count']?></h3>
                  </div>
                  <div class="card-footer"><?=$trans['type']?></div>
                </div>
                </div>  
              <?php endforeach ?>
              
       
              </div>
              </section>
         
      
        
        <!-- Issues -->
        <section class="col-md-7">
          <div class="card">
            <div class="card-header">
              <h2>Issues</h2>
              <a href="issues.php" class="btn btn-grey">View All</a>
            </div>
            <div class="card-body">
              <section class="row">
              <div class="col-3">
                <div class="card">
                  <div class="card-body">
                    <h3><?=$iss_sum?></h3>
                  </div>
                  <div class="card-footer">Count</div>
                </div>
              </div>
              <?php foreach ($iss_count as $iss): ?>
                <div class="col-3">
                <div class="card">
                  <div class="card-body">
                    <h3><?=$iss['count']?></h3>
                  </div>
                  <div class="card-footer"><?=$iss['status']?></div>
                </div>
                </div>
              <?php endforeach ?>
              
              
              </div>
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
