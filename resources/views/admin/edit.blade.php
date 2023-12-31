<x-dashboard heading='New Post'>
  <div class="flex-1">
    <form action="/admin/posts/update/{{$post->id}}" enctype="multipart/form-data" method="POST" class="flex flex-col mx-auto space-y-1.5">
      @csrf
      @method('PATCH')
      <x-form.input name='title' value="{{$post->title}}"/>
      <x-form.error name='title' />

      <x-form.input name='slug' value="{{$post->slug}}" readonly/>
      <x-form.error name='slug' />

      <x-form.input name='thumbnail' type='file' />
      <x-form.error name='thumbnail' />
      <img src="/storage/{{$post->thumbnail}}" width="200" alt="">

      <x-form.textarea>{{$post->body}}</x-form.textarea>
      <x-form.error name='body' />

      <div>
        <select name="category_id" class="border-0 py-px px-1">
          @foreach ( App\Models\Category::all() as $category )
          <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected': '' }}>
            {{ $category->name }}
          </option>
          @endforeach
        </select>
      </div>

      <x-button class="w-36 ml-auto">Update</x-button>
    </form>
  </div>
</x-dashboard>