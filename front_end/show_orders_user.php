 
 <?php include "header.php"; 
 //prx($_SESSION['cart']);
if($_SESSION['USER_LOGIN']){
$id_user=$_SESSION['USER_ID'];
$sql="SELECT DISTINCT  order_user.* ,order_deteail.*,product.* FROM order_user,order_deteail,product where order_user.id=order_deteail.order_user_id and product.id=order_deteail.product_id  and order_user.user_id='$id_user'";
$res=mysqli_query($con,$sql);

 }
 ?>
 <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.html">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">shopping cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- <th class="product-thumbnail">products Image</th> -->
                                            <th class="product-name">product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total Price(price x qentity )</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php while($row=mysqli_fetch_assoc($res)){?>
                                            <tr>
                                                <td class="product-thumbnail"><a href="product-details.php?id=<?php echo $row['id']?>"> <img src="../media/product/<?php echo $row['image'] ?>" alt="full-image"></a>
                                                <br><span> <a href="product-details.php?id=<?php echo $row['id']?>"><?php echo $row['product_name'];?></a></span></td>
                                                <td class="product-price"><?php echo $row['price'];?></td>
                                                <td><?php echo $row['qentity'];?></td>
                                                <td><?php echo (int)$row['price']*(int)$row['qentity']; ?></td>
                                                <td><?php echo $row['added_on']; ?></td>
                                                <?php $order_status=(int)$row['order_status']; ?>
                                                <?php $query_s="SELECT order_user.*,order_status.* FROM order_user,order_status where order_user.order_status=order_status.id and order_status='$order_status'";
                                                ?><?php $res_s=mysqli_query($con,$query_s); ?>
                                                <?php while($row=mysqli_fetch_assoc($res_s)){?>
                                                <td><?php echo $row['name']; ?></td>
                                                <?php }?>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->
        <!-- Start Footer Area -->

<?php include "footer.php";?>
<!-- i copied this code to many file try later to optimize it  -->
