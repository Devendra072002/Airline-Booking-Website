<?php
include 'session.php';
include 'dbconnect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin Booked Ticket </title>
    <script src="sweetalert.min.js"></script>
   <link rel="stylesheet" href="style.css" > 
   <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet">
</head>
<style>
    
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="Adminhome.php" style="font-weight: bolder;">Airline Booking System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Adminhome.php">Flights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Adminairport.php"> Airports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Admin_booked_ticket.php">Booked Tickets</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                    <a class="btn btn-outline-danger float-end" href="admin_logout.php" style="color: white;font-weight:bold;" role="button">Log out</a>
                </form>
            </div>
        </div>
    </nav>
    <!-- <a class="btn btn-danger btn-outline-info float-end mb-6 mt-2 me-4" href="logout.php" style="color: black;font-weight:bold" role="button">Log out</a>
    <a class="btn btn-success btn-outline-info  ms-2 mb-6 mt-2" href="adminairport.php" style="color: black;font-weight:bold" role="button">Add/Delete/Modify Airport</a> -->
    <div class="container mt-3 ">

        <?php
        $query = "SELECT ticket_id,f_name,l_name,ticket.flight_id,flight_name,source.source_name,destination.destination_name,depart_date,departure_time 
        FROM ticket,user,flight,destination,source
        WHERE ticket.reg_id=user.reg_id AND flight.flight_id=ticket.flight_id AND source.source_id=flight.source_id AND destination.destination_id=flight.destination_id ";
        $result = mysqli_query($conn, $query) or die("Query Failed : " . mysqli_error(($conn)));
        echo ' <h2 class="text-center mb-3"><u>BOOKED TICKET DETAILS</u></h2>';
        echo '<div class="container" ><table class="table table-dark table-striped table-hover text-center">
    <thead>
    <tr>
    <th scope="col">Ticket Id</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Flight Id</th>
    <th scope="col">Flight Name</th>
    <th scope="col">From</th>
    <th scope="col">To</th>
    <th scope="col">Departure Date</th>
    <th scope="col">Departure Time</th>
    <th scope="col">Action</th>
    </tr>
    </thead>';
        if (mysqli_num_rows($result) > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '  <tbody>
            <tr>
            <td>' . $row["ticket_id"] . '</td>
            <td>' . $row["f_name"] . '</td>
            <td>' . $row["l_name"] . '</td>
            <td>' . $row["flight_id"] . '</td>
            <td>' . $row["flight_name"] . '</td>
            <td>' . $row["source_name"] . '</td>
            <td>' . $row["destination_name"] . '</td>
            <td>' . $row["depart_date"] . '</td>
            <td>' . date("h:i A", strtotime($row['departure_time'])) . '</td>
            <td>
            <a onclick="return myConfirm();" class="btn btn-sm btn-danger " href="Admin_booked_ticket_delete.php?id=' .
                    $row["ticket_id"] . '" role="button">Delete</a>' . '</td>
            </tr>';
                $i++;
            }
            echo '</tbody></table> </div>';
        }
        ?>
    </div>
    <script>
        function myConfirm() {
            var result = confirm("Are you sure you want to delete?");
            if (result) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>