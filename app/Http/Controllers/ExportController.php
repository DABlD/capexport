<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Image;
use File;
use App\Models\Image as Img;

class ExportController extends Controller
{
    public function export(Request $req){
    	File::deleteDirectory(public_path('uploads'));
    	File::makeDirectory(public_path('uploads'));
    	Img::truncate();

    	$files = $req->file('files');

    	foreach($files as $temp){
    		$image = Image::make($temp);

    		if($image->width() >= $image->height()){
    			$image->resize(440,330);
    		}
    		else{
    			$image->resize(440,310);
    		}

    		$path = public_path('uploads/') . $temp->getClientOriginalName();

    		Img::create(['path' => $path]);

    		$image->save($path);
    	}

    	$class = "App\\Exports\\Cap";
    	$images = Img::all();
    	
    	return Excel::download(new $class($images, "Cap"), "Cap_" . now()->format('d-M-y') . ".xlsx");
    }
}
