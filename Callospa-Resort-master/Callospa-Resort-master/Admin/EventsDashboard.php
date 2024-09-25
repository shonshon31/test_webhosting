<?php
include('callospa_resort_database.php');

$sql1 = "SELECT event_reservation_id, first_name, middle_name, last_name, contact_number, email, package_category, package, event_type, check_in_date, check_out_date, check_in_time, check_out_time, guests, additional_guest, catering_preference, total_cost, deposit_amount, remaining_balance, payment_method, proof_of_payment, reservation_date FROM event_reservations";
$result1 = $conn->query($sql1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- My CSS -->
  <link rel="stylesheet" href="EventsDashboard.css" />

  <title>Callospa Resort and Residences Admin</title>
  <script src='bootstrap4/index.global.js'></script>
  <script>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        selectable: true,
        businessHours: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: 'EventsReservations.php', // Path to your PHP script
        eventDidMount: function(info) {
            console.log('Event Mounted:', info.event); // Debug: Check the event data
        },
        eventsSet: function(events) {
            console.log('Events Set:', events); // Debug: Check the full list of events
        }
    });
    calendar.render();
});
</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1800px;
    margin: 0 auto;
  }

</style>
</head>

<body>
  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="#" class="brand">
      <i class="bx bxs-smile"></i>
      <span class="text">CALLOSPA Resort and Residences</span>
    </a>
    <ul class="side-menu top">
      <li>
        <a href="AdministratorPage.php">
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
      <li class="active">
        <a href="#Events_Dashboard">
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
        <a href="logout.php">
          <i class="bx bxs-log-out-circle"></i>
          <span class="text">Logout</span>
        </a>
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
          <h1>Events Reservation Dashboard</h1>
          <ul class="breadcrumb">
            <li>
              <a href="#">Event Reservation Dashboard</a>
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
      <div id='calendar'></div>
      <div class="table-data">
        <div class="reservation">
          <div class="head">
            <h3>Incoming Bookings</h3>
            <i class="bx bx-search"></i>
            <i class="bx bx-filter"></i>
          </div>
          <table>
            <thead>
              <tr>
                <th>Reservation ID</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Package Category</th>
                <th>Package</th>
                <th>Event Type</th>
                <th>Check-In Date</th>
                <th>Check-Out Date</th>
                <th>Check-In Time</th>
                <th>Check-Out Time</th>
                <th>Guests</th>
                <th>Additional Guests</th>
                <th>Catering Preference</th>
                <th>Total Cost</th>
                <th>Deposit Amount</th>
                <th>Remaining Balance</th>
                <th>Payment Method</th>
                <th>Proof of Payment</th>
                <th>Reservation Date</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result1->fetch_assoc()): ?>
                <tr>
                  <td><?php echo htmlspecialchars($row['event_reservation_id']); ?></td>
                  <td>
                    <?php
                    echo htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['middle_name']) . ' ' . htmlspecialchars($row['last_name']);
                    ?>
                  </td>
                  <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                  <td><?php echo htmlspecialchars($row['email']); ?></td>
                  <td><?php echo htmlspecialchars($row['package_category']); ?></td>
                  <td><?php echo htmlspecialchars($row['package']); ?></td>
                  <td><?php echo htmlspecialchars($row['event_type']); ?></td>
                  <td><?php echo htmlspecialchars($row['check_in_date']); ?></td>
                  <td><?php echo htmlspecialchars($row['check_out_date']); ?></td>
                  <td><?php echo htmlspecialchars($row['check_in_time']); ?></td>
                  <td><?php echo htmlspecialchars($row['check_out_time']); ?></td>
                  <td><?php echo htmlspecialchars($row['guests']); ?></td>
                  <td><?php echo htmlspecialchars($row['additional_guest']); ?></td>
                  <td><?php echo htmlspecialchars($row['catering_preference']); ?></td>
                  <td><?php echo htmlspecialchars($row['total_cost']); ?></td>
                  <td><?php echo htmlspecialchars($row['deposit_amount']); ?></td>
                  <td><?php echo htmlspecialchars($row['remaining_balance']); ?></td>
                  <td><?php echo htmlspecialchars($row['payment_method']); ?></td>
                  <td>
                    <?php if (!empty($row['proof_of_payment'])): ?>
                      <a href="/uploads/<?php echo htmlspecialchars($row['proof_of_payment'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank"><?php echo htmlspecialchars($row['proof_of_payment'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php else: ?>
                      No Proof Uploaded
                    <?php endif; ?>
                  </td>
                  <td><?php echo htmlspecialchars($row['reservation_date']); ?></td>
                </tr>
              <?php endwhile; ?>
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