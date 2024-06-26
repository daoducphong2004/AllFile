    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">LIÊN HỆ</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Liên hệ</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Liên Hệ Nếu Có Bất Kỳ Thắc Mắc Nào</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="index.php?act=sendmessage" method="POST">
                        <div class="control-group">
                            <input type="text" class="form-control" name="name" placeholder="Tên của bạn" required/>
                            <br>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" name="email" placeholder="Email của bạn" required />
                            <br>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" name="message" placeholder="Nội dung" required ></textarea>
                           <br>
                        </div>
                        <div>
                            <input class="btn btn-primary py-2 px-4" onclick="return alert('Phản hồi của bạn đã được gửi')" type="submit" name="submit" value="Gửi tin nhắn"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Liên Lạc</h5>
                <p>Thời trang không chỉ là một lựa chọn, mà là một cái nhìn khẳng định phong cách và cái tôi của bạn với nhiều quần áo đa dạng và đầy màu sắc tại cửa hàng chúng tôi.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Cửa Hàng 1</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Phương Canh, Nam Từ Liêm, Hà Nội</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>longlvph39851@fpt.edu.vn</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+84 388205794</p>
                </div>
                <div class="d-flex flex-column">
                    <h5 class="font-weight-semi-bold mb-3">Cửa Hàng 2</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Tân Minh, Thường Tín, Hà Nội</i></p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>le7929590@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+84 388205794</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->