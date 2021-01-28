
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      fetchGrossSale();
     
      function fetchGrossSale(){
        $('#gross-sale-table').DataTable({
       
          processing: true,
          serverSide: true,
  
          ajax:{
           url: "/reports/gross_sale",
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


  });
    
    
    
    
    