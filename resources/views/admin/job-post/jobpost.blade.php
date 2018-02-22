@extends('admin.layouts.app')
@section('navbar')
@if(Auth::guest('admin'))
@include('admin.layouts.partial.top-navbar')
@else
@include('admin.layouts.partial.main-header') 
@endif
@endsection
@section('main-sidebar')
@if(Auth::user()->role())
@include('admin.layouts.partial.main-sidebar')
@endif
@endsection
@section('main-content')
@include('admin.job-post.create')
       
{{-- data:new FormData($("#upload_form")[0]), --}}
@stop
{{-- <script src="{{ asset('/components/bower_components/jquery/dist/jquery.min.js') }}"></script> --}}
@push('js')
<script type="text/javascript">
      // console.log('its works');
    // $(document).ready(function(){
      var x=$('.select2-selection__choice').text();
      console.log(x);
     // $.ajax({
     //  url:'',
     //  data:{'JobLocation':location,},
     //  dataType:'json',
     //  type:'post',
     //  processData: false,
     //  contentType: false,
     //  success:function(response){
     //    console.log(response);
            // if(response.data=='success'){
        //   $('#message').html('<div class="callout callout-success"><h4>Reminder!</h4>Record update successfully!</div>');
        //   $("#message").show().fadeOut(3000).queue(function(n) {   
        //   $(this).hide(); n();
        //   $('#example1').load(location.href+' #example1');
        //   });   
        // }
        // else{
        //   $('#message').html('<div class="callout callout-danger"><h4>Reminder!</h4>Record update failed!</div>');
        //   $("#message").show().fadeOut(3000).queue(function(n) {
        //   $(this).hide(); n();
        //   });  
        // }
        // $('#example1').load(location.href+' #example1');
    // console.log(response);
    //   },
    // });
// });
  </script>
@endpush  