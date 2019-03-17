<?php namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Subscription;
use App\Comment;
use App\User;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;


class BookController extends Controller {


  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index()
  {

		$books = Book::all();
    $subscriptions = Subscription::all();

    return view('books.index', compact('books', 'subscriptions'));
  }

  public function show($id)
  {
    $book = Book::findOrFail($id);
    $author = Author::findOrFail($id);
    $subscriptions = Subscription::all();
    $comments = Comment::all();
    $users = User::all();

    $pubyear = $book['publication year'];
    return view('books.show', compact('book', 'author', 'pubyear', 'subscriptions', 'comments', 'users'));
  }

  public function subscribe($id)
  {
    $subscription = new Subscription;
    $subscription->book_id = $id;
    $subscription->user_id = Auth::user()->id;
    $subscription->save();

    DB::table('books')->where('id', $id)->update(['subscription status' => "true"]);

    return redirect('books');
  }

  public function unsubscribe($id)
  {
    Subscription::where('book_id', $id)->where('user_id', Auth::user()->id)->delete();


    DB::table('books')->where('id', $id)->update(['subscription status' => "false"]);

    return redirect('books');
  }

  public function comment($id, Request $request)
  {
    $comment = new Comment;
    $comment->book_id = $id;
    $comment->user_id = Auth::user()->id;
    $comment->text = $request->body;
    $comment->save();
    return redirect('books');

  }
}
