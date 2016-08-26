<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  protected $fillable = [
      'name', 'telephone', 'adress',
  ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function name_id()
    {
      return Provider::lists('name', 'id');
    }
}
