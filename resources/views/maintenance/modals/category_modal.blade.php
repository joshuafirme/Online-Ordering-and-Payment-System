
@yield('modals')


 <!-- Add -->
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Category</h4>
        </div>
        <div class="modal-body">
          <form action="{{action('Maintenance\CategoryCtr@store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">

              <div class="col-md-12" style="margin-bottom: 10px;">
                <label class="col-form-label">Category</label>
                <input type="text" class="form-control" name="category" id="category" required>
              </div>

              <div class="col-md-12" style="margin-bottom: 10px;">
                <label class="col-form-label">Image</label>
                <input type="file" accept="image/x-png,image/gif,image/jpeg" name="image" required>
              </div>
  
              <div class="col-md-12" style="margin-bottom: 15px;">    
                <label class="col-form-label">Status</label>
                <select class="form-control" name="status" required>        
                    <option value="1">Active</option>       
                    <option value="2">Inactive</option>       
                </select>
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
        <h4 class="modal-title">Edit Category</h4>
      </div>
      <div class="modal-body">
        <form action="{{action('Maintenance\CategoryCtr@update')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">

            <input type="hidden" id="id" name="id">

            <div class="col-md-12" style="margin-bottom: 10px;">
              <label class="col-form-label">Category</label>
              <input type="text" class="form-control" name="category" id="edit_category" required>
            </div>

            <div class="col-md-12" style="margin-bottom: 10px;">
              <label class="col-form-label">Image</label>
              <input type="file" accept="image/x-png,image/gif,image/jpeg" name="image">
            </div>

            <div class="col-md-12" style="margin-bottom: 15px;">    
              <label class="col-form-label">Status</label>
              <select class="form-control" name="status" required>        
                  <option value="1">Active</option>       
                  <option value="0">Inactive</option>       
              </select>
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
          <p class="delete-success text-success" style="display: none">Data deleted successfully</p>
        </div>
        <div class="modal-footer">
        <button class="btn btn-sm btn-outline-dark" id="btn-yes">Yes</button>
        <button class="btn btn-sm btn-danger cancel-delete" data-dismiss="modal">Cancel</button>

        </div>
      </div>
    </div>
  </div>