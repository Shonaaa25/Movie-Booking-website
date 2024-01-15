<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movieId = $_POST["movieId"];
    $userName = $_POST["userName"];
    $seats = $_POST["seats"];

    $sql = "INSERT INTO bookings (movie_id, user_name, seats_booked) VALUES ('$movieId', '$userName', '$seats')";

    if ($conn->query($sql) === TRUE) {
        header("Location: movieconfirm.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<html lang="en">
<head>
    <link rel="stylesheet" href="loadMovies.css" />
    <title>Movie Booking</title>
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    height: 100vh;
    width: 100vw;
    background:url('https://i.pinimg.com/564x/77/81/a6/7781a6743ea204bb055edf971f02bbba.jpg');
}

.container {
    text-align: center;
    height: calc(100vh - var(--header-height));
}

h1 {
    height: var(--header-height);
    background: #f6f5fa ;
    display: flex;
    align-items: center;
    color: black;
    gap: 10px;
    padding-right: 30px;
}

header img {
    filter: invert(1);    
}

.movies-container {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;    
}

.movie {
    height: auto;
    width: 300px;
    padding: 4px;
    box-shadow: 0px 0px 8px 2px var(--border-color);
    margin: 0 10px;
    border: 2px solid #f6f5fa;
    display: flex;
    flex-direction: column; 
}

.movie-image img {
    max-width: 100%; 
    height: auto;
}

.movie-text {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
    background-color: #f6f5fa;
    padding: 10px; /* Add some padding for better visibility */
}
.h2{
	color: white;
}
.label{
	color: white;
}

</style>
<body>
    <h1>Movie Booking</h1>

    <!-- Movie List -->
    <h2 class="h2">Available Movies</h2>
    <ul id="movieList"></ul>

    <section class="container" name="movieId" id="movieId">
        <div id="movie-container" class="movies-container">
            <div class="movie">
                <div class="movie-title">Hunger Games</div>
                <div class="movie-image">
                    <img src="https://i.pinimg.com/736x/d0/1b/93/d01b93054c4992918d8b2aba94bf0ae1.jpg">
                </div>
                <div class="movie-text">
                    <ul>
                        <li>Hunger Games</li>
                        <li>R75</li>
                        <li>Time: 17:00</li>
                    </ul>
                </div>
            </div>
<div class="movie">
            <div class="movie-title">Godzilla</div>
            <div class="movie-image">
                <img src="https://i.pinimg.com/564x/e3/24/a1/e324a10bbc6787d004893bd7663f9063.jpg">
            </div>
            <div class="movie-text">
                <ul>
                    <li>Godzilla</li>
                    <li>R75</li>
                    <li>Time: 17:00</li>
                </ul>
            </div>
        </div>
		<div class="movie">
            <div class="movie-title">Wonka</div>
            <div class="movie-image">
                <img src="https://pbs.twimg.com/media/FBhju7PWEAYJ2mt?format=jpg&name=large">
            </div>
            <div class="movie-text">
                <ul>
                    <li>Wonka</li>
                    <li>R75</li>
                    <li>Time: 17:00</li>
                </ul>
            </div>
        </div>
		<div class="movie">
            <div class="movie-title">Aqua Man</div>
            <div class="movie-image">
                <img src="https://i.pinimg.com/564x/d4/5d/18/d45d184077fb270a2c15de94713c097f.jpg">
            </div>
            <div class="movie-text">
                <ul>
                    <li>Aqua Man</li>
                    <li>R75</li>
                    <li>Time: 17:00</li>
                </ul>
            </div>
        </div>
        </div>
    </section>

    <!-- Booking Form -->
    <h2 class="h2">Book Tickets</h2>
    <form id="bookingForm" action="movieconfirm.php" method="post">
        <label class="label" for="movieId">Select Movie:</label>
        <select name="movieId" id="movieId" required>
            <option value="HungerGames">Hunger Games</option>
            <option value="Godzilla">Godzilla</option>
            <option value="Wonka">Wonka</option>
            <option value="AquaMan">Aqua Man</option>
        </select><br>

        <label class="label" for="userName">Your Name:</label>
        <input type="text" name="userName" id="userName" required><br>

        <label class="label" for="seats">Number of Seats:</label>
        <input type="number" name="seats" id="seats" min="1" required><br>

        <button type="submit"> <a href="movieconfirm.php">Book Now</a></button>
    </form>
</body>
</html>
