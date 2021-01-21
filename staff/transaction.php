<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; 
include_once("../db.php");
if (isset($_GET['id'])) {
$result = $pdo->query("SELECT * FROM transaction WHERE tid = ".$_GET['id']);
      $issue = $result->fetch(PDO::FETCH_ASSOC);

}
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
            Transaction
          </h4> 

          <a href="#print" onclick="window.print()" class="btn">print</a>
        </div>
      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row card wow fadeIn">
        <div class="col-md-6">
          
          <ul style="list-style: none;">
            <li>Date: <?= $issue['timestamp']?> </li>
            
            <li>Type: <?= $issue['type']?></li>
            <li>client Number: <?= $issue['client_numb']?></li>
                 <li>Amount: <?= $issue['amount']?></li>
            
          </ul>
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
