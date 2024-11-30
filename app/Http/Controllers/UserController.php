<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;
use App\Models\Subject;
use App\Models\Event;

class UserController extends Controller
{
    public function showlanding()
    {
        return view('landing_page');
    }

    public function showlogin()
    {

        return view('login.login');
    }

    public function showIndexTeacher()
    {

        return view('dashboard.indexTeacher');
    }

   

    public function login(Request $request)
    {
        // Comprobamos que el email y la contraseña han sido introducidos
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        // Almacenamos las credenciales de email y contraseña
        $credentials = $request->only('email', 'password');
    
        // Si el usuario existe lo logamos y lo redirigimos según su rol
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Obtener el usuario autenticado
    
            // Verificar el rol del usuario y redirigirlo
            if ($user->rol === 'teacher') {
                // Obtener todos los profesores
                $teachers = User::where('rol', 'teacher')->get();
    
                // Redirigir a la vista del panel de control del profesor y pasar los datos de los profesores
                return view('dashboard.indexTeacher')->with('teachers', $teachers);
            } else {
                // Si es estudiante, redirigir a la vista de estudiante
                return redirect()->route('home');
            }
        }
    
        // Si el usuario no existe o las credenciales son incorrectas, volver al formulario de inicio de sesión con un mensaje de error
        return redirect("/log")->withSuccess('Los datos introducidos no son correctos');
    }

    public function logados()
    {
        if (Auth::check()) {

            $teachers = User::where('rol', 'teacher')->get();
            return view('dashboard.index')->with('teachers', $teachers);
        }

        return redirect("/log")->withSuccess('No tienes acceso, por favor inicia sesión');
    }

    public function showregistro()
    {
        $subjects = Subject::all();
        return view('login.registro', compact('subjects'));
    }




    public function formularioRecuperarContrasenia($token)
    {
        return view('login.recuperar', ['token' => $token]);
    }


    public function registerUser(Request $request)//Funcíon para el registro de usuarios
{
    // Validación de los datos de entrada
    $request->validate([
        'name' => ['required', 'string', 'max:255'], // El nombre es obligatorio, debe ser una cadena de texto y no puede exceder 255 caracteres
        'email' => ['required', 'email', 'unique:users,email', 'max:250'], // El email es obligatorio, debe ser un email válido, único en la tabla 'users' 
        //y no puede exceder 250 caracteres
        'password' => ['required', 'min:8', 'confirmed'], // La contraseña es obligatoria, debe tener al menos 8 caracteres y debe ser confirmada 
        //(debe coincidir con el campo de confirmación de contraseña)
        'rol' => ['required', 'in:student,teacher'], // El rol es obligatorio y debe ser uno de los valores permitidos ('student' o 'teacher')
    ]);
    // Crear el usuario en la base de datos
    $user = User::create([
        'name' => $request->name, // Asignar el nombre proporcionado en la solicitud
        'email' => $request->email, // Asignar el email proporcionado en la solicitud
        'password' => bcrypt($request->password), // Encriptar la contraseña antes de guardarla
        'rol' => $request->rol, // Asignar el rol proporcionado en la solicitud
    ]);
    // Si el rol es 'teacher', asignar las asignaturas
    if ($request->rol == 'teacher' && $request->has('asignaturas')) {
        // Iterar sobre los IDs de las asignaturas proporcionadas
        foreach ($request->asignaturas as $subjectId) {
            $subject = Subject::find($subjectId); // Buscar la asignatura por su ID
            if ($subject) {
                // Si la asignatura existe, relacionarla con el usuario en la tabla pivote
                $user->subjects()->attach($subjectId);
            }
        }
    }

    // Redirigir al usuario a la ruta "/log" con un mensaje de éxito
    return redirect("/log")->withSuccess('Usuario registrado con éxito');
}

    public function showreset()
    {

        return view('login.reset');
    }


    public function showrecuperar(Request $request, $token = null)
    {
        return view('login.recuperar')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


    public function enviarRecuperarContrasenia(Request $request)
    {
        // Validación del email
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // Generamos un token único
        $token = Str::random(64);

        // Eliminamos la anterior reseteo de contraseña sin terminar
        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        // Creamos la solicitud de reseteo de contraseña
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        // Enviamos el email de recuperación de contraseña
        Mail::send('login.email', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Recuperar Contraseña');
        });

        return back()->with('message', 'Te hemos enviado un email con las instrucciones para que recuperes tu contraseña');
    }

    public function actualizarContrasenia(Request $request)
    {
        // Validaciones
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        // Obtenemos el registro que contiene la solicitud de reseteo de contraseña
        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        // Si no existe la solicitud devolvemos un error
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Token inválido');
        }

        // Actualizamos la contraseña del usuario
        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);


        // Eliminamos la solicitud
        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        // Devolvemos al formulario de login (devolvera un 404 puesto que no existe la ruta)
        return redirect('/log')->with('message', 'Tu contraseña se ha cambiado correctamente');
    }

    public function showProfile()
    {
        return view('dashboard.profile');
    }

    public function updateProfile(Request $request)
    {

        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {

            $profile_picture = $request->file('profile_picture');

            $imageName = rand() . '_' . $profile_picture->getClientOriginalName();

            $profile_picture->move(public_path('uploads'), $imageName);

            $path = "/uploads/" . $imageName;

            $user->profile_picture = $path;


            $user->save();

            return redirect()->back()->with('success', 'Foto de perfil actualizada correctamente');
        }
    }

    public function logout()
    {
        
        return view('dashboard.logout');
    }

    public function userlogout()
{
    Auth::logout();
    return view('login.login');

}

public function searchTeachers(Request $request) {
    $request->validate([
        'name' => 'nullable|string|max:255',
        'subject' => 'nullable|string|max:255',
        'level' => 'nullable|string|max:255',
        'date' => 'nullable|date_format:Y-m-d',
        'time' => 'nullable|date_format:H:i',
    ]);

    $teachers = User::where('rol', 'teacher');

    // Filtrar por nombre
    if ($request->filled('name')) {
        $teachers->where('id', $request->name);
    }

    // Filtrar por asignatura
    if ($request->filled('subject')) {
        $teachers->whereHas('subjects', function($query) use ($request) {
            $query->where('id', $request->subject);
        });
    }

    // Filtrar por nivel
    if ($request->filled('level')) {
        $teachers->whereHas('subjects', function($query) use ($request) {
            $query->where('level', $request->level);
        });
    }

    // Filtrar por disponibilidad (fecha y hora)
    if ($request->filled(['date', 'time'])) {
        try {
            $dateTime = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->time);
            $busyTeacherIds = Event::where('start_date', '<=', $dateTime)
                                    ->where('end_date', '>=', $dateTime)
                                    ->pluck('user_id');

            $teachers->whereNotIn('id', $busyTeacherIds);
        } catch (\Exception $e) {
            
        }
    }

    $perPage = $request->input('perPage', 10);
    $teachers = $teachers->paginate($perPage);

    $data = [
        'teachers' => $teachers,
        'users' => User::where('rol', 'teacher')->get(),
        'subjects' => Subject::all(),
        'levels' => Subject::distinct()->pluck('level')->all(),
    ];

    return view('dashboard.indexSearch', $data);
}



}