<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    protected $table = 'item';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','codigo','borrado'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
