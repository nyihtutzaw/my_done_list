<div id="changepw" class="modal">
    <div class="modal-content">
      <h4>Change Password</h4>
      <form action="{{ route('dashboard.changepassword') }}" method="post">
          {{ csrf_field() }}
         <div class="row">
            <div class="input-field col s12">
                  <input   type="password" class="validate" name="old_pw" required>
                  <label >Old password</label>
            </div>
            <div class="input-field col s12">
                  <input   type="password" class="validate" name="password" required>
                  <label >New password</label>
            </div>
            <div class="input-field col s12">
                  <input   type="password" class="validate" name="password_confirmation" required>
                  <label >Current password</label>
            </div>
            <div class="input-field col s12 center">
                  <button type="submit" class="btn blue darken-3">Change</button>
            </div>
            
        </div>
      </form>
    </div>
   
  </div>