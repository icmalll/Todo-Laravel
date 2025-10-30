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
      <?php echo csrf_field(); ?>
      <input name="title" class="flex-grow border p-2 rounded-l" placeholder="Tambah tugas..." required>
      <button class="bg-blue-500 text-white px-4 rounded-r">Tambah</button>
    </form>

    <ul>
      <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="flex justify-between items-center mb-2">
          <form action="/todos/<?php echo e($todo->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <button class="text-left <?php echo e($todo->is_done ? 'line-through text-gray-500' : ''); ?>">
              <?php echo e($todo->title); ?>

            </button>
          </form>
          <form action="/todos/<?php echo e($todo->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="text-red-500">✕</button>
          </form>
        </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
</body>
</html>
<?php /**PATH C:\Coding\todo-laravel\resources\views/todos/index.blade.php ENDPATH**/ ?>