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


class AdminController extends Controller {


  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('authadmin');

  }


  public function index()
  {
    return view('admin.admin');
  }

  public function userindex()
  {
    $users = User::all();
    return view('admin.userindex', compact('users'));
  }

  public function usershow($id)
  {
    $user = User::findOrFail($id);

    $education = $user['eductation field'];
    return view('admin.usershow', compact('user', 'education'));
  }

  public function editrole($id, Request $request)
  {
    DB::table('users')->where('id', $id)->update(['role' => $request->role]);

    return redirect('admin/users/'. $id);
  }

  public function bookindex()
  {
    $books = Book::all();

    return view('admin.bookindex', compact('books'));
  }

  public function bookshow($id)
  {
    $book = Book::findOrFail($id);
    $author = Author::findOrFail($id);
    $subscriptions = Subscription::all();
    $comments = Comment::all();
    $users = User::all();

    $pubyear = $book['publication year'];
    return view('admin.bookshow', compact('book', 'author', 'pubyear', 'subscriptions', 'comments', 'users'));
  }

  public function addbookform()
  {
    return view('admin.addbook');
  }

  public function addbook(Request $request)
  {
    $book = new Book;
    $author = new Author;
    $author->name = $request->author;
    $book->name = $request->name;
    $book->isbn = $request->isbn;
    $book['publication year'] = $request->publicationyear;
    $book->publisher = $request->publisher;
    $book->image = $request->image;
    $book['subscription status'] = 'false';

    $book->save();
    $author->save();

    return redirect('admin/books');
  }

  public function deletebook($id)
  {
    $book = Book::findOrFail($id);
    $author = Author::findOrFail($id);

    $book->delete();
    $author->delete();

    return redirect('admin/books');
  }

  public function editbook($id)
	{

		$book = Book::findOrFail($id);
    $author = Author::findOrFail($id);

		return view('admin.bookedit', compact('book', 'author'));
	}

  public function updatebook($id, Request $request)
	{
    $book=array(
      'id' => $id,
      'name' => $request->name,
      'isbn' => $request->isbn,
      'publication year' => $request['publicationyear'],
      'publisher' => $request->publisher,
      'image' => $request->image,
    );

    $author=array(
      'id' => $id,
      'name' => $request->author,
    );

    DB::table('books')->where('id', $book['id'])->update($book);

    DB::table('authors')->where('id', $author['id'])->update($author);

		return redirect('admin/books/' . $id);
	}

  public function subscriptionindex()
  {
    $subscriptions = Subscription::all();
    $users = User::all();
    $books = Book::all();

    return view('admin/subscriptionsindex', compact('subscriptions', 'books', 'users'));
  }

  public function deletesubscription($id)
  {

    $subscription = Subscription::findOrFail($id);

    DB::table('books')->where('id', $subscription->book_id)->update(['subscription status' => "false"]);

    Subscription::where('id', $id)->delete();

    return redirect('admin/subscriptions');
  }

  public function addsubscriptionform()
  {
    $users = DB::table('users')->where('role', 'subscriber')->get();

    $books = DB::table('books')->where('subscription status', '!=', 'true')->get();
    //$users = User::all();
    //$books = Book::all();
    return view('admin.addsubscription', compact('books', 'users'));
  }

  public function addsubscription(Request $request)
  {

    $subscription = new Subscription;
    $subscription->book_id = $request->book;
    $subscription->user_id = $request->user;
    $subscription->save();

    DB::table('books')->where('id', $request->book)->update(['subscription status' => "true"]);

    return redirect('books');
  }

  public function commentsindex()
  {
    $comments = Comment::all();
    $users = User::all();
    $books = Book::all();

    return view('admin/commentsindex', compact('comments', 'books', 'users'));
  }



}
