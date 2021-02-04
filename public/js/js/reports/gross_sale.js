
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var date_from = $('#date_from').val()
      var date_to = $('#date_to').val();

      fetchGrossSale(date_from, date_to);
     
      function fetchGrossSale(date_from, date_to){
        $('#gross-sale-table').DataTable({
       
          processing: true,
          serverSide: true,
  
          ajax:{
           url: "/reports/gross_sale",
           data:{
               date_from:date_from,
               date_to:date_to
           }
          }, 
  
          columns:[    
           {data: 'id', name: 'id'},  
           {data: 'description', name: 'description'},   
           {data: 'category', name: 'category'},   
           {data: 'qty', name: 'qty'},   
           {data: 'amount', name: 'amount'},   
           {data: 'order_type', name: 'order_type'},
           {data: 'created_at', name: 'created_at'},
          ]
          
         });
      }


      $('#date_from').change(function()
      {
         var date_from = $('#date_from').val()
         var date_to = $('#date_to').val();
   
         $('#gross-sale-table').DataTable().destroy();
         fetchGrossSale(date_from, date_to);
      });
   
      $('#date_to').change(function()
      {
         var date_from = $('#date_from').val()
         var date_to = $('#date_to').val();
   
         $('#gross-sale-table').DataTable().destroy();
         fetchGrossSale(date_from, date_to);
      });


  });
    
    
    
    
    