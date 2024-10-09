@extends('layouts.app')
@section('title')
create
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


<form class="row g-3 " method="POST" action="{{route('posts.store')}}">
  @csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">title</label>
    <input type="text" class="form-control" name="title" value="{{old('title')}}" id="any">
  </div>
  
  <div class="col-10">
    <label for="inputAddress" class="form-label">description</label>
    <input type="text" class="form-control" name="des"  value="{{old('des')}}" id="inputAddress" placeholder=" any">
  </div>
  
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">creator</label>
    <select id="inputState"  name="creator" class="form-select">
      @foreach ($users as $user)
      <option value="{{$user->id}}">{{$user->name}}</option>
      
      @endforeach
      
    </select>
  </div>
  
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Create</button>
  </div>
</form>
@endsection 






</div>