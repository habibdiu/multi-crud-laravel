<x-layout>
  <div class="mx-auto w-[1200px]">
    <div class = "flex justify-between my-5 mx-auto">
    <a href="/create_slider" class = "bg-green-600 text-white rounded py-2 px-4">Add Slider</a>
      @if (session('success'))
        <h2 id="flash-message" class="text-green-600 py-5 mx-auto">
            {{ session('success') }}
        </h2>
          <script>
            setTimeout(() => {
                const msg = document.getElementById('flash-message');
                    if (msg) msg.style.display = 'none';
            }, 1500);
          </script>
      @endif
  </div>

        <table class="table table-zebra">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Tags</th>
              <th>Photo</th>
              <th class="text-center">Prority</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts_slider as $post_slider)
              <tr>
                  <td>{{$post_slider-> id}}</td>
                  <td>{{$post_slider-> title}}</td>
                  <td>{{$post_slider-> tags}}</td>
                  <td>
                    {{-- <img src="{{ asset('photos/' . $post_slider->photo) }}" width="60px" alt="679609aec2b1e.jpg"> --}}
                    <img src="photos/{{$post_slider-> photo}}" width = "60px" alt="">
                  </td>
                  <td class="text-center">{{$post_slider-> priority}}</td>
                  <td class="w-[200px] text-right">
                    <a href="{{route('edit_slider',$post_slider->id)}}" class = "bg-green-600 text-white rounded py-2 px-4 inline">Edit</a>

                    <form method="POST" action="{{route('delete_slider',$post_slider->id) }}" class="bg-red-600 text-white rounded py-2 px-4 inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btnDel">Delete</button>
                    </form>
                  </td>
              </tr>    
            @endforeach
          </tbody>
        </table>
        <div class="px-5">
          {{$posts_slider->links()}}
        </div>
  </div>
</x-layout>