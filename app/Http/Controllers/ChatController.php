<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\MessageSent;
use App\Models\Message; 
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendMessage;
use Illuminate\Http\JsonResponse;

class ChatController extends Controller
{
    // Muestra la lista de usuarios filtrados por rol o nombre, y paginados
    public function showChat(Request $request)
    {
        $query = User::with('subjects');
    
        if ($request->filled('role_filter')) {
            $query->where('rol', $request->role_filter);
        }
    
        if ($request->filled('name_search')) {
            $query->where('name', 'like', '%' . $request->name_search . '%');
        }
    
        $perPage = $request->input('perPage', 10);
        $users = $query->paginate($perPage);
    
        return view('chat.chatlist', ['users' => $users]);
    }

    // Muestra la conversación con un usuario seleccionado
    public function showConversation($userId)
    {
        $selectedUser = User::findOrFail($userId);
        return view('chat.home', ['selectedUser' => $selectedUser]);
    }

    // Devuelve todos los mensajes con su usuario relacionado en formato JSON
    public function messages(): JsonResponse 
    {
        $messages = Message::with('user')->get()->append('time');
        error_log('pasacontrolador');
        return response()->json($messages);
    }

    // Crea un mensaje y despacha un trabajo para procesarlo
    public function message(Request $request): JsonResponse 
    {
        $message = Message::create([
            'user_id' => auth()->id(),
            'text' => $request->get('text'),
        ]);
        SendMessage::dispatch($message);
        error_log('controlador');
        return response()->json([
            'success' => true,
            'message' => "Message created and job dispatched.",
        ]);
    }

    // Valida, guarda el mensaje y emite un evento para enviarlo
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);
        
        $user = Auth::user();
        $messageContent = $request->message;

        $message = new Message();
        $message->user_id = $user->id;
        $message->content = $messageContent;
        $message->save();

        event(new MessageSent($user, $messageContent));

        return response()->json(['status' => 'Message Sent!']);
    }
}
