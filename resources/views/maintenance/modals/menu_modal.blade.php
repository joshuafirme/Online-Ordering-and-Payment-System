
@yield('modals')


<!-- Add -->
<div id="addModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
 
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Add Menu</h4>
       </div>
       <div class="modal-body">
         <form action="{{action('Maintenance\MenuCtr@store')}}" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="row">

             <div class="col-md-6">    
                <label class="col-form-label">Category</label>
                <select class="form-control" name="category" id="category" required>               
                    @foreach($category as $data)
                    <option value={{ $data->id }}>{{ $data->category }}</option>
                      @endforeach
                </select>
              </div>

              <div class="col-md-6">    
                <label class="col-form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" required>
              </div>

              <div class="col-md-6" style="margin-top: 15px;">    
                <label class="col-form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" required>
                </select>
              </div>
              
             <div class="col-md-6 mb-2" style="margin-top: 15px;">    
                <label class="col-form-label">Preparation Time</label>
                <input type="text" class="form-control" name="prep_time" id="prep_time" required>
                </select>
              </div>

              <div class="col-md-6" style="margin-top: 15px;">    
                <label class="col-form-label">Status</label>
                <select class="form-control" name="status" id="status" required>        
                    <option value="Available">Available</option>       
                    <option value="Available">Not Available</option>       
                </select>
              </div>
 
             <div class="col-md-6" style="margin-top: 15px;">
               <label class="col-form-label">Image</label>
               <input type="file" name="image" id="image">
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

  <!-- Edit -->
  <div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Menu</h4>
        </div>
        <div class="modal-body">
          <form action="{{action('Maintenance\MenuCtr@update')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">

            <input type="hidden" id="id" name="id">
 
              <div class="col-md-6">    
                 <label class="col-form-label">Category</label>
                 <select class="form-control" name="edit_category" id="edit_category" required>        
                     @foreach($category as $data)
                     <option value={{ $data->id }}>{{ $data->category }}</option>
                       @endforeach
                 </select>
               </div>
 
               <div class="col-md-6">    
                 <label class="col-form-label">Description</label>
                 <input type="text" class="form-control" name="edit_description" id="edit_description" required>
               </div>
 
               <div class="col-md-6" style="margin-top: 15px;">    
                 <label class="col-form-label">Price</label>
                 <input type="number" class="form-control" name="edit_price" id="edit_price" required>
                 </select>
               </div>
               
              <div class="col-md-6 mb-2" style="margin-top: 15px;">    
                 <label class="col-form-label">Preparation Time</label>
                 <input type="text" class="form-control" name="edit_prep_time" id="edit_prep_time" required>
                 </select>
               </div>
  
              <div class="col-md-6" style="margin-top: 15px;">
                <label class="col-form-label">Update Image</label>
                <input type="file" name="image" id="edit_image">
              </div>

              <div class="col-md-6" style="margin-top: 15px;">    
                <label class="col-form-label">Status</label>
                <select class="form-control" name="edit_status" id="edit_status" required>        
                    <option value="Available">Available</option>       
                    <option value="Not Available">Not Available</option>       
                </select>
              </div>

              <div class="col-md-6" style="margin-top: 15px;">
                <img src="" alt="" id="img_view" width="100%;" style="max-height: 250px;">
              </div>
 
  
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
         <p class="delete-success text-success delete-success" style="display: none">Data deleted successfully</p>
       </div>
       <div class="modal-footer">
       <button class="btn btn-sm btn-outline-dark" id="btn-yes">Yes</button>
       <button class="btn btn-sm btn-danger cancel-delete" data-dismiss="modal">Cancel</button>

       </div>
     </div>
   </div>
 </div>