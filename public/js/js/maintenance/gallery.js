
$(document).ready(function(){
    
    $.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
  
    fetchGallery();
     
      function fetchGallery(){
        $('#gallery-table').DataTable({
       
          processing: true,
          serverSide: true,
  
          ajax:{
           url: "/maintenance/gallery",
          }, 
  
          columns:[       
           {data: 'category', name: 'category'},
           {data: 'menu', name: 'menu'},
           {data: 'image', name: 'image'},
           {data: 'action', name: 'action'},
          ]
          
         });
      }  
      
      
    var category = $('select[name=category] option').filter(':selected').text();
    $('#category').change(function () {
        category = $('select[name=category] option').filter(':selected').text();
     
        getMenu(category);
        
        
    });

    if(category){
        getMenu(category);
    }

    function getMenu(category){
        
        $.ajax({
            url: '/maintenance/menu/' + category,
            tpye: 'GET',
            success:function(data){
                console.log(data);
                $('#menu').empty();
                for (var i = 0; i < data.length; i++) 
                {
                    $('#menu').append('<option value="' + data[i] + '">' + data[i] + '</option>');
                }
               
        
            }
          });
    }

    
        
  
  //edit modal show
  $(document).on('click', '#btn-edit', function(){
    var id = $(this).attr('edit-id');
    
    console.log(id);
  
    $.ajax({
      url:"/maintenance/gallery/show/"+id,
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
        $('.delete-message').html('Are you sure do you want to delete this gallery?');
      }); 
      $('#btn-yes').click(function(){
          $.ajax({
              url: '/maintenance/gallery/delete/'+ id,
              type: 'DELETE',
              success:function(){
                $('.delete-success').css('display', 'inline');
                  setTimeout(function(){
                      row.fadeOut(500, function () {
                        table.row(row).remove().draw()
                        $('#deleteModal').modal('toggle');
                        });
                     
                  }, 2000);
                  $('.delete-success').css('display', 'none');
              }
          });
        
      });
  });
    
    
    
    
    