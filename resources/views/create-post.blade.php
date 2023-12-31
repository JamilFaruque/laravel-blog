<x-dashboard heading='New Post'>
  <div class="flex-1">
    <form action="/admin/publish-post" enctype="multipart/form-data" method="POST" class="flex flex-col mx-auto space-y-1.5">
      @csrf
      <x-form.input name='title' />
      <x-form.error name='title' />

      <x-form.input name='slug' />
      <x-form.error name='slug' />

      <x-form.input name='thumbnail' type='file' />
      <x-form.error name='thumbnail' />

      <x-form.textarea name='body' class=" text-red-500"></x-form.textarea>
      <x-form.error name='body' />

      <div>
        <select name="category_id" class="border-0 py-px px-1">
          @foreach ( App\Models\Category::all() as $category )
          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected': '' }}>
            {{ $category->name }}
          </option>
          @endforeach
        </select>
      </div>

      <x-button class="w-36 ml-auto">Publish</x-button>
    </form>
  </div>
</x-dashboard>