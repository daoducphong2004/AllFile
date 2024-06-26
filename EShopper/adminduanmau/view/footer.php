    <!-- footer -->
    <footer class="footer text-center">
        © 2021 Monster Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
    </footer>

    <!-- End footer -->

    </div>

    <!-- End Page wrapper  -->

    </div>

    <!-- End Wrapper -->


    <!-- All Jquery -->
    <script src="view/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="view/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="view/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="view/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--flot chart-->
    <script src="../assets/plugins/flot/jquery.flot.js"></script>
    <script src="../assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="view/js/pages/dashboards/dashboard1.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <?php
    // Hàm PHP của bạn
    // Hàm SUMIFS trong PHP
    $current_month = date("m");

    // Chuyển đổi kết quả trả về thành một mảng PHP có các phần tử là các mảng con có các khóa là year, donhang, doanhthu, donthanhcong, doanhthuthuc và donhuy
    $chart_data = [];
    // Vòng lặp từ tháng 1 đến tháng hiện tại
    for ($i = 1; $i <= $current_month; $i++) {
        // Gọi hàm showdh1 với năm và tháng hiện tại
        $data = showdh1("2023", $i);
        // Lấy dòng dữ liệu đầu tiên của mảng data
        $row = $data[0];
        // Tạo một mảng con có các khóa là year, donhang, doanhthu, donthanhcong, doanhthuthuc và donhuy
        $sub_array = [];
        $sub_array["year"] = "2023-" . str_pad($i, 2, "0", STR_PAD_LEFT); // định dạng lại tháng thành yyyy-mm
        $sub_array["donhang"] = $row["donhang"]; // số đơn hàng
        $sub_array["doanhthu"] = $row["doanhthu"]; // tổng doanh thu
        $sub_array["donthanhcong"] = $row["donthanhcong"]; // số đơn hàng thành công
        $sub_array["doanhthuthuc"] = $row["doanhthuthuc"]; // doanh thu thực
        $sub_array["donhuy"] = $row["donhuy"]; // số đơn hàng bị hủy
        // Thêm mảng con vào mảng chart_data
        $chart_data[] = $sub_array;
    }

    ?>
    <script>
// Biến JavaScript có dữ liệu từ mảng PHP
var chart_data = <?php echo json_encode($chart_data); ?>;
// Tạo biểu đồ Morris.Bar với dữ liệu mới
new Morris.Bar({
    // ID của phần tử mà biểu đồ sẽ được vẽ.
    element: 'chart',
    // Dữ liệu biểu đồ -- mỗi phần tử trong mảng này tương ứng với một điểm trên
    // biểu đồ.
    data: chart_data,
    // Tên của thuộc tính dữ liệu mà chứa giá trị x.
    xkey: 'year',
    // Một danh sách các tên của thuộc tính dữ liệu mà chứa giá trị y.
    ykeys: ['doanhthu', 'doanhthuthuc'],
    // Nhãn cho các ykeys -- sẽ được hiển thị khi bạn di chuột qua
    // biểu đồ.
    labels: ['Doanh thu', 'Doanh thu thực'],
    // Đơn vị thời gian cho trục x, ở đây là 'auto'
    xLabels: 'auto',
    // Chọn giữa biểu đồ cột nhóm hoặc biểu đồ cột chồng, ở đây là false
    stacked: false,
    // Một mảng các màu cho mỗi giá trị y
    barColors: ['#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#FF00FF'],
    // Cho phép biểu đồ thay đổi kích thước theo cửa sổ trình duyệt
    resize: true
});
new Morris.Bar({
    // ID của phần tử mà biểu đồ sẽ được vẽ.
    element: 'chart1',
    // Dữ liệu biểu đồ -- mỗi phần tử trong mảng này tương ứng với một điểm trên
    // biểu đồ.
    data: chart_data,
    // Tên của thuộc tính dữ liệu mà chứa giá trị x.
    xkey: 'year',
    // Một danh sách các tên của thuộc tính dữ liệu mà chứa giá trị y.
    ykeys: ['donhang', 'donthanhcong', 'donhuy'],
    // Nhãn cho các ykeys -- sẽ được hiển thị khi bạn di chuột qua
    // biểu đồ.
    labels: ['Đơn hàng', 'Đơn hàng thành công', 'Đơn hàng bị hủy'],
    // Đơn vị thời gian cho trục x, ở đây là 'auto'
    xLabels: 'auto',
    // Chọn giữa biểu đồ cột nhóm hoặc biểu đồ cột chồng, ở đây là false
    stacked: false,
    // Một mảng các màu cho mỗi giá trị y
    barColors: ['#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#FF00FF'],
    // Cho phép biểu đồ thay đổi kích thước theo cửa sổ trình duyệt
    resize: true
});
    </script>
    </body>

    </html>