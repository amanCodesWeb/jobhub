<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Job extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'job_listings';
    protected $fillable = ['title', 'company_name', 'category_id', 'salary', 'description', 'location'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
