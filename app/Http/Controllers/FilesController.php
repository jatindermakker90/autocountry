<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageUpload;
use Illuminate\Support\Facades\Auth;
use App\Models\FileUpload;
use App\Exports\WheelsDataExport;
use App\Imports\WheelsDataImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Storage;
use App\Exports\TiresDataExport;
use App\Imports\TiresDataImport;
use App\Exports\AccessoriesDataExport;
use App\Imports\AccessoriesDataImport;

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
        if(!empty($checkfile)){
          Storage::delete($checkfile->file);
          unlink(storage_path('app/public/'.$checkfile->file));
          $checkfile->user_id = $user_id;
          $checkfile->file_size = $filesizeinkb;
          $checkfile->file = $original_file_name;
          $checkfile->original_file_name = $original_file_name;
          $checkfile->save();
        } else {
          $uploadimage = new FileUpload();
          $uploadimage->user_id = $user_id;
          $uploadimage->file_size = $filesizeinkb;
          $uploadimage->file = $original_file_name;
          $uploadimage->original_file_name = $original_file_name;
          $uploadimage->category_name = $request->category;
          $uploadimage->save();
        }
        // $request['file']->move(base_path() . '/storage/app/public', $original_file_name);
        if($request->category == 'wheels') {
          DB::table('wheels_data')->truncate();
          Excel::import(new WheelsDataImport,request()->file('file'));
          Excel::store(new WheelsDataExport, $original_file_name, 'custom-path');
          $file_path = storage_path('app/public/'.$original_file_name);
          $regenerate_size = filesize($file_path);
          $refilesizeinkb = number_format($regenerate_size / 1024, 2) . ' KB';
          $update_size = FileUpload::where('file',$original_file_name)->update(['file_size'=> $refilesizeinkb]);
        } else if($request->category == 'tires') {
          DB::table('tires_data')->truncate();
          Excel::import(new TiresDataImport,request()->file('file'));
          Excel::store(new TiresDataExport, $original_file_name, 'custom-path');
          $file_path = storage_path('app/public/'.$original_file_name);
          $regenerate_size = filesize($file_path);
          $refilesizeinkb = number_format($regenerate_size / 1024, 2) . ' KB';
          $update_size = FileUpload::where('file',$original_file_name)->update(['file_size'=> $refilesizeinkb]);
        } else {
          DB::table('accessories_data')->truncate();
          Excel::import(new AccessoriesDataImport,request()->file('file'));
          Excel::store(new AccessoriesDataExport, $original_file_name, 'custom-path');
          $file_path = storage_path('app/public/'.$original_file_name);
          $regenerate_size = filesize($file_path);
          $refilesizeinkb = number_format($regenerate_size / 1024, 2) . ' KB';
          $update_size = FileUpload::where('file',$original_file_name)->update(['file_size'=> $refilesizeinkb]);
        }
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

    public function getSKUuploads(){
      dd('heerreee');
    }

}
