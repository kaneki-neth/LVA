<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Student extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = ['id'];

    protected $appends = ['full_name'];

    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at', 'deleted_at'];

    public function studentRemark()
    {
        return $this->belongsTo(StudentRemark::class);
    }

    public function guardians()
    {
        return $this->belongsToMany(Guardian::class)
            ->withPivot('relationship');
    }

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = str_replace(' ', '', strtolower($value));
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtoupper($value);
    }

    public function getFullNameAttribute()
    {
        $middleName = ($this->attributes['middle_name'] !== null) ? ", {$this->attributes['middle_name']}" : '';
        $suffix = ($this->attributes['suffix'] !== null) ? ", {$this->attributes['suffix']}" : '';
        return "{$this->attributes['last_name']}, {$this->attributes['first_name']}".$middleName.$suffix;
    }
}