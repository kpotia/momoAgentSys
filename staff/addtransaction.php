<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; 
   // Include db config
  require_once '../db.php';

  // fetch accounts
  $faq = 'SELECT * FROM account';

  $sth = $pdo->query('SELECT * FROM account');
  $accs = $sth->fetchAll();
  
if(isset($_POST['submit'])) { 
  $type = $_POST['type'];
  $account = $_POST['account'];
  $client = $_POST['client'];
  $amount = $_POST['amount'];


  // checking empty fields
  if(empty($account) ||empty($amount) || empty($type) || empty($client)) {
        
    if(empty($account)) {
      echo "<font color='red'>account field is empty.</font><br/>";
    }

    if(empty($amount)) {
      echo "<font color='red'>amount field is empty.</font><br/>";
    }

    if(empty($type)) {
      echo "<font color='red'>type field is empty.</font><br/>";
    }

    if(empty($client)) {
      echo "<font color='red'>client number field is empty.</font><br/>";
    }
    
    //link to the previous page
    echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
  } else { 
    // if all the fields are filled (not empty) 
      
    //insert data to database   
    $sql = "INSERT INTO `transaction`(`type`, `account_id`, `client_numb`, `amount`) VALUES (:type,:account,:client,:amount)";
    $query = $pdo->prepare($sql);
        
    $query->bindparam(':type', $type);
    $query->bindparam(':account', $account);
    $query->bindparam(':client', $client);
    $query->bindparam(':amount', $amount);
    
    if($query->execute()){
      $tid = $pdo->lastInsertId();
        $faq = 'SELECT *  FROM account WHERE acc_id = '.$account;

        $acc_chosen = $pdo->query($faq);
        $acc_chosen = $acc_chosen->fetchAll();
        
        if($type == 'deposit'){
          $solde = $acc_chosen[0]['solde'] + $amount;
        }else{
          $solde = $acc_chosen[0]['solde'] - $amount;
        }

       $sql = "UPDATE `account` SET `solde`= :solde WHERE `acc_id`= :account;";
    $query = $pdo->prepare($sql);
        
    $query->bindparam(':account', $account);
    $query->bindparam(':solde', $solde);
    if($query->execute()){
      header('location: transaction.php?id='.$tid);
      }
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
            Add Transaction
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
      <label>Account</label>
     <select class="form-control" name="account">
       <?php foreach ($accs as $acc): ?>
        <option value = "<?=$acc['acc_id']?>" ><?= $acc['acc_name'] .'('.$acc['acc_number'].') '.'Solde:'.$acc['solde'] ?></option>         
       <?php endforeach ?>
     </select>
    </div>
    <div class="form-group">
      <label>Type</label>
      <select name="type" class="form-control">
        <option value="deposit">Deposit</option>
        <option value="cashout">Cashout</option>
      </select>
    </div>
    <div class="form-group">
      <label>Client Number</label>
      <input type="tel" class="form-control" name="client">
    </div>
    <div class="form-group">
      <label>Amount</label>
      <input type="text" class="form-control" name="amount">
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
