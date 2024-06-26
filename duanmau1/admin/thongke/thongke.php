<?php
showthongke();
echo "<canvas id=\"myChart\"></canvas>";

$data = array();
$sql = "SELECT
dm.name AS 'Loại hàng',
COUNT(s.id) AS 'Số lượng'
FROM
sanpham s
INNER JOIN danhmuc dm ON s.iddm = dm.id
GROUP BY
dm.name;";
$result = pdo_query($sql);
foreach ($result as $row) {
  $data[] = array($row['Loại hàng'], $row['Số lượng']);
}

$labels = array_column($data, 0);
$values = array_column($data, 1);

echo "<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>";
echo "<script>";
echo "var ctx = document.getElementById('myChart').getContext('2d');";
echo "var myChart = new Chart(ctx, {";
echo "type: 'bar',";
echo "data: {";
echo "labels: " . json_encode($labels) . ",";
echo "datasets: [{";
echo "label: 'Số lượng',";
echo "data: " . json_encode($values) . ",";
echo "backgroundColor: [";
echo "'rgba(255, 99, 132, 0.2)',";
echo "'rgba(54, 162, 235, 0.2)',";
echo "'rgba(255, 206, 86, 0.2)',";
echo "'rgba(75, 192, 192, 0.2)',";
echo "'rgba(153, 102, 255, 0.2)',";
echo "'rgba(255, 159, 64, 0.2)'";
echo "],";
echo "borderColor: [";
echo "'rgba(255,99,132,1)',";
echo "'rgba(54, 162, 235, 1)',";
echo "'rgba(255, 206, 86, 1)',";
echo "'rgba(75, 192, 192, 1)',";
echo "'rgba(153, 102, 255, 1)',";
echo "'rgba(255, 159, 64, 1)'";
echo "],";
echo "borderWidth: 1";
echo "}]},options: {scales: {yAxes: [{ticks: {beginAtZero:true}}]}}});</script>";

?>
<style>
  table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  border: 1px solid black;
}

th {
  background-color: #ccc;
  font-weight: bold;
}

td {
  text-align: center;
}

.number {
  text-align: right;
}
</style>
<table border="1">
  <thead>
    <tr>
      <th>Loại hàng</th>
      <th>Số lượng</th>
      <th>Giá cao nhất</th>
      <th>Giá thấp nhất</th>
      <th>Giá trung bình</th>
    </tr>
  </thead>
  
  <tbody>
    <?php
   
   foreach (table_tk() as $row) {
    echo "<tr>";
    echo "<td>{$row['Loại hàng']}</td>";
    echo "<td>{$row['Số lượng']}</td>";
    echo "<td>{$row['Giá cao nhất']}</td>";
    echo "<td>{$row['Giá thấp nhất']}</td>";
    echo "<td>{$row['Giá trung bình']}</td>";
    echo "</tr>";
  }
    ?>
  </tbody>
</table>
<?php

?>