<?php 
$con=mysqli_connect("localhost:3307","root","","e-commerce");
if(isset($_POST['input'])){
    $name=$_POST['input'];
   $sql="select * from product where product_name LIKE '{$name}%';";
   $res= mysqli_query($con,$sql);
   if(mysqli_num_rows($res)>0){?>
            <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">RESULT</h2>
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
<?php
    }else{
        echo "<h5 class='text_danger container'>NO RESULT FOUND</h5>";
    }
}

?>
<?php 
?>