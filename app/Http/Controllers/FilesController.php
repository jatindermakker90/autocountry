<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageUpload;
use Illuminate\Support\Facades\Auth;
use App\Models\FileUpload;

class FilesController extends Controller
{
    public function index(){
        return view ('welcome');
    }

    public function store(Request $request){
      //print_r($request->all()); die();
        $user_id = Auth::guard('admin')->user()->id;
        $this->validate($request,['file' => 'required']);
        $this->validate($request,['category' => 'required']);
        $temp_file_name = time() . '.' . $request['file']->getClientOriginalExtension();
        $original_file_name = $request['file']->getClientOriginalName();
        $sizeoffile = filesize($request['file']);

        $filesizeinkb = number_format($sizeoffile / 1024, 2) . ' KB';
        $checkfile = FileUpload::where('category_name',$request->category)->first();
        if($checkfile){
          if(is_file($checkfile->file))
            {
                Storage::delete($checkfile->file);
                unlink(storage_path('/storage/app/public', $checkfile->file));
            } else {
                //echo "File does not exist";
            }
          $checkfile->user_id = $user_id;
          $checkfile->file_size = $filesizeinkb;
          $checkfile->file = $temp_file_name;
          $checkfile->original_file_name = $original_file_name;
          $checkfile->save();
        } else {
          $uploadimage = new FileUpload();
          $uploadimage->user_id = $user_id;
          $uploadimage->file_size = $filesizeinkb;
          $uploadimage->file = $temp_file_name;
          $uploadimage->original_file_name = $original_file_name;
          $uploadimage->category_name = $request->category;
          $uploadimage->save();
        }
        $request['file']->move(base_path() . '/storage/app/public', $temp_file_name);
        $files = FileUpload::all();
        //return redirect('fileslist',compact('files'));
        return redirect('/web/files/list')->with(['files'=>$files,'success'=> 'File has been stored successfully!']);
    }

    public function fileslist(){
      $files = FileUpload::all();
      return view('backend.pages.files.list',compact('files'));
    }

    public function filebaseoncategory($category_name){
      $files = FileUpload::where('category_name',$category_name)->get();
      return view('backend.pages.files.list',compact('files'));
    }

    public function getfileuploads(){
        return view('backend.pages.files.upload');
    }

}
