@include('layouts.partial.header')
<div class="wrapper">
@section('navbar')
@show
@section('main-sidebar')
@show
<div class="content-wrapper">
  <div class="container">
     @section('content-header')
     @show
      <section class="content">
         @section('main-content')
         {{-- All content goes here --}}
         @show
      </section>
  </div>
</div>  
@include('layouts.partial.main-footer')
@section('control-sidebar')
@show
</div>
@include('layouts.partial.footer')
