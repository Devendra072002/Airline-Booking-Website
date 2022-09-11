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
    <title>Admin Insert</title>
</head>
<style>
    .container{
        width: 50%;
        box-sizing: border-box;
        margin: auto;
    }
    
</style>
<body>
    <!-- <h1>Insert</h1> -->
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

        <form action="save-insert.php" method="POST">
            <div class="mb-3 ">
                <label for="fid" class="form-label">Flight Id</label>
                <input type="text" class="form-control" id="fid" name="fid" required>
            </div>
            <div class=" mb-3">
                <label for="fname" class="form-label">Flight Name</label>
                <input type="text" class="form-control" id="fname" name="fname" required>
            </div>
            <div class="mb-3">
                <label for="from" class="form-label">From</label>
                <select class="form-control" name="from" id="from" required>
                <option value="" disabled selected hidden>Please select here</option>
                    <?php
                    $query1 = "SELECT source_name FROM source";
                    $result1 = mysqli_query($conn, $query1) or die("Query Failed : " . mysqli_error(($conn)));
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {

                            echo "<option value='{$row1['source_name']}'>{$row1['source_name']}</option>";
                        }
                    }
                    ?>
                </select>
                <div class="mb-3">
                    <label for="to" class="form-label">To</label>
                    <select class="form-control" id="to" name="to" required>
                    <option value="" disabled selected hidden>Please select here</option>
                        <?php
                        $query1 = "SELECT destination_name FROM destination";
                        $result1 = mysqli_query($conn, $query1) or die("Query Failed : " . mysqli_error(($conn)));
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
    
                                echo "<option value='{$row1['destination_name']}'>{$row1['destination_name']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deptdate" class="form-label">Departure Date</label>
                    <input type="date" class="form-control" id="deptdate" name="deptdate" required>
                </div>
                <div class="mb-3">
                    <label for="dept" class="form-label">Departure Time</label>
                    <input type="time" class="form-control" id="dept" name="dept" required>
                </div>
                <div class="mb-3">
                    <label for="Arrdate" class="form-label">Arrival Date</label>
                    <input type="date" class="form-control" id="Arrdate" name="arrdate" required>
                </div>
                <div class="mb-3">
                    <label for="Arr" class="form-label">Arrival Time</label>
                    <input type="time" class="form-control" id="arr" name="arr" required>
                </div>
                <div class="mb-3">
                    <label for="fare" class="form-label">Fare</label>
                    <input type="number" class="form-control" id="fare" name="fare" required>
                </div>
                <div class="mb-3">
                    <label for="seat" class="form-label">Capacity</label>
                    <input type="number" class="form-control" id="seat" name="seat" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>