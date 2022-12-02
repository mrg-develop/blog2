<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    use HasFactory;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true //cuando exista un update, se actualice el slug
            ]
        ];
    }

    public function user() {
       return $this->belongsTo(User::class);
    }

    public function getGetExcerptAttribute() {
        return substr($this->body, 0, 140);
    }

    public function getGetImageAttribute() {
        if ($this->image){
            return url("storage/$this->image");
        }
        
        return substr($this->body, 0, 140);
    }

     protected $fillable = ['user_id', 'title', 'body', 'image', 'iframe'];
}
