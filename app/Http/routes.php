<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// https://stackoverflow.com/questions/59149877/visual-studio-code-php-intelephense-keep-showing-not-necessary-error
use Illuminate\Support\Facades\Route;

use App\Country;
use App\Post;
use App\User;
use App\Photo;
Route::get('/', function () {
    return view('welcome');
});

/*
|-------------------------------------------------------------------
| DATABASE Raw SQL Queries
|-------------------------------------------------------------------
 */
//Inserting data
//Route::get('/insert',function(){
//    DB::insert('insert into posts(title,content) value(?,?)',['PHP with Laravel','Laravel is the best thing that has happened to PHP']);
//    DB::insert('insert into posts(title,content) value(?,?)',['php 2 ','php content']);
//});

//Reading data
//Route::get('/read',function(){
//    $results = DB::select('select * from posts where id = ?', [1]);
////output array in details
//    return var_dump($results);
////get first data of posts
//    return $results;
////get first data of posts's title
//    foreach($results as $post){
//        return $post->title;
//    }
//});

//Updating data
//Route::get('/update',function(){
//   $updated = DB::update('update posts set title = "update title" where id= ?', [1]);
//   return $updated;
//});

//Deleting data
//Route::get('/delete',function(){
//    $delete = DB::delete('delete from posts where id = ?',[1]);
//    return $delete;
//});
/*
|-------------------------------------------------------------------
| Application Routes
|-------------------------------------------------------------------
 */

/*
|-------------------------------------------------------------------
| ELOQUENT
|-------------------------------------------------------------------
 */
//Reading Data

//Route::get('/read',function(){
////    get the first record's title
//    $posts = Post::all();
//    foreach( $posts as $post){
//        echo $post->title . " <br>";
//    }
//});
//
//
//Route::get('/find',function(){
//   $post = Post::find(1);
//   echo $post->title;
//});

//// Reading / Finding with Constraints
//Route::get('/findwhere',function(){
//    $posts = Post::where('id',2)->orderBy('id','desc')->take(2)->get();
//    return $posts;
//});
//
//// More ways to retrieve data
//Route::get('/findmore',function(){
//   $posts = Post::findOrFail(1);
//   return $posts;
//});

//// Inserting / Saving Data
//// example 1
Route::get('/basicinsert',function(){
    $post = new Post;
    $post->title = 'New Eloquent title insert';
    $post->content = 'Wow eloquent is very cool, look a t this content';
    $post->save();
});
//// example 2
//Route::get('/basicinsert2',function(){
//    $post = Post::find(2);
//    $post->title = 'title 2';
//    $post->content = 'content2';
//    $post->save();
//});

//Creating data an configuring mass assignment
//Route::get('/create',function(){
//    Post::create(['title'=>'the create method', 'content'=>'I am learning about php']);
//});

//Updating with Eloquent
//Route::get('/update',function(){
//    Post::where('id',2)->where('is_admin',0)->update(['title'=>'New php title','content'=>'I love you']);
//});
//example 1
//Route::get('delete',function(){
//    $post = Post::find(8);
//    $post->delete();
//});

//example 2
// Route::get('delete2',function(){
// // delete id 2
// //    Post::destroy(2);
// // delete id from 1 to 2
// //    Post::destroy(1,2);
//    Post::where('is_admin', 0)->delete();
// });

//Soft Deleting / Trashing(Logical delete)
//Route::get('/softdelete',function(){
//    Post::find(11)->delete();
//
//});
Route::get('/softdelete',function(){
    Post::find(13)->delete();
});
// Retrieving deleted / trashed records
// Route::get('/readsoftdelete',function(){
// //    $post = Post::find(9);
// //    return $post;
//     // example 1
//     // show all data include logically  deleted data
//     $post = Post::Trashed()->where('is_admin', 0)->get();
//     return $post;
//     // example 2
//     // only show data which is logically deleted data
//     $post = Post::onlyTrashed()->where('is_admin', 0)->get();
//     return $post;
// });

// Restoring deleted / trashed records
// Route::get('/restore',function(){
//     Post::withTrashed()->where('is_admin', 0)->restore();
// });

// Deleting a record permanently
// example 1 delete with trashed
// Route::get('forcedelete',function(){
//     Post::withTrashed()->where('is_admin', 0)->forceDelete();
// });
// // example 2 delete only trashed
// Route::get('forcedelete2',function(){
//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });

/*
|-------------------------------------------------------------------
| ELOQUENT Relationships
|-------------------------------------------------------------------
 */
// One to One relationship
//  only show the first record
// Route::get('/user/{id}/post',function($id){
//     // show one record
//     return User::find($id)->post;
//     // show one field
//     return User::find($id)->post->content;
// });

// The inverse relation
// Route::get('/post/{id}/user',function($id){
//     return Post::find($id)->user->name;
// });

// // One to Many relationship
// Route::get('/posts',function(){
//     $user = User::find(1);
//     foreach($user->posts as $post){
//         echo $post->title . "<br>";
//     }
// });
// One to Many relationship
// Route::get('/user/{id}/role',function($id){
//     // example 1
//     $user = User::find($id);
//     foreach( $user->roles as $role ){
//         echo $role->name;
//     }
//     // example 2
//     $user = User::find($id)->roles()->orderBy('id','desc')->get();
//     return $user;
// });

// Querying intermediate table
// Route::get('user/pivot', function(){
//     $user = User::find(1);
//     foreach($user->roles as $role){
        
//          return $role->pivot->created_at;

//     }
// });

// Route::get('/user/country',function(){
//     $country = Country::find(1);
//     foreach($country->posts as $post){
//         echo $post->title;
//     }

// });

// Polymorphic relation 
// Route::get('user/photos',function(){
//     $user = User::find(1);
//     foreach($user->photos as $photo){
//         return $photo->path;
//     }
// });

// Route::get('/post/photos',function(){
//     $post = Post::find(1);
//     foreach($post->photos as $photo){
//         echo $photo->path . '<br>';
//     }
// });

// Route::get('/post/{id}/photos',function($id){
//     $post = Post::find($id);
//     foreach($post->photos as $photo){
//         echo $photo->path . '<br>';
//     }
// });

// Route::get('/photo/{id}/post', function($id){
//     $photo = Photo::findOrFail($id);
//     return $photo->immageable;
// });

// Ploymorphic relation many to many 
Route::get('/post/tag',function(){
    $post = Post::find(1);
    foreach($post->tags as $tag){
        echo $tag->name;
    }
});