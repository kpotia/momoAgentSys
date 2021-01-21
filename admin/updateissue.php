<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; 
include_once("../db.php");
if (isset($_GET['id'])) {
$result = $pdo->query("SELECT * FROM issues WHERE issueid = ".$_GET['id']);
      $issue = $result->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['update'])) {
  var_dump($_POST);
  extract($_POST);

  #update status 
  $sql = 'UPDATE `issues` SET `comment` = :comment, `status` = :status WHERE `issues`.`issueid` = '.$_GET['id'];
  $query = $pdo->prepare($sql);
        
    $query->bindparam(':comment', $comment);
    $query->bindparam(':status', $status);
    if($query->execute()){
      header('location: issue.php?id='.$_GET['id']);
    }


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
            <a href="#" >Issues</a>
            <span>/</span>
            <span></span>
          </h4> 
        </div>
      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row card wow fadeIn">
        <div class="col-md-6 pt-3">
          
          <ul style="list-style: none;">
            <li>Date: <?= $issue['timetsamp']?> </li>
            <li>Client Name: <?= $issue['client_name']?></li>
            <li>client Number: <?= $issue['client_number']?></li>
            <li>Status: <?= $issue['status']?></li>
            <li>Issue Description: <?= $issue['issue_description']?></li>
          </ul>
        </div>
        
        <div class="col-md-3">

          <form method="post">
            <div class="form-group">
              <select class="form-control" name="status" required>
                <option>pending</option>
                <option>processing</option>
                <option>solved</option>
              </select>
            </div>
            <div class="form-group">
              <label for="comment">Comments</label>
              <textarea name="comment" id="comment" class="form-control" cols="30" rows="3"><?= $issue['comment']?></textarea>
            </div>
    <button name="update" value="1" class="btn btn-primary">Submit</button>

          </form>
          
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
