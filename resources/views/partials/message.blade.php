@if (session('message'))
     <div class="alert alert-success alert-message">
          {{session('message')}}
     </div>
@elseif (session('error-message'))
     <div class="alert alert-danger fad alert-message">
          {{session('error-message')}}
     </div>
@endif