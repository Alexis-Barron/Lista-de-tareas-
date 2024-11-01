<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 flex items-center justify-center min-h-screen">
    <div class="bg-gray-300 w-full max-w-lg p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-5xl font-bold mb-6 text-center">Crear Nueva Tarea</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="title" class="block text-2xl font-medium text-gray-700">Título de la tarea:</label>
                <input type="text" name="title" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-xl" />
            </div>
            <div>
                <label for="description" class="block text-xl font-medium text-gray-700">Descripción:</label>
                <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-xl" rows="3"></textarea>
            </div>
            <div>
                <label for="due_date" class="block text-xl font-medium text-gray-700">Fecha de Entrega:</label>
                <input type="date" name="due_date" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-xl" />
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 text-2xl">Crear Tarea</button>
        </form>
        <a href="{{ route('tasks.index') }}" class="inline-block mt-4 text-blue-500 hover:text-blue-700 text-center text-xl">Volver a la lista de tareas</a>
    </div>
</body>
</html>
