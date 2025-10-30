<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To-Do List</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
  <div class="bg-white p-6 rounded-xl shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold mb-4">📝 To-Do List</h1>

    <form action="/todos" method="POST" class="flex mb-4">
      @csrf
      <input name="title" class="flex-grow border p-2 rounded-l" placeholder="Tambah tugas..." required>
      <button class="bg-blue-500 text-white px-4 rounded-r">Tambah</button>
    </form>

    <ul>
      @foreach ($todos as $todo)
        <li class="flex justify-between items-center mb-2">
          <form action="/todos/{{ $todo->id }}" method="POST">
            @csrf
            @method('PATCH')
            <button class="text-left {{ $todo->is_done ? 'line-through text-gray-500' : '' }}">
              {{ $todo->title }}
            </button>
          </form>
          <form action="/todos/{{ $todo->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="text-red-500">✕</button>
          </form>
        </li>
      @endforeach
    </ul>
  </div>
</body>
</html>
