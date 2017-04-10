<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo User
     */
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
