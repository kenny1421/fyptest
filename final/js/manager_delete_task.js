$(document).ready(function () {

    $('.delete_btn').click(function (e) {
        e.preventDefault();

        var id = $(this).attr("id");
        console.log(id);

        swal({
            title: 'Are you sure?',
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "Manager_DeleteTask.php",
                    data: {
                    'id':id,
                    'delete_btn' :true
                    },
                    success: function (response) {
                        console.log(response);
                        if(response == 200)
                        {
                            swal({           
                                title: 'Success!',           
                                text: 'Product deleted Successfully!',          
                                icon: 'success'         })
                                .then(function() {           
    
        
                            window.location.href="Manager_ManageTask.php";
                        })
                        }
                                    
                        else if(response == 500){
                            swal("Error!", "Something went wrong!", "error");
                        }
                        }
              });
            }
          });
    });
});