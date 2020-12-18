<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; 
include_once("../db.php");
if (isset($_GET['id'])) {
      $result = $pdo->query("SELECT * FROM account WHERE acc_id = ".$_GET['id']);
      $account = $result->fetch(PDO::FETCH_ASSOC);

      // purchase 
      $pur_q = $pdo->query("SELECT timestamp, type, amount FROM purchase WHERE account = ".$_GET['id']);
      $purchases = $pur_q->fetchAll(PDO::FETCH_ASSOC);

      $trans_q = $pdo->query("SELECT timestamp, type, amount FROM transaction WHERE account_id = ".$_GET['id']);
      $transactions = $trans_q->fetchAll(PDO::FETCH_ASSOC);

      var_dump($transactions,$purchases);

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
            <a href="#" >Account</a>
            <span>/</span>
            <span>View</span>
          </h4> 
        </div>
      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row card wow fadeIn">
        <div class="col-md-6">
          
          <ul style="list-style: none;">
            <li>ID: <?= $account['acc_id']?> </li>
            <li>Type: <?= $account['acc_type']?></li>
            <li>Acc Name: <?= $account['acc_name']?></li>
            <li>Acc Number: <?= $account['acc_number']?></li>
          </ul>
        </div>
      </div>

      <div class="row mt-4">

        <div class="col-md-6">
          <div class="card">
    <div class="card-header">
          <h1>Purchase</h1></div>
          <table class="table">
            <thead>
              <tr>
                <th>Time stamp</th>
                <th>Type</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($purchases as $row): ?>
                <tr>
                  <td>
                    <?=$row['timestamp']?>
                  </td>
                  <td>
                    <?=$row['type']?>
                  </td>
                  <td>
                    <?=$row['amount']?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
        

<div class="col-md-6 ">
  <div class="card">
    <div class="card-header">
          <h1>Transaction</h1></div>
          <table class="table">
            <thead>
              <tr>
                <th>Time stamp</th>
                <th>Type</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($transactions as $row): ?>
                <tr>
                  <td>
                    <?=$row['timestamp']?>
                  </td>
                  <td>
                    <?=$row['type']?>
                  </td>
                  <td>
                    <?=$row['amount']?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
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
