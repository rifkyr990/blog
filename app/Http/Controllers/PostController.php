<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Confirmation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Console\View\Components\Confirm;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','show']]);
          $this->middleware('permission:post-create', ['only' => ['create','store']]);
          $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:post-delete', ['only' => ['destroy']]);
     }

    public function index()
    {
        $category = Category::with('posts')->get();
        $posts = Post::with('category')->get();
        
        
        // $confirm = Confirmation::with('category')->get();

        return view('dashboard', compact('category', 'posts'));
    }

    public function myPost()
    {
        $posts = Post::with('category')->where('user_id', Auth::id())->get();
        // $confirm = Confirmation::where('user_id', Auth::id())->get();

        return view('mypost', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('posts.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'foto' => 'required|file|mimes:png,jpg,svg|max:2048',
        ]);

        $gambar = $request->file('foto');
        $destinationPath = 'image/';
        $gambarImage = date('YmdHis') . "." .$gambar->getClientOriginalExtension();
        $gambar->move($destinationPath, $gambarImage);
        $input['foto'] = "$gambarImage";

        $data = $request->all();

        $posts = new Post;
        
        $posts->judul = $data['judul'];
        $posts->slug = Str::slug($posts->judul);
        $posts->deskripsi = $data['deskripsi'];
        $posts->author = Auth::user()->name;
        $posts->tanggal = Date::now();
        // $posts->category_id = $data['category_id'];
        $posts->content = $data['content'];
        $posts->foto = $gambarImage;
        $posts->user_id = auth()->id();
        $posts->save();
        
        $posts->category()->attach($data['category_id']);

        return redirect()->route('home')->with('success','artikel berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $comment= Comment::where('post_id', $post['id'])->get();
        return view('posts.show', compact('post', 'comment'));
    }

    public function category($id)
    {
        $posts = Post::where('category_id', $id)->latest()->paginate(5);
        return view('home', compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $category = Category::all();
        
        return view('posts.edit', compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $input = $request->all();
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
        ]);

        if($gambar = $request->file('foto')) {
            $destination = 'image/'.$post->foto;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $destinationPath = 'image/';
            $gambarImage = date('YmdHis') . "." .$gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $gambarImage);
            $input['foto'] = "$gambarImage";

        } else {
            unset($input['foto']);
        }
        
        $post->update($input);

        return redirect()->route('home')->with('success', 'berhasil update');
    }

    public function search(Request $request) {
        if($request->has('search')) {
            $post = Post::where('judul', 'LIKE', '%'.$request->search.'%')->get();
        } else {
            $post = Post::all();
        }

        return view('dashboard', ['posts'=> $post]);
    }

    public function updateStatus(Request $request, $id) {
        $request->validate([
            'status_id' => 'required|in:1,2,3',
        ]);
        $item = Post::find($id);
        $item->status_id = $request->status_id;
        $item->save();

        return redirect()->back()->with('success', 'berhasil');
    }

    public function tech()
    {
        $posts = Post::where('category_id', '1')->latest()->paginate(5);

        return view('home', compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function bisnis()
    {
        $posts = Post::where('category_id', '2')->latest()->paginate(5);

        return view('home', compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function politik()
    {
        $posts = Post::where('category_id', '3')->latest()->paginate(5);

        return view('home', compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // Fitur comment

    public function addcomment(Request $request, $id)
    {
        $post = Post::find($id);
        $comment = new Comment;

        $comment->user_id = auth()->id();
        $comment->post_id = $post->id;
        $comment->comment = $request->comment;

        $comment->save();

        return redirect()->back()->with('success', 'berhasil');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {   
        $destination = 'image/'.$post->foto;
        if (File::exists($destination)){
            File::delete($destination);
        }
        $post->delete();

        return redirect()->route('home')->with('success', 'berhasil dihapus');
    }

}
