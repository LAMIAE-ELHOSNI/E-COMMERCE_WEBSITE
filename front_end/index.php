<?php include "header.php";
$sql="select product.* ,category.category from product,category where product.category_id=category.id  and product.stauts=1 and category.stauts=1";
$res=mysqli_query($con,$sql);
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
                                    <input placeholder="Search here... " type="text" autocomplete="off" id="search">
                                    <!-- <button type="submit"></button> -->
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
 
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>collection 2018</h2>
                                        <h1>NICE CHAIR</h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/slider/fornt-img/1.png" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <!-- <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>collection 2018</h2>
                                        <h1>NICE CHAIR</h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/slider/fornt-img/2.png" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
<div id="search_result">
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="product__wrap clearfix">
                    <div class="container">
                    <div class="row">
                        <div class="product__list clearfix mt--50">
                            <!-- Start Single Category -->
							<?php while($row=mysqli_fetch_assoc($res)){?>
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">

                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?id=<?php echo $row['id']?>"> <!-- link to product page -->
                                         <img src="../media/product/<?php echo $row['image'];?>" alt="product_image" style="height: 200px;" /><!-- image product -->
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                       <ul class="product__action">  <!-- //wishlist and cart stuf -->
                                            <li><a href="javascript:void(0)" onclick="manage_wishlist('<?php echo $row['id']?>','add')"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $row['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.php?id=<?php echo $list['id']?>"><?php echo $row['product_name']?></a></h4><!--//title product-->
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><?php echo $row['mrp']?></li> <!--old price mrp-->
                                            <li><?php echo $row['price']?></li> <!--new price-->
                                        </ul>
                                    </div>
                                </div>
                            </div>                           
                            <?php }?>
                            <!-- End Single Category -->
                        </div>
                    </div></div>

                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start Product Area -->

        <!-- End Product Area -->
        <!-- Start Footer Area -->    
</div>  

<?php include "footer.php";?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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

function manage_wishlist(pid,type){
	var qty=jQuery("#qty").val();
	jQuery.ajax({
		url:'manage_wishlist.php',
		type:'post',
		data:'pid='+pid+'&type='+type,
		success:function(result){
			if(type=='update'){
				window.location.href=window.location.href;
			}
			jQuery('.htc__qua').html(result);
		}	
	});	
}
$(document).ready(function(){
    $('#search').keyup(function(){
        var input=$(this).val();
      //  alert(input);
            $.ajax({
                url :"search.php",
                type:"post",
                data :{'input':input,},
                success:function(data){
                    $("#search_result").html(data);
                    
                }
            });

           
    });
});
</script>
