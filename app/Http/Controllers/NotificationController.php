<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    // Method to create a new notification
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'message' => 'required|string|max:255',
            'type' => 'required|string|max:50',
        ]);

        try {
            $notification = new Notification();
            $notification->student_id = $request->input('student_id');
            $notification->message = $request->input('message');
            $notification->type = $request->input('type');
            $notification->created_at = now();
            $notification->save();

            return response()->json(['message' => 'Notification created successfully.', 'notification' => $notification], 201);
        } catch (\Exception $e) {
            Log::error('Error creating notification: ' . $e->getMessage());
            return response()->json(['error' => 'Error creating notification'], 500);
        }
    }

    // Method to mark a notification as read
    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        if (!$notification) {
            return response()->json(['error' => 'Notification not found.'], 404);
        }

        $notification->read = true;
        $notification->save();

        return response()->json(['message' => 'Notification marked as read.']);
    }

    // Method to get all notifications
    public function index()
    {
        try {
            $notifications = Notification::all();
            return response()->json($notifications, 200);
        } catch (\Exception $e) {
            Log::error('Error fetching notifications: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching notifications'], 500);
        }
    }

    public function getAllNotifications()
{
    try {
        $notifications = \App\Models\Notification::latest()->get(); // Get all notifications
        return response()->json($notifications);
    } catch (\Exception $e) {
        Log::error('Error fetching notifications: ' . $e->getMessage());
        return response()->json(['error' => 'Error fetching notifications'], 500);
    }
}

    // Method to delete a notification
    public function destroy($id)
    {
        $notification = Notification::find($id);
        if (!$notification) {
            return response()->json(['error' => 'Notification not found.'], 404);
        }
    
        $notification->delete();
    
        return response()->json(['message' => 'Notification deleted successfully.']);
    }
    
}
