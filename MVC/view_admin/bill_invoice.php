<?php
include 'header_admin.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hóa đơn</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">



                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">

                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Figure Funny
                            <address>
                                <strong></strong><br>
                                <br>
                                <br>
                                <br>

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Khách hàng
                            <address>
                                <strong>Email: <?php echo $inforbill['emailcustomer'] ?></strong><br>
                                <?php echo $inforbill['addressdelivery'] ?><br>

                                Số điện thoại: <?php echo $inforbill['phonenum'] ?><br>

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Hóa đơn #<?php echo $_GET['id'] ?></b><br>
                           
                            <!-- <b>Mã hóa đơn: </b> <?php echo $_GET['id'] ?><br> -->
                            <b>Ngày đặt hàng: </b> <?php echo $inforbill['datebuy'] ?><br>
                        
                            <b>Tổng tiền: </b><?php echo number_format($inforbill["totalbill"], 0, ',', '.') . " VND"; ?><br>
                            <b>Trạng thái: </b><?php echo $inforbill['status'] ?>
                            <!-- <b>Account:</b> 968-34567 -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh </th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($inforbilldetail as $i) {
                                        echo '  <tr>
                                                <td>' . $i['idproduct'] . '</td>
                                                <td>' . $i['productname'] . '</td>';
                                        $callproductSer = new productService();
                                        echo ' <td><image style=" height: 12vw;width: 30vh;" src="' . $callproductSer->findOneImageId($i['idproduct']) . '"></image></td>';

                                        echo ' <td>' . $i['quantity']. '</td>
                                                <td>'.number_format($i["price"], 0, ',', '.') . " VND".'</td>
                                                <td>'.number_format($i["price"]*$i['quantity'], 0, ',', '.') . " VND".'</td>
                                                </tr>';
                                    }
                                    ?>



                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead"></p>


                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ
                                ㅤㅤㅤ
                                ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">


                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Tổng tiền:</th>
                                        <td><?php echo number_format($inforbill["totalbill"], 0, ',', '.') . " VND"; ?></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">

                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Xác nhận đơn hàng
                            </button>
                            <a href="/cancel_order.php?id=123">
                            <button type="button" class="btn btn-warning float-right" style="margin-right: 5px;">
                                <i class="fas fa-destroy"></i> Hủy đơn hàng
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<?php
include 'footer_admin.php';
?>