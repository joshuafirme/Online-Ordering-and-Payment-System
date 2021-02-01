
@yield('modals')


<!-- Add -->
<div id="addModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
 
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Add Gallery</h4>
       </div>
       <div class="modal-body">
         <form action="{{action('Maintenance\GalleryCtr@store')}}" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="row">

             <div class="col-md-12">
               <label class="col-form-label">Image</label>
               <input type="file" name="image" id="image" required>
             </div>
 
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-sm btn-primary" id="btn-add">Save</button>
         </form>
         
       </div>
     </div>
 
   </div>
 </div>



 <!--Confirm Delete Modal-->
 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Confirmation</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <p class="delete-message"></p>
         <p class="delete-success text-success" style="display: none">Image deleted successfully</p>
       </div>
       <div class="modal-footer">
       <button class="btn btn-sm btn-outline-dark" id="btn-gallery">Yes</button>
       <button class="btn btn-sm btn-danger cancel-delete" data-dismiss="modal">Cancel</button>

       </div>
     </div>
   </div>
 </div>