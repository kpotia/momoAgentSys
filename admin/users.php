<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; 
include_once("../db.php");
$result = $pdo->query("SELECT * FROM users ORDER BY id DESC");
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
            <a href="#" >Users</a>
            <span>/</span>
            <span></span>
          </h4>   

          <p><a href="adduser.php" class="btn">Add User</a></p>      
        </div>
      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row card wow fadeIn">
        <div class="col">
          <table class="table table-hover">
            <thead class="table-black">
              <tr>
                <th>name</th>
                <th>email</th>
                <th>username</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php   
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {    
                  echo "<tr>";
                  echo "<td>".$row['name']."</td>";
                  echo "<td>".$row['email']."</td>";
                  echo "<td>".$row['username']."</td>";
                  echo "<td>".$row['role']."</td>";  
                 }
                ?>
                <td>
                  <a href="" class="btn">edit</a>
                  <a href="" class="btn">delete</a>
                  <a href="" class="btn">view</a>
                </td>
            </tbody>
          </table>
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
