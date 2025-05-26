<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<style>
  .container-heading{
    color: green;
  }
</style>
<main>
  <div class="container" style="display:flex;justify-content:center;align-items:center;flex-direction:column;">
    <h3 class="container-heading">Payment Successful!</h3>
    <img
      class="container-image"
      src="assets/images/airtic.png"
      style="height: 200px;"
      alt="Payment SuccesFul" />
    <h3 class="container-welcome">Thank you for choosing us</h3>
    <p class="container-text">
      An automated payment receipt will be sent to your registered email. View My <a style="text-decoration: underline;" href="ticket.php"> E-Tickets</a>
    </p>
  </div>
</main>
<?php subview('footer.php'); ?>