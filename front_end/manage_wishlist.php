<?php

//require "add_to_cart.php";//class page?>
<?php 
class add_to_wishlist{
	function addToWishlist($pid){
		$con=mysqli_connect("localhost:3307","root","","e-commerce");
		session_start();
		$sql="SELECT wishlist.product_id from wishlist where wishlist.product_id='$pid'";
		$res=mysqli_query($con,$sql);
		$check_user=mysqli_num_rows($res);
		if($check_user==0){
			$_SESSION['wishlist'][$pid]=$pid;
			$id_admin= $_SESSION['USER_ID'];
			$id_product=$_SESSION['wishlist'][$pid];
			$sql="INSERT INTO `wishlist`( `user_id`, `product_id`) VALUES ('$id_admin','$id_product')";
			mysqli_query($con,$sql);
			?> <script>Swal.fire(
				'Add To Wishlist',
				'You clicked the button!',
				'success'
			  )</script> <?php
			
		}else{
			?> <script>Swal.fire(
				'Product is Alerdy In Wishlist',
				'You clicked the button!',
				'info'
			  )</script> <?php
		}
	}
	function removeProduct($pid){
		if(isset($_SESSION['wishlist'][$pid])){
			unset($_SESSION['wishlist'][$pid]);
		}
	}
	function emptyProduct(){
		unset($_SESSION['removeProduct']);
	}
	function totalWishlist(){
		if(isset($_SESSION['wishlist'])){
			return count($_SESSION['wishlist']);
		}else{
			return 0;
		}	
	}
}
?>
<?php
$pid=$_POST['pid'];
$type=$_POST['type'];

$obj=new add_to_wishlist();
if($type=='add'){
	$obj->addToWishlist($pid);
}
if($type=='remove'){
	$obj->removeProduct($pid);
}
echo $obj->totalWishlist();
?>
