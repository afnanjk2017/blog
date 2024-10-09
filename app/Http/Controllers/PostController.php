<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Promise\Create;

class PostController extends Controller
{
    //
    public function index(){
   /*  $aa = 'afnan';
    $posts= [
        ['id' => 1,'title'=> 'html','posted_by'=> 'sara','created_at'=> '1:33:33 20\2\2024'],

        ['id' => 2,'title'=> 'php','posted_by'=> 'sara','created_at'=> '1:33:33 20\2\2024'],
        ['id' => 3,'title'=> 'html','posted_by'=> 'sara','created_at'=> '1:33:33 20\2\2024'],
        ['id' => 4,'title'=> 'html','posted_by'=> 'sara','created_at'=> '1:33:33 20\2\2024'],

        ['id' => 5,'title'=> 'html','posted_by'=> 'sara','created_at'=> '1:33:33 20\2\2024']
    ]; */
    //$users = User::all();
    //هنا انا ابي اربط اليوزرز بتيبل البوست عشان اوصل لاسم اليوز الي سوا البوست 
    // to do this i use something called elequnt relationships 
    $posts = Post::all();
    //return view('test',['name'=> $aa,'age'=> '23']);
    return view('posts.index',['postsAll'=> $posts]);
}

public function show(Post $post){

//public function show($postid){

    // $post = ['id' => 1,'title'=> 'html', 'description'=> 'any ', 'name'=> 'afnan','email'=> 'ddd"@cc','posted_by'=> 'sara','created_at'=> '1:33:33 20\2\2024'];
// فيه ثلاث طرق مختلفه اقدر اوصل لبيانات التيبل عن طريق ايدي او شي ثاني 
// 1
//$post = Post::find($postid); // similer  as all method
//2
//$post = Post::where('id',$postid)->first(); // this diffrent it called bulider methode for query return only first row results
//3
//$post = Post::where('id',$postid)->get(); // also builder but returns all results
// note : i should end a builder method with first or get methods so it returns the data
// the 3 did not work with me it shows errors i gusse bcz it may return more then row and my file html need only one row 


//there is problem here when user enters id in url that not in table error will show to handle this 3 ways:
// 1 create if condition
/* if (is_null($postid)){
    return to_route('posts.index');
} */
// 2 use methode findOrfail to return exception
//$post= Post::findOrFail($postid);
// 3 use ( route model binding) it show same result as 2 also we dont need to use find or query any more just send it to view directly
    return view('posts.show',['post'=> $post]);
    
    
}
public function create(){

    $users = User::all();

    return view('posts.create',['users'=> $users]);

}
public function store(){

    Request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'des' => ['required', 'min:5'],
        'creator' => ['required', 'exists:users,id'],
    ]);
      $data = Request()->all;
      $title = Request()->title;
      $description = Request()->des;
      $creator = Request()->creator;

      // TWO ways to insert data and both worked with me 
      //1
      $post = new Post();
      $post->title = $title;
      $post->description = $description;
      $post->user_id = $creator;
      $post->save();

      //2 this more complicated
       /* Post::create([
        'title'=> $title,
        'description'=> $description,
        // 'cvb' => 'ffffdf' // this will be ignored bcz its not in the fillable array
       ]); */
       // here will show error bcz of securty so i need to create
       // array prameter or property in  Post model class called
       // protected $fillable and inside it all the none null columns that i will insert 

    return to_route('posts.index');

     

}
public function edit(Post $post){
    $users = User::all();

    return view('posts.edit',['users'=> $users,'post'=> $post]);
}
public function update(Post $post) {


    Request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'des' => ['required', 'min:5'],
        'creator' => ['required', 'exists:users,id'],
    ]);
    $data = Request()->all();
    $title = Request()->title;
    $description = Request()->des;
    $creator = Request()->creator;
    //return to_route('posts.index');
    //dd($data);
     Post::where('id', $post->id)->update([
        'title'=> $title,
        'description'=> $description,
        'user_id'=> $creator
    ]);
    return to_route('posts.show', $post->id);

}
public function destroy(Post $post){

    $post->delete();
    // there is more then one way to delte
    // its better to seprate the query into two 1 find 2 delete

    return to_route('posts.index');

}
}
