<div class="container-fluid">

    <div class="row">
        <style>
        /* Dropdown Button */
        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* Dropdown button on hover & focus */
        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #2980B9;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
        .show {
            display: block;
        }
        </style>


    </div>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== 
            làm thêm một bộ lọc nữa lọc các phần như : số lượng sản phẩm đã được bán ra trong một một tháng (truyền tháng làm tham số)
            
    -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Số lượng sản phẩm </h4>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Năm</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="index.php?act=listtksp&year=2021">2021</a>
                            <a href="index.php?act=listtksp&year=2022">2022</a>
                            <a href="index.php?act=listtksp&year=2023">2023</a>
                            <a href="index.php?act=listtksp&year=2024">2024</a>
                        </div>
                        <?php 
                      if(isset($_GET['year'])){
                        echo '<h1>'.$_GET['year'].'</h1>';
                    }
                    ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Tháng</th>
                                    <th class="border-top-0">Số sản phẩm bán được</th>
                                    <th class="border-top-0">Tổng doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                for($i=1;$i<=$month;$i++):
                                    foreach(showdh1($year,$i) as $key):
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php if(countslsp($year,$i)[0][0]==NULL){
                                            echo 0;
                                        }else{echo countslsp($year,$i)[0][0];}
                                         ?></td>
                                    <td><?php echo $key['doanhthuthuc'] ?></td>
                                </tr>
                                <?php 
                                endforeach;
                                endfor ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php?act=tksp"><input type="button" class="btn btn-primary" value="Thống kê sản phẩm"></a>
    <a href="index.php?act=bieudo"><input type="button" class="btn btn-primary" value="Xem biểu đồ"></a>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<script>
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>