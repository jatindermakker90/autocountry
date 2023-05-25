<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageUpload;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function index(){
        return view ('welcome');
    }

    public function store(Request $request){
        $user_id = Auth::guard('admin')->user()->id;
        $this->validate($request,['file' => 'required']);

        $resume = time() . '.' . $request['file']->getClientOriginalExtension();

        $sizeoffile = filesize($request['file']);

        $filesizeinkb = number_format($sizeoffile / 1024, 2) . ' KB';

        $uploadimage = new ImageUpload();
        $uploadimage->user_id = $user_id;
        $uploadimage->file_size = $filesizeinkb;
        $uploadimage->file = $resume;
        $uploadimage->save();

        $request['file']->move(base_path() . '/storage/app/public', $resume);
        $files = ImageUpload::all();
        //return redirect('fileslist',compact('files'));
        return redirect('/web/files/list')->with(['files'=>$files,'success'=> 'File has been stored successfully!']);
    }

    public function fileslist(){
      $files = ImageUpload::all();
      return view('backend.pages.files.list',compact('files'));
    }

    public function getfileuploads(){
        return view('backend.pages.files.upload');
    }

}
