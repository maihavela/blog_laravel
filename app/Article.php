<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	/********1. prevent from massive assigment******/
	protected  $fillable = [
		'title',
		'body',
		'published_at',
		'user_id' //temporary
	];
	/******2. Manejar la fecha como
	 * articles->created_at->format('Y-m');
	 */
	/* protected $dates = [
		 'published_at'
	 ]; */
	
	/*******3. QUERY SCOPES*******/
	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}
	/****OTRA OPCION QUE HACE LO MISMO QUE ARRIBA
	 * 	public function scopePublished($query, $value)
	{
		Article::published($value);
	}
	 */
	public function scopeunPublished($query)
	{
		$query->where('published_at', '>', Carbon::now());
	}
	/*****
	 * 
	 * 4. set +name of the property + the word Attribute
	 */
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::parse($date);
	}
	/**
	 * An article is owned by a user
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	
	/*****5. RELATIONS SHIPS *
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo***/
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	/**
	 * Get the tag associated with the given article.
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	/**
	 * If you want your pivot table to have automatically maintained created_at and updated_at timestamps, 
	 * use the withTimestamps method on the relationship definition:
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'tag_id', 'article_id', 'article_tag')->withTimestamps(); 
		
	}
}
