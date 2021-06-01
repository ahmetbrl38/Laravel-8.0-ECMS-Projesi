<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use function PHPUnit\Framework\fileExists;

class SettingsController extends Controller
{
    public function index()
    {

        $data['adminSettings'] = Settings::all()->sortBy('settings_must');
        return view('backend.settings.index', compact('data'));

    }

    public function sortable(Request $request)
    {
//        print_r($_POST['item']);

        foreach ($request->item as $key => $value) {
            $setting = Settings::find(intval($value));
            $setting->settings_must = intval($key);
            $setting->save();
        }
        echo true;
    }

//    public function sortable(Request $request){


//        print_r($_POST['item']);
//        foreach ($request->item as $key => $value)
//        {
//            $settings=Settings::find(intval($value));
//            $settings->settings_must=intval($key);
//            $settings->save();
//        }
//        echo true;
//    }

    public function destroy($id)
    {

        $settings = Settings::find($id);
        if ($settings->delete()) {

            return back()->with('success', 'İşlem Başarılı!');

        }

        return back()->with('error', 'Bir hata meydana geldi.');

    }

    public function edit($id)
    {
        $settings = Settings::where('id', $id)->first();
        return view('backend.settings.edit')->with('settings', $settings);

    }

    public function update(Request $request, $id)
    {

        if($request->hasFile('settings_value')){

                $request-> validate([

                    'settings_value' => 'required|image|mimes:jpg,jpeg,png|max:4096'

                ]);

                $file_name=uniqid().'.'.$request->settings_value->getClientOriginalExtension();
                $request->settings_value->move(public_path('images/settings'),$file_name);
                $request->settings_value=$file_name;

        }

        $settings = Settings::where('id', $id)->update(
            [
                "settings_value" => $request->settings_value

            ]
        );

        if ($settings){

            $path='images/settings/'.$request->old_file;
            if(file_exists($path)){

                @unlink(public_path($path));

            }
            return back()->with("success", "Düzenleme İşlemi Başarılı");

        }
            return back()->with("error", "Düzenleme Başarısız");
    }

}
