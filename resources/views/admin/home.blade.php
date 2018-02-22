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

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $total_applications }}</h3>

              <p>Total Applicants</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('admin/job-list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Total Interview Call</p>
            </div>
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>53<sup style="font-size: 20px"></sup></h3>

              <p>Total Interview</p>
            </div>
            <div class="icon">
              <i class="fa fa-retweet"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>44</h3>

              <p>Total Confirm</p>
            </div>
            <div class="icon">
              <i class="fa fa-shield"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>
@stop