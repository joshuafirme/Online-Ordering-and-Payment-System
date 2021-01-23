
$(document).ready(function(){
    
  $.ajaxSetup({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });


  fetchCategoryAndMenu();
   
    function fetchCategoryAndMenu(){
      $('#category-menu-table').DataTable({
     
        processing: true,
        serverSide: true,

        ajax:{
         url: "/maintenance/menu_category",
        }, 

        columns:[       
         {data: 'category', name: 'category'},
         {data: 'menu', name: 'menu'},
         {data: 'action', name: 'action'},
        ]
        
       });
    }          
      

//edit modal show
$(document).on('click', '#btn-edit', function(){
  var id = $(this).attr('edit-id');
  
  console.log(id);

  $.ajax({
    url:"/maintenance/category_menu/show/"+id,
    type:"GET",
    success:function(response){
      console.log(response);
      $('#id').val(response[0].id);
      $('#edit-category').val(response[0].category);
      $('#edit-menu').val(response[0].menu);
    }
   });
}); 




  // delete
  var id, category, menu;
  $(document).on('click', '#btn-delete', function(){
      row = $(this).closest("tr")
      id = $(this).attr('delete-id');
      console.log(id);
      category =  $(this).closest("tr").find('td:eq(0)').text();
      menu =  $(this).closest("tr").find('td:eq(1)').text();
      $('#deleteModal').modal('show');
      $('.delete-message').html('Are you sure do you want to delete category <b>'+ category +'</b> and <b> '+ menu +'</b> menu?');
    }); 
    $('#btn-yes').click(function(){
        $.ajax({
            url: '/maintenance/category_menu/delete/'+ id,
            type: 'DELETE',
            success:function(data){
                setTimeout(function(){
                    $('#btn-yes').remove();
                //    $('.delete-success').show();
                //    $('.cancel-delete').text('Ok');
                    $('.loader').css('display', 'none');
                   // $('#proconfirmModal').modal('hide');
                    row.fadeOut(500, function () {
                      table.row(row).remove().draw()
                      
                      });
                   
                }, 1000);
            }
        });
      
    });
});
  
  
  
  
  