<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Website_logo;

use Illuminate\Support\Str;
use File;

class WebsiteLogoController extends Controller
{
    public function website_logo(Request $request)
    {
        $data['getRecord'] = Website_logo::find(1);
        return view('admin.website_logo.update', $data);
    }

    public function website_logo_update(Request $request)
    {
        $save = Website_logo::find(1);
        $save->website_name = trim($request->website_name);

        if (!empty($request->file('logo'))) {

            //old image Remove start
            if (!empty($save->logo) && file_exists('upload/logo/' . $save->logo)) {
                unlink('upload/logo/' . $save->logo);
            }
            //old image remove end
            $file = $request->file('logo');
            $randomStr = Str::random(30);

            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/logo', $filename);
            $save->logo = $filename;
        }

        $save->save();

        return redirect('admin/website_logo')->with('success', 'Website Logo Successfully Updated!');
    }
}
