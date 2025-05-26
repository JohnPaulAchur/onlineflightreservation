<?php include_once 'helpers/helper.php'; ?>
<?php 
subview('header.php');
require 'helpers/init_conn_db.php';
?>
<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200&display=swap" rel="stylesheet">

<main>

<!--Title and notice board START -->
<!-- <section class="pt-0">
	
</section> -->
<?php
if (isset($_POST['search_but'])) {
    unset($_POST['search_terms']);

    // Validate required fields
    if (
        empty($_POST['dep_city']) ||
        empty($_POST['arr_city']) ||
        empty($_POST['dep_date']) ||
        empty($_POST['f_class']) ||
        empty($_POST['passengers'])
    ) {
        echo "<script>
            alert('All fields are required.');
            window.history.back();
        </script>";
        exit;
    }

    // Convert departure date to Y-m-d format
    $original_date_dep = $_POST['dep_date'];
    if ($original_date_dep) {
        $date = DateTime::createFromFormat('d M Y', $original_date_dep);
        $dep_date = $date->format('Y-m-d');
    }

    // Convert return date if it exists
    $original_date_ret = isset($_POST['ret_date']) ? $_POST['ret_date'] : null;
    $ret_date = $original_date_ret;
    if ($original_date_ret != null) {
        $date = DateTime::createFromFormat('d M Y', $original_date_ret);
        $ret_date = $date->format('Y-m-d');
    }

    // Extract form inputs
    $dep_city = $_POST['dep_city'];
    $arr_city = $_POST['arr_city'];
    $type = $_POST['type'];
    $f_class = $_POST['f_class'];
    $passengers = $_POST['passengers'];

    // Validate city input
    if ($dep_city === $arr_city) {
        header('Location: index.php?error=sameval');
        exit();
    }
    if ($dep_city === '0') {
        header('Location: index.php?error=seldep');
        exit();
    }
    if ($arr_city === '0') {
        header('Location: index.php?error=selarr');
        exit();
    }
    ?>


<div class="container position-relative">

		<!-- Title and button START -->
		<div class="row">
			<div class="col-12">
				<div class="d-sm-flex justify-content-sm-between align-items-center">
					<!-- Title -->
					<div class="mb-3 mb-sm-0">
						<h1 class="fs-3">Flights for</h1>
						<ul class="nav nav-divider h6 mb-0">
							<li class="nav-item"><?php echo $dep_city; ?> </li>
							<li class="nav-item"><?php echo $arr_city; ?></li>
							<li class="nav-item"><?php echo $_POST['passengers']; ?> Passengers</li>
						</ul>
					</div>
				</div>	
			</div>
		</div>
		<!-- Title and button END -->

	</div>

    <div class="container-md mt-2">
        

        <div class="vstack gap-4">
            <?php
            $sql = 'SELECT * FROM Flight WHERE source=? AND Destination=? AND DATE(departure)=? ORDER BY Price';
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, 'sss', $dep_city, $arr_city, $dep_date);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                // Calculate price
                $price = (int)$row['Price'] * (int)$passengers;
                if ($type === 'round') $price *= 2;
                if ($f_class === 'B') $price += 0.5 * $price;

                // Status logic
                switch ($row['status']) {
                    case 'dep':
                        $status = "Departed";
                        $alert = 'alert-info';
                        break;
                    case 'issue':
                        $status = "Delayed";
                        $alert = 'alert-danger';
                        break;
                    case 'arr':
                        $status = "Arrived";
                        $alert = 'alert-success';
                        break;
                    default:
                        $status = "Not yet Departed";
                        $alert = 'alert-primary';
                }

                // Time formatting
                $departure_time = date("F j, Y . H:i", strtotime($row['departure']));
$arrival_time = date("F j, Y . H:i", strtotime($row['arrivale']));

                $dep_city_text = $dep_city . " - Departure";
                // $dep_city_text = $dep_city . " - Terminal 2";
                $arr_city_text = $arr_city . " - Arrival";
                // $arr_city_text = $arr_city . " - Terminal 2";

                // Output card UI
                echo '
                <div class="card border">
                    <div class="card-header d-sm-flex justify-content-sm-between align-items-center">
                        <div class="d-flex align-items-center mb-2 mb-sm-0">
                            <img src="assets/images/element/13.svg" class="w-30px me-2" alt="">
                            <h6 class="fw-normal mb-0">' . $row['airline'] . ' (Flight ID: ' . $row['flight_id'] . ')</h6>
                        </div>
                        <h6 class="fw-normal mb-0"><span class="text-body">Travel Class:</span> ' . ($f_class === 'B' ? 'Business' : 'Economy') . '</h6>
                    </div>

                    <div class="card-body p-4 pb-0">
                        <div class="row g-4">
                            <div class="col-sm-4 col-md-3">
                                <h4>' . $departure_time . '</h4>
                                <p class="mb-0">' . $dep_city_text . '</p>
                            </div>

                            <div class="col-sm-4 col-md-3 my-sm-auto text-center">
                                <h5>'.$row['duration'].'</h5>
                                <div class="position-relative my-4">
                                    <hr class="bg-primary opacity-5 position-relative">
                                    <div class="icon-md bg-primary text-white rounded-circle position-absolute top-50 start-50 translate-middle">
                                        <i class="fa-solid fa-fw fa-plane rtl-flip"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-3">
                                <h4>' . $arrival_time . '</h4>
                                <p class="mb-0">' . $arr_city_text . '</p>
                            </div>

                            <div class="col-md-3 text-md-end">
                                <h4>$' . number_format($price, 2) . '</h4>';
                                
                // Booking button
                if (isset($_SESSION['userId']) && $row['status'] === '') {
                    echo '
                                <form action="pass_form.php" method="post">
                                    <input name="flight_id" type="hidden" value="' . $row['flight_id'] . '">
                                    <input name="type" type="hidden" value="' . $type . '">
                                    <input name="passengers" type="hidden" value="' . $passengers . '">
                                    <input name="price" type="hidden" value="' . $price . '">
                                    <input name="ret_date" type="hidden" value="' . $ret_date . '">
                                    <input name="class" type="hidden" value="' . $f_class . '">
                                    <button name="book_but" type="submit" class="btn btn-dark mb-2">Book Now</button>
                                </form>';
                } elseif (isset($_SESSION['userId']) && $row['status'] === 'dep') {
                    echo '<p class="text-muted">Not Available</p>';
                } else {
                    echo '<a href="login.php" class="text-grey">Login to continue</a>';
                }

                echo '
                                <!--<button class="btn btn-link text-decoration-underline p-0 mb-0" data-bs-toggle="modal" data-bs-target="#flightdetail">
                                    <i class="bi bi-eye-fill me-1"></i>Flight Details
                                </button>-->
                            </div>
                        </div>
                    </div>

                    <div class="card-footer pt-4">
                        <ul class="list-inline bg-light rounded-2 d-sm-flex text-center justify-content-sm-between mb-0 px-4 py-2">
                            <li class="list-inline-item ' . $alert . '">' . $status . '</li>
                            <li class="list-inline-item text-success">'.$row['Seats'].' total seats on flight</li>
                            <li class="list-inline-item text-danger">Non-Refundable</li>
                        </ul>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
<?php } ?>


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
  <p class="text-light text-center">&copy; <?php echo date('Y'); ?> - Developed By Sujoy Dcunha, Christina Pereira, Mark Coutinho</p>
</footer>