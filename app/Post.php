<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    protected $guarded = array('_token', 'tags');

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {

    }

    /**
     * Many to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function tags()
    {

    }

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comments()
    {

    }

}