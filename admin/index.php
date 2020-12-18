<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; ?>

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
          <div class="row">
            <div class="shadow">
              
            </div>
          </div>
         
        </div>

      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row ">

        <section class="col-md-12 mb-4">
          <div class="card">
            <div class="card-body">
            <a href="adduser.php" class="btn">Add User</a>
            <a href="addaccount.php" class="btn">Add Account</a>
            <a href="addpurchase.php" class="btn">Add Purchases</a>
            <a href="issues.php" class="btn">View Issues</a>
            <a href="logs.php" class="btn">View Logs</a>
              
            </div>
          </div>
        </section>
        <!-- Transactions -->
        <section class="col-md-5">
          <div class="card">
            <div class="card-header">
              <h2>Transaction</h2>
              <a href="transactions.php" class="btn">View All</a>
            </div>
            <div class="card-body">
              <section class="row">
              <div class="col-4">
                <div class="card">
                  <div class="card-body">
                    <h3>80</h3>
                  </div>
                  <div class="card-footer">Count</div>
                </div>
              </div>
              <div class="col-4">
                <div class="card">
                  <div class="card-body">
                    <h3>37</h3>
                  </div>
                  <div class="card-footer">Deposit</div>
                </div>
                </div>
              <div class="col-4">

                <div class="card">
                  <div class="card-body">
                    <h3>43</h3>
                  </div>
                  <div class="card-footer">Cashout</div>
                </div>
                </div>
              </div>
              </section>
         
      
        
        <!-- Issues -->
        <section class="col-md-7">
          <div class="card">
            <div class="card-header">
              <h2>Issues</h2>
              <a href="issues.php" class="btn">View All</a>
            </div>
            <div class="card-body">
              <section class="row">
              <div class="col-3">
                <div class="card">
                  <div class="card-body">
                    <h3>80</h3>
                  </div>
                  <div class="card-footer">Count</div>
                </div>
              </div>
              <div class="col-3">
                <div class="card">
                  <div class="card-body">
                    <h3>37</h3>
                  </div>
                  <div class="card-footer">Pending</div>
                </div>
                </div>
              <div class="col-3">
                <div class="card">
                  <div class="card-body">
                    <h3>43</h3>
                  </div>
                  <div class="card-footer">Processing</div>
                </div>
                </div>
         
              <div class="col-3">
                <div class="card">
                  <div class="card-body">
                    <h3>43</h3>
                  </div>
                  <div class="card-footer">Solved</div>
                </div>
                </div>
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
