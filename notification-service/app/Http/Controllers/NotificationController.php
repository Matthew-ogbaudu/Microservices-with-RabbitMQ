<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function store(Request $request)
    {
        // Store data in a log file
        Log::info('Received notification', $request->all());

        return response()->json(['message' => 'Notification received'], 200);
    }
}
