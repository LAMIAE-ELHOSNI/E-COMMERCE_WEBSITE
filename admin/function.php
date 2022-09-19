<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}
function get_product($con,$limit='',$cat_id='',$product_id=''){
	$sql="select product.*,category.category from product,category where product.stauts=1 ";
	if($cat_id!=''){
		$sql.=" and product.category_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and product.id=$product_id ";
	}
	$sql.=" and product.category_id=category.id ";
	$sql.=" order by product.id desc";
	if($limit!=''){
		$sql.=" limit $limit";
	}
	
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}
?>