<?php
include 'header.php';
?>
<main class="mainContent-theme ">

    <div class="layout-info-account">
        <div class="title-infor-account text-center">
            <h1>Tài khoản của bạn </h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 sidebar-account">
                    <div class="AccountSidebar">
                        <h3 class="AccountTitle titleSidebar">Tài khoản</h3>
                        <div class="AccountContent">
                            <div class="AccountList">
                                <ul class="list-unstyled">
                                    <li class="current"><a href="/MVC/controller/userController.php?controller=inforUserGET">Thông tin tài khoản</a></li>
                                    <!-- <li><a href="/account/addresses">Danh sách địa chỉ</a></li> -->
                                    <li class="last"><a href="/MVC/controller/userController.php?controller=logout">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="row">
                        <div class="col-xs-12" id="customer_sidebar">
                            <p class="title-detail">Thông tin tài khoản</p>
                            <?php
                            if (isset($_SESSION['accountuser'])) {
                                $user = $_SESSION['accountuser'];
                                echo '  <h2 class="name_account">'.$user['firstname']. $user['lastname'].'</h2> ';
                                echo '  <p class="email ">'.$user['email'].'</p';
                                echo ' <div class="address ">';
                                echo '   <p></p>';
                                echo '   <p></p>';
                                echo '  <p> '.$user['address'].'</p>';
                                echo '  <p></p>';
                            }
                            ?>

                            <!-- <a id="view_address" href="/account/addresses">Xem địa chỉ</a> -->
                        </div>
                    </div>
                    <div class="col-xs-12 customer-table-wrap" id="customer_orders">
                        <div class="customer_order customer-table-bg">

                            <p>Bạn chưa đặt mua sản phẩm.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


</main>
<?php //fotter page here --
include 'footer.php';
?>