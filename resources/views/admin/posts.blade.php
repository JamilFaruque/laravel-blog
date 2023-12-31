<x-dashboard heading='Manage Posts'>
  <div class="relative flex-1 overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Post title
          </th>
          <th scope="col" class="px-6 py-3">
            Author
          </th>
          <th scope="col" class="px-6 py-3">
            Published
          </th>
          <th scope="col" class="px-6 py-3">
            Action
          </th>
          <th scope="col" class="px-6 py-3">
            Action
          </th>
        </tr>
      </thead>

      @foreach ($posts as $post )     
      <tbody>
        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{$post->title}}
          </th>
          <td class="px-6 py-4">
            {{$post->author->name}}
          </td>
          <td class="px-6 py-4">
            Yes
          </td>
          <td class="px-6 py-4">
            <a href="/admin/posts/{{$post->id}}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
          </td>
          <td class="px-6 py-4">
            <form method="POST" action="/admin/posts/{{$post->id}}/delete">
              @csrf
              @method('DELETE')
              <button class="text-red-400">delete</button>
            </form>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
    <div class="bg-white p-2">
      {{$posts->links()}}
    </div>
  </div>
</x-dashboard>