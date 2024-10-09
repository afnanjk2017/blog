@extends('layouts.app')
@section('title')
edit
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class=" mt-5 container">


<form class="row g-3 " method="POST" action="{{ route('posts.update', $post->id) }}">
@csrf
@method('PUT')
 
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">title</label>
    <input type="text" class="form-control" name="title" id="any" value="{{$post->title}}">
  </div>
  
  <div class="col-10">
    <label for="inputAddress" class="form-label">description</label>
    <input type="text" class="form-control" name="des" id="inputAddress" value="{{$post->description}}">
  </div>
  
 
  <div class="col-md-4">
    <label for="inputState" class="form-label">creator</label>
    <select id="inputState"  name="creator" class="form-select">
      @foreach ($users as $user)
      <option  @if($post->user_id == $user->id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
      
      @endforeach
      
    </select>
  </div>
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Edit</button>
  </div>
</form>
@endsection 






