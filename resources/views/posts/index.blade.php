
@extends('layouts.app')

@section('title')
Afnan blog index
@endsection

@section('content')



<div class="text-center container mt-5">
<a type="button"  href="{{route('posts.create')}}"  class="btn btn-success">Create Post</a>

</div>
<div class="text-center container">

<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($postsAll as $post)
    
   
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->user ? $post->user->name : 'not found'}}</td>
      <td>{{$post['created_at']}}</td>
     <!--  <td>{{$post->created_at->format('m-d')}} {{$post->created_at->addDays(3)->format('Y-m-d')}}</td>
      i can manipulate datetime object using Carbon package that comes with laravel -->
      <td> <a href="{{route('posts.show', $post->id)}}"  type="button" class="btn btn-primary">view</a>
<form style="display:inline;" method="POST" action="{{route('posts.destroy',$post['id'])}}">
  @csrf
  @method('delete')
<button onclick="return confirm('Are you sure you want to delete this item?')" type="submit" class="btn btn-danger">delete</button>

</form>

<a type="button" href="{{route('posts.edit', $post['id'])}}" class="btn btn-info">edit</a>
</td>
    </tr>
@endforeach
   
    
  </tbody>
</table>
</div>


@endsection
