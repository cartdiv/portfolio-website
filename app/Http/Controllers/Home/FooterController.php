<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{

    public function AllFooter()
    {
        $footer= Footer::find(1);
        return view('admin.footer.footer_infor', compact('footer'));
        # code...
    }

    public function UpdateFooter(Request $request)
    {


        $footer_id = $request->id;
            Footer::findOrFail($footer_id)->update([
                'phone_number' => $request->phone_number,
                'about_info' => $request->about_info,
                'country' => $request->country,
                'address' => $request->address,
                'email' => $request->email,
                'socal_info' => $request->socal_info,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'copyright' => $request->copyright,

            ]);
            $nottification = array(
                'message' => "Footer Updated Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->back()->with($nottification);
        # code...
    }

      public function HomeMain()
    {
        return view('frontend.index');
        # code...
    }
    //
}
