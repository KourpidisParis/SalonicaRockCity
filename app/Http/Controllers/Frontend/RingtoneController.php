<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ringtone;


class RingtoneController extends Controller
{
    public function index(){
        $ringtones = Ringtone::paginate(2);
        return view('index',compact('ringtones'));
    }

    public function show($id,$slug){
        $ringtone = Ringtone::where('id',$id)->where('slug',$slug)->first();
        return view('show',compact('ringtone'));
    }

    public function downloadRingtone($id){
        $ringtone = Ringtone::find($id);

        $ringtonePath = $ringtone->file;
        $filePath = public_path('audio/').$ringtonePath;
        $ringtone->increment('download');
        $ringtone->save();
        return \Response::download($filePath);

    }

    public function category($id){
        $ringtones = Ringtone::where('category_id',$id)->paginate();
        return view('ringtone-category',compact('ringtones'));
    }
}
