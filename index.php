<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php');
require 'helpers/init_conn_db.php';

?>










<!-- **************** MAIN CONTENT START **************** -->
<main>
	
<!-- =======================
Main Banner START -->
<section class="py-0">
	<div class="container">
		<!-- Background image -->
		<div class="rounded-3 p-3 p-sm-5" style="background-image: url(https://images.pexels.com/photos/1004584/pexels-photo-1004584.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1); background-position: center center; background-repeat: no-repeat; background-size: cover;">
			<!-- Banner title -->
			<div class="row"> 
				<div class="col-md-10 mx-auto text-center"> 
					<h1 class="text-dark display-3 pt-sm-5 my-5">Let’s Get You Flying!</h1>
				</div>
			</div>  

			<!-- Booking from START -->
			<div class="bg-mode position-relative px-3 px-sm-4 pt-4 mb-4 mb-sm-0" >

				<!-- Svg decoration -->
				<figure class="position-absolute top-0 start-0 h-100 ms-n2 ms-sm-n1">
					<svg class="h-100" viewBox="0 0 12.9 324" style="enable-background:new 0 0 12.9 324;">
						<path class="fill-mode" d="M9.8,316.4c1.1-26.8,2-53.4,1.9-80.2c-0.1-18.2-0.8-36.4-1.2-54.6c-0.2-8.9-0.2-17.7,0.8-26.6 c0.5-4.5,1.1-9,1.4-13.6c0.1-1.9,0.1-3.7,0.1-5.6c-0.2-0.2-0.6-1.5-0.2-3.1c-0.3-1.8-0.4-3.7-0.4-5.5c-1.2-3-1.8-6.3-1.7-9.6 c0.9-19,0.5-38.1,0.8-57.2c0.3-17.1,0.6-34.2,0.2-51.3c-0.1-0.6-0.1-1.2-0.1-1.7c0-0.8,0-1.6,0-2.4c0-0.5,0-1.1,0-1.6 c0-1.2,0-2.3,0.2-3.5H0v11.8c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1V31c3.3,0,6.1,2.7,6.1,6.1S3.3,43.3,0,43.3v6.9 c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1 s-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9 c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1 c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.7,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9 c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.7,6.1,6.1 c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1V324h9.5C9.6,321.4,9.7,318.8,9.8,316.4z"/>
					</svg>
				</figure>

				<!-- Svg decoration -->
				<figure class="position-absolute top-0 end-0 h-100 rotate-180 me-n2 me-sm-n1">
					<svg class="h-100" viewBox="0 0 21 324" style="enable-background:new 0 0 21 324;">
						<path class="fill-mode" d="M9.8,316.4c1.1-26.8,2-53.4,1.9-80.2c-0.1-18.2-0.8-36.4-1.2-54.6c-0.2-8.9-0.2-17.7,0.8-26.6 c0.5-4.5,1.1-9,1.4-13.6c0.1-1.9,0.1-3.7,0.1-5.6c-0.2-0.2-0.6-1.5-0.2-3.1c-0.3-1.8-0.4-3.7-0.4-5.5c-1.2-3-1.8-6.3-1.7-9.6 c0.9-19,0.5-38.1,0.8-57.2c0.3-17.1,0.6-34.2,0.2-51.3c-0.1-0.6-0.1-1.2-0.1-1.7c0-0.8,0-1.6,0-2.4c0-0.5,0-1.1,0-1.6 c0-1.2,0-2.3,0.2-3.5H0v11.8c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1V31c3.3,0,6.1,2.7,6.1,6.1S3.3,43.3,0,43.3v6.9 c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1 s-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9 c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1 c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.7,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9 c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.7,6.1,6.1 c0,3.4-2.8,6.1-6.1,6.1v6.9c3.3,0,6.1,2.8,6.1,6.1c0,3.4-2.8,6.1-6.1,6.1V324h9.5C9.6,321.4,9.7,318.8,9.8,316.4z"/>
					</svg>
				</figure>

				<div class="row g-4 position-relative">

					<!-- Nav tabs START -->
					<div class="col-lg-6">
						<ul class="nav nav-pills nav-pills-dark" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link rounded-start rounded-0 mb-0 active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-selected="true">One Way</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link rounded-end rounded-0 mb-0" id="pills-round-trip-tab" data-bs-toggle="pill" data-bs-target="#pills-round-trip" type="button" role="tab" aria-selected="false">Round Trip</button>
							</li>
						</ul>
					</div>
					<!-- Nav tabs END -->

					<!-- Tab content START -->
					<div class="tab-content mt-4" id="pills-tabContent">
						<!-- One way tab START -->
						<div class="tab-pane fade show active" id="pills-one-way" role="tabpanel" aria-labelledby="pills-one-way-tab">
							<form action="book_flight.php" method="post">
								<div class="row g-4">
									<input type="hidden" name="type" value="one">
									<!-- Leaving From -->
									<div class="col-md-6 col-lg-4 position-relative">
										<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
											<!-- Input field -->
											<label class="mb-1"><i class="bi bi-geo-alt me-2"></i>From</label>
											

											<?php
											$sql = 'SELECT * FROM Cities ';
											$stmt = mysqli_stmt_init($conn);
											mysqli_stmt_prepare($stmt, $sql);
											mysqli_stmt_execute($stmt);
											$result = mysqli_stmt_get_result($stmt);
											echo '<select value="0" class="form-select js-choice" data-search-enabled="true" name="dep_city" id="w3_country1">
												<option selected disabled>Departure</option>';
											while ($row = mysqli_fetch_assoc($result)) {
												echo '<option value=' . $row['city']  . '>' .
													$row['city'] . '</option>';
											}
											?>
											</select>
										</div>
	
										<!-- Auto fill button -->
										<div class="btn-flip-icon mt-3 mt-md-0">
											<button type="button" class="btn btn-white shadow btn-round mb-0"><i class="fa-solid fa-right-left"></i></button>
										</div>
									</div>
	
									<!-- Going To -->
									<div class="col-md-6 col-lg-4">
										<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
											<!-- Input field -->
											<label class="mb-1"><i class="bi bi-send me-2"></i>To</label>
											


											<?php
											$sql = 'SELECT * FROM Cities ';
											$stmt = mysqli_stmt_init($conn);
											mysqli_stmt_prepare($stmt, $sql);
											mysqli_stmt_execute($stmt);
											$result = mysqli_stmt_get_result($stmt);
											echo '<select value="0" class="form-select js-choice" data-search-enabled="true" name="arr_city" id="w3_country1">
												<option selected disabled>Departure</option>';
											while ($row = mysqli_fetch_assoc($result)) {
												echo '<option value=' . $row['city']  . '>' .
													$row['city'] . '</option>';
											}
											?>
											</select>
										</div>
									</div>
	
									<!-- Departure date -->
									<div class="col-lg-4">
										<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
											<label class="mb-1"><i class="bi bi-calendar me-2"></i>Departure</label>
											<input required type="text" name="dep_date" class="form-control flatpickr" data-date-format="d M Y" placeholder="Select date">
										</div>
									</div>
	
									<!-- flight class -->
									<div class="col-lg-6">
										<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
											<label class="mb-1"><i class="bi bi-airplane me-2"></i>Flight Class</label>
											<select class="form-select js-choice  mb-2" name="f_class">
												<option value="">-- Select --</option>
												<option value="E">Economy</option>
												<option value="B">Business</option>
											</select>
											<!-- <input required type="text" name="dep_date" class=" mb-2" data-date-format="d M Y" placeholder="Select date"> -->
										</div>
									</div>
	
									<!-- passengers count -->
									<div class="col-lg-6">
										<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
											<label class="mb-1"><i class="bi bi-calendar me-2"></i>No.of Passengers</label>
											<select class="form-select js-choice  mb-2" name="passengers">
												<option value="">-- Select --</option>
												<?php
													for ($i = 1; $i <= 10; $i++) {
													echo "<option value=\"$i\">$i</option>";
													}
												?>
											</select>
										</div>
									</div>
	
									<div class="col-12 text-end pt-0">
										<button name="search_but" class="btn btn-primary mb-n4" type="submit">Search flights<i class="bi bi-arrow-right ps-3"></i></button>
									</div>
								</div>
							</form>
						</div>
						<!-- One way tab END -->

						<!-- Round way tab STart -->
						<div class="tab-pane fade" id="pills-round-trip" role="tabpanel" aria-labelledby="pills-round-trip-tab">
							<form action="book_flight.php" method="post">
								<div class="row g-4">
									<input type="hidden" name="type" value="round">
									<!-- Leaving From -->
									<div class="col-md-6 col-lg-6 position-relative">
										<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
											<!-- Input field -->
											<label class="mb-1"><i class="bi bi-geo-alt me-2"></i>From</label>
											

											<?php
											$sql = 'SELECT * FROM Cities ';
											$stmt = mysqli_stmt_init($conn);
											mysqli_stmt_prepare($stmt, $sql);
											mysqli_stmt_execute($stmt);
											$result = mysqli_stmt_get_result($stmt);
											echo '<select value="0" class="form-select js-choice" data-search-enabled="true" name="dep_city" id="w3_country1">
												<option selected disabled>Departure</option>';
											while ($row = mysqli_fetch_assoc($result)) {
												echo '<option value=' . $row['city']  . '>' .
													$row['city'] . '</option>';
											}
											?>
											</select>
										</div>

										<!-- Auto fill button -->
										<div class="btn-flip-icon mt-3 mt-md-0">
											<button type="button" class="btn btn-white shadow btn-round mb-0"><i class="fa-solid fa-right-left"></i></button>
										</div>
									</div>

									<!-- Going To -->
									<div class="col-md-6 col-lg-6">
										<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
											<!-- Input field -->
											<label class="mb-1"><i class="bi bi-send me-2"></i>To</label>
											


											<?php
											$sql = 'SELECT * FROM Cities ';
											$stmt = mysqli_stmt_init($conn);
											mysqli_stmt_prepare($stmt, $sql);
											mysqli_stmt_execute($stmt);
											$result = mysqli_stmt_get_result($stmt);
											echo '<select value="0" class="form-select js-choice" data-search-enabled="true" name="arr_city" id="w3_country1">
												<option selected disabled>Departure</option>';
											while ($row = mysqli_fetch_assoc($result)) {
												echo '<option value=' . $row['city']  . '>' .
													$row['city'] . '</option>';
											}
											?>
											</select>
										</div>
									</div>

									<!-- Departure date -->
									<div class="col-lg-6">
										<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
											<label class="mb-1"><i class="bi bi-calendar me-2"></i>Departure</label>
											<input required type="text" name="dep_date" class="form-control flatpickr" data-date-format="d M Y" placeholder="Select date">
										</div>
									</div>

									<!-- Return -->
									<div class="col-md-6 col-xl-3">
									<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
										<label class="mb-1"><i class="bi bi-calendar me-2"></i>Return</label>
										<input type="text" class="form-control flatpickr" required name="ret_date" data-date-format="d M Y" placeholder="Select date">
									</div>
									</div>

									<!-- flight class -->
									<div class="col-lg-6">
										<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
											<label class="mb-1"><i class="bi bi-airplane me-2"></i>Flight Class</label>
											<select class="form-select js-choice  mb-2" name="f_class">
												<option value="">-- Select --</option>
												<option value="E">Economy</option>
												<option value="B">Business</option>
											</select>
											<!-- <input required type="text" name="dep_date" class=" mb-2" data-date-format="d M Y" placeholder="Select date"> -->
										</div>
									</div>

									<!-- passengers count -->
									<div class="col-lg-6">
										<div class="form-border-transparent form-fs-lg bg-light rounded-3 h-100 p-3">
											<label class="mb-1"><i class="bi bi-calendar me-2"></i>No.of Passengers</label>
											<select class="form-select js-choice  mb-2" name="passengers">
												<option value="">-- Select --</option>
												<?php
													for ($i = 1; $i <= 10; $i++) {
													echo "<option value=\"$i\">$i</option>";
													}
												?>
											</select>
										</div>
									</div>

									<div class="col-12 text-end pt-0">
										<button name="search_but" class="btn btn-primary mb-n4" type="submit">Search flights<i class="bi bi-arrow-right ps-3"></i></button>
									</div>
								</div>
							</form>
						</div>
						<!-- Round way tab END -->
					</div>
					<!-- Tab content END -->
				</div>
			</div>
			<!-- Booking from END -->
		</div>
	</div>
