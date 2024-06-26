<?php
function showthongke(){
    $sql="SELECT
    dm.name AS 'Loại hàng',
    COUNT(s.id) AS 'Số lượng',
    MAX(s.price) AS 'Giá cao nhất',
    MIN(s.price) AS 'Giá thấp nhất',
    AVG(s.price) AS 'Giá trung bình'
  FROM
    sanpham s
    INNER JOIN danhmuc dm ON s.iddm = dm.id
  GROUP BY
    dm.name;";
    $result = pdo_query($sql);
    $table = "<table><tr><th>Loại hàng</th><th>Số lượng</th><th>Giá cao nhất</th><th>Giá thấp nhất</th><th>Giá trung bình</th></tr>";
    foreach ($result as $row) {
        $table .= "<tr><td>".$row['Loại hàng']."</td><td>".$row['Số lượng']."</td><td>".$row['Giá cao nhất']."</td><td>".$row['Giá thấp nhất']."</td><td>".$row['Giá trung bình']."</td></tr>";
    }
    $table .= "</table>";
    return $table;
}
function table_tk() {
  $sql="SELECT
  dm.name AS 'Loại hàng',
  COUNT(s.id) AS 'Số lượng',
  MAX(s.price) AS 'Giá cao nhất',
  MIN(s.price) AS 'Giá thấp nhất',
  AVG(s.price) AS 'Giá trung bình'
FROM
  sanpham s
  INNER JOIN danhmuc dm ON s.iddm = dm.id
GROUP BY
  dm.name;";
  return pdo_query($sql);
}
