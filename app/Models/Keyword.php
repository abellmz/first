<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = ['key','rule_id'];
    public function rule(){
        return $this->belongsTo(Rule::class);
    }
}
