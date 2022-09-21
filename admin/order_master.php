<?php
require('header.php');
$query_s="SELECT order_user.*,order_status.name FROM order_user,order_status where order_user.order_status=order_status.id";
$res_s=mysqli_query($con,$query_s);
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
							   <th>ID Order</th>
							   <th>Client</th>
							   <th>Adress</th>
							   <th>Payment Method</th>
							   <th>Payment Status</th>
							   <th>Order Status</th>
							   <th>Date Oeder</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res_s)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td> <a href="order_master_detail.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
							   <td> <a href=""><?php echo $row['user_id']?></a> </td>
							   <td>city : <?php echo $row['city']?> 
								<br>code postal :  <?php echo $row['zip']?><br>adress :  <?php echo $row['adress']?><br>
							   </td>
							   <td><?php echo $row['payment_method'];?></td>
							   <td><?php echo $row['payment_status']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['added_on']?></td>
							  
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