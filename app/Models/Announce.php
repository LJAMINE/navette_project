<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    /** @use HasFactory<\Database\Factories\AnnounceFactory> */
    use HasFactory;

    protected $fillable = [
        'title','content','status','user_id','status','nb_place','description','date_debut','date_fin','heure_debut','heure_fin'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
     
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