</section>
<!-- =======================
Main Banner END -->



<!-- =======================
Steps START -->
<section class="pt-0">
	<div class="container">
		<div class="row g-4 g-lg-5 justify-content-center">
			<!-- Step item -->
			<div class="col-sm-6 col-md-4 text-center position-relative">
				<!-- SVG decoration -->
				<figure class="position-absolute top-0 start-100 translate-middle mt-8 d-none d-lg-block">
					<svg width="154px" height="83px">
						<path class="fill-secondary opacity-4" d="M142.221,83.016 L140.251,81.082 L148.020,73.376 C146.847,73.405 145.665,73.402 144.479,73.353 L144.548,70.637 C145.888,70.692 147.217,70.676 148.535,70.628 L139.384,62.839 L141.165,60.792 L153.787,71.539 L142.221,83.016 ZM131.667,71.378 L132.327,68.751 C134.373,69.284 136.418,69.712 138.402,70.022 L138.015,72.707 C135.938,72.383 133.803,71.936 131.667,71.378 ZM119.489,67.036 L120.594,64.564 C122.531,65.433 124.480,66.221 126.383,66.905 L125.482,69.458 C123.509,68.751 121.493,67.935 119.489,67.036 ZM108.113,60.978 L109.540,58.677 C111.340,59.784 113.170,60.834 114.978,61.800 L113.698,64.186 C111.840,63.193 109.961,62.115 108.113,60.978 ZM99.302,55.005 C98.712,54.567 98.124,54.125 97.540,53.680 L99.203,51.541 C99.776,51.978 100.352,52.412 100.933,52.843 C102.031,53.657 103.148,54.459 104.282,55.243 L102.729,57.461 C101.568,56.659 100.426,55.841 99.302,55.005 ZM87.631,45.617 L89.413,43.574 C91.015,44.943 92.626,46.298 94.258,47.629 L92.525,49.714 C90.877,48.369 89.247,47.000 87.631,45.617 ZM78.063,37.231 L79.883,35.221 L84.635,39.423 L82.823,41.439 L78.063,37.231 ZM68.521,28.905 L70.295,26.853 C71.914,28.227 73.520,29.618 75.118,31.017 L73.310,33.038 C71.724,31.648 70.130,30.268 68.521,28.905 ZM58.688,21.003 L60.328,18.848 C62.036,20.128 63.717,21.440 65.378,22.781 L63.659,24.875 C62.023,23.557 60.369,22.263 58.688,21.003 ZM48.288,13.967 L49.683,11.647 C51.494,12.727 53.321,13.891 55.111,15.108 L53.575,17.340 C51.832,16.155 50.053,15.019 48.288,13.967 ZM38.981,9.077 C38.372,8.799 37.760,8.531 37.146,8.268 L38.204,5.775 C38.838,6.046 39.469,6.325 40.098,6.611 C41.429,7.216 42.746,7.854 44.046,8.521 L42.810,10.930 C41.547,10.283 40.272,9.664 38.981,9.077 ZM25.330,4.320 L25.934,1.679 C27.985,2.168 30.080,2.771 32.161,3.471 L31.314,6.042 C29.311,5.369 27.298,4.791 25.330,4.320 ZM13.076,2.706 L13.084,-0.012 C15.208,0.029 17.387,0.197 19.559,0.487 L19.234,3.180 C17.166,2.905 15.094,2.745 13.076,2.706 ZM0.759,1.270 C2.660,0.821 4.623,0.487 6.593,0.273 L6.939,2.975 C5.080,3.177 3.230,3.493 1.439,3.914 L0.759,1.270 Z"/>
					</svg>
				</figure>
		
				<div class="px-4">
					<!-- Image -->
					<img src="assetscustom/images/element/step-3.svg" class="w-150px mb-3" alt="">
					<!-- Title -->
					<h5>Search Choice</h5>
					<!-- <p class="mb-0">Total 630+ destinations that we work with</p> -->
				</div>	
			</div>
		
			<!-- Step item -->
			<div class="col-sm-6 col-md-4 position-relative text-center pt-0 pt-lg-5">
				<!-- SVG decoration -->
				<figure class="position-absolute top-100 start-100 translate-middle d-none d-lg-block mt-n9">
					<svg class="fill-secondary opacity-4" width="161px" height="79px">
						<path d="M158.107,15.463 L157.135,5.449 C156.369,6.347 155.573,7.235 154.736,8.101 L152.599,6.579 C153.544,5.600 154.425,4.592 155.272,3.574 L142.859,6.243 L142.411,3.796 L159.535,0.118 L160.985,15.028 L158.107,15.463 ZM131.614,21.310 C133.615,20.323 135.558,19.284 137.387,18.222 L138.833,20.282 C136.938,21.383 134.927,22.459 132.858,23.479 L131.614,21.310 ZM119.450,26.438 C121.550,25.684 123.624,24.876 125.616,24.039 L126.674,26.293 C124.626,27.153 122.496,27.983 120.340,28.758 L119.450,26.438 ZM107.366,32.761 L106.764,30.352 C107.500,30.158 108.237,29.959 108.974,29.755 C110.367,29.370 111.762,28.963 113.155,28.535 L113.894,30.904 C112.468,31.343 111.042,31.759 109.615,32.153 C108.867,32.359 108.116,32.563 107.366,32.761 ZM93.778,33.405 C95.956,32.941 98.128,32.461 100.295,31.955 L100.806,34.386 C98.616,34.898 96.421,35.383 94.222,35.850 L93.778,33.405 ZM80.657,36.053 L87.229,34.752 L87.633,37.206 L81.049,38.509 L80.657,36.053 ZM67.485,38.736 C69.678,38.262 71.876,37.807 74.074,37.362 L74.484,39.816 C72.299,40.256 70.119,40.708 67.942,41.181 L67.485,38.736 ZM54.349,41.900 C56.526,41.309 58.711,40.754 60.906,40.230 L61.433,42.656 C59.274,43.174 57.122,43.718 54.979,44.301 L54.349,41.900 ZM41.404,46.011 C43.490,45.232 45.654,44.489 47.835,43.801 L48.597,46.164 C46.472,46.834 44.363,47.557 42.331,48.315 L41.404,46.011 ZM30.259,53.613 L28.967,51.468 C29.611,51.137 30.259,50.813 30.912,50.495 C32.293,49.821 33.691,49.176 35.102,48.558 L36.207,50.792 C34.838,51.392 33.483,52.016 32.143,52.670 C31.511,52.978 30.883,53.292 30.259,53.613 ZM17.425,58.480 C19.198,57.202 21.090,55.953 23.052,54.765 L24.549,56.794 C22.662,57.937 20.844,59.138 19.142,60.364 L17.425,58.480 ZM7.428,67.231 C8.888,65.655 10.488,64.107 12.182,62.630 L14.128,64.332 C12.516,65.738 10.995,67.211 9.607,68.707 L7.428,67.231 ZM0.172,77.195 C1.089,75.523 2.140,73.865 3.293,72.267 L5.697,73.469 C4.610,74.977 3.620,76.539 2.755,78.114 L0.172,77.195 ZM149.871,12.613 C148.214,13.999 146.419,15.364 144.535,16.669 L142.867,14.750 C144.671,13.499 146.390,12.194 147.973,10.869 L149.871,12.613 Z"/>
						</svg>
				</figure>
		
				<div class="px-4">
					<!-- Image -->
					<img src="assetscustom/images/element/step-2.svg" class="w-150px mb-3" alt="">

					<!-- Title -->
					<h5>Select Destination</h5>
					<!-- <p class="mb-0">Insipidity the sufficient discretion imprudence</p> -->
				</div>
			</div>
		
			<!-- Step item -->
			<div class="col-sm-6 col-md-4 text-center">
				<div class="px-4">
					<!-- Image -->
					<img src="assetscustom/images/element/step-1.svg" class="w-150px mb-3" alt="">

					<!-- Title -->
					<h5>Easy to Book</h5>
					<!-- <p class="mb-0">With an easy and fast ticket purchase process</p> -->
				</div>	
			</div>
		</div>
	</div>
