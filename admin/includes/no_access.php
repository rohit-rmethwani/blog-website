<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 20-01-2019
 * Time: 21:12
 */
?>
<body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Forgot to login?</h4>
            <p>Enter your credentials.</p>
          </div>
          <form method="post" type="form" action="../includes/process-login.php">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="user_name" class="form-control" name="user_name" required="required">
                <label for="user_name">Enter username</label>
              </div>
            </div>

          <div class="form-group">
              <div class="form-label-group">
                  <input type="password" id="user_password" class="form-control" name="user_password" required="required">
                  <label for="user_password">Enter password</label>
              </div>
          </div>
          <button type="submit" name="login" class="btn btn-primary" value="Login" id="login">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.html">Register an Account</a>
            <a class="d-block small" href="login.html">Login Page</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>