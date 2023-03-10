<!doctype html>
<html lang="vi">
<?php
// require_once('');
//  $productControl = new productController();
//  $result = $productControl->getAllProductIndex();
//  foreach ($result as $document) {
//     echo 'ProductID: ' . $document['ProductID'] . '<br>';
//     echo 'ProductName: ' . $document['ProductName'] . '<br>';
//     echo 'Series: ' . $document['Series'] . '<br>';
//     echo 'Brand: ' . $document['Brand'] . '<br>';
//     echo 'Note: ' . $document['Note'] . '<br>';

//     echo 'DateRelease: ' . $document['DateRelease'] . '<br>';
//     echo 'ProductStatus: ' . $document['ProductStatus'] . '<br><br>';
// }
?>
<?php //Header page here --

//use MongoDB\Operation\Find;

include 'header.php';
//require_once '../controller/productController.php';

//require(__DIR__.'/../controller/productController.php');
//require('../../phpconnectmongodb.php'); // X > view > user : ../ = view ; ../ X
// $dbcollectionproduct  = Getmongodb("figurefunnyDB","product");
// $result = $dbcollectionproduct->find([]);
// foreach ($result as $document) {
//     echo 'ProductID: ' . $document['ProductID'] . '<br>';
//     echo 'ProductName: ' . $document['ProductName'] . '<br>';
//     echo 'Series: ' . $document['Series'] . '<br>';
//     echo 'Brand: ' . $document['Brand'] . '<br>';
//     echo 'Note: ' . $document['Note'] . '<br>';

//     echo 'DateRelease: ' . $document['DateRelease'] . '<br>';
//     echo 'ProductStatus: ' . $document['ProductStatus'] . '<br><br>';
// }
?>

