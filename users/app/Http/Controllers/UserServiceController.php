<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Userservice;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use App\Events\Usercreate;
use App\Jobs\SendUserDataToRabbitMQ;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;



class UserServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'email' => 'required|email|unique:usersservice|string|max:255',
             'firstName' => 'required|string|max:255',
             'lastName' => 'required|string|max:255',
         ]);

         $userData = Userservice::create($validatedData);
         $userDataWithoutId = collect($userData->toArray())->except('id')->toArray();
         SendUserDataToRabbitMQ::dispatch($userDataWithoutId);

        //  dd($test);
         //run


         return response()->json(['message' => 'User created successfully'], 201);
     }


    // }
}
