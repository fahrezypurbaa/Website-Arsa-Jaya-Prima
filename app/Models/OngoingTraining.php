<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use function Laravel\Prompts\password;

class OngoingTraining extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=['id'];
    protected $with=['training'];
    protected $fillable=['name','image','image_gallery','platform','jumlah_peserta','start_date','end_date','training_id','password'];
    public function training(){
        return $this->belongsTo(Training::class,'training_id');
    }
}
