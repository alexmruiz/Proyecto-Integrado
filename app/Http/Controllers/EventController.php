<?php

namespace App\Http\Controllers;

use App\Models\Event; // Importamos el modelo Event que representa la tabla de eventos en la base de datos
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
        // Encuentra al profesor por ID
        $teacher = User::findOrFail($id);

        // Obtén solo los eventos asociados al profesor
        $events = Event::where('user_id', $teacher->id)->get();

        // Formatea los eventos según tus necesidades
        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        });

        // Envía los eventos formateados a la vista
        return view('dashboard.calendarTeacher', compact('formattedEvents', 'teacher'));
    }

    public function index()
    {
        
        // Obtiene el ID del usuario autenticado
        $userId = Auth::id();
    
        // Obtén solo los eventos asociados al ID del usuario autenticado
        $events = Event::where('user_id', $userId)->get();
    
        // Formatea los eventos según tus necesidades
        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        });
    
        // Envía los eventos a la vista
        return view('dashboard.calendar', compact('formattedEvents'));
    }



    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Crear un nuevo evento con los datos validados
        $event = new Event();
        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->start_date = $validatedData['start_date'];
        $event->end_date = $validatedData['end_date'];
        $event->user_id = auth()->id(); // Obtiene el ID del usuario autenticado
        $event->save();
        
        $formattedEvent = [
            'id' => $event->id,
            'title' => $event->title,
            'description' => $event->description,
            'start' => $event->start_date,
            'end' => $event->end_date,
        ];

       // Escribir datos de depuración en el archivo de registro
    Log::debug('Datos del evento creado: ', $formattedEvent);

    // Enviar el correo electrónico al usuario
    Mail::to(auth()->user()->email)->send(new EventCreated($formattedEvent));

        return response()->json(['message' => 'Evento actualizado correctamente', 'event' => $formattedEvent]);
    }

    public function update(Request $request, $eventId)
    {
        // Validar y actualizar el evento en la base de datos usando $eventId y los datos de $request

        // Paso 1: Validar los datos recibidos en la solicitud
        $validatedData = $request->validate([
            'title' => 'required|string|max:255', // El título es obligatorio y debe ser una cadena de máximo 255 caracteres
            'description' => 'nullable|string', // La descripción es opcional y debe ser una cadena
            'start_date' => 'required|date', // La fecha de inicio es obligatoria y debe ser una fecha válida
            'end_date' => 'required|date|after_or_equal:start_date', // La fecha de fin es obligatoria, debe ser una fecha válida y posterior o igual a la fecha de inicio
        ]);

        // Paso 2: Obtener el evento de la base de datos utilizando el $eventId
        $event = Event::find($eventId);

        // Paso 3: Verificar si se encontró el evento
        if (!$event) {
            // Si no se encuentra el evento, devolver un mensaje de error
            return response()->json(['error' => 'Evento no encontrado'], 404);
        }

        // Paso 4: Actualizar los datos del evento con los datos validados de la solicitud
        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->start_date = $validatedData['start_date'];
        $event->end_date = $validatedData['end_date'];

        // Paso 5: Guardar los cambios en la base de datos
        $event->save();

        $formattedEvent = [
            'id' => $event->id,
            'title' => $event->title,
            'description' => $event->description,
            'start' => $event->start_date,
            'end' => $event->end_date,
        ];
        // Paso 6: Retornar una respuesta JSON indicando que el evento fue actualizado correctamente
        // Paso 7: Retornar una respuesta JSON indicando que el evento fue actualizado correctamente
        return response()->json(['message' => 'Evento actualizado correctamente', 'event' => $formattedEvent]);
    }

    /**
     * Remove the specified resource from storage.
     * Elimina un evento existente de la base de datos.
     */
    public function delete($eventId)
    {
        // Encuentra el evento por su ID
        $event = Event::find($eventId);

        // Verifica si el evento existe
        if (!$event) {
            // Si el evento no existe, devuelve un mensaje de error
            return response()->json(['error' => 'Evento no encontrado'], 404);
        }

        // Elimina el evento de la base de datos
        $event->delete();

        // Devuelve una respuesta JSON indicando que el evento fue eliminado correctamente
        return response()->json(['message' => 'Evento eliminado correctamente']);
    }
}
