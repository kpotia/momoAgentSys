<!DOCTYPE html>
<html lang="en">

<?php include_once 'static/head.php'; 
   // Include db config
  require_once '../db.php';

  // Init vars
  $role =$name = $username = $email = $password = $confirm_password = '';
  $role_err =  $name_err = $username_err = $email_err = $password_err = $confirm_password_err = '';

  // Process form when post submit
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Put post vars in regular vars
    $name =  trim($_POST['name']);
    $role =  trim($_POST['role']);
    $username =  trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate email
    if(empty($email)){
      $email_err = 'Please enter email';
    } else {
      // Prepare a select statement
      $sql = 'SELECT id FROM users WHERE email = :email';

      if($stmt = $pdo->prepare($sql)){
        // Bind variables
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        // Attempt to execute
        if($stmt->execute()){
          // Check if email exists
          if($stmt->rowCount() === 1){
            $email_err = 'Email is already taken';
          }
        } else {
          die('Something went wrong');
        }
      }

      unset($stmt);
    }

    // Validate username
    if(empty($username)){
      $username_err = 'Please enter username';
    } else {
      // Prepare a select statement
      $sql = 'SELECT id FROM users WHERE username = :username';

      if($stmt = $pdo->prepare($sql)){
        // Bind variables
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        // Attempt to execute
        if($stmt->execute()){
          // Check if username exists
          if($stmt->rowCount() === 1){
            $email_err = 'Email is already taken';
          }
        } else {
          die('Something went wrong');
        }
      }

      unset($stmt);
    }

    // Validate name
    if(empty($name)){
      $name_err = 'Please enter name';
    }

// Validate role
    if(empty($role)){
      $role_err = 'Please enter role';
    }

    // Validate password
    if(empty($password)){
      $password_err = 'Please enter password';
    } elseif(strlen($password) < 6){
      $password_err = 'Password must be at least 6 characters ';
    }

    // Validate Confirm password
    if(empty($confirm_password)){
      $confirm_password_err = 'Please confirm password';
    } else {
      if($password !== $confirm_password){
        $confirm_password_err = 'Passwords do not match';
      }
    }

    // Make sure errors are empty
    if(empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
      // Hash password
      $password = password_hash($password, PASSWORD_BCRYPT);

      // var_dump(password_get_info($password));die;

      // Prepare insert query
      $sql = 'INSERT INTO users (name, username, email, password, role) VALUES (:name, :username, :email, :password, :role)';

      if($stmt = $pdo->prepare($sql)){
        // Bind params
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);

        // Attempt to execute
        if($stmt->execute()){
          // Redirect to login
          header('location: users.php');
        } else {
          die('Something went wrong');
        }
      }
      unset($stmt);
    }

    // Close connection
    unset($pdo);
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
            <a href="#" >add users</a>

          </h4>   
    
      </div>
    </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <div class="col-md-7 card" style="min-width: 400px">
         
          <form class="card-body" method='post'>
            <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                  </div>


            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
              <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
              <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" minlength="6" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" minlength="6" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
              <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>

            <div class="form-group">
              <label for="name">Role</label>
              <select name="role"  class="form-control form-control-lg">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
              </select>
              <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>

            <div class="form-row">
              <div class="col">
                <button type="submit" value="Register" class="btn btn-success btn-block">Add User</button>
              </div>
           
            </div>
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
