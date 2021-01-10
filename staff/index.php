<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; 

include_once("../db.php");
$result = $pdo->query("SELECT * FROM account");
$accs = $result->fetchAll();

// fetch transaction count
$trans_q = 'SELECT type, COUNT(type) as count, SUM(amount) as amount FROM transaction GROUP BY type';
$trans_sth = $pdo->query($trans_q);
$trans_count = $trans_sth->fetchAll();


// var_dump( $trans_count); die;
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
            <a href="#" >Staff</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>

         
        </div>

      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row fadeIn">
        <!-- main options  -->
        <section class="card col-12 mb-4">
          <nav class="card-body ">
            <a href="addtransaction.php" class="btn">Add Transaction</a>           
            <a href="addissue.php" class="btn">Add issue</a>           
            <a href="issues.php" class="btn">view issues </a>           
            <a href="accounts.php" class="btn">Accounts </a>           
          </nav>
        </section>

        <section class="col-md-6 " >
          <div class="card">
          <div class="card-header">Accounts Soldes</div>
          <div>
            <table class="table">
              <thead class="table-dark">
                <tr >
                  <th>Account Name</th>
                  <th>Account Number</th>
                  <th>Account Solde</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($accs as $acc ): ?>
                  
                <tr>
                  <td><?=$acc['acc_name']?></td>
                  <td><?=$acc['acc_number']?></td>
                  <td><?=$acc['solde']?></td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
          </div>
        </section>

        <section class="col-md-6" >

          <?php foreach ($trans_count as $trans_type): ?>

  <div class="row mb-4">
            <section class="col-12 card">
              <header class="card-header">
                <h3><?=$trans_type['type'] ?></h3>
              </header>
              <div class="card-body row">
                <div class="card col p-0">
                  <div class="card-body">
                    <h3><?=$trans_type['count']?></h3>
                  </div>
                  <div class="card-footer">Count</div>
                </div>

                <div class="card col p-0">
                  <div class="card-body">
                    <h3><?=$trans_type['amount']?> GHS</h3>
                  </div>
                  <div class="card-footer">Total</div>
                </div>


              </div>


              
          </div>
<?php endforeach ?>
        </section>
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
