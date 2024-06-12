<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\MessageSent;
use App\Models\Message; // Agrega la importación del modelo Message
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendMessage;
use Illuminate\Http\JsonResponse;


class ChatController extends Controller
{

    public function showChat(Request $request)
    {
        // Obtener usuarios con sus asignaturas
        $query = User::with('subjects');
    
        // Filtrar por rol si se proporciona un valor en la solicitud
        if ($request->filled('role_filter')) {
            $query->where('rol', $request->role_filter);
        }
    
        // Buscar por nombre si se proporciona un valor en la solicitud
        if ($request->filled('name_search')) {
            $query->where('name', 'like', '%' . $request->name_search . '%');
        }
    
        // Obtener el número de resultados por página (10 por defecto)
        $perPage = $request->input('perPage', 10);
    
        // Obtener usuarios paginados
        $users = $query->paginate($perPage);
    
        // Devolver la vista con los usuarios y sus asignaturas
        return view('chat.chatlist', ['users' => $users]);
    }
    

public function showConversation($userId)
    {
    
    $selectedUser = User::findOrFail($userId);

    // Pasar el usuario y su nombre a la vista
    return view('chat.home', ['selectedUser' => $selectedUser]);
    }

    public function messages(): JsonResponse {
        $messages = Message::with('user')->get()->append('time');
            error_log('pasacontrolador');
        return response()->json($messages);
    }


    public function message(Request $request): JsonResponse {
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



    public function sendMessage(Request $request)
    {
        
        $request->validate([
            'message' => 'required|string',
        ]);
        
        // Obtén al usuario autenticado
        $user = Auth::user();
        $messageContent = $request->message;

        // Crea un nuevo mensaje y guárdalo en la base de datos
        $message = new Message();
        $message->user_id = $user->id;
        $message->content = $messageContent;
        $message->save();

        // Emite el evento
        event(new MessageSent($user, $messageContent));

        return response()->json(['status' => 'Message Sent!']);
    }
}
