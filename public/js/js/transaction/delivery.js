$(document).ready(function()
{

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
     });

        fetchPendingOrders();

        function fetchPendingOrders(){
        $('#pending-table').DataTable({
        
            processing: true,
            serverSide: true,

            ajax:{
            url: "/delivery/pending",
            type: "GET",
            }, 

            columns:[       
            {data: 'order_no', name: 'order_no'},
            {data: 'fullname', name: 'fullname'},
            {data: 'phone_no', name: 'phone_no'},
            {data: 'email', name: 'email'},    
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action',orderable: false},
            ]
            
        });
        }


        $(document).on('click', '.btn-cancel-order', function()
        {
            let order_no = $(this).attr('order-no');
            let user_id = $(this).attr('user-id');
            console.log(order_no);
            console.log(user_id);
        }); 
});