<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Http\Controllers\Web\StorageController;
class MessageModel extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = [
        'sender_id',
        'recipient_id',
        'content',
        'file',
        'is_publish',
        'is_confirm',
        'is_read',
        'file_type',

    ];
    protected $appends= ['file_path'];
    public function getFilePathAttribute(){
        $conv="";
        $strgCtrlr = new StorageController(); 
        if(is_null($this->file_type) ){
             
        }else if($this->file_type==''){
            
        } else {
            $url = $strgCtrlr->MessagePath($this->file_type);
            $conv =  $url.$this->file;
         
        }         
            return  $conv;
     }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'sender_id')->withDefault();
    }
    public function recipient(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'recipient_id')->withDefault();
    }
}
