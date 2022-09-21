<?php include "header.php"; if(count($_SESSION['cart'])==0 ){?>
    <script>
    window.location.href='index.php'
    </script> 
<?php }else{
    if($_SESSION['USER_LOGIN']!='yes'){?>
        <script>
          window.location.href='login.php'
        </script> 
<?php }else{}
} ?> 

<?php 
$total=0;
    foreach($_SESSION['cart'] as $key=>$val){
        $requet="select product.* ,category.category from product,category where product.category_id=category.id and product.id=$key";
        $product=mysqli_query($con,$requet);

        $data=array();
        while($row=mysqli_fetch_assoc($product)){   
            $data[]=$row;
        }
            $product_total=$data;
            $price=$product_total[0]['price'];
            $qty=$val['qty'];
            $total=$total+($price*$qty);
?>
<?php }?>
<?php if(isset($_POST['submit_button'])){
    //prx($_POST);
    $adress=get_safe_value($con,$_POST['adress']);
    $zip=get_safe_value($con,$_POST['zip']);
    $methos_payment=get_safe_value($con,$_POST['method_pay']);
    $city=get_safe_value($con,$_POST['city']);
    $id_user=$_SESSION['USER_ID'];
    $added_on=date('Y-m-d h:i:s');
    $total_price=$total;
    $order_status=1;
    $payment_status="success";
    mysqli_query($con,"INSERT INTO `order_user`( `user_id`, `city`, `adress`, `zip`, `payment_method`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES ('$id_user','$city','$adress','$zip','$methos_payment','$total_price','$payment_status','$order_status','$added_on')");
    
    $order_id=mysqli_insert_id($con);
    foreach($_SESSION['cart'] as $key=>$val){
        $requet="select product.* ,category.category from product,category where product.category_id=category.id and product.id=$key";
        $product=mysqli_query($con,$requet);
        $data=array();
        while($row=mysqli_fetch_assoc($product)){   
            $data[]=$row;
        }
           $added_on=date('Y-m-d h:i:s');
            $price=$product_total[0]['price'];
            $qty=$val['qty'];
             mysqli_query($con,"INSERT INTO `order_deteail`( `order_user_id`, `product_id`, `qentity`, `price`, `added_on`) VALUES ('$order_id','$key','$qty','$price','$added_on')");

    }
    unset($_SESSION['cart']);
    ?>
        <script>
            window.location.href="thanks_for_order.php";
        </script>
    <?php
}?>

        <!-- End Header Area -->
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
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    <div class="accordion__title">
                                        Checkout Method
                                    </div>

                                    <div class="accordion__title">
                                        Address Information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                            <form method="post">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <input type="text" name="adress" placeholder="Street Address">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-input">
                                                                <input type="text" name="city" placeholder="City/State">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-input">
                                                                <input type="text" name="zip" placeholder="Post code/ zip">
                                                            </div>
                                                        </div>
                                                    </div>

                                                  </div>
                                                    </div>
                                                    <div class="accordion__title">
                                                        payment information
                                                    </div>
                                                        <div class="accordion__body">
                                                            <div class="paymentinfo">
                                                                <div class="single-method">
                                                                <input type="radio" name="method_pay" id=""> Cash On Delivery
                                                                </div>
                                                                <div class="single-method">
                                                                <input type="radio" name="method_pay" id="">Credit Card
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <button type="submit" name="submit_button">CHECK OUT</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                            <?php 
                                $total=0;
                                if($_SESSION['cart']){
                                    foreach($_SESSION['cart'] as $key=>$val){
                                        $requet="select product.* ,category.category from product,category where product.category_id=category.id and product.id=$key";
                                        $product=mysqli_query($con,$requet);
                                    // if (mysqli_num_rows($product) >0) {
                                        $data=array();
                                        while($row=mysqli_fetch_assoc($product)){   
                                            $data[]=$row;
                                        }
                                            $product=$data;
                                            //$productArr=get_product($con,'','',$key);
                                            $name=$product[0]['product_name'];
                                            //  $mrp=$product[0]['mrp'];
                                            $price=$product[0]['price'];
                                            $image=$product[0]['image'];
                                            $qty=$val['qty'];
                                            $total=$total+($price*$qty);

                            ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                    <img src="../media/product/<?php echo $image?>" alt="">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $name;?></a>
                                        <span class="price"><?php echo $price;?></span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="#"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                                          
                                <?php } }//} ?>
                            </div>
                            <div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>sub total</h5>
                                    <span class="price"><?php echo $total; ?> MAD</span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Tax</h5>
                                    <span class="price">$9.00</span>
                                </div>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price">$918.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- Start Footer Area -->
 <?php include "footer.php";?>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- i copied this code to many file try later to optimize it  -->
<script>
    function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'mange_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}
			jQuery('.htc__qua').html(result);
		}	
	});	
}

</script>