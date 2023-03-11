<?php
include 'header.php';
?>
<div id="product" class="productDetail-page 0_ size_aonam ">

    <div class="product-detail-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    echo ' <div class="row product-detail-main pr_style_03"> ';
                    echo ' <div class="col-md-5 col-sm-12 col-xs-12 product-content-img"> ';

                    echo ' <div class="product-gallery"> ';
                    echo ' <div class="product-gallery__thumbs-container hidden-sm hidden-xs"> ';
                    echo ' <div class="product-gallery__thumbs thumb-fix"> ';

                    echo ' <div class="product-gallery__thumb"> ';
                   // echo ' <a class="product-gallery__thumb-placeholder" rel="nofollow" href="javascript:" data-image="//product.hstatic.net/200000588991/product/hinh_anh_2023-03-06_121749972_6bddf81215da4af1bc1c35776e60c75a_master.png" data-zoom-image="//product.hstatic.net/200000588991/product/hinh_anh_2023-03-06_121749972_6bddf81215da4af1bc1c35776e60c75a_master.png"> ';
                //img
                $callproductService = new productService();

                    echo ' <img alt=" '.$result_productId["ProductName"] .' " data-image="//product.hstatic.net/200000588991/product/hinh_anh_2023-03-06_121749972_6bddf81215da4af1bc1c35776e60c75a_master.png" src="//product.hstatic.net/200000588991/product/hinh_anh_2023-03-06_121749972_6bddf81215da4af1bc1c35776e60c75a_compact.png"> ';
                    echo ' </a> ';
                    echo ' </div> ';

                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' <div class="product-image-detail box__product-gallery scroll"> ';
                    echo ' <ul id="sliderproduct" class="site-box-content slide_product clearfix hidden-lg hidden-md"> ';

                    echo ' <li class="product-gallery-item gallery-item current"> ';
                    echo ' <img class="product-image-feature" src="//product.hstatic.net/200000588991/product/hinh_anh_2023-03-06_121749972_6bddf81215da4af1bc1c35776e60c75a_master.png" alt=" Mô hình Kiana Kaslana [Herrscher of Flamecion] ver. 1/7 Scale Figure Honkai Impact 3 "> ';
                    echo ' </li> ';

                    echo ' </ul> ';
                    echo ' <div class="hidden-sm hidden-xs"> ';
                    //img
                    echo ' <img class="product-image-feature" src="//product.hstatic.net/200000588991/product/hinh_anh_2023-03-06_121749972_6bddf81215da4af1bc1c35776e60c75a_master.png" alt=" Mô hình Kiana Kaslana [Herrscher of Flamecion] ver. 1/7 Scale Figure Honkai Impact 3 "> ';
                    echo ' </div> ';

                    echo ' </div> ';
                    echo ' </div> ';

                    echo ' </div> ';
                    echo ' <div class="col-md-7 col-sm-12 col-xs-12 product-content-desc" id="detail-product"> ';
                    echo ' <div class="product-title"> ';
                    echo ' <h1> '.$result_productId["ProductName"] .' </h1> ';
                    echo ' </div> ';
                    echo ' <div class="product-price" id="price-preview"> ';
                    echo ' <span class="pro-price"> '.$result_productId["Price"] .'₫ </span> ';
                    echo ' </div> ';

                    echo ' <form id="add-item-form" action="" method="post" class="variants clearfix"> ';
                    echo ' <div class="selector-actions"> ';
                    echo ' <div class="module-wrap-sizes"> ';
                    echo ' <div class="box-item"> ';
                    echo ' <div class="quantity-area clearfix"> ';
                    echo ' <input type="button" value="-" onclick="minusQuantity()" class="qty-btn"> ';
                    echo ' <input type="text" id="quantity" name="quantity" value="1" min="1" class="quantity-selector"> ';
                    echo ' <input type="button" value="+" onclick="plusQuantity()" class="qty-btn"> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' </div> ';


                    echo ' <div class="wrap-addcart clearfix"> ';

                    echo ' <div class="block-chat-desktop"> ';
                    echo ' <a href="https://www.facebook.com/messages/t/105589525788167"> ';
                    echo ' <img src="https://file.hstatic.net/200000421115/file/icon_chat_mobile_eb01fde55e2640609f1ada9adf965f7f.png" alt="chat"> ';
                    echo ' Chat ngay';
                    echo ' </a> ';
                    echo ' </div> ';


