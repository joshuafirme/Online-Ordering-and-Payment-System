
$(document).ready(function(){

    console.log('casdhiering');
  
  //search menu
  $(document).on('keyup', '#txt_search', function(){
    var search_key = $(this).val();
  
    $.ajax({
      url:"/transaction/cashiering/search/"+search_key,
      type:"GET",
      success:function(response){

       if(response.length > 0){
        console.log(response);
        $('#description').val(response[0].description);
        $('#category').val(response[0].category);
        $('#price').val(response[0].price);
        computeAmount();
       }
       else{
        $('#description').val('');
        $('#category').val('');
        $('#price').val('');
        $('#amount').val('');
       }

      }
    });
  }); 
  
  //search menu
  $(document).on('keyup', '#qty', function(){
    computeAmount();
  }); 

  computeAmount();

  function computeAmount(){
    var qty = $('#qty').val();
    var price = $('#price').val();
    var amount = qty * price;
    $('#amount').val(parseFloat(amount));
  }


  $(document).on('click', '#btn-add', function(){
    alert('');
  }); 


  });
    
    
    
    
    