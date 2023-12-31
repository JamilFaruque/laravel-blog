<x-layout>

  <form method="GET">
    <input type="search" name="search" placeholder="Search" value="{{ request('search') }}"
        class="block mt-10 border-0 mx-auto px-8 py-3 w-96 rounded-lg">
  </form>

  <ul class="w-2/3 mx-auto flex flex-col gap-y-12" style="list-style: decimal">
    @foreach ($posts as $post)
      <li>
        <a style="font-size: 2rem" href="/posts/{{ $post->slug }}"> {{ $post->title }} </a>
        <span>written by <a href="/?author={{ $post->author->slug }}"> {{ $post->author->name }} </a></span>
        in <a href="/?category={{ $post->category->name }}">{{ ucfirst($post->category->name) }}</a>
      </li>
    @endforeach
  </ul>

  <p> {{ session('success') }}</p>
</x-layout>
