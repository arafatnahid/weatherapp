<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEATHER APP</title>
    <link rel="stylesheet" href="weather.css">

</head>
<body>
    <div class="header">
        <h1>WEATHER APP</h1>
        <div>
            <input type="text" name="" id="input" placeholder="Enter city name">
            <button id="search" onclick="searchByCity()">Search</button></input>
        </div>
    </div>

    <main>        
        <div class="weather">
            <h2 id="city">DHAKA</h2>
            <div class="temp-box">
                <img src="/weathericon.png" alt="" id="img">
                <p id="temperature">26 °C</p>
            </div>
            <span id="clouds">Broken Clouds</span>
        </div>
        <div class="divider1"></div>

        <div class="forecstH">
            <p class="cast-header">Upcoming forecast</p>
            <div class="templist">

                <div class="next">
                    <div>
                        <p class="time">8:30 PM</p>
                        <p>29 °C / 29 °C</p>
                    </div>
                    <p class="desc">Light Rain</p>
                </div>

                <div class="next">
                    <div>
                        <p class="time">8:30 PM</p>
                        <p>29 °C / 29 °C</p>
                    </div>
                    <p class="desc">Light Rain</p>
                </div>

                <div class="next">
                    <div>
                        <p class="time">8:30 PM</p>
                        <p>29 °C / 29 °C</p>
                    </div>
                    <p class="desc">Light Rain</p>
                </div>

                <div class="next">
                    <div>
                        <p class="time">8:30 PM</p>
                        <p>29 °C / 29 °C</p>
                    </div>
                    <p class="desc">Light Rain</p>
                </div>

                <div class="next">
                    <div>
                        <p class="time">8:30 PM</p>
                        <p>29 °C / 29 °C</p>
                    </div>
                    <p class="desc">Light Rain</p>
                </div>

            </div>
        </div>
    </main>

    <div class="forecstD">
        <div class="divider2"></div>
        <p class="cast-header"> Next 4 days forecast</p>
        <div class="weekF">

            <div class="dayF">
                <p class="date">Sun Jul 03 2022</p>
                <p>31 °C / 31 °C</p>
                <p class="desc">Overcast Clouds</p>
            </div>

            <div class="dayF">
                <p class="date">Sun Jul 03 2022</p>
                <p>31 °C / 31 °C</p>
                <p class="desc">Overcast Clouds</p>
            </div>

            <div class="dayF">
                <p class="date">Sun Jul 03 2022</p>
                <p>31 °C / 31 °C</p>
                <p class="desc">Overcast Clouds</p>
            </div>

            <div class="dayF">
                <p class="date">Sun Jul 03 2022</p>
                <p>31 °C / 31 °C</p>
                <p class="desc">Overcast Clouds</p>
            </div>
        </div>
    </div>


    <!--search section-->
  <center>  
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET" style="color:white;">
    Search Previous Weather <input type="text" name ="search_text">
    <input type="submit" value="Search">

</form>
<br><br>
<?php

$con = mysqli_connect('localhost','root','','weather');


    if($search_text = isset($_GET['search_text'])){
        $search_text = $_GET['search_text'];
        $sql = "SELECT * FROM temp WHERE division LIKE '$search_text'";
        $query = mysqli_query($con, $sql);
    
       if(mysqli_num_rows($query) > 0)
       {
        echo "<table border=1>";
        echo "
        <tr>
        <th>Division</th>
        <th>Temparature</th>
        <th>Date & Time</th>
        </tr>
        ";
        while($data= mysqli_fetch_assoc($query))
        {
            $division = $data['division'];
            $tempareture = $data['tempareture'];
            $timestamp = $data['timestamp'];

        
        echo "        <tr>
                    <td> $division</td>
                    <td>$tempareture</td>
                    <td>$timestamp</td>
                </tr>";
       }

             echo   "</table>";
       }


    }
    









?>
</center>

    <script src="../weatherApp/weather.js"></script>
</body>
</html>