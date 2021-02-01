
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  
  //search menu
  $(document).on('keyup', '#txt_search', function(){

    var search_key = $(this).val();
  
    $.ajax({
      url:"/transaction/cashiering/search/"+search_key,
      type:"GET",
      success:function(response){

       if(response.length > 0){
        console.log(response);
        $('#id').val(response[0].id);
        $('#description').val(response[0].description);
        $('#category').val(response[0].category);
        $('#price').val(response[0].price);
        computeAmount();
       }
       else{
        clearFields();
       }

      }
    });
  }); 

  function clearFields(){     
    $('#id').val('');
    $('#description').val('');
    $('#category').val('');
    $('#price').val('');
    $('#amount').val('');
  }
  
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

    var menu_id = $('#id').val();
    var amount = $('#amount').val();
    var qty = $('#qty').val();

    console.log(menu_id);
    console.log(amount);
    $.ajax({
        url:"/transaction/cashiering/add",
        type:"POST",
        data:{
            menu_id:menu_id,
            amount:amount,
            qty:qty
        },
        success:function(response){
            console.log(response);
            $('#tray_table').load('cashiering #tray_table');
            $('#txt_total_amount').load('cashiering #txt_total_amount');
        }
      });
  }); 

  $(document).on('keyup', '#txt_tendered', function(){

    var tendered = $(this).val();
    $('#txt_change').text(computeChange(tendered));
  }); 

  function computeChange(tendered){
    var total_amount = $('#txt_total_amount').text();

    return tendered - total_amount;
  }


  $(document).on('click', '#btn-process', function(){

    $.ajax({
        url:"/transaction/cashiering/process",
        type:"POST",
        beforeSend:function(){
            $('#btn-process').text('Please wait...')
        },
        success:function(response){
            console.log(response);
          setTimeout(function(){
            $('#tray_table').load('cashiering #tray_table');
            $('#txt_total_amount').load('cashiering #txt_total_amount');
            $('#txt_change').text('0');
            $('#txt_tendered').val(0);
            clearFields();
            $('#btn-process').text('Process');
          },1000)
        }
      });
  }); 

  $(document).on('click', '#btn-remove', function(){
    var id = $(this).attr('delete-id');
    console.log(id);
    $.ajax({
        url:"/transaction/cashiering/remove/"+id,
        type:"GET",
        success:function(){
            $('#tray_table').load('cashiering #tray_table');
            $('#txt_total_amount').load('cashiering #txt_total_amount');
            computeAmount();
         
        }
      });
  }); 


  });
    
    
    
    
    