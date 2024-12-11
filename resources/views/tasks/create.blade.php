<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #a0aec0; 
        }
    </style>
</head>
<body class="text-gray-800 flex items-center justify-center min-h-screen">

    <div class="bg-white w-full max-w-3xl p-8 shadow-2xl rounded-xl transform hover:scale-105 transition-all duration-300 ease-in-out">
        <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">Crear Nueva Tarea</h1>
        
        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="title" class="block text-2xl font-medium text-gray-700">Título de la tarea:</label>
                <input type="text" name="title" required class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-xl" />
            </div>

            <div>
                <label for="description" class="block text-2xl font-medium text-gray-700">Descripción:</label>
                <textarea name="description" class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-xl" rows="4"></textarea>
            </div>

            <div>
                <label for="due_date" class="block text-2xl font-medium text-gray-700">Fecha de Entrega:</label>
                <input type="date" name="due_date" required class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-xl" />
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 text-2xl transition-all duration-300">Crear Tarea</button>
        </form>
        
        <a href="{{ route('tasks.index') }}" class="inline-block mt-6 text-blue-500 hover:text-blue-700 text-center text-xl">Volver a la lista de tareas</a>
    </div>

</body>
</html>
