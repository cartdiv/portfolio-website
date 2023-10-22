<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\App;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{

    public function AllBlog()
    {
        $blog = Blog::latest()->get();
        return view('admin.blog.blog_all', compact('blog'));
        # code...
    }
    public function AddBlog()
    {
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.blog_add', compact('categories'));
        # code...
    }
    public function StoreBlog(Request $request)
    {
        // $request->validate([
        //     'blog_title' => 'required',
        //     'blog_image' => 'required',
        // ],[
        //     "blog_title.required"  =>'Please enter Blog Title.',

        // ]);

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

        Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_description' => $request->blog_description,
            'blog_tags' => $request->blog_tags,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $nottification = array(
            'message' => "Blog Created Successfully",
            'alert-type' => 'success'
       );

       return redirect()->route('all.blog')->with($nottification);
        # code...
    }
    public function EditBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.blog_edit', compact('blogs', 'categories'));
        # code...
    }
    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;

        if ($request->file('blog_image')){
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
    
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_description' => $request->blog_description,
                'blog_tags' => $request->blog_tags,
                'blog_image' => $save_url,
            ]);
            $nottification = array(
                'message' => "Blog Updated With image Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->route('all.blog')->with($nottification);
        }else{
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_description' => $request->blog_description,
                'blog_tags' => $request->blog_tags,

            ]);
            $nottification = array(
                'message' => "Blog Updated Without image Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->route('all.blog')->with($nottification);
        }//end else
        # code...
    }
    public function DeleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $img = $blog->blog_image;
        unlink($img);
        Blog::findOrFail($id)->delete();
    
        $nottification = array(
            'message' => "Blog deleted Successfully",
            'alert-type' => 'success'
       );
    
       return redirect()->back()->with($nottification);
        # code...
        
    }
    public function BlogDetails($id)
    {
        $allblogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog_detail', compact('blogs', 'categories', 'allblogs'));
        # code...
        # code...
    }

    public function CategoryBlog($id)
    {
        
        $blogpost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $categoryname = BlogCategory::findOrFail($id);
        return view('frontend.cat_blog', compact('blogpost', 'allblogs', 'categories', 'categoryname'));

        # code...
    }

    public function ListAllBlogs()

    {
        $listallbogs = Blog::latest()->paginate(2);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.all_blogs', compact('listallbogs', 'categories'));
        # code...
    }

    //
}
