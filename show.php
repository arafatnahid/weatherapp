<style>
  #weather-table {
    border-collapse: collapse;
    width: 100%;
  }
  #weather-table th, #weather-table td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
  }
  #weather-table th {
    background-color: lightblue;
  }
  #weather-table tr:nth-child(even) {
    background-color: #f2f2f2;

  }
</style>

<?php 
 $con = mysqli_connect('localhost','root','','weather');
 $query = "select * from temp";
 $data = mysqli_query($con,$query);
?>
<table id="weather-table">
  <thead>
    <tr>
      <th>Temperature</th>
      <th>Timestamp</th>
      <th>Division</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($result = mysqli_fetch_assoc($data)) {
      echo  "<tr>
              <td>".$result['tempareture']."</td>
              <td>".$result['timestamp']."</td>
              <td>".$result['division']."</td>
            </tr>";
    }
    ?>
  </tbody>
</table>
