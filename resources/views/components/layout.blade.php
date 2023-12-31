<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <title>Document</title>
</head>
<style>
  *{
    transition: display 5000ms;
  }
</style>
<body class="bg-gray-300 px-10 ">
  <div class="pt-5 flex justify-between font-bold text-lg">
    <a href="/">BACK TO HOME</a>
    <a href="/admin/post/create">Create Post</a>
  </div>

  <x-nav></x-nav>

  {{ $slot }}

</body>

</html>
