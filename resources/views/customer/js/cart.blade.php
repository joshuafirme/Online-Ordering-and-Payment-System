   <!--go to cart Modal-->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  
          <div class="container">
            <div class="row justify-content-center">
             
                <div class="col-8">
                  <i class="fas fa-check-circle fa-3x" style="color:#005B96;"></i>          
                  <p>Your menu has been added to cart. <br> Go to cart to proceed with your order!</p>
                </div> 
    
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <a class="btn btn-sm btn-primary" href="{{ url('/cart') }}">Go to Cart<a>
          <button class="btn btn-sm btn-outline-light"  style="color:#005B96;" data-dismiss="modal">Continue Shopping</button>
        </div>
      </div>
    </div>
  </div>

<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
     });


    $(document).on('click', '.add_to_cart', function(){
        let menu_id = $(this).attr('menu-id');
        let amount = $(this).attr('amount');
        @if(Auth::check())     
          addToCart(menu_id, amount);   
        @else
          window.location.href = "/customer/customer-login"; 
        @endif
               
        cartCount();
    });

    function addToCart(menu_id, amount){
        $.ajax({
          url:"/transaction/isQtyAvailable/"+menu_id+"/"+1,
                type:"GET",
                success:function(response){
                    if(response==1)
                    {
                      alert('Not enough stock!');
                    }
                    else
                    {
                      $.ajax({
                        url:"/cart/add",
                        type:"POST",
                        data:{
                            menu_id:menu_id,
                            amount:amount
                        },
                        success:function(response){
                            $('#confirmationModal').modal('toggle');
                        }
                      });
                    }
                }
        });
       
    }  


</script>