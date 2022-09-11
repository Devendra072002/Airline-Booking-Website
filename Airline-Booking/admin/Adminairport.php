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
    <link rel="stylesheet" href="style.css" >
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet">
    <title>Airport </title>
    <script src="sweetalert.min.js"></script>
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
    <div class="container mt-3">

        <?php
        $query = "SELECT source_id,source_name FROM source";
        $result = mysqli_query($conn, $query) or die("Query Failed : " . mysqli_error(($conn)));
        if (mysqli_num_rows($result) > 0) {
            echo ' <h2 class="text-center mb-3"><u>AIRPORT DETAILS</u></h2>';
            echo '<div class="container" ><table class="table table-dark table-striped table-hover text-center">
        <thead>
        <tr>
        <th scope="col">AIRPORT_ID</th>
        <th scope="col">AIRPORT_NAME</th>
        <th scope="col">ACTION</th>
        </tr>
        </thead>';
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '  <tbody>
            <tr>
            <td>' . $row["source_id"] . '</td>
            <td>' . $row["source_name"] . '</td>
            <td>' . '    <a class="btn btn-sm btn-primary" href="Admin_update_airport.php?id=' . $row["source_id"] . '" role="button">Edit</a>
            <a onclick="return myConfirm();" class="btn btn-sm btn-danger " href="Admin_delete_airport.php?id=' . $row["source_id"] . '" role="button">Delete</a>' . '</td>
            </tr>';
                $i++;
            }
            echo '<tr><td style="background-color:white;"><a class="btn  btn-success" href="Admin_insert_airport.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>New Airport</a></tr></td></tbody></table> </div>';
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