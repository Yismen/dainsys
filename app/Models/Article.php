<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    /**
     * Sluggable implementation
     */
    use Sluggable;

    // public $appends = ['next_article', 'previous_article'];

    /**
     * List of fields that can be updated/from a form
     *
     * @fillable [array]
     */
    protected $fillable = ['username', 'title', 'body', 'excert', 'main_image', 'published_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title'],
                'onUpdate' => true,
            ],
        ];
    }
    /**
     * Set the title field to be always in propper case
     *
     * @param [attribute] $title [description]
     */
    protected function title(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($title) {
            return ['title' => trim(ucwords($title))];
        });
    }
    /**
     * Get a list os the taks ids associated with current article
     *
     * @return [array] [description]
     */
    protected function tagList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            return $this->tags->pluck('id');
        });
    }
    /**
     * set the body field to be always Uc First
     *
     * @param [string] $body [the body attrbute]
     */
    protected function body(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($body) {
            return ['body' => ucfirst(trim($body))];
        });
    }
    protected function username(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function () {
            return ['username' => auth()->user()->username];
        });
    }
    /**
     * Parse the published at date returned to the user
     *
     * @param [string] $date
     */
    protected function publishedAt(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function ($date) {
            return Carbon::parse($date);
        }, set: function ($date) {
            $format = 'Y-m-d';
            $date = Carbon::parse($date)->format($format);
            return ['published_at' => Carbon::createFromFormat($format, $date)];
        });
    }
    protected function next(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            $article = $this->orderBy('published_at', 'ASC')
                // ->orderBy('id', 'DESC')
                ->where('published_at', '>', $this->published_at)
                ->published()
                ->get()->first();
            return $article ? $article : null;
        });
    }
    protected function previous(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            $article = $this->orderBy('published_at', 'DESC')
                // ->orderBy('id', 'DESC')
                ->where('published_at', '<', $this->published_at)
                ->published()
                ->first();
            return $article ? $article : null;
        });
    }

    /**
     * Defines a scope to filter the ithems with a published at date prior to current date
     *
     * @param  [object] $query [query builder]
     *
     * @return [object]        [query builder]
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Defines a scope to filter the ithems with a published at date after current date
     *
     * @param  [object] $query [query builder]
     *
     * @return [object]        [query builder]
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }

    /**
     * Defines a scope to sort the items ascendently by Published at field
     *
     * @param  [object] $query [query builder]
     *
     * @return [object]        [query builder]
     */
    public function scopeOrderedAsc($query)
    {
        $query->orderBy('published_at', 'DESC')->orderBy('id', 'DESC');
    }

    /**
     * Defines a scope to sort the items ascendently by Published at field
     *
     * @param  [object] $query [query builder]
     *
     * @return [object]        [query builder]
     */
    public function scopeOrderedDesc($query)
    {
        $query->orderBy('published_at', 'DESC');
    }

    /**
     * Users who published the articles
     *
     * @return [collection] [the users who published the articles]
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'username', 'username');
    }

    /**
     * Current article is published by a user
     *
     * @return [collection] [description]
     */
    public function publisher()
    {
        return $this->belongsTo('App\Models\User', 'username', 'username');
    }

    /**
     * Add comments to the colection
     *
     * @return [colection] [all the comments that belongs to the current article]
     */
    public function comments()
    {
        return $this->hasMany('App\Models\BComment');
    }

    /**
     * get the list of tags that owns each article
     *
     * @return [objet] [tags object]
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
    protected function nextArticle(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            return $this->attributes['next_article'] = $this->next;
        });
    }
    protected function previousArticle(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            return $this->attributes['previous_article'] = $this->previous;
        });
    }
    /**
     * Additional dates field to be treated as an instance of Carbon
     *
     * @dates [array]
     */
    protected function casts(): array
    {
        return [
        'tpublished_at' => 'datetime',
    ];
    }
}
