
@extends('layouts.app')
@section('title')
view
@endsection

@section('content')

<div class=" mt-5 container">


<div class="card mt-5">
  <div class="card-header">
    Post info
  </div>
  <div class="card-body">
    <h5 class="card-title">title : {{$post->title}}</h5>
    <p class="card-text">description : {{$post['description']}}</p>
  
  </div>
</div>

<div class="card mt-5">
  <div class="card-header">
    post creator info 
  </div>
  <div class="card-body">
    <h5 class="card-title">name : {{$post->user ? $post->user->name : 'not found'}}</h5>
    <p class="card-text">  email :{{$post->user ? $post->user->email : 'not found'}}</p>
    <p class="card-text">  created at : {{$post['created_at']}} </p>
   
  </div>
</div>
</div>
@endsection


 