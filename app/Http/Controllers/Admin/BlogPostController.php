<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class BlogPostController extends Controller
{
    public $user;
    protected $blog;
    public function __construct(Blog $blog)
    {
        $this->blog     = $blog;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {

        if (is_null($this->user) || !$this->user->can('admin.blog-post.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title']  = 'Blog Post';
        $data['rows']   =  Blog::with('category')->orderBy('id', 'desc')->get();

        return view('admin.blog.post.index', compact('data'));
    }

    public function create()
    {

        if (is_null($this->user) || !$this->user->can('admin.blog-post.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title']  = 'Blog Post Create';
        $data['bog_category']   = BlogCategory::orderBy('id', 'desc')->get();

        return view('admin.blog.post.create', compact('data'));
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.blog-post.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        $this->validate($request, [
            'title'         => 'required|max:150',
            'tags'          => 'required',
            'category_id'   => 'required',
            'status'        => 'required',
            'details'       => 'required',
            'image'         => 'required'

        ]);
        try {

            $blog_post              = new Blog();
            $blog_post->user_id     = Auth::id();
            $blog_post->title       = $request->title;
            $blog_post->slug        = Str::slug($request->title);
            $blog_post->category_id = $request->category_id;
            $blog_post->status      = $request->status;
            $blog_post->tags        = json_encode($request->tags, true);
            $blog_post->details     = $request->details;
            $blog_post->meta_title  = $request->meta_title;
            $blog_post->meta_description  = $request->meta_description;
            $blog_post->meta_keywords  = $request->meta_keywords;
            if ($request->hasFile('image')) {
                $blog_post->image = uploadGeneralFile($request->image, 'blog');
            }
            $blog_post->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Post not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.blog-post.create');
        }
        DB::commit();
        Toastr::success(trans('Post Created Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog-post.index');
    }

    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.blog-post.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = 'Post Edit';
        $data['row'] = Blog::find($id);
        $data['bog_category'] = BlogCategory::orderBy('id', 'desc')->get();
        return view('admin.blog.post.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        if (is_null($this->user) || !$this->user->can('admin.blog-post.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }


        DB::beginTransaction();
        try {

            $this->validate($request, [
                'title'         => 'required|max:150',
                'tags'          => 'required',
                'category_id'   => 'required',
                'status'        => 'required',
                'details'       => 'nullable',
                'image'         => 'nullable'

            ]);

            $blog_post =  Blog::find($id);
            $blog_post->user_id = Auth::id();
            $blog_post->title = $request->title;
            $blog_post->slug = Str::slug($request->title);
            $blog_post->category_id = $request->category_id;
            $blog_post->status = $request->status;
            $blog_post->tags = json_encode($request->tags, true);
            $blog_post->details = $request->details;
            $blog_post->meta_title  = $request->meta_title;
            $blog_post->meta_description  = $request->meta_description;
            $blog_post->meta_keywords  = $request->meta_keywords;

            if ($request->hasFile('image')) {
                $blog_post->image = uploadGeneralFile($request->image, 'blog', $blog_post->image);
            }
            $blog_post->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Post not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->back();
        }
        DB::commit();
        Toastr::success(trans('Post Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog-post.index');
    }

    public function view($id)
    {

        if (is_null($this->user) || !$this->user->can('admin.blog-post.view')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }


        $data['title'] = 'Post Edit';
        $data['row'] = Blog::find($id);
        $data['bog_category'] = BlogCategory::orderBy('id', 'desc')->get();

        return view('admin.blog.post.view', compact('data'));
    }

    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.blog-post.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }


        DB::beginTransaction();
        try {
            $blog_post = Blog::find($id);
            if (File::exists($blog_post->image)) {
                File::delete($blog_post->image);
            }
            $blog_post->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Post not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.blog-post.index');
        }
        DB::commit();
        Toastr::success(trans('Post Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog-post.index');
    }
}
