<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;">
    <h2>¿Estás seguro de que deseas cerrar sesión?</h2>
    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Sí, cerrar sesión</button>
    </form>
</div>