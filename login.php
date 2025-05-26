<?php include_once 'helpers/helper.php'; ?>

<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/form.css">
<?php
if (isset($_GET['pwd'])) {
  if ($_GET['pwd'] == 'updated') {
    echo "<script>alert('Your password has been reset!!');</script>";
  }
}
?>
<?php
if (isset($_GET['error'])) {
  if ($_GET['error'] === 'invalidcred') {
    echo '<script>alert("Invalid Credentials")</script>';
  } else if ($_GET['error'] === 'wrongpwd') {
    echo '<script>alert("Wrong Password")</script>';
  } else if ($_GET['error'] === 'sqlerror') {
    echo "<script>alert('Database error')</script>";
  }
}
if (isset($_COOKIE['Uname']) && isset($_COOKIE['Upwd'])) {
  require 'helpers/init_conn_db.php';
  $email_id = $_POST['user_id'];
  $password = $_POST['user_pass'];
  $sql = 'SELECT * FROM Users WHERE username=? OR email=?;';
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: views/login.php?error=sqlerror');
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, 'ss', $_COOKIE['Uname'], $_COOKIE['Uname']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
      $pwd_check = password_verify($_COOKIE['Upwd'], $row['password']);
      if ($pwd_check == false) {
        setcookie('Uname', '', time() - 3600);
        setcookie('Upwd', '', time() - 3600);
        header('Location: views/login.php?error=wrongpwd');
        exit();
      } else if ($pwd_check == true) {
        session_start();
        $_SESSION['userId'] = $row['user_id'];
        $_SESSION['userUid'] = $row['username'];
        $_SESSION['userMail'] = $row['email'];
        header('Location: views/index.php?login=success');
        exit();
      } else {
        header('Location: views/login.php?error=invalidcred');
        exit();
      }
    }
    header('Location: views/login.php?error=invalidcred');
    exit();
  }
  header('Location: views/login.php?error=invalidcred');
  exit();
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
?>

<main>
  <div class="container mt-0">
    <div class="row">
      


      <div class="col-md-12">
				<div class="bg-mode shadow rounded-3 overflow-hidden">
					<div class="row g-0">
						<!-- Vector Image -->
						<div class="col-lg-6 d-flex align-items-center order-2 order-lg-1">
							<div class="p-3 p-lg-5">
								<img src="assetscustom/images/element/signin.svg" alt="">
							</div>
							<!-- Divider -->
							<div class="vr opacity-1 d-none d-lg-block"></div>
						</div>
		
						<!-- Information -->
						<div class="col-lg-6 order-1">
							<div class="p-4 p-sm-7">
								<!-- Logo -->
								<a href="index.php">
									<img class="h-50px mb-4" src="assets/images/airtic.png" alt="logo">
								</a>
								<!-- Title -->
								<h1 class="mb-2 h3">Welcome back</h1>
								<p class="mb-0">New here?<a href="register.php"> Create an account</a></p>
		
								<!-- Form START -->
								<form class="mt-4 text-start" method="POST" action="includes/login.inc.php">
									<!-- Email -->
									<div class="mb-3">
										<label class="form-label">Username/Email</label>
										<input type="text" class="form-control" name="user_id" id="user_id" required>
									</div>
									<!-- Password -->
									<div class="mb-3 position-relative">
										<label class="form-label">Enter password</label>
										<input class="form-control fakepassword" type="password" id="psw-input" type="password" name="user_pass"
                    required>
										<span class="position-absolute top-50 end-0 translate-middle-y p-0 mt-3">
											<i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
										</span>
									</div>
									<!-- Remember me -->
									<div class="mb-3 d-sm-flex justify-content-between">
										<!-- <div>
											<input type="checkbox" class="form-check-input" id="rememberCheck">
											<label class="form-check-label" for="rememberCheck">Remember me?</label>
										</div> -->
										<a href="reset-pwd.php">Forgot password?</a>
									</div>
									<!-- Button -->
									<div><button name="login_but" type="submit" class="btn btn-primary w-100 mb-0">Login</button></div>
		
								
		
									<!-- Copyright -->
									<div class="text-primary-hover text-body mt-3 text-center"> Copyrights ©2025 Airline Reservation System by <a href="#" class="text-body" style="color:purple">Author</a>. </div>
								</form>
								<!-- Form END -->
							</div>		
						</div>
					</div>
				</div>
			</div>
    </div>
  </div>

  <?php subview('footer.php'); ?>
  <script>
    $(document).ready(function() {
      $('.input-group input').focus(function() {
        me = $(this);
        $("label[for='" + me.attr('id') + "']").addClass("animate-label");
      });
      $('.input-group input').blur(function() {
        me = $(this);
        if (me.val() == "") {
          $("label[for='" + me.attr('id') + "']").removeClass("animate-label");
        }
      });
      // $('#test-form').submit(function(e){
      //   e.preventDefault() ;
      //   alert("Thank you") ;
      // })
    });
  </script>
</main>

<?php subview('footer.php'); ?>
<footer style="
        position: absolute;
      bottom: 0;
      width: 100%;
      height: 2.5rem;  
    ">
  <em>
    <h5 class="text-light text-center p-0 brand mt-2">
      <img src="assets/images/airtic.png"
        height="40px" width="40px" alt="">
      Online Flight Booking
    </h5>
  </em>
  <p class="text-light text-center">&copy; <?php echo date('Y') ?></p>
</footer>