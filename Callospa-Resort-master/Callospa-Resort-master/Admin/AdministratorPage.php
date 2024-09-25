<?php
session_start(); // Start the session

include 'callospa_resort_database.php';

// Fetch reservations
$sql1 = "SELECT 'room' AS reservation_type, first_name, middle_name, last_name, reservation_date FROM room_reservations";
$result1 = $conn->query($sql1);

$sql2 = "SELECT 'event' AS reservation_type, first_name, middle_name, last_name, reservation_date FROM event_reservations";
$result2 = $conn->query($sql2);

$sql3 = "SELECT 'amenity' AS reservation_type, first_name, middle_name, last_name, reservation_date FROM amenity_reservations";
$result3 = $conn->query($sql3);

// Combine results
$combinedResults = [];
while ($row = $result1->fetch_assoc()) {
    $combinedResults[] = $row;
}
while ($row = $result2->fetch_assoc()) {
    $combinedResults[] = $row;
}
while ($row = $result3->fetch_assoc()) {
    $combinedResults[] = $row;
}

// Booked Rooms
$sql = "SELECT COUNT(*) AS booked_rooms FROM room_reservations";
$result = $conn->query($sql);

$booked_rooms = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $booked_rooms = $row['booked_rooms'];
}

// Booked Events
$sql = "SELECT COUNT(*) AS booked_events FROM event_reservations";
$result = $conn->query($sql);

$booked_events = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $booked_events = $row['booked_events'];
}

// Booked Amenities
$sql = "SELECT COUNT(*) AS booked_amenities FROM amenity_reservations";
$result = $conn->query($sql);

$booked_amenities = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $booked_amenities = $row['booked_amenities'];
}

// Rooms Total Deposit
$sql_room = "SELECT SUM(deposit_amount) AS total_room_deposit FROM room_reservations";
$result_room = $conn->query($sql_room);
$total_room_deposit = 0;
if ($result_room->num_rows > 0) {
    $row = $result_room->fetch_assoc();
    $total_room_deposit = $row['total_room_deposit'];
}

// Event Total Deposit
$sql_event = "SELECT SUM(deposit_amount) AS total_event_deposit FROM event_reservations";
$result_event = $conn->query($sql_event);
$total_event_deposit = 0;
if ($result_event->num_rows > 0) {
    $row = $result_event->fetch_assoc();
    $total_event_deposit = $row['total_event_deposit'];
}

// Amenity Total Deposit
$sql_amenity = "SELECT SUM(deposit_amount) AS total_amenity_deposit FROM amenity_reservations";
$result_amenity = $conn->query($sql_amenity);
$total_amenity_deposit = 0;
if ($result_amenity->num_rows > 0) {
    $row = $result_amenity->fetch_assoc();
    $total_amenity_deposit = $row['total_amenity_deposit'];
}

// Total Deposit Calculation
$total_sales = $total_room_deposit + $total_event_deposit + $total_amenity_deposit;

