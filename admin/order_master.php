<?php
require('header.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);

	if($type=='stauts'){
	 $operation=get_safe_value($con,$_GET['operation']);
	 $id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
				$status='1';
		 }else{
				$status='0';
			}
			$update_status_sql="update product set stauts='$status' where id='$id'";
			mysqli_query($con,$update_status_sql);
		}

	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}
$sql="select product.* ,category.category from product,category where product.category_id=category.id order by product.id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
             <h2 class="box-title" style="margin-left: 40%;">Order Master</h2>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Categories</th>
							   <th>Name</th>
							   <th>Image</th>
							   <th>MRP</th>
							   <th>Price</th>
							   <th>Qentity</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['category_id']?></td>
							   <td><?php echo $row['product_name']?></td>
							   <td><img src="../media/product/<?php echo $row['image'];?>"/></td>
							   <td><?php echo $row['mrp']?></td>
							   <td><?php echo $row['price']?></td>
							   <td><?php echo $row['qentity']?></td>
							   <td>
								<?php
								if($row['stauts']==1){
									echo "<span ><a class='badge badge-complete' href='?type=stauts&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span ><a class='badge badge-pending' href='?type=stauts&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span><a class='badge badge-edit btn-success'  href='add_edit_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span ><a class='badge badge-delete btn-danger' href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								$i++;
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.php');
?>