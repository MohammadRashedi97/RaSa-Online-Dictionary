@extends('layouts.frontend.main')

@section('title' , 'RaSa Online Dictionary - About Us')

@section('content')
     <div class="bg-white">
          <br>
     	<section class="card card-lg" id="about-about" style="margin-top: 60px;">
     	     <h1 class="text-xxxl mb-sm mt-sm text-center">- Our Mission -</h1>
     	     <p class="text-sm mb-lg text-center">To provide the most actionable app store data.</p>
     	     <h2 class="text-xxl m-b text-center">About</h2>
     	     <div class="text-xs text-justify mx-auto" style="max-width: 74rem;">
     	          <p class="ml-3 mr-3">
     	               At Apptopia, we all come to work every day because we want to solve the biggest problem in mobile.   <b>Everyone is guessing</b>. Publishers don’t know what apps to build, how to monetize them, or even what to price them at. Advertisers &amp; brands don’t know where their target users are, how to reach them, or even how much they need to spend in order to do so. Investors aren’t sure which apps and genres are growing the quickest, and where users are really spending their time (and money).
     	          </p>
     	          <p class="ml-3 mr-3">
     	               Throughout the history of business, people use <b>data</b> to make more informed decisions. Our mission at Apptopia is to make the app economy more transparent. Today we provide the most actionable mobile app data &amp; insights in the industry. We want to make this data available to as many people as possible (not just the top 5%).
     	          </p>
     	     </div>
          </section>
          <br><br>
     </div>
@endsection

@section('script')
<script>
	$('#about-us').addClass('active');
</script>
@endsection