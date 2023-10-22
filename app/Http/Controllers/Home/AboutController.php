<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function AboutPage()
    {
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutpage'));
    } //end method
    //


    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;
        if ($request->file('about_image')){

            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

            Image::make($image)->resize(523,605)->save('upload/home_about/'.$name_gen);
            $save_url = 'upload/home_about/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,

            ]);
            $nottification = array(
                'message' => "About Page Updated With image Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->back()->with($nottification);
        }else{
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,

            ]);
            $nottification = array(
                'message' => "About Page Updated Without image Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->back()->with($nottification);
        }//end else

        # code...
    }

    public function HomeAbout()
    {
        $aboutpage = About::find(1);
        return view('frontend.about',compact('aboutpage'));
        # code...
    }
    
    public function AboutMultiImage()
    {
        return view('admin.about_page.muiltiimage');
        # code...
    }//end mothod

    public function StoreMultiImage(Request $request)
    {
        $image = $request->file('multi_image');

        foreach ($image as $multi_image){
            
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension(); 

            Image::make($multi_image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
                
            ]);
        }//End of forech
            $nottification = array(
                'message' => "Multi image uploaded Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->route('all.multi.image')->with($nottification);
        
        # code...
    }
    public function AllMultiImage()
    {
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multiimage',compact('allMultiImage'));
        # code...
    }
    public function EditMultiImage($id)
    {
        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image',compact('multiImage'));
        # code...
    }


    public function UpdateMultiImage(Request $request)
    {

        $multi_image_id = $request->id;
        if ($request->file('multi_image')){

            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

            Image::make($image)->resize(220,200)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url,

            ]);
            $nottification = array(
                'message' => "Multi image Updated With image Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->route('all.multi.image')->with($nottification);
        # code...
    }//End method
}

public function DeleteMultiImage($id)
{
    $multi = MultiImage::findOrFail($id);
    $img = $multi->multi_image;
    unlink($img);
    MultiImage::findOrFail($id)->delete();

    $nottification = array(
        'message' => "Multi image Updated delected Successfully",
        'alert-type' => 'success'
   );

   return redirect()->back()->with($nottification);
    # code...
    
}

}