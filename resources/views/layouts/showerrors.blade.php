
@if ($errors->any())
    <script>
        var errors = {!! json_encode($errors->all()) !!};
            showError(errors);
    </script>
@endif
 

 @if (Session::has("success") )
 <input type="hidden" id="success_msg"  value="{{ Session::get('success') }}" />
 <script>

   
   showMessage($("#success_msg").val());
        
    </script>
 @elseif (Session::has("error") )
 <input type="hidden" id="error_msg"  value="{{ Session::get('error') }}" />
 <script>

   
   showMessage($("#error_msg").val());
        
    </script>
@endif
    