<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;

    protected $fillable=['user_id','announce_id','nb_places'];

    public function announce(){
        // return $this->belongsTo(Announce::class);
        return $this->belongsTo(Announce::class, 'announce_id');

    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