<body id="lama-theme" class="index">



    <main class="mainContent-theme  main-index ">
        <h1 class="hidden entry-title">Figure Funny</h1>

        <div id="home-slider">
            <div id="homepage_slider" class="owl-carousel">
                <div class="item ">
                    <a href="" title="" aria-label="Banner 1">
                        <picture>
                            
                            <img src="//theme.hstatic.net/200000588991/1000965463/14/slideshow_1_mobile.jpg?v=207" alt="">
                        </picture>
                    </a>
                </div>
                <div class="item ">
                    <a href="" title="" aria-label="Banner 2">
                        <picture>
                           
                            <img class="owl-lazy" src="https://theme.hstatic.net/200000588991/1000965463/14/slideshow_2.jpg?v=226" alt="">
                        </picture>
                    </a>
                </div>

            </div>
        </div>
        <section class="section section-collection">
            <div class="wrapper-heading-home animation-tran text-center">
                <div class="container-fluid">
                    <div class="site-animation">
                        <h2>
                            <a href="/collections/san-pham-moi">

                                Sản phẩm mới

                            </a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="wrapper-collection-1">


                <div class="container-fluid">
                    <div class="row">
                        <div class="clearfix content-product-list">

                            <!-- Pre-Order here -->

                            <?php

                            foreach ($result_List as $document) {
                                echo ' <div class="col-md-4 col-sm-6 col-xs-6 pro-loop "> ';
                                echo ' <div class="product-block product-resize" id="section_one_loop_' . $document['ProductID'] . '"> ';
                                echo '                   <div class="product-img">';
                              // echo gettype($document['Stock'] );
                                if ((int)$document['Stock'] == (int)0) {
                                    echo '            <div class="product-order">Pre-order</div>';
                                }
                                echo '           <a href="/MVC/controller/productController.php?controller=productDetailId&value='.$document['ProductID'].'" title="' . $document['ProductName'] . '" class="image-resize ratiobox">';
                                echo '               <picture>';
                                // echo '                  <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/1d70f2e5-495f-4bcb-bdc2-78e26db64497_3cff696c9f754a879d1f920c14e1ade8_medium.jpeg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" /> ';
                                // echo '                   <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/1d70f2e5-495f-4bcb-bdc2-78e26db64497_3cff696c9f754a879d1f920c14e1ade8_large.jpeg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" /> ';
                                //  echo '                  <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/1d70f2e5-495f-4bcb-bdc2-78e26db64497_3cff696c9f754a879d1f920c14e1ade8_grande.jpeg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" /> ';
                                echo '                  <img class="lazyload img-loop" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/1d70f2e5-495f-4bcb-bdc2-78e26db64497_3cff696c9f754a879d1f920c14e1ade8_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/1d70f2e5-495f-4bcb-bdc2-78e26db64497_3cff696c9f754a879d1f920c14e1ade8_grande.jpeg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt=" Mô hình Scale Statue Yae Miko 18+ Genshin " /> ';
                                echo '             </picture> ';
                                echo '             <picture> ';
                                // echo '                  <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/54b4112d-de04-40e5-b67e-0528f1bce40e_4254a955152542bab0e70c77bac25877_medium.jpeg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="> ';
                                //echo '                  <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/54b4112d-de04-40e5-b67e-0528f1bce40e_4254a955152542bab0e70c77bac25877_large.jpeg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="> ';
                                // echo '                   <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/54b4112d-de04-40e5-b67e-0528f1bce40e_4254a955152542bab0e70c77bac25877_grande.jpeg" srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="> ';
                                echo '                   <img class="img-loop img-hover lazyload" data-src="//product.hstatic.net/200000588991/product/54b4112d-de04-40e5-b67e-0528f1bce40e_4254a955152542bab0e70c77bac25877_grande.jpeg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt=" Mô hình Scale Statue Yae Miko 18+ Genshin " /> ';
                                echo '                </picture> ';
                                echo '           </a> ';
                                echo '          <div class="button-add hidden"> ';
                                echo '              <button type="submit" title="Buy now" class="action">Mua ngay<i class="fa fa-long-arrow-right"></i></button> ';
                                echo '           </div> ';
                                echo '          <div class="pro-price-mb"> ';
                                echo '               <span class="pro-price">' . $document['Price'] . 'đ</span> ';
                                echo '           </div> ';
                                echo '       </div> ';
                                echo '       <div class="product-detail clearfix"> ';
                                echo '           <div class="box-pro-detail"> ';
                                echo '              <h3 class="pro-name"> ';
                                echo '                  <a href="/MVC/controller/productController.php?controller=productDetailId&value='.$document['ProductID'].'" title="' . $document['ProductName'] . '"> ';
                                echo '                      ' . $document['ProductName'] . ' ';
                                echo '                 </a> ';
                                echo '              </h3> ';
                                echo '              <div class="box-pro-prices"> ';
                                echo '                  <p class="pro-price "> ';
                                echo '                       <span>' . $document['Price'] . '₫</span> ';
                                echo '                  </p> ';
                                echo '              </div> ';
                                echo '           </div> ';
                                echo '      </div> ';
                                echo '  </div> ';
                                echo ' </div> ';
                            }
                            ?>
                            <!-- End Pre -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer>
        <?php //fotter page here --
        include 'footer.php';
        ?>
    </footer>
    <div class="addThis_listSharing ">
        <ul class="addThis_listing">

            <li class="addThis_item">
                <a class="addThis_item--icon" href="//zalo.me/0913141033" target="_blank" rel="nofollow noreferrer" aria-label="zalo">
                    <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="22" cy="22" r="22" fill="url(#paint4_linear)" />
                        <g clip-path="url(#clip0)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.274 34.0907C15.7773 34.0856 16.2805 34.0804 16.783 34.0804C16.7806 34.0636 16.7769 34.0479 16.7722 34.0333C16.777 34.0477 16.7808 34.0632 16.7832 34.0798C16.8978 34.0798 17.0124 34.0854 17.127 34.0965H25.4058C26.0934 34.0965 26.7809 34.0977 27.4684 34.0989C28.8434 34.1014 30.2185 34.1039 31.5935 34.0965H31.6222C33.5357 34.0798 35.0712 32.5722 35.0597 30.7209V27.4784C35.0597 27.4582 35.0612 27.4333 35.0628 27.4071C35.0676 27.3257 35.0731 27.2325 35.0368 27.2345C34.9337 27.2401 34.7711 27.2757 34.7138 27.3311C34.2744 27.6145 33.8483 27.924 33.4222 28.2335C32.57 28.8525 31.7179 29.4715 30.7592 29.8817C27.0284 31.0993 23.7287 31.157 20.2265 30.3385C20.0349 30.271 19.9436 30.2786 19.7816 30.292C19.6773 30.3007 19.5436 30.3118 19.3347 30.3068C19.3093 30.3077 19.2829 30.3085 19.2554 30.3093C18.9099 30.3197 18.4083 30.3348 17.8088 30.6877C16.4051 31.1034 14.5013 31.157 13.5175 31.0147C13.522 31.0245 13.5247 31.0329 13.5269 31.0407C13.5236 31.0341 13.5204 31.0275 13.5173 31.0208C13.5036 31.0059 13.4864 30.9927 13.4696 30.98C13.4163 30.9393 13.3684 30.9028 13.46 30.8268C13.4867 30.8102 13.5135 30.7929 13.5402 30.7757C13.5937 30.7412 13.6472 30.7067 13.7006 30.6771C14.4512 30.206 15.1559 29.6905 15.6199 28.9311C16.2508 28.1911 15.9584 27.9025 15.4009 27.3524L15.3799 27.3317C12.6639 24.6504 11.8647 21.8054 12.148 17.9785C12.486 15.8778 13.4829 14.0708 14.921 12.4967C15.7918 11.5433 16.8288 10.7729 17.9632 10.1299C17.9796 10.1198 17.9987 10.1116 18.0182 10.1032C18.0736 10.0793 18.1324 10.0541 18.1408 9.98023C18.1475 9.92191 18.0507 9.90264 18.0163 9.90264C17.3698 9.90264 16.7316 9.89705 16.0964 9.89148C14.8346 9.88043 13.5845 9.86947 12.3041 9.90265C10.465 9.95254 8.78889 11.1779 8.81925 13.3614C8.82689 17.2194 8.82435 21.0749 8.8218 24.9296C8.82053 26.8567 8.81925 28.7835 8.81925 30.7104C8.81925 32.5007 10.2344 34.0028 12.085 34.0749C13.1465 34.1125 14.2107 34.1016 15.274 34.0907ZM13.5888 31.1403C13.5935 31.1467 13.5983 31.153 13.6032 31.1594C13.7036 31.2455 13.8031 31.3325 13.9021 31.4202C13.8063 31.3312 13.7072 31.2423 13.6035 31.1533C13.5982 31.1487 13.5933 31.1444 13.5888 31.1403ZM16.5336 33.8108C16.4979 33.7885 16.4634 33.7649 16.4337 33.7362C16.4311 33.7358 16.4283 33.7352 16.4254 33.7345C16.4281 33.7371 16.4308 33.7397 16.4335 33.7423C16.4632 33.7683 16.4978 33.79 16.5336 33.8108Z" fill="white" />
                            <path d="M17.6768 21.6754C18.5419 21.6754 19.3555 21.6698 20.1633 21.6754C20.6159 21.6809 20.8623 21.8638 20.9081 22.213C20.9597 22.6509 20.6961 22.9447 20.2034 22.9502C19.2753 22.9613 18.3528 22.9558 17.4247 22.9558C17.1554 22.9558 16.8919 22.9669 16.6226 22.9502C16.2903 22.9336 15.9637 22.8671 15.8033 22.5345C15.6429 22.2019 15.7575 21.9026 15.9752 21.631C16.8575 20.5447 17.7455 19.4527 18.6336 18.3663C18.6851 18.2998 18.7367 18.2333 18.7883 18.1723C18.731 18.0781 18.6508 18.1224 18.582 18.1169C17.9633 18.1114 17.3388 18.1169 16.72 18.1114C16.5768 18.1114 16.4335 18.0947 16.296 18.067C15.9695 17.995 15.7689 17.679 15.8434 17.3686C15.895 17.158 16.0669 16.9862 16.2846 16.9363C16.4221 16.903 16.5653 16.8864 16.7085 16.8864C17.7284 16.8809 18.7539 16.8809 19.7737 16.8864C19.9571 16.8809 20.1347 16.903 20.3123 16.9474C20.7019 17.0749 20.868 17.4241 20.7133 17.7899C20.5758 18.1058 20.3581 18.3774 20.1404 18.649C19.3899 19.5747 18.6393 20.4948 17.8888 21.4093C17.8258 21.4814 17.7685 21.5534 17.6768 21.6754Z" fill="white" />
                            <path d="M24.3229 18.7604C24.4604 18.5886 24.6036 18.4279 24.8385 18.3835C25.2911 18.2948 25.7151 18.5775 25.7208 19.021C25.738 20.1295 25.7323 21.2381 25.7208 22.3467C25.7208 22.6349 25.526 22.8899 25.2453 22.973C24.9588 23.0783 24.6322 22.9952 24.4432 22.7568C24.3458 22.6404 24.3057 22.6183 24.1682 22.7236C23.6468 23.1338 23.0567 23.2058 22.4207 23.0063C21.4009 22.6848 20.9827 21.9143 20.8681 20.9776C20.7478 19.9632 21.0973 19.0986 22.0369 18.5664C22.816 18.1175 23.6067 18.1563 24.3229 18.7604ZM22.2947 20.7836C22.3061 21.0275 22.3863 21.2603 22.5353 21.4543C22.8447 21.8534 23.4348 21.9365 23.8531 21.6372C23.9218 21.5873 23.9848 21.5263 24.0421 21.4543C24.363 21.033 24.363 20.3402 24.0421 19.9189C23.8817 19.7027 23.6296 19.5752 23.3603 19.5697C22.7301 19.5309 22.289 20.002 22.2947 20.7836ZM28.2933 20.8168C28.2474 19.3923 29.2157 18.3281 30.5907 18.2893C32.0517 18.245 33.1174 19.1928 33.1632 20.5785C33.209 21.9808 32.321 22.973 30.9517 23.106C29.4563 23.2502 28.2704 22.2026 28.2933 20.8168ZM29.7313 20.6838C29.7199 20.961 29.8058 21.2326 29.9777 21.4598C30.2928 21.8589 30.8829 21.9365 31.2955 21.6261C31.3585 21.5818 31.41 21.5263 31.4616 21.4709C31.7939 21.0496 31.7939 20.3402 31.4673 19.9189C31.3069 19.7083 31.0548 19.5752 30.7855 19.5697C30.1668 19.5364 29.7313 19.991 29.7313 20.6838ZM27.7891 19.7138C27.7891 20.573 27.7948 21.4321 27.7891 22.2912C27.7948 22.6848 27.474 23.0118 27.0672 23.0229C26.9985 23.0229 26.924 23.0174 26.8552 23.0007C26.5688 22.9287 26.351 22.6349 26.351 22.2857V17.8791C26.351 17.6186 26.3453 17.3636 26.351 17.1031C26.3568 16.6763 26.6375 16.3992 27.0615 16.3992C27.4969 16.3936 27.7891 16.6708 27.7891 17.1142C27.7948 17.9789 27.7891 18.8491 27.7891 19.7138Z" fill="white" />
                            <path d="M22.2947 20.7828C22.289 20.0013 22.7302 19.5302 23.3547 19.5634C23.6239 19.5745 23.876 19.702 24.0364 19.9181C24.3573 20.3339 24.3573 21.0322 24.0364 21.4535C23.7271 21.8526 23.1369 21.9357 22.7187 21.6364C22.65 21.5865 22.5869 21.5255 22.5296 21.4535C22.3864 21.2595 22.3062 21.0267 22.2947 20.7828ZM29.7314 20.683C29.7314 19.9957 30.1668 19.5357 30.7856 19.569C31.0549 19.5745 31.307 19.7075 31.4674 19.9181C31.794 20.3394 31.794 21.0544 31.4617 21.4701C31.1408 21.8636 30.545 21.9302 30.1382 21.6198C30.0752 21.5754 30.0236 21.52 29.9778 21.459C29.8059 21.2318 29.7257 20.9602 29.7314 20.683Z" fill="#0068FF" />
                        </g>
                        <defs>
                            <linearGradient id="paint4_linear" x1="22" y1="0" x2="22" y2="44" gradientUnits="userSpaceOnUse">
                                <stop offset="50%" stop-color="#3985f7" />
                                <stop offset="100%" stop-color="#1272e8" />
                            </linearGradient>
                            <clipPath id="clip0">
                                <rect width="26.3641" height="24.2" fill="white" transform="translate(8.78906 9.90234)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="tooltip-text">Chat với chúng tôi qua Zalo</span>
                </a>
            </li>
            <li class="addThis_item">
                <a class="addThis_item--icon" href="https://www.facebook.com/messages/t/105589525788167" target="_blank" rel="nofollow noreferrer" aria-label="zalo">
                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="22" cy="22" r="22" fill="url(#paint3_linear)" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22.0026 7.70215C14.1041 7.70215 7.70117 13.6308 7.70117 20.9442C7.70117 25.1115 9.78083 28.8286 13.0309 31.256V36.305L17.9004 33.6325C19.2 33.9922 20.5767 34.1863 22.0026 34.1863C29.9011 34.1863 36.304 28.2576 36.304 20.9442C36.304 13.6308 29.9011 7.70215 22.0026 7.70215ZM23.4221 25.5314L19.7801 21.6471L12.6738 25.5314L20.4908 17.2331L24.2216 21.1174L31.239 17.2331L23.4221 25.5314Z" fill="white" />
                        <defs>
                            <linearGradient id="paint3_linear" x1="21.6426" y1="43.3555" x2="21.6426" y2="0.428639" gradientUnits="userSpaceOnUse">
                                <stop offset="50%" stop-color="#1168CF" />
                                <stop offset="100%" stop-color="#2CB7FF" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <span class="tooltip-text">Chat với chúng tôi qua Messenger</span>
                </a>
            </li>


        </ul>
    </div>


    <!-- Modal -->


    <div id="site-overlay" class="site-overlay"></div>
    </div>

    <?php //js page here --
    include 'sctript_indexjs.php';
    ?>
</body>

</html>