<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['date', 'first_condition', 'first_content', 'second_condition', 'second_content', 'full_body', 'selfcare'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