// LOGOUT
include 'callospa_admin_database.php';
$db = mysqli_connect('localhost', 'root', '', 'callospa_admin_database');
if (isset($_POST['logout_user'])) {
  // Check if session ID is available
  if (isset($_SESSION['session_id'])) {
      $session_id = $_SESSION['session_id'];

      // Delete the session ID from the database
      $query = "DELETE FROM login_sessions WHERE session_id='$session_id'";
      if (!mysqli_query($db, $query)) {
          // Handle query error
          echo "Error: " . mysqli_error($db);
      }

      // Clear cookies
      setcookie("user", "", time() - 3600, "/"); // Expire cookie
      setcookie(session_name(), "", time() - 3600, "/"); // Expire session cookie

      // End session
      session_unset();
      session_destroy();

      // Redirect to login page
      header("Location: AdminLogin.php");
      exit();
  } else {
      // Handle case where session ID is not set
      header("Location: AdminLogin.php");
      exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- My CSS -->
  <link rel="stylesheet" href="AdministratorPage.css" />

  <title>Callospa Resort and Residences Admin</title>
  
</head>

<body>
  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="#" class="brand">
      <i class="bx bxs-smile"></i>
      <span class="text">CALLOSPA Resort and Residences</span>
    </a>
    <ul class="side-menu top">
      <li class="active">
        <a href="#">
          <i class="bx bxs-dashboard"></i>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="RoomsDashboard.php">
          <i class="bx bxs-bed"></i>
          <span class="text">Rooms</span>
        </a>
      </li>
      <li>
        <a href="EventsDashboard.php">
          <i class="bx bxs-calendar-check"></i>
          <span class="text">Events</span>
        </a>
      </li>
      <li>
        <a href="AmenitiesDashboard.php">
          <i class="bx bxs-bath"></i>
          <span class="text">Amenities</span>
        </a>
      </li>
      <li>
        <a href="#Sales">
          <i class="bx bxs-dollar-circle"></i>
          <span class="text">Sales</span>
        </a>
      </li>
      <li>
        <a href="#Account">
          <i class="bx bxs-user-circle"></i>
          <span class="text">Account</span>
        </a>
      </li>
      <li>
        <a href="#Activity_Log">
          <i class="bx bxs-book-content"></i>
          <span class="text">Activity Log</span>
        </a>
      </li>
      <li>
        <a href="#Archive">
          <i class="bx bxs-archive"></i>
          <span class="text">Archive</span>
        </a>
      </li>
      <li class="logout">
        <form method="POST" action="">
          <button type="submit" name="logout_user" id="logout">
            <i class="bx bxs-log-out-circle"></i>
            <span class="text">Logout</span>
          </button>
        </form>
      </li>
    </ul>
  </section>
  <!-- SIDEBAR -->

  <!-- CONTENT -->
  <section id="content">
    <!-- NAVBAR -->
    <nav>
      <i class="bx bx-menu"></i>
      <form action="#">
        <div class="form-input">
          <input type="search" placeholder="Search..." />
          <button type="submit" class="search-btn">
            <i class="bx bx-search"></i>
          </button>
        </div>
      </form>
      <input type="checkbox" id="switch-mode" hidden />
      <label for="switch-mode" class="switch-mode"></label>
      <a href="#" class="notification">
        <i class="bx bxs-bell"></i>
        <span class="num">8</span>
      </a>
      <a href="#" class="profile">
        <img src="img/people.png" />
      </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
    
      <div class="head-title">
        <div class="left">
          <h1>Dashboard</h1>
          <ul class="breadcrumb">
            <li>
              <a href="#">Dashboard</a>
            </li>
            <li><i class="bx bx-chevron-right"></i></li>
            <li>
              <a class="active" href="#">Home</a>
            </li>
          </ul>
        </div>
        <a href="#" class="btn-download">
          <i class="bx bxs-cloud-download"></i>
          <span class="text">Download PDF</span>
        </a>
      </div>

      <ul class="box-info">

        <li>
          <i class="bx bxs-calendar-check"></i>
          <span class="text">
            <h3><?php echo htmlspecialchars($booked_rooms, ENT_QUOTES, 'UTF-8'); ?></h3>
            <p>Rooms Booked</p>
          </span>
        </li>

        <li>
          <i class="bx bxs-calendar-check"></i>
          <span class="text">
            <h3><?php echo htmlspecialchars($booked_events, ENT_QUOTES, 'UTF-8'); ?></h3>
            <p>Events Booked</p>
          </span>
        </li>

        <li>
          <i class="bx bxs-calendar-check"></i>
          <span class="text">
            <h3><?php echo htmlspecialchars($booked_amenities, ENT_QUOTES, 'UTF-8'); ?></h3>
            <p>Amenities Booked</p>
          </span>
        </li>

        <li>
          <i class="bx bxs-dollar-circle"></i>
          <span class="text">
            <h3>₱ <?php echo number_format($total_sales, 2); ?></h3>
            <p>Total Sales</p>
          </span>
        </li>
      </ul>

      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Incoming Bookings</h3>
            <i class="bx bx-search"></i>
            <i class="bx bx-filter"></i>
          </div>
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Reservation Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($combinedResults as $row): ?>
                <tr>
                  <td>
                    <img src="img/people.png" />
                    <?php
                    $firstName = htmlspecialchars($row['first_name']);
                    $middleName = htmlspecialchars($row['middle_name']);
                    $lastName = htmlspecialchars($row['last_name']);

                    if (!empty($middleName)) {
                      echo $firstName . ' ' . $middleName . ' ' . $lastName;
                    } else {
                      echo $firstName . ' ' . $lastName;
                    }
                    ?>
                  </td>
                  <td><?php echo htmlspecialchars($row['reservation_date']); ?></td>
                  <td><span class="status <?php echo htmlspecialchars($row['status']); ?>"><?php echo htmlspecialchars($row['status']); ?></span></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
    <!-- MAIN -->
  </section>
  <!-- CONTENT -->


  <script>
    const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

    allSideMenu.forEach((item) => {
      const li = item.parentElement;

      item.addEventListener("click", function() {
        allSideMenu.forEach((i) => {
          i.parentElement.classList.remove("active");
        });
        li.classList.add("active");
      });
    });

    // TOGGLE SIDEBAR
    const menuBar = document.querySelector("#content nav .bx.bx-menu");
    const sidebar = document.getElementById("sidebar");

    menuBar.addEventListener("click", function() {
      sidebar.classList.toggle("hide");
    });

    const searchButton = document.querySelector(
      "#content nav form .form-input button"
    );
    const searchButtonIcon = document.querySelector(
      "#content nav form .form-input button .bx"
    );
    const searchForm = document.querySelector("#content nav form");

    searchButton.addEventListener("click", function(e) {
      if (window.innerWidth < 576) {
        e.preventDefault();
        searchForm.classList.toggle("show");
        if (searchForm.classList.contains("show")) {
          searchButtonIcon.classList.replace("bx-search", "bx-x");
        } else {
          searchButtonIcon.classList.replace("bx-x", "bx-search");
        }
      }
    });

    if (window.innerWidth < 768) {
      sidebar.classList.add("hide");
    } else if (window.innerWidth > 576) {
      searchButtonIcon.classList.replace("bx-x", "bx-search");
      searchForm.classList.remove("show");
    }

    window.addEventListener("resize", function() {
      if (this.innerWidth > 576) {
        searchButtonIcon.classList.replace("bx-x", "bx-search");
        searchForm.classList.remove("show");
      }
    });

    const switchMode = document.getElementById("switch-mode");

    switchMode.addEventListener("change", function() {
      if (this.checked) {
        document.body.classList.add("dark");
      } else {
        document.body.classList.remove("dark");
      }
    });
  </script>
</body>

</html>
