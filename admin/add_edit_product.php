<?php include "header.php";
//test if name of product  is alerdy existe
//check type of image 
//remplier champ for edite 
$id=$_GET['id'];
if(isset($_POST['add'])){
		$categories_id=get_safe_value($con,$_POST['category']);
		$name=get_safe_value($con,$_POST['name']);
		$mrp=get_safe_value($con,$_POST['mrp']);
		$price=get_safe_value($con,$_POST['price']);
		$qty=get_safe_value($con,$_POST['qentity']);
		$short_desc=get_safe_value($con,$_POST['short_desc']);
		$description=get_safe_value($con,$_POST['description']);
		$meta_title=get_safe_value($con,$_POST['meta_title']);
		$meta_desc=get_safe_value($con,$_POST['meta_desc']);
		$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
		$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],'../media/product/'.$image);
		if(isset($_GET['id']) && $_GET['id']!=''){
			$id=$_GET['id'];
			mysqli_query($con,"UPDATE `product` SET `category_id` = '$categories_id', `product_name` = '$name', `mrp` = '$name', `price` = '$price', `qentity` = '$qty', `image` = '$image', `short_desc` = '$short_desc', `descrption` = '$description ', `meta_title` = '$meta_title', `meta_desc` = '$meta_desc ', `meta_keyword` = '$meta_keyword ' WHERE `product`.`id` = '$id'");
		}else{
			mysqli_query($con,"INSERT INTO `product`( `category_id`, `product_name`, `mrp`, `price`, `qentity`, `image`, `short_desc`, `descrption`, `meta_title`, `meta_desc`, `meta_keyword`, `stauts`) VALUES('$categories_id','$name','$mrp','$price','$qty','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1)");
		}
		header("Location:product.php");
		die();
	}

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Product <?php echo $id;?></strong></div>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                        <div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="category">
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con,"select id,category from category order by category asc");
										while($row=mysqli_fetch_assoc($res)){
												echo "<option value=".$row['id'].">".$row['category']."</option>";
											}
										?>
									</select>
								</div>							
								<div class="form-group">
									<label for="categories" class=" form-control-label">MRP</label>
									<input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Qentity</label>
									<input type="text" name="qentity" placeholder="Enter qty" class="form-control" required value="">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" >
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Short Description</label>
									<textarea name="short_desc" placeholder="Enter product short description" class="form-control" required></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter product description" class="form-control" required></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Title</label>
									<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Description</label>
									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Keyword</label>
									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"></textarea>
								</div>                          
                          
                           <button name="add" type="submit" class="btn btn-lg btn-success btn-block">
                           <span >Add</span>
                           </button>
                        </div>                            
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>

<?php include"footer.php";?>          