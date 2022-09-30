<?php include "header.php";
include "validation.php";
//include "connectDB.php";
$sql="select * from category order by category desc";
$res=mysqli_query($con,$sql);
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
		$update_status_sql="update category set stauts='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}

}
if(isset($_POST['delete'])){
   $id=get_safe_value($con,$_POST['cateygory_id']);
   $delete_status_sql="delete from category  where id='$id'";
   mysqli_query($con,$delete_status_sql);
}
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0" >
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                         <h2 class="box-title" style="margin-left: 40%;">Categories</h2>
                        <div class="card-body">

                           <h6 ><a class="btn btn-success" href="add_edit_category.php">Add Category</a></h6>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h" id="table-category">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th >Name</th>
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
                                    <td colspan="2"><?php echo $row['category']?></td>
                                    <td ><?php
                                        if($row['stauts']==1){
                                            echo "<span ><a class='badge badge-complete' href='?type=stauts&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                                        }else{
                                            echo "<span ><a class='badge badge-pending' href='?type=stauts&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                                        }
                                        echo "<span ><a class='badge badge-success' href='add_edit_category.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                                        echo "<span ><a class='badge badge-delete btn-danger delete_category' style='color: white;'' value='".$row['id']."'>Delete</a></span>&nbsp";
                                    ?>
                                    <td>
                                    </tr>
                                    <?php $i++;?>
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
<?php include "footer.php";?>          