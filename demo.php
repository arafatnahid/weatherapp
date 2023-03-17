<style>
    input[type="text"] {
    padding: 11px 25px 10px 25px;
    border-radius: 30px;
},
input[type="submit"] {
    padding: 9px 8px 9px 8px;
}
</style>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
   <h1>Search Previous Weather</h1>  <input type="text" name ="search_text"><br><br>
    <input type="submit" value="Search">

</form>

<?php

$con = mysqli_connect('localhost','root','','weather');


    if($search_text = isset($_GET['search_text'])){
        $search_text = $_GET['search_text'];
        $sql = "SELECT * FROM temp WHERE division LIKE '$search_text'";
        $query = mysqli_query($con, $sql);
    
       if(mysqli_num_rows($query) > 0)
       {
        echo "
        
        <table border=1>";
        echo "
        <tr>
        <th>Division</th>
        <th>Temparature</th>
        <th>Weather</th>
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
