<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 flex items-center justify-center min-h-screen">
    <div class="bg-gray-300 w-full max-w-lg p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-5xl font-bold mb-6 text-center">Lista de Tareas</h1>

        @if(session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tasks.create') }}" class="block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 text-center mb-4 text-xl">
            Agregar Nueva Tarea
        </a>
        
        <div class="overflow-hidden">
            <ul class="divide-y divide-gray-200">
                @foreach($tasks as $task)
                    <li class="flex flex-col py-4 px-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="mr-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="checkbox" name="completed" value="1" {{ $task->completed ? 'checked' : '' }} onchange="this.form.submit()" class="form-checkbox h-6 w-6 text-blue-600">
                                </form>
                                <span class="font-medium text-2xl {{ $task->completed ? 'line-through text-gray-400' : 'text-gray-800' }}">{{ $task->title }}</span>
                            </div>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-4 text-lg">Eliminar</button>
                            </form>
                        </div>
                        <span class="text-gray-500 text-lg mt-1">{{ $task->description }}</span>
                        <div class="flex justify-between mt-2">
                            <span class="text-gray-500 text-lg">Fecha de Entrega: {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : 'Sin fecha' }}</span>
                            <span class="text-gray-500 text-lg">{{ $task->completed ? 'Completa' : 'Incompleta' }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script>
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 2000);
        }
    </script>
</body>
</html>
