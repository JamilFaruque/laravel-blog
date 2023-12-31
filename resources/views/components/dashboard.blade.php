@props(['heading'])

<x-layout>
  <main class="w-4/5 mx-auto">
    <h1 class="text-2xl font-bold border-b border-gray-500 pb-3">{{$heading}}</h1>

    <div class="flex mt-2">
      <div class="w-44">
        <h1 class="text-xl font-semibold pb-5">Links</h1>

        <div>
          <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500 font-semibold' : '' }}"> All Posts </a>
        </div>

        <div>
          <a href="/admin/post/create" class="{{ request()->is('admin/post/create') ? 'text-blue-500 font-semibold' : '' }}">Create Post</a>
        </div>

      </div>

    {{ $slot }}

    </div>
  </main>
</x-layout>
