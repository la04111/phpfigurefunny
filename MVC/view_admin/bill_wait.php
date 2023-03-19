<?php
include 'header_admin.php';
?>
<link rel="stylesheet" href="../css_admin/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../css_admin/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../css_admin/buttons.bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tất cả hóa đơn</h1>
                </div>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin hóa đơn</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="/MVC/controller/adminController.php?controller=billwait">
                                <table id="example2" class="table table-bordered table-hover">

                                    <label style="padding-left: 25%; display: flex; align-items: center">Search:<input style="width: 50%;" id="searchname" name="searchname" type="search" class="form-control form-control-sm" placeholder="Tìm kiếm với email hoặc mã hóa đơn">
                                        <button class=" btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button></label>
                            </form>
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Mã hóa đơn</th>
                                    <th style="text-align: center;">Email khách hàng</th>
                                    <th style="text-align: center;">Số điện thoại</th>
                                    <th style="text-align: center;">Ngày đặt</th>
                                    <th style="text-align: center;">Ghi chú</th>
                                    <th style="text-align: center;">Tổng tiền</th>
                                    <th style="text-align: center;">Trạng thái</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($result as $p) {
                                    echo '      <tr align="center"> ';
                                    echo '    <td>';
                                    echo '' . $p["idbill"] . '';
                                    echo '     </td>';
                                    echo '     <td>' . $p["emailcustomer"] . '';
                                    echo '        </td>';
                                    echo '     <td>';
                                    echo '     ' . $p["phonenum"] . '';
                                    echo '     </td>';
                                    echo '<td>' . $p["datebuy"] . '</td>';
                                    echo '     <td>';
                                    echo '         ' . $p["note"] . '';
                                    echo '    <td><span>';
                                    echo  number_format($p["totalbill"], 0, ',', '.') . " VND";
                                    echo '          </span></td>';

                                    echo '     </td>';
                                    echo '     <td>' . $p["status"] . ' </td>';
                                    echo '      <td>';
                                    if ($p["status"] == 'Chờ xử lý')
                                        echo '        <a id=flowerid href="/MVC/controller/adminController.php?controller=BillInfor&id=' . $p['idbill'] . '" class="btn btn-outline-warning">Duyệt đơn hàng</a>';
                                    else
                                        echo '<a style="margin-left:5px;" id=flowerid href="/MVC/controller/adminController.php?controller=BillInfor&id=' . $p['idbill'] . '" class="btn btn-outline-info">Thông tin đơn hàng</a>';
                                    echo '   </tr>';
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center;">Mã hóa đơn</th>
                                    <th style="text-align: center;">Email khách hàng</th>
                                    <th style="text-align: center;">Số điện thoại</th>
                                    <th style="text-align: center;">Ngày đặt</th>
                                    <th style="text-align: center;">Ghi chú</th>
                                    <th style="text-align: center;">Tổng tiền</th>
                                    <th style="text-align: center;">Trạng thái</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<!-- Bootstrap 4 -->


<!-- /.content -->


<?php
include 'footer_admin.php';
?>
<script src="../css_admin/jquery.dataTables.min.js"></script>
<script src="../css_admin/dataTables.bootstrap4.min.js"></script>
<script src="../css_admin/dataTables.responsive.min.js"></script>
<script src="../css_admin/responsive.bootstrap4.min.js"></script>
<script src="../css_admin/dataTables.buttons.min.js"></script>
<script src="../css_admin/buttons.bootstrap4.min.js"></script>
<script src="../css_admin/jszip.min.js"></script>
<script src="../css_admin/pdfmake.min.js"></script>
<script src="../css_admin/vfs_fonts.js"></script>
<script src="../css_adminbuttons.html5.min.js"></script>
<script src="../css_admin/buttons.print.min.js"></script>
<script src="../css_admin/buttons.colVis.min.js"></script>
<script>
    $(function() {

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>