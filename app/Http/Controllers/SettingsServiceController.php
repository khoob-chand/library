<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Services;

class SettingsServiceController extends Controller
{
    public function GetServicePage() {
        return view ('settings-service');
    }

    public function GetAllSettingsService() {
        $service = Services::all();
        return response()->json(['status' => 'success', 'data' => $service], 200);
    }
    public function SaveSettingsService(Request $request) {

        if((int)$request['id'] <= 0) {
            $request->validate(['title'=>'required','description'=>'required','image_file'=>'required','file'=>'required']);
            $imageData = $request->input('image_file');
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $decodedImage = base64_decode($imageData);
            $directory ='services_images';
            $imageName = time() . '_' . uniqid() . '.png';
            if (!file_exists(public_path($directory)) ){
                mkdir(public_path($directory, 0777, true));
            }

            $path = $directory . '/' . $imageName;
            file_put_contents(public_path($path), $decodedImage);
            if (file_exists(public_path($path))) {
                $image = new Services();
                $image->title = $request->input('title');
                $image->description = $request->input('description');
                $image->image_path = $path;
                $image->save();
                return response()->json(['message' => 'Services Save Successfully !'], 200);
            } else {
                return response()->json(['message' => 'Failed to Saved Services'], 500);
            }
        }else{
            $request->validate(['title'=>'required','description'=>'required','image_file'=>'required']);
            $image =Services::find((int)$request['id']);
            $filename = $image->image_path;
            if(file_exists($filename)){
                unlink($filename);
                $imageData = $request->input('image_file');
                $imageData = str_replace('data:image/png;base64,', '', $imageData);
                $imageData = str_replace(' ', '+', $imageData);
                $decodedImage = base64_decode($imageData);
                $directory ='services_images';
                $imageName = time() . '_' . uniqid() . '.png';
                $path = $directory . '/' . $imageName;
                if (!file_exists(public_path($directory)) ){
                    mkdir(public_path($directory, 0777, true));
                }
                file_put_contents(public_path($path), $decodedImage);
                $image->title = $request['title'];
                $image->description = $request['description'];
                $image->image_path = $path;
                $image->save();
                return response()->json(['message' => 'Services Update  Successfully !'], 200);

            }else{
                return response()->json(['message' => 'Failed to Updated Services'], 500);
            }
        }

    }

    public function DeleteSettingService(Request $req){
        $deleteService=Services::find($req['id']);
        $filename = $deleteService->image_path;
        if(file_exists($filename)) {
            unlink($filename);
            $deleteService->delete();
            return response()->json(['message' => 'Services Deleted Successfully !'], 200);
        }else{
            return response()->json(['message' => 'Failed to Delete Successfully !'], 200);
        }
    }
  
}
