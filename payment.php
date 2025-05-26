<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/form.css">

<?php if (isset($_SESSION['userId'])) { ?>
<main>
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto">
                <h1 class="text-center text-light fs-3">Pay Invoice</h1>
                <div class="card">
                    <div class="card-body">
                        <label>Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa fa-2x" style="color:navy;"></i>
                            <i class="fa fa-cc-amex fa-2x" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard fa-2x" style="color:red;"></i>
                            <i class="fa fa-cc-discover fa-2x" style="color:orange;"></i>
                            <i class="fa fa-cc-stripe fa-2x" style="color:blue;"></i>
                        </div>
                        <hr>
                        <button onclick="payWithPaystack()" class="btn btn-lg btn-primary btn-block">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span>Pay with Paystack</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
function payWithPaystack() {
    var handler = PaystackPop.setup({
        key: 'pk_test_9e9efa85845c2127906cf50e8fcc5e6dc112e661', // Replace with your actual public key
        email: "<?php echo $_SESSION['userMail']; ?>",
        amount: <?php echo $_SESSION['price'] * 100; ?>,
        currency: "NGN",
        callback: function(response) {
            // Send POST request to process payment
            fetch("includes/payment.inc.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "pay_but=1"
            })
            .then(() => {
                window.location.href = "pay_success.php";
            })
            .catch(err => {
                alert("Payment complete, but error occurred during server-side processing.");
            });
        },
        onClose: function() {
            alert('Transaction was cancelled.');
        }
    });
    handler.openIframe();
}
</script>
<?php subview('footer.php'); ?>
<?php } else {
    header('Location: index.php');
    exit();
} ?>
