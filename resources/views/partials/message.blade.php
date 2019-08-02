@if (session('message'))
     <div class="alert alert-success" class="alert">
          {{session('message')}}
     </div>
@elseif (session('error-message'))
     <div class="alert alert-danger fad" class="alert">
          {{session('error-message')}}
     </div>
@endif