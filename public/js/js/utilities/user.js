
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      fetchUser();
     
      function fetchUser(){
        $('#user-table').DataTable({
       
          processing: true,
          serverSide: true,
  
          ajax:{
           url: "/utilities/user",
          }, 
  
          columns:[    
           {data: 'emp_id', name: 'emp_id'},  
           {data: 'fullname', name: 'fullname'}, 
           {data: 'username', name: 'username'},   
           {data: 'role', name: 'role'},     
           {data: 'contact_no', name: 'contact_no'},
           {data: 'action', name: 'action'},
          ]
          
         });
      }



  //edit
  $(document).on('click', '#btn-edit-user', function(){
    var id = $(this).attr('edit-id');
    console.log(id);
      $.ajax({
          url: '/utilities/user/show/'+ id,
          type: 'GET',
          success:function(response){
              console.log(response);
              $('#id').val(response[0].id);
              $('#emp_id').val(response[0].emp_id);
              $('#fullname').val(response[0].fullname);
              $('#username').val(response[0].username);
              $('#password').val(response[0].password);
              $('#role').val(response[0].role);
              $('#contact_no').val(response[0].contact_no);
          }
      });
    
  });       


  });
    
    
    
    
    