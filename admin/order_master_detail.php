<?php
require('header.php');
$order_id=$_GET['id'];
$sql="SELECT order_user.* ,order_deteail.*,product.product_name,product.image,product.price FROM order_user,order_deteail,product where order_user.id='$order_id'and order_user.id=order_deteail.order_user_id and product.id=order_deteail.product_id";
$res=mysqli_query($con,$sql);

if(isset($_POST['update'])){
    $status=$_POST['order_status'];
    $update_order="UPDATE order_user SET order_status=$status WHERE id=$order_id";
    mysqli_query($con,$update_order);
}
?>

<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
             <h2 class="box-title" style="margin-left: 40%;">Order Details</h2>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>Product</th>
							   <th>Qentity</th>
							   <th>Price</th>
							   <th>Total Price</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							if (mysqli_num_rows($res) > 0) {
							while($row=mysqli_fetch_assoc($res)){?>
                             <tr>
                               
                                <td class="product-thumbnail"><img src="../media/product/<?php echo $row['image'] ?>" alt="full-image">
                                <br><span><?php echo $row['product_name'];?></span></td>
                                <td ><?php echo $row['price'];?></td>
                                <td><?php echo $row['qentity'];?></td>
                                <td><?php echo (int)$row['price']*(int)$row['qentity']; ?></td>                            
                            </tr>
                           
							<?php }} ?>
                            <tr>
								<td colspan="1"></td>
								<td>TOTAL AMOUNT  :  </td>
								<td>fix it later</td>
							</tr>
						 </tbody>
					  </table>
                        <div class="adress_details">
                        <?php $res_select=mysqli_query($con,"SELECT order_user.* ,order_status.* FROM order_user,order_status where order_user.id='$order_id' and order_status.id= order_user.order_status");
                                   while($row=mysqli_fetch_assoc($res_select)){ ?> 
                                  Adress : <?php echo $row['city']." ".$row['adress'];?> <br>
                                   Order Status : <?php echo $row['name'];?>
                                  <?php }?>
                        </div>
					  <form method="POST">
                            <select name="order_status">
                                <option >Select Status</option>
                                    <?php $sql_st="SELECT order_user.order_status , order_status.* from order_user,order_status";
                                    $res_s=mysqli_query($con,$sql_st);
                                    while($row=mysqli_fetch_assoc($res_s)){
                                ?>
                                <option value="<?php echo $row['id'];?>">
                                    <?php echo $row['name']?>
                                </option>
                                <?php }?>
                            </select>
                            <button type="submit"name="update">Update Order Status</button>
					  </form>
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