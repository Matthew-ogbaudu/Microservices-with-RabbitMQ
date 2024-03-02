<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Userservice extends Model
{
    use HasFactory;
    // use CanDeclareQueue;
    public $timestamps = false;
    protected $table = 'usersservice';
    protected $connection = 'mysql';


    protected $fillable=['email','firstName','lastName'];


}