//button buy
                    echo ' <button type="button" id="add-to-cart" class="add-to-cartProduct button dark btn-addtocart addtocart-modal" name="add"> Thêm vào giỏ  </button> ';
                    echo ' <button type="button" id="buy-now" class="add-to-cartProduct button dark btn-addtocart addtocart-modal hidden" name="add" style="display: inline-block;"> Mua ngay  </button> ';
                    echo ' </div> ';
                    echo ' </div> ';


                    echo ' <div class="product-action-bottom visible-xs"> ';
                    echo ' <div class="input-bottom"> ';
                    echo ' <input id="quan-input" type="number" value="1" min="1"> ';
                    echo ' </div> ';
                    echo ' <button type="button" id="add-to-cartbottom" class="add-to-cartProduct add-cart-bottom button dark addtocart-modal" name="add"> Thêm vào giỏ  </button> ';
                    echo ' </div> ';
                    echo ' </form> ';

                    echo ' <div class="product-description"> ';
                    echo ' <div class="title-bl"> ';
                    echo ' <h2> Mô tả </h2> ';
                    echo ' </div> ';
                    echo ' <div class="description-content"> ';
                    echo ' <div class="description-productdetail">';
                    echo ' <h2>';
                    echo '  <strong>';
                    echo ' <u>THÔNG TIN SẢN PHẨM</u>';
                    echo '  </strong>';
                    echo ' </h2>';
                    echo ' <table border="1" cellspacing="1" cellpadding="1" style="width:100%">';
                    echo '   <tbody>';
                    echo '      <tr>';
                    echo '          <td>';
                    echo '              <h3><strong><span style="color:#6600ff">Tên sản phẩm</span></strong></h3>';
                    echo '           </td>';
                    echo '          <td>';
                    echo '                <h3><strong>'.$result_productId["ProductName"] .'</strong></h3>';
                    echo '           </td>';
                    echo '       </tr>';
                    echo '       <tr>';
                    echo '          <td>';
                    echo '             <h3><strong><span style="color:#6600ff">Series</span></strong></h3>';
                    echo '          </td>';
                    echo '         <td>';
                    echo '            <h3><strong>'.$result_productId["Series"] .' 3&nbsp;</strong></h3>';
                    echo '         </td>';
                    echo '     </tr>';
                    echo '     <tr>';
                    echo '          <td>';
                    echo '              <h3><strong><span style="color:#6600ff">Hãng sản xuất</span></strong></h3>';
                    echo '   </td>';
                    echo '   <td>';
                    echo '      <h3><strong> '.$result_productId["Brand"] .' </strong></h3>';
                    echo '  </td>';
                    echo ' </tr>';
                    echo '  <tr>';
                    echo '    <td>';
                    echo '      <h3><strong><span style="color:#6600ff"><span style="caret-color:#6600ff">Thông số</span></span></strong></h3>';
                    echo '   </td>';
                    echo '    <td>';
                    echo '        <h3><strong> '.$result_productId["Infor"] .' </strong></h3>';
                    echo '   </td>';
                    echo '   </tr>';
                    echo '  <tr>';
                    echo '    <td>';
                    echo '        <h3><strong><span style="color:#6600ff">Note</span></strong></h3>';
                    echo '   </td>';
                    echo '    <td>';
                    echo '        <h3><strong>'.$result_productId["Note"] .'</strong></h3>';
                    echo '     </td>';
                    echo '  </tr>';
                    echo '  <tr>';
                    echo '   <td>';
                    echo '      <h3><strong><span style="color:#6600ff">Phát hành</span></strong></h3>';
                    echo '    </td>';
                    echo '     <td>';
                    echo '        <h3><strong>'.$result_productId["DateRelease"] .'</strong></h3>';
                    echo '    </td>';
                    echo '   </tr>';
                    echo '   <tr>';
                    echo '    <td>';
                    echo '        <h3><strong><span style="color:#6600ff">Mô tả chi tiết tình trạng</span></strong></h3>';
                    echo '     </td>';
                    echo '     <td>';
                    echo '       <h3><strong>'.$result_productId["ProductStatus"] .'</strong></h3>';
                    echo '     </td>';
                    echo '   </tr>';
                    echo '   </tbody>';
                    echo '  </table>';
                    echo '  </div>';
                    echo ' <div> ';
                    echo ' <img src="https://cdn.discordapp.com/attachments/663776142787870722/1082170349371785246/IMG_9180.jpg"> ';
                    echo ' <img src="https://cdn.discordapp.com/attachments/663776142787870722/1082170349560533142/IMG_9181.jpg"> ';
                    echo ' <img src="https://cdn.discordapp.com/attachments/663776142787870722/1082170349770252298/IMG_9182.jpg"> ';
                    echo ' <img src="https://cdn.discordapp.com/attachments/663776142787870722/1082170349996736582/IMG_9183.jpg"> ';
                    echo ' <img src="https://cdn.discordapp.com/attachments/663776142787870722/1082170350214844437/IMG_9184.jpg"> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    ?>




                    <!-- ///////////////////////////////////////////////////////////////////////////////////// -->
                    <div class="list-productRelated clearfix">
                        <div class="heading-title text-center">
                            <h2>Sản phẩm liên quan</h2>
                        </div>








                        <div class="content-product-list row">









                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop">




































                                <div class="product-block product-resize fixheight" id="related_prod_loop_1" style="height: 322px;">
                                    <div class="product-img">


                                        <div class="product-order">Pre-order</div>

                                        <a href="/products/ao-khoac-elysia-herrscher-of-human-ego-ver-honkai-impact-3" title="[NEW] Áo khoác Elysia Herrscher of Human EGO ver. Honkai Impact 3" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 199px;">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/448a6524-e86b-4d03-b039-5f4d629d0595_5a2f8a63a9be418a85ff3c1c57922eec_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/448a6524-e86b-4d03-b039-5f4d629d0595_5a2f8a63a9be418a85ff3c1c57922eec_medium.jpeg" sizes="199px">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/448a6524-e86b-4d03-b039-5f4d629d0595_5a2f8a63a9be418a85ff3c1c57922eec_large.jpeg" srcset="//product.hstatic.net/200000588991/product/448a6524-e86b-4d03-b039-5f4d629d0595_5a2f8a63a9be418a85ff3c1c57922eec_large.jpeg" sizes="199px">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/448a6524-e86b-4d03-b039-5f4d629d0595_5a2f8a63a9be418a85ff3c1c57922eec_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/448a6524-e86b-4d03-b039-5f4d629d0595_5a2f8a63a9be418a85ff3c1c57922eec_grande.jpeg" sizes="199px">
                                                <img class="img-loop lazyautosizes ls-is-cached lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/448a6524-e86b-4d03-b039-5f4d629d0595_5a2f8a63a9be418a85ff3c1c57922eec_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/448a6524-e86b-4d03-b039-5f4d629d0595_5a2f8a63a9be418a85ff3c1c57922eec_grande.jpeg" src="//product.hstatic.net/200000588991/product/448a6524-e86b-4d03-b039-5f4d629d0595_5a2f8a63a9be418a85ff3c1c57922eec_grande.jpeg" alt=" [NEW] Áo khoác Elysia Herrscher of Human EGO ver. Honkai Impact 3 " sizes="199px">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/872623e2-6bc7-4b52-a6f3-1a2c4e1c2697_2f4c6c2e28fb423b9ea1aae68a59e7ee_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/872623e2-6bc7-4b52-a6f3-1a2c4e1c2697_2f4c6c2e28fb423b9ea1aae68a59e7ee_medium.jpeg">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/872623e2-6bc7-4b52-a6f3-1a2c4e1c2697_2f4c6c2e28fb423b9ea1aae68a59e7ee_large.jpeg" srcset="//product.hstatic.net/200000588991/product/872623e2-6bc7-4b52-a6f3-1a2c4e1c2697_2f4c6c2e28fb423b9ea1aae68a59e7ee_large.jpeg">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/872623e2-6bc7-4b52-a6f3-1a2c4e1c2697_2f4c6c2e28fb423b9ea1aae68a59e7ee_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/872623e2-6bc7-4b52-a6f3-1a2c4e1c2697_2f4c6c2e28fb423b9ea1aae68a59e7ee_grande.jpeg">
                                                <img class="img-loop img-hover lazyloaded" data-src="//product.hstatic.net/200000588991/product/872623e2-6bc7-4b52-a6f3-1a2c4e1c2697_2f4c6c2e28fb423b9ea1aae68a59e7ee_grande.jpeg" src="//product.hstatic.net/200000588991/product/872623e2-6bc7-4b52-a6f3-1a2c4e1c2697_2f4c6c2e28fb423b9ea1aae68a59e7ee_grande.jpeg" alt=" [NEW] Áo khoác Elysia Herrscher of Human EGO ver. Honkai Impact 3 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1099744334')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">1,280,000₫</span>

                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/ao-khoac-elysia-herrscher-of-human-ego-ver-honkai-impact-3" title="[NEW] Áo khoác Elysia Herrscher of Human EGO ver. Honkai Impact 3">
                                                    [NEW] Áo khoác Elysia Herrscher of Human EGO ver. Honkai Impact 3
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>1,280,000₫</span>

                                                </p>
                                            </div>
                                            <div class="product-actions">
                                                <button class="proLoop-addtocart" onclick="add_item_show_modalCart('1099744334')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                        <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                            <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                            <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                            <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                            <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                        </g>
                                                    </svg>

                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>






                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">




































                                <div class="product-block product-resize fixheight" id="related_prod_loop_2" style="height: 322px;">
                                    <div class="product-img">


                                        <div class="product-order">Pre-order</div>

                                        <a href="/products/ao-so-mi-elysia-herrscher-of-human-ego-ver-honkai-impact-4" title="[NEW] Áo sơ mi Elysia Herrscher of Human EGO ver. Honkai Impact 3" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 199px;">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/43578c78-2912-4104-ae33-5ceb729a2d55_9f4e70aea5b246ed8fb4e15199e3c7e2_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/43578c78-2912-4104-ae33-5ceb729a2d55_9f4e70aea5b246ed8fb4e15199e3c7e2_medium.jpeg" sizes="199px">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/43578c78-2912-4104-ae33-5ceb729a2d55_9f4e70aea5b246ed8fb4e15199e3c7e2_large.jpeg" srcset="//product.hstatic.net/200000588991/product/43578c78-2912-4104-ae33-5ceb729a2d55_9f4e70aea5b246ed8fb4e15199e3c7e2_large.jpeg" sizes="199px">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/43578c78-2912-4104-ae33-5ceb729a2d55_9f4e70aea5b246ed8fb4e15199e3c7e2_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/43578c78-2912-4104-ae33-5ceb729a2d55_9f4e70aea5b246ed8fb4e15199e3c7e2_grande.jpeg" sizes="199px">
                                                <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/43578c78-2912-4104-ae33-5ceb729a2d55_9f4e70aea5b246ed8fb4e15199e3c7e2_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/43578c78-2912-4104-ae33-5ceb729a2d55_9f4e70aea5b246ed8fb4e15199e3c7e2_grande.jpeg" src="//product.hstatic.net/200000588991/product/43578c78-2912-4104-ae33-5ceb729a2d55_9f4e70aea5b246ed8fb4e15199e3c7e2_grande.jpeg" alt=" [NEW] Áo sơ mi Elysia Herrscher of Human EGO ver. Honkai Impact 3 " sizes="199px">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/8bcc8c73-af5b-4ae2-b0c9-b75b9853e2bf_63d2437878ff4b798347631d54c0b83a_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/8bcc8c73-af5b-4ae2-b0c9-b75b9853e2bf_63d2437878ff4b798347631d54c0b83a_medium.jpeg">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/8bcc8c73-af5b-4ae2-b0c9-b75b9853e2bf_63d2437878ff4b798347631d54c0b83a_large.jpeg" srcset="//product.hstatic.net/200000588991/product/8bcc8c73-af5b-4ae2-b0c9-b75b9853e2bf_63d2437878ff4b798347631d54c0b83a_large.jpeg">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/8bcc8c73-af5b-4ae2-b0c9-b75b9853e2bf_63d2437878ff4b798347631d54c0b83a_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/8bcc8c73-af5b-4ae2-b0c9-b75b9853e2bf_63d2437878ff4b798347631d54c0b83a_grande.jpeg">
                                                <img class="img-loop img-hover ls-is-cached lazyloaded" data-src="//product.hstatic.net/200000588991/product/8bcc8c73-af5b-4ae2-b0c9-b75b9853e2bf_63d2437878ff4b798347631d54c0b83a_grande.jpeg" src="//product.hstatic.net/200000588991/product/8bcc8c73-af5b-4ae2-b0c9-b75b9853e2bf_63d2437878ff4b798347631d54c0b83a_grande.jpeg" alt=" [NEW] Áo sơ mi Elysia Herrscher of Human EGO ver. Honkai Impact 3 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1099744602')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">860,000₫</span>

                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/ao-so-mi-elysia-herrscher-of-human-ego-ver-honkai-impact-4" title="[NEW] Áo sơ mi Elysia Herrscher of Human EGO ver. Honkai Impact 3">
                                                    [NEW] Áo sơ mi Elysia Herrscher of Human EGO ver. Honkai Impact 3
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>860,000₫</span>

                                                </p>
                                            </div>
                                            <div class="product-actions">
                                                <button class="proLoop-addtocart" onclick="add_item_show_modalCart('1099744602')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                        <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                            <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                            <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                            <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                            <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                        </g>
                                                    </svg>

                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">

                                <div class="product-block product-resize fixheight" id="related_prod_loop_3" style="height: 322px;">
                                    <div class="product-img">

                                        <a href="/products/bia-kep-tai-lieu-herrscher-honkai-impact-3" title="[NEW] Bìa kẹp tài liệu Herrscher Honkai Impact 3" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 199px;">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/3b9fb7c4-8a81-40d3-b8f7-2308e90cce34_a7a4fcf1669f4e41a60f67c7584ef3af_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/3b9fb7c4-8a81-40d3-b8f7-2308e90cce34_a7a4fcf1669f4e41a60f67c7584ef3af_medium.jpeg" sizes="199px">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/3b9fb7c4-8a81-40d3-b8f7-2308e90cce34_a7a4fcf1669f4e41a60f67c7584ef3af_large.jpeg" srcset="//product.hstatic.net/200000588991/product/3b9fb7c4-8a81-40d3-b8f7-2308e90cce34_a7a4fcf1669f4e41a60f67c7584ef3af_large.jpeg" sizes="199px">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/3b9fb7c4-8a81-40d3-b8f7-2308e90cce34_a7a4fcf1669f4e41a60f67c7584ef3af_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/3b9fb7c4-8a81-40d3-b8f7-2308e90cce34_a7a4fcf1669f4e41a60f67c7584ef3af_grande.jpeg" sizes="199px">
                                                <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/3b9fb7c4-8a81-40d3-b8f7-2308e90cce34_a7a4fcf1669f4e41a60f67c7584ef3af_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/3b9fb7c4-8a81-40d3-b8f7-2308e90cce34_a7a4fcf1669f4e41a60f67c7584ef3af_grande.jpeg" src="//product.hstatic.net/200000588991/product/3b9fb7c4-8a81-40d3-b8f7-2308e90cce34_a7a4fcf1669f4e41a60f67c7584ef3af_grande.jpeg" alt=" [NEW] Bìa kẹp tài liệu Herrscher Honkai Impact 3 " sizes="199px">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/922ff4bc-b6d2-436d-b135-533dbd52cf0b_23d15f9a44ad4e10acee8d75d5650054_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/922ff4bc-b6d2-436d-b135-533dbd52cf0b_23d15f9a44ad4e10acee8d75d5650054_medium.jpeg">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/922ff4bc-b6d2-436d-b135-533dbd52cf0b_23d15f9a44ad4e10acee8d75d5650054_large.jpeg" srcset="//product.hstatic.net/200000588991/product/922ff4bc-b6d2-436d-b135-533dbd52cf0b_23d15f9a44ad4e10acee8d75d5650054_large.jpeg">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/922ff4bc-b6d2-436d-b135-533dbd52cf0b_23d15f9a44ad4e10acee8d75d5650054_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/922ff4bc-b6d2-436d-b135-533dbd52cf0b_23d15f9a44ad4e10acee8d75d5650054_grande.jpeg">
                                                <img class="img-loop img-hover lazyloaded" data-src="//product.hstatic.net/200000588991/product/922ff4bc-b6d2-436d-b135-533dbd52cf0b_23d15f9a44ad4e10acee8d75d5650054_grande.jpeg" src="//product.hstatic.net/200000588991/product/922ff4bc-b6d2-436d-b135-533dbd52cf0b_23d15f9a44ad4e10acee8d75d5650054_grande.jpeg" alt=" [NEW] Bìa kẹp tài liệu Herrscher Honkai Impact 3 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1099743545')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">140,000₫</span>

                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/bia-kep-tai-lieu-herrscher-honkai-impact-3" title="[NEW] Bìa kẹp tài liệu Herrscher Honkai Impact 3">
                                                    [NEW] Bìa kẹp tài liệu Herrscher Honkai Impact 3
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>140,000₫</span>

                                                </p>
                                            </div>
                                            <div class="product-actions">
                                                <button class="proLoop-addtocart" onclick="add_item_show_modalCart('1099743545')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                        <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                            <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                            <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                            <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                            <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                        </g>
                                                    </svg>

                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">

                                <div class="product-block product-resize fixheight" id="related_prod_loop_4" style="height: 322px;">
                                    <div class="product-img">


                                        <div class="product-order">Pre-order</div>

                                        <a href="/products/day-chuyen-elysia-herrscher-of-human-ego-ver-honkai-impact-3" title="[NEW] Dây chuyền Elysia Herrscher of Human EGO ver. Honkai Impact 3" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 199px;">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/7ae72049-5c76-44f0-959d-4c0b66694721_bfeb1e4b29aa4d47a752b0995a236f0f_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/7ae72049-5c76-44f0-959d-4c0b66694721_bfeb1e4b29aa4d47a752b0995a236f0f_medium.jpeg" sizes="199px">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/7ae72049-5c76-44f0-959d-4c0b66694721_bfeb1e4b29aa4d47a752b0995a236f0f_large.jpeg" srcset="//product.hstatic.net/200000588991/product/7ae72049-5c76-44f0-959d-4c0b66694721_bfeb1e4b29aa4d47a752b0995a236f0f_large.jpeg" sizes="199px">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/7ae72049-5c76-44f0-959d-4c0b66694721_bfeb1e4b29aa4d47a752b0995a236f0f_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/7ae72049-5c76-44f0-959d-4c0b66694721_bfeb1e4b29aa4d47a752b0995a236f0f_grande.jpeg" sizes="199px">
                                                <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/7ae72049-5c76-44f0-959d-4c0b66694721_bfeb1e4b29aa4d47a752b0995a236f0f_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/7ae72049-5c76-44f0-959d-4c0b66694721_bfeb1e4b29aa4d47a752b0995a236f0f_grande.jpeg" src="//product.hstatic.net/200000588991/product/7ae72049-5c76-44f0-959d-4c0b66694721_bfeb1e4b29aa4d47a752b0995a236f0f_grande.jpeg" alt=" [NEW] Dây chuyền Elysia Herrscher of Human EGO ver. Honkai Impact 3 " sizes="199px">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/b1712ed7-b9da-43bf-93a6-c7e45a1c65f9_a293afebf5594e8aaef4d35a7914e2d0_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/b1712ed7-b9da-43bf-93a6-c7e45a1c65f9_a293afebf5594e8aaef4d35a7914e2d0_medium.jpeg">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/b1712ed7-b9da-43bf-93a6-c7e45a1c65f9_a293afebf5594e8aaef4d35a7914e2d0_large.jpeg" srcset="//product.hstatic.net/200000588991/product/b1712ed7-b9da-43bf-93a6-c7e45a1c65f9_a293afebf5594e8aaef4d35a7914e2d0_large.jpeg">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/b1712ed7-b9da-43bf-93a6-c7e45a1c65f9_a293afebf5594e8aaef4d35a7914e2d0_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/b1712ed7-b9da-43bf-93a6-c7e45a1c65f9_a293afebf5594e8aaef4d35a7914e2d0_grande.jpeg">
                                                <img class="img-loop img-hover ls-is-cached lazyloaded" data-src="//product.hstatic.net/200000588991/product/b1712ed7-b9da-43bf-93a6-c7e45a1c65f9_a293afebf5594e8aaef4d35a7914e2d0_grande.jpeg" src="//product.hstatic.net/200000588991/product/b1712ed7-b9da-43bf-93a6-c7e45a1c65f9_a293afebf5594e8aaef4d35a7914e2d0_grande.jpeg" alt=" [NEW] Dây chuyền Elysia Herrscher of Human EGO ver. Honkai Impact 3 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1099744646')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">350,000₫</span>

                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/day-chuyen-elysia-herrscher-of-human-ego-ver-honkai-impact-3" title="[NEW] Dây chuyền Elysia Herrscher of Human EGO ver. Honkai Impact 3">
                                                    [NEW] Dây chuyền Elysia Herrscher of Human EGO ver. Honkai Impact 3
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>350,000₫</span>

                                                </p>
                                            </div>
                                            <div class="product-actions">
                                                <button class="proLoop-addtocart" onclick="add_item_show_modalCart('1099744646')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                        <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                            <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                            <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                            <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                            <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                        </g>
                                                    </svg>

                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">


                                <div class="product-block product-resize fixheight" id="related_prod_loop_5" style="height: 322px;">
                                    <div class="product-img">




                                        <a href="/products/dong-ho-bao-thuc-kem-loa-bluetooth-voice-elysia-herrscher-of-human-ver-honkai-impact-3" title="[NEW] Đồng hồ Báo thức kèm&nbsp;Loa Bluetooth voice Elysia Herrscher of Human ver. Honkai impact 3" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 199px;">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/f2a044fb-fafc-4b86-87ed-38558a477c97_a217d1a973ec41de866aea09756e1acd_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/f2a044fb-fafc-4b86-87ed-38558a477c97_a217d1a973ec41de866aea09756e1acd_medium.jpeg" sizes="199px">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/f2a044fb-fafc-4b86-87ed-38558a477c97_a217d1a973ec41de866aea09756e1acd_large.jpeg" srcset="//product.hstatic.net/200000588991/product/f2a044fb-fafc-4b86-87ed-38558a477c97_a217d1a973ec41de866aea09756e1acd_large.jpeg" sizes="199px">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/f2a044fb-fafc-4b86-87ed-38558a477c97_a217d1a973ec41de866aea09756e1acd_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/f2a044fb-fafc-4b86-87ed-38558a477c97_a217d1a973ec41de866aea09756e1acd_grande.jpeg" sizes="199px">
                                                <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/f2a044fb-fafc-4b86-87ed-38558a477c97_a217d1a973ec41de866aea09756e1acd_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/f2a044fb-fafc-4b86-87ed-38558a477c97_a217d1a973ec41de866aea09756e1acd_grande.jpeg" src="//product.hstatic.net/200000588991/product/f2a044fb-fafc-4b86-87ed-38558a477c97_a217d1a973ec41de866aea09756e1acd_grande.jpeg" alt=" [NEW] Đồng hồ Báo thức kèm&nbsp;Loa Bluetooth voice Elysia Herrscher of Human ver. Honkai impact 3 " sizes="199px">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/ad359c44-ebc7-4aac-80b5-64a503fa944c_aa402620c0ec4546925942dab2cc15cf_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/ad359c44-ebc7-4aac-80b5-64a503fa944c_aa402620c0ec4546925942dab2cc15cf_medium.jpeg">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/ad359c44-ebc7-4aac-80b5-64a503fa944c_aa402620c0ec4546925942dab2cc15cf_large.jpeg" srcset="//product.hstatic.net/200000588991/product/ad359c44-ebc7-4aac-80b5-64a503fa944c_aa402620c0ec4546925942dab2cc15cf_large.jpeg">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/ad359c44-ebc7-4aac-80b5-64a503fa944c_aa402620c0ec4546925942dab2cc15cf_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/ad359c44-ebc7-4aac-80b5-64a503fa944c_aa402620c0ec4546925942dab2cc15cf_grande.jpeg">
                                                <img class="img-loop img-hover lazyloaded" data-src="//product.hstatic.net/200000588991/product/ad359c44-ebc7-4aac-80b5-64a503fa944c_aa402620c0ec4546925942dab2cc15cf_grande.jpeg" src="//product.hstatic.net/200000588991/product/ad359c44-ebc7-4aac-80b5-64a503fa944c_aa402620c0ec4546925942dab2cc15cf_grande.jpeg" alt=" [NEW] Đồng hồ Báo thức kèm&nbsp;Loa Bluetooth voice Elysia Herrscher of Human ver. Honkai impact 3 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1099742876')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">475,000₫</span>

                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/dong-ho-bao-thuc-kem-loa-bluetooth-voice-elysia-herrscher-of-human-ver-honkai-impact-3" title="[NEW] Đồng hồ Báo thức kèm&nbsp;Loa Bluetooth voice Elysia Herrscher of Human ver. Honkai impact 3">
                                                    [NEW] Đồng hồ Báo thức kèm&nbsp;Loa Bluetooth voice Elysia Herrscher of Human ver. Honkai impact 3
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>475,000₫</span>

                                                </p>
                                            </div>
                                            <div class="product-actions">
                                                <button class="proLoop-addtocart" onclick="add_item_show_modalCart('1099742876')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                        <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                            <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                            <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                            <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                            <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                        </g>
                                                    </svg>

                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>






                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">




































                                <div class="product-block product-resize fixheight" id="related_prod_loop_6" style="height: 322px;">
                                    <div class="product-img">


                                        <div class="product-order">Pre-order</div>

                                        <a href="/products/du-o-elysia-herrscher-of-human-ego-ver-honkai-impact-3" title="[NEW] Dù/Ô Elysia Herrscher of Human EGO ver. Honkai Impact 3" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 199px;">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/c7adbec4-09ac-4306-a23d-7fd21e327374_2dfd021b722f45b4a5be56ffa30a1a74_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/c7adbec4-09ac-4306-a23d-7fd21e327374_2dfd021b722f45b4a5be56ffa30a1a74_medium.jpeg" sizes="199px">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/c7adbec4-09ac-4306-a23d-7fd21e327374_2dfd021b722f45b4a5be56ffa30a1a74_large.jpeg" srcset="//product.hstatic.net/200000588991/product/c7adbec4-09ac-4306-a23d-7fd21e327374_2dfd021b722f45b4a5be56ffa30a1a74_large.jpeg" sizes="199px">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/c7adbec4-09ac-4306-a23d-7fd21e327374_2dfd021b722f45b4a5be56ffa30a1a74_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/c7adbec4-09ac-4306-a23d-7fd21e327374_2dfd021b722f45b4a5be56ffa30a1a74_grande.jpeg" sizes="199px">
                                                <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/c7adbec4-09ac-4306-a23d-7fd21e327374_2dfd021b722f45b4a5be56ffa30a1a74_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/c7adbec4-09ac-4306-a23d-7fd21e327374_2dfd021b722f45b4a5be56ffa30a1a74_grande.jpeg" src="//product.hstatic.net/200000588991/product/c7adbec4-09ac-4306-a23d-7fd21e327374_2dfd021b722f45b4a5be56ffa30a1a74_grande.jpeg" alt=" [NEW] Dù/Ô Elysia Herrscher of Human EGO ver. Honkai Impact 3 " sizes="199px">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/efdc2484-7e1a-4ec9-a910-69a8e1adaee9_9ea69171993c41beae475cbeb16b1955_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/efdc2484-7e1a-4ec9-a910-69a8e1adaee9_9ea69171993c41beae475cbeb16b1955_medium.jpeg">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/efdc2484-7e1a-4ec9-a910-69a8e1adaee9_9ea69171993c41beae475cbeb16b1955_large.jpeg" srcset="//product.hstatic.net/200000588991/product/efdc2484-7e1a-4ec9-a910-69a8e1adaee9_9ea69171993c41beae475cbeb16b1955_large.jpeg">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/efdc2484-7e1a-4ec9-a910-69a8e1adaee9_9ea69171993c41beae475cbeb16b1955_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/efdc2484-7e1a-4ec9-a910-69a8e1adaee9_9ea69171993c41beae475cbeb16b1955_grande.jpeg">
                                                <img class="img-loop img-hover ls-is-cached lazyloaded" data-src="//product.hstatic.net/200000588991/product/efdc2484-7e1a-4ec9-a910-69a8e1adaee9_9ea69171993c41beae475cbeb16b1955_grande.jpeg" src="//product.hstatic.net/200000588991/product/efdc2484-7e1a-4ec9-a910-69a8e1adaee9_9ea69171993c41beae475cbeb16b1955_grande.jpeg" alt=" [NEW] Dù/Ô Elysia Herrscher of Human EGO ver. Honkai Impact 3 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1099744627')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">390,000₫</span>

                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/du-o-elysia-herrscher-of-human-ego-ver-honkai-impact-3" title="[NEW] Dù/Ô Elysia Herrscher of Human EGO ver. Honkai Impact 3">
                                                    [NEW] Dù/Ô Elysia Herrscher of Human EGO ver. Honkai Impact 3
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>390,000₫</span>

                                                </p>
                                            </div>
                                            <div class="product-actions">
                                                <button class="proLoop-addtocart" onclick="add_item_show_modalCart('1099744627')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                        <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                            <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                            <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                            <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                            <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                        </g>
                                                    </svg>

                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>






                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">






























                                <div class="product-block product-resize fixheight" id="related_prod_loop_7" style="height: 322px;">
                                    <div class="product-img">


                                        <div class="product-order">Pre-order</div>

                                        <a href="/products/new-hop-qua-sinh-nhat-rita-rossweisse-2023-honkai-impact-3" title="[NEW] Hộp quà sinh nhật Rita Rossweisse 2023 Honkai Impact 3" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 199px;">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/044fe998-491a-4651-ad11-32515ef534c3_6ac5056bfe7b4dd7a19faf1493b8ac2a_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/044fe998-491a-4651-ad11-32515ef534c3_6ac5056bfe7b4dd7a19faf1493b8ac2a_medium.jpeg" sizes="199px">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/044fe998-491a-4651-ad11-32515ef534c3_6ac5056bfe7b4dd7a19faf1493b8ac2a_large.jpeg" srcset="//product.hstatic.net/200000588991/product/044fe998-491a-4651-ad11-32515ef534c3_6ac5056bfe7b4dd7a19faf1493b8ac2a_large.jpeg" sizes="199px">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/044fe998-491a-4651-ad11-32515ef534c3_6ac5056bfe7b4dd7a19faf1493b8ac2a_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/044fe998-491a-4651-ad11-32515ef534c3_6ac5056bfe7b4dd7a19faf1493b8ac2a_grande.jpeg" sizes="199px">
                                                <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/044fe998-491a-4651-ad11-32515ef534c3_6ac5056bfe7b4dd7a19faf1493b8ac2a_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/044fe998-491a-4651-ad11-32515ef534c3_6ac5056bfe7b4dd7a19faf1493b8ac2a_grande.jpeg" src="//product.hstatic.net/200000588991/product/044fe998-491a-4651-ad11-32515ef534c3_6ac5056bfe7b4dd7a19faf1493b8ac2a_grande.jpeg" alt=" [NEW] Hộp quà sinh nhật Rita Rossweisse 2023 Honkai Impact 3 " sizes="199px">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/f85d34b7-d113-4822-8314-ba7f54b49b49_dab709f419c647f3881f8ef82544b82e_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/f85d34b7-d113-4822-8314-ba7f54b49b49_dab709f419c647f3881f8ef82544b82e_medium.jpeg">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/f85d34b7-d113-4822-8314-ba7f54b49b49_dab709f419c647f3881f8ef82544b82e_large.jpeg" srcset="//product.hstatic.net/200000588991/product/f85d34b7-d113-4822-8314-ba7f54b49b49_dab709f419c647f3881f8ef82544b82e_large.jpeg">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/f85d34b7-d113-4822-8314-ba7f54b49b49_dab709f419c647f3881f8ef82544b82e_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/f85d34b7-d113-4822-8314-ba7f54b49b49_dab709f419c647f3881f8ef82544b82e_grande.jpeg">
                                                <img class="img-loop img-hover ls-is-cached lazyloaded" data-src="//product.hstatic.net/200000588991/product/f85d34b7-d113-4822-8314-ba7f54b49b49_dab709f419c647f3881f8ef82544b82e_grande.jpeg" src="//product.hstatic.net/200000588991/product/f85d34b7-d113-4822-8314-ba7f54b49b49_dab709f419c647f3881f8ef82544b82e_grande.jpeg" alt=" [NEW] Hộp quà sinh nhật Rita Rossweisse 2023 Honkai Impact 3 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1099742294')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">390,000₫</span>

                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/new-hop-qua-sinh-nhat-rita-rossweisse-2023-honkai-impact-3" title="[NEW] Hộp quà sinh nhật Rita Rossweisse 2023 Honkai Impact 3">
                                                    [NEW] Hộp quà sinh nhật Rita Rossweisse 2023 Honkai Impact 3
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>390,000₫</span>

                                                </p>
                                            </div>
                                            <div class="product-actions">
                                                <button class="proLoop-addtocart" onclick="add_item_show_modalCart('1099742294')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                        <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                            <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                            <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                            <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                            <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                        </g>
                                                    </svg>

                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>






                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">


































                                <div class="product-block product-resize fixheight" id="related_prod_loop_8" style="height: 322px;">
                                    <div class="product-img">




                                        <a href="/products/huy-hieu-herrscher-honkai-impact-3" title="[NEW] Huy hiệu Herrscher Honkai Impact 3" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 199px;">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/bfc5adb5-02bd-4410-ae44-4a484cd57831_a40b5f04ff2d41e88776d4a2320fb1f5_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/bfc5adb5-02bd-4410-ae44-4a484cd57831_a40b5f04ff2d41e88776d4a2320fb1f5_medium.jpeg" sizes="199px">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/bfc5adb5-02bd-4410-ae44-4a484cd57831_a40b5f04ff2d41e88776d4a2320fb1f5_large.jpeg" srcset="//product.hstatic.net/200000588991/product/bfc5adb5-02bd-4410-ae44-4a484cd57831_a40b5f04ff2d41e88776d4a2320fb1f5_large.jpeg" sizes="199px">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/bfc5adb5-02bd-4410-ae44-4a484cd57831_a40b5f04ff2d41e88776d4a2320fb1f5_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/bfc5adb5-02bd-4410-ae44-4a484cd57831_a40b5f04ff2d41e88776d4a2320fb1f5_grande.jpeg" sizes="199px">
                                                <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/bfc5adb5-02bd-4410-ae44-4a484cd57831_a40b5f04ff2d41e88776d4a2320fb1f5_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/bfc5adb5-02bd-4410-ae44-4a484cd57831_a40b5f04ff2d41e88776d4a2320fb1f5_grande.jpeg" src="//product.hstatic.net/200000588991/product/bfc5adb5-02bd-4410-ae44-4a484cd57831_a40b5f04ff2d41e88776d4a2320fb1f5_grande.jpeg" alt=" [NEW] Huy hiệu Herrscher Honkai Impact 3 " sizes="199px">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/3431f404-3b42-4051-8bfa-523968f16e03_408f19fb1b384bdda5f32bc45e94cfbd_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/3431f404-3b42-4051-8bfa-523968f16e03_408f19fb1b384bdda5f32bc45e94cfbd_medium.jpeg">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/3431f404-3b42-4051-8bfa-523968f16e03_408f19fb1b384bdda5f32bc45e94cfbd_large.jpeg" srcset="//product.hstatic.net/200000588991/product/3431f404-3b42-4051-8bfa-523968f16e03_408f19fb1b384bdda5f32bc45e94cfbd_large.jpeg">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/3431f404-3b42-4051-8bfa-523968f16e03_408f19fb1b384bdda5f32bc45e94cfbd_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/3431f404-3b42-4051-8bfa-523968f16e03_408f19fb1b384bdda5f32bc45e94cfbd_grande.jpeg">
                                                <img class="img-loop img-hover lazyloaded" data-src="//product.hstatic.net/200000588991/product/3431f404-3b42-4051-8bfa-523968f16e03_408f19fb1b384bdda5f32bc45e94cfbd_grande.jpeg" src="//product.hstatic.net/200000588991/product/3431f404-3b42-4051-8bfa-523968f16e03_408f19fb1b384bdda5f32bc45e94cfbd_grande.jpeg" alt=" [NEW] Huy hiệu Herrscher Honkai Impact 3 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1099743415')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">75,000₫</span>

                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/huy-hieu-herrscher-honkai-impact-3" title="[NEW] Huy hiệu Herrscher Honkai Impact 3">
                                                    [NEW] Huy hiệu Herrscher Honkai Impact 3
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>75,000₫</span>

                                                </p>
                                            </div>
                                            <div class="product-actions">
                                                <button class="proLoop-addtocart" onclick="add_item_show_modalCart('1099743415')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                        <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                            <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                            <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                            <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                            <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                        </g>
                                                    </svg>

                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>






                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">



























                                <div class="product-block product-resize fixheight" id="related_prod_loop_9" style="height: 322px;">
                                    <div class="product-img">

                                        <div class="product-order">Order</div>


                                        <a href="/products/lucky-bag-thang-3-honkai-impact-3" title="[NEW] Lucky bag tháng 3 Honkai Impact 3" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 199px;">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/d50d9b0e-741f-4d0b-90c9-18b65baf38a1_f231ef2a44bf47a9a2e0f40ed8ecf718_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/d50d9b0e-741f-4d0b-90c9-18b65baf38a1_f231ef2a44bf47a9a2e0f40ed8ecf718_medium.jpeg" sizes="199px">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/d50d9b0e-741f-4d0b-90c9-18b65baf38a1_f231ef2a44bf47a9a2e0f40ed8ecf718_large.jpeg" srcset="//product.hstatic.net/200000588991/product/d50d9b0e-741f-4d0b-90c9-18b65baf38a1_f231ef2a44bf47a9a2e0f40ed8ecf718_large.jpeg" sizes="199px">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/d50d9b0e-741f-4d0b-90c9-18b65baf38a1_f231ef2a44bf47a9a2e0f40ed8ecf718_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/d50d9b0e-741f-4d0b-90c9-18b65baf38a1_f231ef2a44bf47a9a2e0f40ed8ecf718_grande.jpeg" sizes="199px">
                                                <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/d50d9b0e-741f-4d0b-90c9-18b65baf38a1_f231ef2a44bf47a9a2e0f40ed8ecf718_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/d50d9b0e-741f-4d0b-90c9-18b65baf38a1_f231ef2a44bf47a9a2e0f40ed8ecf718_grande.jpeg" src="//product.hstatic.net/200000588991/product/d50d9b0e-741f-4d0b-90c9-18b65baf38a1_f231ef2a44bf47a9a2e0f40ed8ecf718_grande.jpeg" alt=" [NEW] Lucky bag tháng 3 Honkai Impact 3 " sizes="199px">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/ef980726-e47a-4906-9f34-78053ca12d9c_b21554fc24f34d6f837fe05e33f8a451_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/ef980726-e47a-4906-9f34-78053ca12d9c_b21554fc24f34d6f837fe05e33f8a451_medium.jpeg">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/ef980726-e47a-4906-9f34-78053ca12d9c_b21554fc24f34d6f837fe05e33f8a451_large.jpeg" srcset="//product.hstatic.net/200000588991/product/ef980726-e47a-4906-9f34-78053ca12d9c_b21554fc24f34d6f837fe05e33f8a451_large.jpeg">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/ef980726-e47a-4906-9f34-78053ca12d9c_b21554fc24f34d6f837fe05e33f8a451_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/ef980726-e47a-4906-9f34-78053ca12d9c_b21554fc24f34d6f837fe05e33f8a451_grande.jpeg">
                                                <img class="img-loop img-hover lazyloaded" data-src="//product.hstatic.net/200000588991/product/ef980726-e47a-4906-9f34-78053ca12d9c_b21554fc24f34d6f837fe05e33f8a451_grande.jpeg" src="//product.hstatic.net/200000588991/product/ef980726-e47a-4906-9f34-78053ca12d9c_b21554fc24f34d6f837fe05e33f8a451_grande.jpeg" alt=" [NEW] Lucky bag tháng 3 Honkai Impact 3 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1099744080')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">1,250,000₫</span>

                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/lucky-bag-thang-3-honkai-impact-3" title="[NEW] Lucky bag tháng 3 Honkai Impact 3">
                                                    [NEW] Lucky bag tháng 3 Honkai Impact 3
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>1,250,000₫</span>

                                                </p>
                                            </div>
                                            <div class="product-actions">
                                                <button class="proLoop-addtocart" onclick="add_item_show_modalCart('1099744080')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                        <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                            <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                            <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                            <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                            <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                        </g>
                                                    </svg>

                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>






                            <div class="col-md-4 col-sm-6 col-xs-6 pro-loop  pro-loop-lastHide ">


                                <div class="product-block product-resize fixheight" id="related_prod_loop_10" style="height: 322px;">
                                    <div class="product-img">


                                        <div class="product-order">Pre-order</div>

                                        <a href="/products/tram-cai-ao-elysia-herrscher-of-human-ego-ver-honkai-impact-3" title="[NEW] Trâm cài áo Elysia Herrscher of Human EGO ver. Honkai Impact 3" class="image-resize ratiobox lazyloaded" style="height: 199px;" data-expand="-1">
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/67ec5b77-761e-43a4-8070-89452b69748c_c58ea267c7a14c228a4011c03bdcbb6c_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/67ec5b77-761e-43a4-8070-89452b69748c_c58ea267c7a14c228a4011c03bdcbb6c_medium.jpeg" sizes="199px">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/67ec5b77-761e-43a4-8070-89452b69748c_c58ea267c7a14c228a4011c03bdcbb6c_large.jpeg" srcset="//product.hstatic.net/200000588991/product/67ec5b77-761e-43a4-8070-89452b69748c_c58ea267c7a14c228a4011c03bdcbb6c_large.jpeg" sizes="199px">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/67ec5b77-761e-43a4-8070-89452b69748c_c58ea267c7a14c228a4011c03bdcbb6c_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/67ec5b77-761e-43a4-8070-89452b69748c_c58ea267c7a14c228a4011c03bdcbb6c_grande.jpeg" sizes="199px">
                                                <img class="img-loop lazyautosizes ls-is-cached lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000588991/product/67ec5b77-761e-43a4-8070-89452b69748c_c58ea267c7a14c228a4011c03bdcbb6c_grande.jpeg" data-lowsrc="//product.hstatic.net/200000588991/product/67ec5b77-761e-43a4-8070-89452b69748c_c58ea267c7a14c228a4011c03bdcbb6c_grande.jpeg" src="//product.hstatic.net/200000588991/product/67ec5b77-761e-43a4-8070-89452b69748c_c58ea267c7a14c228a4011c03bdcbb6c_grande.jpeg" alt=" [NEW] Trâm cài áo Elysia Herrscher of Human EGO ver. Honkai Impact 3 " sizes="199px">
                                            </picture>
                                            <picture>
                                                <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000588991/product/b2236208-2e28-4c97-b603-8f1f29006523_d0d5ca3b1ddc4c56871a42764615cf6c_medium.jpeg" srcset="//product.hstatic.net/200000588991/product/b2236208-2e28-4c97-b603-8f1f29006523_d0d5ca3b1ddc4c56871a42764615cf6c_medium.jpeg">
                                                <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000588991/product/b2236208-2e28-4c97-b603-8f1f29006523_d0d5ca3b1ddc4c56871a42764615cf6c_large.jpeg" srcset="//product.hstatic.net/200000588991/product/b2236208-2e28-4c97-b603-8f1f29006523_d0d5ca3b1ddc4c56871a42764615cf6c_large.jpeg">
                                                <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000588991/product/b2236208-2e28-4c97-b603-8f1f29006523_d0d5ca3b1ddc4c56871a42764615cf6c_grande.jpeg" srcset="//product.hstatic.net/200000588991/product/b2236208-2e28-4c97-b603-8f1f29006523_d0d5ca3b1ddc4c56871a42764615cf6c_grande.jpeg">
                                                <img class="img-loop img-hover ls-is-cached lazyloaded" data-src="//product.hstatic.net/200000588991/product/b2236208-2e28-4c97-b603-8f1f29006523_d0d5ca3b1ddc4c56871a42764615cf6c_grande.jpeg" src="//product.hstatic.net/200000588991/product/b2236208-2e28-4c97-b603-8f1f29006523_d0d5ca3b1ddc4c56871a42764615cf6c_grande.jpeg" alt=" [NEW] Trâm cài áo Elysia Herrscher of Human EGO ver. Honkai Impact 3 ">
                                            </picture>
                                        </a>
                                        <div class="button-add hidden">
                                            <button type="submit" title="Buy now" class="action" onclick="buy_now('1099744652')">Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="pro-price-mb">
                                            <span class="pro-price">670,000₫</span>

                                        </div>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="box-pro-detail">
                                            <h3 class="pro-name">
                                                <a href="/products/tram-cai-ao-elysia-herrscher-of-human-ego-ver-honkai-impact-3" title="[NEW] Trâm cài áo Elysia Herrscher of Human EGO ver. Honkai Impact 3">
                                                    [NEW] Trâm cài áo Elysia Herrscher of Human EGO ver. Honkai Impact 3
                                                </a>
                                            </h3>
                                            <div class="box-pro-prices">
                                                <p class="pro-price ">
                                                    <span>670,000₫</span>

                                                </p>
                                            </div>
                                            <div class="product-actions">
                                                <button class="proLoop-addtocart" onclick="add_item_show_modalCart('1099744652')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                        <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                            <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                            <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                            <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                            <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                        </g>
                                                    </svg>

                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>





                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<?php //fotter page here --
include 'footer.php';
?>
<?php //js page here --
include 'sctript_indexjs.php';
?>