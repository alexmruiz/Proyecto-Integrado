<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\EventCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    public function show($id)
    {
        // Muestra los eventos de un profesor específico y los formatea para la vista del calendario
        $teacher = User::findOrFail($id);
        $events = Event::where('user_id', $teacher->id)->get();

        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        });

        return view('dashboard.calendarTeacher', compact('formattedEvents', 'teacher'));
    }

    public function index()
    {
        // Recupera y formatea los eventos del usuario autenticado
        $userId = Auth::id();
        $events = Event::where('user_id', $userId)->get();

        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        });

        return view('dashboard.calendar', compact('formattedEvents'));
    }

    public function store(Request $request)
    {
        // Valida y almacena un nuevo evento, luego notifica al usuario por correo
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $event = new Event();
        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->start_date = $validatedData['start_date'];
        $event->end_date = $validatedData['end_date'];
        $event->user_id = auth()->id();
        $event->save();

        $formattedEvent = [
            'id' => $event->id,
            'title' => $event->title,
            'description' => $event->description,
            'start' => $event->start_date,
            'end' => $event->end_date,
        ];

        Log::debug('Datos del evento creado: ', $formattedEvent);
        Mail::to(auth()->user()->email)->send(new EventCreated($formattedEvent));

        return response()->json(['message' => 'Evento creado correctamente', 'event' => $formattedEvent]);
    }

    public function update(Request $request, $eventId)
    {
        // Actualiza un evento existente si existe, de lo contrario, devuelve una respuesta de error
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $event = Event::find($eventId);

        if (!$event) {
            return response()->json(['error' => 'Evento no encontrado'], 404);
        }

        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->start_date = $validatedData['start_date'];
        $event->end_date = $validatedData['end_date'];
        $event->save();

        $formattedEvent = [
            'id' => $event->id,
            'title' => $event->title,
            'description' => $event->description,
            'start' => $event->start_date,
            'end' => $event->end_date,
        ];

        return response()->json(['message' => 'Evento actualizado correctamente', 'event' => $formattedEvent]);
    }

    public function delete($eventId)
    {
        // Elimina un evento si existe y devuelve una respuesta apropiada
        $event = Event::find($eventId);

        if (!$event) {
            return response()->json(['error' => 'Evento no encontrado'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Evento eliminado correctamente']);
    }
}
