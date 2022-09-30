<?php 
class add_to_cart{
	function addProduct($pid,$qty){
		if(is_numeric($qty)){
		$_SESSION['cart'][$pid]['qty']=$qty;

		}else{
		$_SESSION['cart'][$pid]['qty']=1;			
		}
	}
	
	function updateProduct($pid,$qty){
		if(isset($_SESSION['cart'][$pid])){
			$_SESSION['cart'][$pid]['qty']=$qty;
		}
	}
	
	function removeProduct($pid){
		if(isset($_SESSION['cart'][$pid])){
			unset($_SESSION['cart'][$pid]);
		}
	}
	
	function emptyProduct(){
		unset($_SESSION['cart']);
	}
	
	function totalProduct(){
		if(isset($_SESSION['cart'])){
			return count($_SESSION['cart']);
		}else{
			return 0;
		}
		
	}

}
?>