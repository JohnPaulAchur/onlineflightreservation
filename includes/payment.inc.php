<?php
session_start();

if (isset($_POST['pay_but']) && isset($_SESSION['userId'])) {
    require '../helpers/init_conn_db.php';

    $flight_id = $_SESSION['flight_id'];
    $price = $_SESSION['price'];
    $passengers = $_SESSION['passengers'];
    $pass_id = $_SESSION['pass_id'];
    $type = $_SESSION['type'];
    $class = $_SESSION['class'];
    $ret_date = $_SESSION['ret_date'];

    // Generate dummy card info
    $card_no = '4111' . rand(100000000000, 999999999999);
    $expiry = '12/30'; // Dummy expiry

    // Insert into PAYMENT
    $sql = 'INSERT INTO PAYMENT (user_id, expire_date, amount, flight_id, card_no) 
            VALUES (?, ?, ?, ?, ?)';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_bind_param($stmt, 'isiis', $_SESSION['userId'], $expiry, $price, $flight_id, $card_no);
    mysqli_stmt_execute($stmt);

    $flag = false;

    for ($i = $pass_id; $i < $passengers + $pass_id; $i++) {
        $sql = 'SELECT * FROM Flight WHERE flight_id = ?';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit();
        }
        mysqli_stmt_bind_param($stmt, 'i', $flight_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $source = $row['source'];
            $dest = $row['Destination'];

            if ($class === 'B') {
                $last_seat = $row['last_bus_seat'];
                $new_seat = getNextSeat($last_seat, true);
                $seats = $row['bus_seats'] - 1;
                $sql = 'UPDATE Flight SET last_bus_seat = ?, bus_seats = ? WHERE flight_id = ?';
            } else {
                $last_seat = $row['last_seat'];
                $new_seat = getNextSeat($last_seat, false);
                $seats = $row['Seats'] - 1;
                $sql = 'UPDATE Flight SET last_seat = ?, Seats = ? WHERE flight_id = ?';
            }

            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                exit();
            }
            mysqli_stmt_bind_param($stmt, 'sii', $new_seat, $seats, $flight_id);
            mysqli_stmt_execute($stmt);

            $sql = 'INSERT INTO Ticket (passenger_id, flight_id, seat_no, cost, class, user_id) 
                    VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                exit();
            }
            mysqli_stmt_bind_param($stmt, 'iisisi', $i, $flight_id, $new_seat, $price, $class, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);
            $flag = true;
        }
    }

    // Handle return flight if round trip
    if ($type === 'round' && $flag) {
        for ($i = $pass_id; $i < $passengers + $pass_id; $i++) {
            $sql = 'SELECT * FROM Flight WHERE source = ? AND Destination = ? AND DATE(departure) = ?';
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                exit();
            }
            mysqli_stmt_bind_param($stmt, 'sss', $dest, $source, $ret_date);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $flight_id = $row['flight_id'];

                if ($class === 'B') {
                    $last_seat = $row['last_bus_seat'];
                    $new_seat = getNextSeat($last_seat, true);
                    $seats = $row['bus_seats'] - 1;
                    $sql = 'UPDATE Flight SET last_bus_seat = ?, bus_seats = ? WHERE flight_id = ?';
                } else {
                    $last_seat = $row['last_seat'];
                    $new_seat = getNextSeat($last_seat, false);
                    $seats = $row['Seats'] - 1;
                    $sql = 'UPDATE Flight SET last_seat = ?, Seats = ? WHERE flight_id = ?';
                }

                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    exit();
                }
                mysqli_stmt_bind_param($stmt, 'sii', $new_seat, $seats, $flight_id);
                mysqli_stmt_execute($stmt);

                $sql = 'INSERT INTO Ticket (passenger_id, flight_id, seat_no, cost, class, user_id) 
                        VALUES (?, ?, ?, ?, ?, ?)';
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    exit();
                }
                mysqli_stmt_bind_param($stmt, 'iisisi', $i, $flight_id, $new_seat, $price, $class, $_SESSION['userId']);
                mysqli_stmt_execute($stmt);
            }
        }
    }

    if ($flag) {
        unset($_SESSION['flight_id'], $_SESSION['passengers'], $_SESSION['pass_id'], $_SESSION['price'], $_SESSION['class'], $_SESSION['type'], $_SESSION['ret_date']);
        exit(); // AJAX will redirect
    } else {
        exit();
    }
} else {
    header('Location: ../payment.php');
    exit();
}

// Helper
function getNextSeat($lastSeat, $isBusiness) {
    if ($lastSeat === '') return $isBusiness ? '1A' : '21A';
    $ls_len = strlen($lastSeat);
    $seat_num = (int)substr($lastSeat, 0, $ls_len - 1);
    $seat_alpha = $lastSeat[$ls_len - 1];
    $seat_alpha = ($seat_alpha === 'F') ? 'A' : chr(ord($seat_alpha) + 1);
    $seat_num += ($seat_alpha === 'A') ? 1 : 0;
    return $seat_num . $seat_alpha;
}
