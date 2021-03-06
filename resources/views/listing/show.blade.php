@extends('layouts.app')

@section('content')

<?php
  $work_hours = date('g A', strtotime($data->work_hour_start)).' - '.date('g A', strtotime($data->work_hour_end));
?>

<section class="single-listing">

  <div class="header blue">
    <div class="left">
      <h3>{{$data->job_title}}</h3>
      
      @if(Auth::check() && $user_role !== 'employer')
        <span class="salary"><i class="user icon"></i> {{$data->user->full_name}}</span>&emsp;
      @endif

      <span class="salary"><i class="dollar icon"></i> {{$data->salary}} USD</span>
    </div>
    <div class="right">
      @if(Auth::check() && $user_role === 'employer')
        <a class="ui button primary" href="{{ route('listing.edit', $data->id) }}">Update</a>
      @else
        <a class="apply ui button primary" href="{{route('application.create', $data->id)}}">Apply</a>
        <p>{{ $data->created_at->diffForHumans() }}</p>
      @endif
    </div>
    
    <div class="clr"></div>
  </div>

  <p class="title">About</p>
  <p class="description">
    {!! nl2br($data->description) !!}
  </p>
  <br>
  <p class="title">Work Hours</p>
  <p>{{ $work_hours }}</p>

</section>

@endsection