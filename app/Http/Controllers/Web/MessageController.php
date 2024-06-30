<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MessageModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use File;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Models\Client;
use URL;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Http\JsonResponse;
use Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException;
use Illuminate\Http\UploadedFile;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('client')->check()) {
            $id = Auth::guard('client')->user()->id;
            $List = MessageModel::where('recipient_id', $id)->orderByDesc("created_at")->get();
            $client_url = $this->getclient_url(Auth::guard('client')->user()->user_name);
            return view('site.client.mymessage', ['messages' => $List, "client_url" => $client_url]);
        } else {
            return redirect()->route('login.client');
        }

    }
    public function getclient_url($slug)
    {

        /* Get Base URL using URL Facade */
        $url = URL::to("/");
        $url = $url . '/u' . '/' . $slug;
        /* Get Base URL using url() helper */
        //  $url2 = url('/');
        $href = preg_replace("(^https?://)", "", $url);
        $arr = [
            'href_client' => $href,
            'link_client' => $url,
        ];
        return $arr;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(StoreMessageRequest $request)
    {
        $formdata = $request->all();
        //return (dd( $formdata));
        $validator = Validator::make(
            $formdata,
            $request->rules(),
            $request->messages()
        );
        if ($validator->fails()) {

            return response()->json($validator);

        } else {
            $formdata = $request->fdata;
            $DataArr = [];
           parse_str($formdata, $DataArr);
            if(isset($DataArr['isfile'])){
                //file exist
                $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

                if (!$receiver->isUploaded()) {
                    // file not uploaded
                }
    
                $fileReceived = $receiver->receive(); // receive file
                if ($fileReceived->isFinished()) {
    
                 
                    // file uploading is complete / all chunks are uploaded
                    $file = $fileReceived->getFile(); // get file
                    //convert to array
               
    
                    $content = isset($DataArr['content']) ? $DataArr['content'] : '';
                    $slug = isset($DataArr['slug']) ? $DataArr['slug'] : '';
                    $client = Client::where('user_name', $slug)->first();
                    //  $file_type = isset($DataArr['file_type']) ? $DataArr['file_type'] : 'image';
    
                    $newObj = new MessageModel();             
      if (Auth::guard('client')->check()) {
       $sender_id= Auth::guard('client')->user()->id;
       $newObj->sender_id = $sender_id;
      }
                   
                    $newObj->recipient_id = $client->id;
                    $newObj->content = $content;
                    //$newObj->file = $formdata['file'];
                    $newObj->is_publish = 0;
                    $newObj->is_confirm = 1;
                    $newObj->is_read = 0;
                    $newObj->save();
                    $res = $this->storeImage($file, $newObj->id);
    
                    // delete chunked file
                    unlink($file->getPathname());
                    return [
                     
                        'id' => 1,
                    ];
                }
    
                // otherwise return percentage information
                $handler = $fileReceived->handler();
                return [
                    'done' => $handler->getPercentageDone(),
                    'status' => true
                ];
            }else{
             
//no file
$formdata = $request->all();
 
$content = isset($formdata['content']) ? $formdata['content'] : '';
$slug = isset($formdata['slug']) ? $formdata['slug']: '';
$client = Client::where('user_name', $slug)->first();
//  $file_type = isset($DataArr['file_type']) ? $DataArr['file_type'] : 'image';

$newObj = new MessageModel();             
if (Auth::guard('client')->check()) {
$sender_id= Auth::guard('client')->user()->id;
$newObj->sender_id = $sender_id;
}
$newObj->recipient_id = $client->id;
$newObj->content = $content;
//$newObj->file = $formdata['file'];
$newObj->is_publish = 0;
$newObj->is_confirm = 1;
$newObj->is_read = 0;
$newObj->save();
return response()->json("ok");
            }
           
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        if(Auth::guard('client')->check()){          
            $item = MessageModel::find($id);
          if (!( $item  === null)) {
            //delete image
            $oldimagename =$item->file;
            $strgCtrlr = new StorageController();

            $path ="";
                 //get type
                 if ($item->file_type=='image') {
               
                    $path = $strgCtrlr->path['messages'];
                } else if ($item->file_type=='sound') {
                  
                    $path = $strgCtrlr->soundpath['messages'];
                } else if($item->file_type=='video'){
                   
                    $path = $strgCtrlr->vidpath['messages'];
                }
if( $path !=""){
    Storage::delete("public/" .$path. '/' . $oldimagename);   
}
                  
            MessageModel::find($id)->delete();
          
          }else{
            
          }
        }else{
           
          }
          return redirect()->route('mymessages');

    }
    public function storeImage($file, $id)
    {
        $imagemodel = MessageModel::find($id);
        $oldimage = $imagemodel->file;
        $oldimagename = basename($oldimage);
        $strgCtrlr = new StorageController();
        if ($file !== null) {
            $ext = $file->getClientOriginalExtension();
            $type = '';
            $path ='';
            //get type
            if (in_array(Str::lower($ext), ['png', 'gif', 'jpeg', 'jpg', 'svg', 'webp'])) {
                $type = 'image';
                $path = $strgCtrlr->path['messages'];
            } else if (in_array(Str::lower($ext), ['mp3'])) {
                $type = 'sound';
                $path = $strgCtrlr->soundpath['messages'];
            } else {
                $type = 'video';
                $path = $strgCtrlr->vidpath['messages'];
            }             
            if ($type == 'image') {
               // if (Str::lower($ext) == 'svg') {
                    $filename = rand(10000, 99999) . $id . '.' . $ext;
                    Storage::delete("public/" . $path . '/' . $oldimagename);
                    $path = $file->storeAs($path, $filename, 'public');
                    MessageModel::find($id)->update([
                        "file" => $filename,
                        "file_type" => 'image',
                    ]);

                // } else {
                //     $filename = rand(10000, 99999) . $id . ".webp";
                //     $manager = new ImageManager(new Driver());
                //     $image = $manager->read($file);
                //     $image = $image->toWebp(75);
                //     if (!File::isDirectory(Storage::url('/' . $path))) {
                //         Storage::makeDirectory('public/' . $path);
                //     }
                //     $image->save(storage_path('app/public') . '/' . $path . '/' . $filename);

                //     MessageModel::find($id)->update([
                //         "file" => $filename,
                //         "file_type" => 'image',
                //     ]);
                //     Storage::delete("public/" . $path . '/' . $oldimagename);

                // }

            } else if ($type == 'sound') {
                $filename = rand(10000, 99999) . $id . '.' . $ext;
                Storage::delete("public/" . $path . '/' . $oldimagename);
                $path = $file->storeAs($path, $filename, 'public');
                MessageModel::find($id)->update([
                    "file" => $filename,
                    "file_type" => 'sound',
                ]);

            } else {
                $filename = rand(10000, 99999) . $id . '.' . $ext;
                Storage::delete("public/" . $path . '/' . $oldimagename);
                $path = $file->storeAs($path, $filename, 'public');
                MessageModel::find($id)->update([
                    "file" => $filename,
                    "file_type" => 'video',
                ]);

            }
        }
        return 1;
    }

}
