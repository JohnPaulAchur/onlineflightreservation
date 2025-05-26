<?php
include_once 'helpers/helper.php';
subview('header.php');

if (isset($_POST['pass_but']) && isset($_SESSION['userId'])) {
    require 'helpers/init_conn_db.php';
    header('Content-Type: text/plain'); // Ensure plain text response

    $mobile_flag = false;
    $flight_id = $_POST['flight_id'];
    $passengers = $_POST['passengers'];
    $mob_len = count($_POST['mobile']);
    for ($i = 0; $i < $mob_len; $i++) {
        if (strlen($_POST['mobile'][$i]) < 11) {
            echo 'Invalid contact info';
            exit();
        }
    }

    $date_len = count($_POST['date']);
    foreach ($_POST['date'] as $input_date) {
        $input_dt = DateTime::createFromFormat('Y-m-d', $input_date);
        $today = new DateTime();

        if ($input_dt && $input_dt >= $today) {
            echo 'Invalid date of birth';
            exit();
        }
    }

    $stmt = mysqli_stmt_init($conn);
    $sql = 'SELECT * FROM Passenger_profile';
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'Database error';
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ii', $flight_id, $_SESSION['userId']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $pass_id = null;

    while ($row = mysqli_fetch_assoc($result)) {
        $pass_id = $row['passenger_id'];
    }

    if (is_null($pass_id)) {
        $pass_id = 0;
        $sql = 'ALTER TABLE Passenger_profile AUTO_INCREMENT = 1';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'Database error';
            exit();
        }
        mysqli_stmt_execute($stmt);
    }

    $stmt = mysqli_stmt_init($conn);
    $flag = false;
    for ($i = 0; $i < $date_len; $i++) {
        $sql = 'INSERT INTO Passenger_profile (user_id, mobile, dob, f_name, m_name, l_name, flight_id)
                VALUES (?, ?, ?, ?, ?, ?, ?)';
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'Database error';
            exit();
        }

        mysqli_stmt_bind_param(
            $stmt,
            'iissssi',
            $_SESSION['userId'],
            $_POST['mobile'][$i],
            $_POST['date'][$i],
            $_POST['firstname'][$i],
            $_POST['midname'][$i],
            $_POST['lastname'][$i],
            $flight_id
        );
        mysqli_stmt_execute($stmt);
        $flag = true;
    }

    if ($flag) {
        $_SESSION['flight_id'] = $flight_id;
        $_SESSION['class'] = $_POST['class'];
        $_SESSION['passengers'] = $passengers;
        $_SESSION['price'] = $_POST['price'];
        $_SESSION['type'] = $_POST['type'];
        $_SESSION['ret_date'] = $_POST['ret_date'];
        $_SESSION['pass_id'] = $pass_id + 1;
        echo 'REDIRECT: ../payment.php';
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
}
?>

<link rel="stylesheet" href="assets/css/form.css">
<style>
    .main-col {
        padding: 30px;
        background-color: whitesmoke;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-top: 50px;
    }

    .pass-form {
        background-color: white;
        border: 5px dotted #607d8b;
        padding: 20px;
        margin-top: 30px;
    }

    body {
        background: linear-gradient(to right, #2c3e50, #bdc3c7);
    }

    @font-face {
        font-family: 'product sans';
        src: url('assets/css/Product Sans Bold.ttf');
    }

    h1 {
        font-size: 42px !important;
        margin-bottom: 20px;
        font-family: 'product sans' !important;
        font-weight: bolder;
    }

    input {
        border: 0 !important;
        border-bottom: 2px solid #424242 !important;
        color: #424242 !important;
        border-radius: 0 !important;
        font-weight: bold !important;
        margin-bottom: 10px;
    }

    label {
        color: #828282 !important;
        font-size: 19px;
    }
</style>

<?php if (isset($_SESSION['userId']) && isset($_POST['book_but'])) {
    $flight_id = $_POST['flight_id'];
    $passengers = $_POST['passengers'];
    $price = $_POST['price'];
    $class = $_POST['class'];
    $type = $_POST['type'];
    $ret_date = $_POST['ret_date'];
?>
<main>
    <div class="container mb-5 rounded-3">
        <div class="col-md-12 main-col rounded-3">
            <h1 class="text-center text-secondary">Passenger Details</h1>
            <form id="passengerForm" class="needs-validation mt-4">
                <input type="hidden" name="type" value="<?= $type ?>">
                <input type="hidden" name="ret_date" value="<?= $ret_date ?>">
                <input type="hidden" name="class" value="<?= $class ?>">
                <input type="hidden" name="passengers" value="<?= $passengers ?>">
                <input type="hidden" name="price" value="<?= $price ?>">
                <input type="hidden" name="flight_id" value="<?= $flight_id ?>">

                <?php for ($i = 1; $i <= $passengers; $i++) : ?>
                    <div class="pass-form">
                        <div class="form-row">
                            <div class="col-md">
                                <div class="input-group">
                                    <label for="firstname<?= $i ?>">Firstname</label>
                                    <input type="text" name="firstname[]" id="firstname<?= $i ?>" class="pl-0 pr-0" required style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="input-group">
                                    <label for="midname<?= $i ?>">Middlename</label>
                                    <input type="text" name="midname[]" id="midname<?= $i ?>" class="pl-0 pr-0" required style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="input-group">
                                    <label for="lastname<?= $i ?>">Lastname</label>
                                    <input type="text" name="lastname[]" id="lastname<?= $i ?>" class="pl-0 pr-0" required style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md">
                                <div class="input-group">
                                    <label for="mobile<?= $i ?>">Contact No</label>
                                    <input type="number" name="mobile[]" min="0" id="mobile<?= $i ?>" required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group mt-3">
                                    <label for="date<?= $i ?>">DOB</label>
                                    <input id="date<?= $i ?>" name="date[]" type="date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>

                <div id="formMessage" class="text-center mt-3 text-danger"></div>

                <div class="col text-center">
                    <button name="pass_but" type="submit" class="btn btn-success mt-4">
                        <div style="font-size: 1.5rem;">
                            <i class="fa fa-lg fa-arrow-right"></i> Proceed
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php subview('footer.php'); ?>

    <script>
        $(document).ready(function () {
            $('#passengerForm').submit(function (e) {
                e.preventDefault();
                const formData = $(this).serialize() + '&pass_but=1';
                $.ajax({
                    url: 'includes/pass_detail.inc.php', // same file
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        if (response.startsWith('REDIRECT:')) {
                            const url = response.split('REDIRECT:')[1].trim();
                            window.location.href = url;
                        } else {
                            $('#formMessage').html('<strong>' + response + '</strong>');
                        }
                    },
                    error: function () {
                        $('#formMessage').html('<strong>Something went wrong. Please try again.</strong>');
                    }
                });
            });
        });
    </script>
</main>
<?php } ?>
