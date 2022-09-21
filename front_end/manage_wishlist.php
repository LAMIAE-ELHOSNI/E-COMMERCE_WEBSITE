<?php
require "../admin/connectDB.php";
require "../admin/function.php";
//require "add_to_cart.php";//class page?>
<?php 
class add_to_wishlist{
	function addToWishlist($pid){
		require "../admin/connectDB.php";//try later to optimize this chbakia
		$_SESSION['wishlist'][$pid]=$pid;
		$id_admin= $_SESSION['USER_ID'];
		$id_product=$_SESSION['wishlist'][$pid];
		$sql="INSERT INTO `wishlist`( `user_id`, `product_id`) VALUES ('$id_admin','$id_product')";
		mysqli_query($con,$sql);
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
		if($_SESSION['wishlist']){
			return count($_SESSION['wishlist']);
		}else{
			return 0;
		}	
	}
}
?>
<?php
$pid=get_safe_value($con,$_POST['pid']);
$type=get_safe_value($con,$_POST['type']);

$obj=new add_to_wishlist();

if($type=='add'){
	$obj->addToWishlist($pid);
}

if($type=='remove'){
	$obj->removeProduct($pid);
}
echo $obj->totalWishlist();
?>

