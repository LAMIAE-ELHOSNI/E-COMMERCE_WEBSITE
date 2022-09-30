<script>
  $(document).ready(function (){
    $('.delete_category').click(function(e){
      e.preventDefault();
      var id =$(this).val();
         alert(id);
          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
              Swal(
              jQuery.ajax({
                  url:'category.php',
                  type:'POST',
                  data:{
                      'cateygory_id':id,
                      'delete':true,
                  },
              success:function(result){
                Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Your work has been saved',
                      showConfirmButton: false,
                      timer: 2000,
                    })
                  }	
              }),
            )
          }
        })
    });
    });
    $(document).ready(function (){
    $('.delete_product').click(function(e){
      e.preventDefault();
      var id =$(this).val();
      alert(id);
          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
              Swal(
              jQuery.ajax({
                  url:'product.php',
                  type:'POST',
                  data:{
                      'product_id':id,
                      'delete':true,
                  },
              success:function(result){
                Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Your work has been saved',
                      showConfirmButton: false,
                      timer: 2000,
                    })
                  }	
              }),
            )
          }
        })
    });
    });
</script>