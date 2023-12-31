@guest
<nav class="space-x-5 text-center mt-5">
  <a href="/login" class="font-bold">Login</a>
  <a href="/register" class="font-bold">Register</a>
</nav>
@else
<p class="text-center font-semibold text-lg">
  Welcome, {{ auth()->user()->name }}
</p>

<div x-data="{open : false}" @click.away="open = false" class="list-none mt-5 mx-auto relative text-center w-1/3 mb-5">
  <x-button @click="open = !open" class="font-normal px-1 py-1"> Menu </x-button>

  <div style="display: none;" x-show="open" class="-translate-x-1/2 z-10 absolute bg-gray-600 font-semibold left-1/2 mt-2 px-10 py-2 rounded shadow-xl text-white">
    <li><a href="/" class="{{ request()->is('/') ? 'text-blue-500' : '' }}">Home</a></li>
  
    @admin
      <li><a href="/admin/posts" class="{{request()->is('admin/posts') ? 'text-blue-500' : ''}}">Dashboard</a></li>
      <li>
        <a href="/admin/post/create" class="{{ request()->is('admin/post/create') ? 'text-blue-500' : '' }}">
         New Post
       </a>
      </li>
    @endadmin


    <li>
      <form action="/logout" method="post">
        @csrf
        <div class="text-center">
          <x-button class="bg-red-400 mt-3 hover:bg-red-600 px-1.5 font-normal py-1 rounded-lg">Logout</x-button>
        </div>
      </form>
    </li>
  </div>
</div>

@endguest