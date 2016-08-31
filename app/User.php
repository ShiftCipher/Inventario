<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'dni', 'email', 'password',
    ];

    /*
    protected $casts = [
       'is_admin' => 'boolean',
       'is_seller' => 'boolean',
    ];
    */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function city_id()
    {
      return $this->city->id;
    }

    public function store()
    {
        return $this->belongsTo(store::class);
    }

    public function store_id()
    {
        return $this->store->id;
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function state_id()
    {
        return $this->state->id;
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function region_id()
    {
        return $this->region->id;
    }

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function comment_id()
    {
        return $this->belongsTo(Comment::class);
    }

    public function issue()
    {
        return $this->hasMany(Issue::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function log()
    {
        return $this->hasMany(Log::class);
    }

    public function rol()
    {
      return $this->belongsTo(Rol::class);
    }

    public function rol_id()
    {
      return $this->rol->id;
    }

    public function rol_name()
    {
      return $this->rol->name;
    }

    public function isUser()
    {
      if ($this->rol_id() == 1)
      {
        return True;
      } else {
        return False;
      }
    }

    public function isBuyer()
    {
      if ($this->rol_id() == 2)
      {
        return True;
      } else {
        return False;
      }
    }

    public function isClient()
    {
      if ($this->rol_id() == 3)
      {
        return True;
      } else {
        return False;
      }
    }

    public function isReseller()
    {
      if ($this->rol_id() == 4)
      {
        return True;
      } else {
        return False;
      }
    }

    public function isSeller()
    {
      if ($this->rol_id() == 5)
      {
        return True;
      } else {
        return False;
      }
    }

    public function isStorer()
    {
      if ($this->rol_id() == 6)
      {
        return True;
      } else {
        return False;
      }
    }

    public function isAdmin()
    {
      if ($this->rol_id() == 7)
      {
        return True;
      } else {
        return False;
      }
    }

}
