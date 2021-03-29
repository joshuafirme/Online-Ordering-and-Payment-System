<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
     });


    $(document).on('click', '.add_to_cart', function(){
        let menu_id = $(this).attr('menu-id');
        let amount = $(this).attr('amount');
        addToCart(menu_id, amount);
    });

    function addToCart(menu_id, amount){
        $.ajax({
            url:"/cart/add",
            type:"POST",
            data:{
                menu_id:menu_id,
                amount:amount
            },
            success:function(response){
        
            }
        });
    }    

</script>