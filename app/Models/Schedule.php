<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['start_date', 'end_date', 'training_id'];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}