</section>
<!-- =======================
Steps END -->



</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer>
	<div class="container">
		<div class="bg-dark rounded-top py-5 p-sm-5 mx-0">
    <div class="row g-4 align-items-center text-center text-lg-start">
			<!-- Copyright -->
			<div class="col-lg-5">
				<ul class="nav list-inline text-primary-hover justify-content-center justify-content-lg-start mb-0">
					<li class="list-inline-item"><a class="nav-link text-body-secondary" href="#">About</a></li>
					<li class="list-inline-item"><a class="nav-link text-body-secondary" href="#">Policy</a></li>
					<li class="list-inline-item"><a class="nav-link text-body-secondary pe-0" href="#">Terms & Condition</a></li>
				</ul>
			</div>
			
			<!-- Logo -->
			<div class="col-lg-3 text-center">
				<!-- Logo -->
				<a class="me-0" href="index.html">
					<img class="h-60px" src="assetscustom/images/logo-light.svg" alt="footer logo">
				</a>
				<div class="text-body-secondary text-primary-hover mt-3"> Copyrights ©2023 Booking. Build by <a href="#" class="text-body-secondary">StackBros</a>. </div>
			</div>

			<!-- Social links -->
			<div class="col-lg-4">
				<ul class="nav text-primary-hover hstack gap-2 justify-content-center justify-content-lg-end">
					<li class="nav-item">
						<a class="nav-link text-body-secondary fs-5" href="#"><i class="fab fa-facebook-f"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-body-secondary fs-5" href="#"><i class="fab fa-twitter"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-body-secondary fs-5" href="#"><i class="fab fa-instagram"></i></a>
					</li>
					<li class="nav-ite
					-body-secondary fs-5" href="#"><i class="fab fa-linkedin-in"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-body-secondary fs-5" href="#"><i class="fab fa-github"></i></a>
					</li>
				</ul>
			</div>
		</div>
    </div>
	</div>
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"></div>

<!-- Bootstrap JS -->
<script src="assetscustom/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="assetscustom/vendor/choices/js/choices.min.js"></script>
<script src="assetscustom/vendor/flatpickr/js/flatpickr.min.js"></script>

<!-- ThemeFunctions -->
<script src="assetscustom/js/functions.js"></script>

</body>

</html>
