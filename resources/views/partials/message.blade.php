@if (session('message'))
     <div class="alert alert-success" class="message-alert">
          {{session('message')}}
     </div>
@elseif (session('error-message'))
     <div class="alert alert-danger fad" class="message-alert">
          {{session('error-message')}}
     </div>
@endif