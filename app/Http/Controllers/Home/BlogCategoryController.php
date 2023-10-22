<?php

namespace App\Http\Controllers\Home;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {
        $blogcategory = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogcategory'));
        # code...
    }

    public function AddBlogCategory()
    {
        return view('admin.blog_category.blog_category_add');
        # code...
    }

    public function StoreBlogCategory(Request $request)
    {
       
        BlogCategory::insert([
            'blog_category' => $request->blog_category,

        ]);
        $nottification = array(
            'message' => "Blog Category Added Successfully",
            'alert-type' => 'success'
       );

       return redirect()->route('all.blog.category')->with($nottification);
        # code...
    }

    public function EditBlogCategory($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('blogcategory'));
        # code...
    }

    public function UpdateBlogCategory(Request $request)
    {
        $blogcategory_id = $request->id;

    
        BlogCategory::findOrFail($blogcategory_id)->update([
                'blog_category' => $request->blog_category,

            ]);
            $nottification = array(
                'message' => "Blog Category Updated Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->route('all.blog.category')->with($nottification);
        
    }

    public function DeleteBlogCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $nottification = array(
            'message' => "Blog Category delected Successfully",
            'alert-type' => 'success'
       );
    
       return redirect()->back()->with($nottification);
        # code...
    }
    //
}
