<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_id',
        'title',
        'description',
        'address',
        'no_of_vacancy',
        'roles',
        'last_date',
        'position',
        'slug',
        'category_id',
        'type',
        'status',
        'experience_year',
        'salary',
        'gender'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkApplication() {
        return DB::table('job_user')->where('user_id', auth()->user()->id)->where('job_id',$this->id)->exists();
    }

    public function favourites() {
        return $this->belongsToMany(Job::class,'favourites','job_id','user_id')->withTimestamps();
    }

    public function checkSaved() {
        return DB::table('favourites')->where('user_id', auth()->user()->id)->where('job_id',$this->id)->exists();
    }
}

