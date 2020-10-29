<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'published_at', 'category_id', 'content', 'amount_viewer', 'video_link', 'user_id', 'status'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function articlePhoto()
    {
        return $this->hasMany('App\Models\ArticlePhoto', 'article_id');
    }

    // has one
    public function articlePhotoHasOne()
    {
        return $this->hasOne('App\Models\ArticlePhoto', 'article_id');
    }

    public function articlePhotoFisrt()
    {
        return $this->hasMany('App\Models\ArticlePhoto', 'article_id');
    }
    public function articleWriter()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
