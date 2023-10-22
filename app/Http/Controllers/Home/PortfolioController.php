<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function AllPortfolio()
    {
        $portfoilo = Portfolio::latest()->get();
        return view('admin.porfolio.porfolio_all', compact('portfoilo'));
        # code...
    }

    public function AddPortfolio()
    {
        return view('admin.porfolio.porfolio_add');
        # code...
    }

    public function StorePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
        ],[
            "portfolio_name.required"  =>'Please enter portfolio Name.',
            "portfolio_title.required"=> 'Please enter your portfolio title.'

        ]);

        $image = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

        Image::make($image)->resize(1020,519)->save('upload/portfoilo/'.$name_gen);
        $save_url = 'upload/portfoilo/'.$name_gen;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save_url,

        ]);
        $nottification = array(
            'message' => "Portfoilo Added Successfully",
            'alert-type' => 'success'
       );

       return redirect()->route('all.portfolio')->with($nottification);
        # code...
    }

    public function EditPortfolio($id)
    {
        $portfoilo = Portfolio::findOrFail($id);
        return view('admin.porfolio.porfolio_edit', compact('portfoilo'));
        # code...
    }

    public function UpdatePortfolio(Request $request)
    {
        $portfolio_id = $request->id;

        if ($request->file('porfolio_image')){
            $image = $request->file('porfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

            Image::make($image)->resize(1020,519)->save('upload/portfoilo/'.$name_gen);
            $save_url = 'upload/portfoilo/'.$name_gen;
    
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,

            ]);
            $nottification = array(
                'message' => "Portfolio Updated With image Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->route('all.portfolio')->with($nottification);
        }else{
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,

            ]);
            $nottification = array(
                'message' => "Portfolio Updated Without image Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->route('all.portfolio')->with($nottification);
        }//end else
        # code...
    }

    public function DeletePortfolio($id)
{
    $portfoilo = Portfolio::findOrFail($id);
    $img = $portfoilo->portfolio_image;
    unlink($img);
    Portfolio::findOrFail($id)->delete();

    $nottification = array(
        'message' => "Portfolio delected Successfully",
        'alert-type' => 'success'
   );

   return redirect()->back()->with($nottification);
    # code...
    
}
public function PortfolioDetails($id)
{
    $portfoilo = Portfolio::findOrFail($id);
    return view('frontend.home_all.portfolio_details', compact('portfoilo'));

}

public function HomePortfolio()
{
    $portfoilo = Portfolio::latest()->paginate(2);
    return view('frontend.home_all.portfolio_list', compact('portfoilo'));
    # code...
}
    //
}
