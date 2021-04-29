
@yield('modals')


<!-- Add -->
<div id="addModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
 
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Add User</h4>
       </div>
       <div class="modal-body">
         <form action="{{action('Utilities\UserCtr@store')}}" method="POST">
           {{ csrf_field() }}
           <div class="row">

              <div class="col-md-6">    
                <label class="col-form-label">Fullname</label>
                <input type="text" class="form-control" name="fullname" required>
                </select>
              </div>

              <div class="col-md-6">    
                <label class="col-form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
                </select>
              </div>

              <div class="col-md-6" style="margin-top: 15px;">    
                <label class="col-form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
                </select>
              </div>

              
             <div class="col-md-6" style="margin-top: 15px;">    
                <label class="col-form-label">Role</label>
                <select class="form-control" name="role" required>  
                    <option value="Admin">Admin</option>       
                    <option value="Cashier">Cashier</option>  
                    <option value="Receptionist">Receptionist</option>     
                </select>
              </div>
 
             <div class="col-md-6" style="margin-top: 15px;">
               <label class="col-form-label">Contact Number</label>
               <input type="text" class="form-control" name="contact_no" required>
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


 <!-- edit -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit User</h4>
        </div>
        <div class="modal-body">
          <form action="{{action('Utilities\UserCtr@update')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
 
                <input type="hidden" name="id" id="id">

                <div class="col-md-6">    
                    <label class="col-form-label">Employee ID</label>
                    <input type="text" class="form-control" name="emp_id" id="emp_id" required readonly>
                    </select>
                  </div>

               <div class="col-md-6">    
                 <label class="col-form-label">Fullname</label>
                 <input type="text" class="form-control" name="fullname" id="fullname" required>
                 </select>
               </div>
 
               <div class="col-md-6">    
                 <label class="col-form-label" style="margin-top: 15px;">Username</label>
                 <input type="text" class="form-control" name="username" id="username" required>
                 </select>
               </div>
 
               <div class="col-md-6" style="margin-top: 15px;">    
                 <label class="col-form-label">Password</label>
                 <input type="password" class="form-control" name="password" id="password" required>
                 </select>
               </div>
 
               
              <div class="col-md-6" style="margin-top: 15px;">    
                 <label class="col-form-label">Role</label>
                 <select class="form-control" name="role" required id="role">  
                     <option value="Admin">Admin</option>       
                     <option value="Cashier">Cashier</option>  
                     <option value="Receptionist">Receptionist</option>     
                 </select>
               </div>
  
              <div class="col-md-6" style="margin-top: 15px;">
                <label class="col-form-label">Contact Number</label>
                <input type="text" class="form-control" name="contact_no" id="contact_no" required>
              </div>

              
             <div class="col-md-6" style="margin-top: 15px;">
              <label class="col-form-label">Status</label>
              <select class="form-control" name="status" id="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
 
  
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary" id="btn-update">Update</button>
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
       <button class="btn btn-sm btn-outline-dark" id="btn-confirm-del-user">Yes</button>
       <button class="btn btn-sm btn-danger cancel-delete" data-dismiss="modal">Cancel</button>

       </div>
     </div>
   </div>
 </div>