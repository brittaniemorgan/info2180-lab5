<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if (isset($_GET[htmlentities("country")]) and !isset($_GET["lookup"])):
  $country = $_GET[htmlentities("country")];
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<table border="1px">  
  <thead>
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
  </tr>  
  </thead>

  <?php foreach ($results as $row): ?>
  <tbody>
    <tr>
      <td><?=$row["name"]?></td> 
      <td><?=$row["continent"]?></td>
      <td><?=$row["independence_year"]?></td>
      <td><?=$row["head_of_state"]?></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>

<?php
endif;
if (isset ($_GET["lookup"])):
  $country = $_GET[htmlentities("country")];
  $stmt = $conn->query("SELECT * FROM countries JOIN cities ON countries.code = cities.country_code  WHERE countries.name LIKE '%$country%' ");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
  <table border="1px">  
    <thead>
      <tr>
        <th>Name</th>
        <th>District</th>
        <th>Population</th>
    </tr>  
    </thead>

    <?php 
      foreach ($results as $row): 
    ?>
    <tbody>
      <tr>
        <td><?=$row["name"]?></td> 
        <td><?=$row["district"]?></td>
        <td><?=$row["population"]?></td>
      </tr>
    </tbody>
    <?php endforeach; ?>
   </table>
<?php endif ?>