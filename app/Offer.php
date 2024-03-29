<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    const OFERTA_ACTIVA = 'A';
    const OFERTA_CADUCADA = 'C';

    protected $table = 'offers';

    protected $fillable = [
        'title',
        'estado',
        'expiration_date',
        'description',
        'salary',
        'address'
    ];

    public function isExpired() {
        return $this->expiration_date == Offer::OFERTA_CADUCADA;
    }

    public function questions() {
        return $this->hasMany('App\Question');
    }

    public function students() {
        return $this->belongsToMany('App\Student');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function company() {
        return $this->belongsTo('App\Company', 'company_id');
    }    

}
