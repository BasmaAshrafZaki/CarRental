<?php

namespace App\Models;
use App\Models\ContactUs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ContactUs extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [

        
        'firstName',
       'lastName',
       'message',
       'email',
 

  
  ];
}
