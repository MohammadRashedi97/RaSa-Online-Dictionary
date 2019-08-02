@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - Contact Us')

@section('content')
<br><br>
<div class="container text-center bg-white" style="border-radius: 5px;">
     <br><br>
     <h1>Contact Us</h1>
     <br>
     <form>
          <input type="text" class="form-control" placeholder="Email"><br><br>
          <input type="text" class="form-control" placeholder="Name"><br><br>
          <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Message..."></textarea><br><br>
          <input type="submit" value="Submit" class="btn btn-lg btn-primary" style="width: 400px;">
     </form>
     <br><br>
</div>
@endsection