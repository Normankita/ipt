<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/style.css">
    <link rel="stylesheet" href="../admin/css/mediaQuery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../admin/js/app.js" type="text/javascript" charset="UTF-8"></script>
    <title>Bags</title>

</head>

<body>

    <?php include "../admin/includes/topnav.php"; ?>
    <div class="sidebar"  style="margin-top: 63px;">
        <a href="#home"><i class="fa fa-fw fa-home"></i>Face</a>
        <a href="#services"><i class="fa fa-fw fa-wrench"></i>Eyes</a>
        <a href="#clients"><i class="fa fa-fw fa-user"></i> Lips</a>
    </div>

    <!-- Here for the cart -->
    <!-- <div class="container-bottom">
        <button type="button" id="delegar">
            <input style="background: rgb(224, 216, 216); padding: 0.5rem;" class="disp" id="counting" disabled
                required>Items<br><br>
            <input style="background: rgb(135, 209, 241); padding :0.5rem; color: #0a1210; border: radius 3px;"
                class="disp" id="totalprice" disabled required><span>$</span>
        </button>
    </div> -->

    <!-- cartends here -->

    <div class="main">

        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>

        </div>
        <!-- slide show ends here -->

        <?php


// including config file
require_once "../admin/config.php";

//attempting to execute a query

$sql = "SELECT * FROM products WHERE category_id=3 ";

if ($result = mysqli_query($link, $sql)) {

    if (mysqli_num_rows($result) > 0) {
        $n = 0;
        // echo "<br>";
        while ($row = mysqli_fetch_array($result)) {
            ++$n;
            if ($n === 5) {
                echo "<div class= 'row'> <h1 style='visibility: hidden;''>Here</h1>";
                $n = 0;
            }
            echo "<div class= 'column'>";
            echo "<div class= 'card'>";
            echo "<img src= '../admin/" . $row['image'] . "' alt='Avatar' style='width: 100%;'>";
            echo "<div class='priceItem'>";
            echo "<h4 class='priceGrey'>" . $row['price'] . "</h4>";
            echo "<p class='itemGrey'>" . $row['name'] . "</p>";
            echo "</div>";
            echo "<button class='button' onclick='addto('250')'>Add</button>";
            echo "</div>";
            echo "</div> ";
            if ($n === 5) 
{
    // echo"<br>";
                echo "</div>";
                $n = 0;
            }

        }
    }
    else {
        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
    }
}
else {
    echo "Oops! Something went wrong. Please try again later.";
}
// Close connection
mysqli_close($link);
?>

        <script src="../admin/js/slideshow.js">
        </script>
        <script src="../admin/js/Adding.js">
        </script>


</body>

</html>