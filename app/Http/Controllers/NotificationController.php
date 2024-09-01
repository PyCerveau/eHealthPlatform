<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return Notification::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
            'notification_date' => 'required|date',
        ]);

        $notification = Notification::create($request->all());

        return response()->json($notification, 201);
    }

    public function show(Notification $notification)
    {
        return $notification;
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'message' => 'sometimes|string',
            'notification_date' => 'sometimes|date',
        ]);

        $notification->update($request->all());

        return response()->json($notification);
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return response()->json(null, 204);
    }
}
