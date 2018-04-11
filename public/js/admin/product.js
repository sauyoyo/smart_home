$(document).ready(function() {
    //Delete product
    $(document).on('click', '.delProduct', function () {
        var id = $(this).data('id');
        var selector = $(this);
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/admin/product/delete/' + id,
                    type: 'GET',
                    success: function (res) {
                        swal(
                            'Deleted!',
                            'Your imaginary file has been deleted.',
                            'success'
                          )
                        selector.parents('tr').remove();
                    }
                });
              
            // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            } else if (result.dismiss === 'cancel') {
              swal(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
        });    
    });

    //Event review file media
    $(document).on('change', '#file-product', function() {
        var file = event.target.files[0] || event.dataTransfer.files[0];
        createFile(file);
    });

    //function reciew file media
    function createFile(file) {
        var reader = new FileReader();
        var review_file_path = '';
        reader.onload = (e) => {
            review_file_path = e.target.result;
            $('.review-file-product').attr('src', review_file_path);
        };
        reader.readAsDataURL(file);
    }
});