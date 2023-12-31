<x-layout>
  <main class="w-1/2 mx-auto mt-20">
    <img src="/storage/{{ $post->thumbnail }}" alt="No picture uploaded">
    <div class="pb-5">
      <a href="/?author={{$post->author->slug}}">Post by: {{$post->author->name}}</a>
    </div>
    <p class="text-xl leading-6">{{ $post->body }}</p>

    <div class="mt-12">
      <h1 class="text-xl font-black">
        Comments:
      </h1>


      @auth
      <form method="POST" action="/posts/{{$post->slug}}/comment">
        @csrf
        <textarea name="body" id="" class="w-full border rounded mt-5 outline-0" rows="7"></textarea>

        <div class="flex justify-end">
          <x-button>Post</x-button>
        </div>
      </form>

      @else
      <p class=" font-bold">
        <a class="underline" href="/register">Register</a> or <a class="underline" href="/login">Login</a> to post a comment
      </p>
      @endauth

      @foreach ($post->comments as $comment)
        <x-post-comment :comment="$comment" />
      @endforeach
    </div>
  </main>
</x-layout>