<?php include "header.php";
//test if name of category is alerdy existe

if(isset($_POST['add'])){

   if(isset($_GET['id'])&&$_GET['id']!=''){
      $name_edit=get_safe_value($con,$_POST['category']);
      $id=$_GET['id'];
      $sqledit="UPDATE category category set category='$name_edit' where id='$id' ";
      mysqli_query($con,$sqledit);
   }else{
      $name=get_safe_value($con,$_POST['category']);
      $sql="INSERT INTO category(category,stauts)VALUES('$name','1')";
      mysqli_query($con,$sql);
   }
    header("Location:category.php");
}

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add category</strong></div>
                        <form action="" method="post">
                        <div class="card-body card-block">
                           <div class="form-group"><label for="category" class=" form-control-label">Category</label><input type="text" name="category" placeholder="Enter your category name" class="form-control"></div>
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