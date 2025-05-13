<x-layout>
  <div class="mx-auto w-[1200px]">
    <div class = "flex justify-between my-5 mx-auto">
    <a href="/create_testimonial" class = "bg-green-600 text-white rounded py-2 px-4">Add Testimonial</a>
      @if (session('success'))
              <h2 id="flash-message" class="text-green-600 py-5 mx-auto">
                  {{ session('success') }}
              </h2>
              <script>
                setTimeout(() => {
                    const msg = document.getElementById('flash-message');
                        if (msg) msg.style.display = 'none';
                }, 1000);
              </script>
            @endif
    </div>
    <table class="table table-zebra">
      
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Company Name</th>
          <th>Position</th>
          <th>Message</th>
          <th>Photo</th>
          <th>Created By</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts_testimonial as $post_testimonial)
              <tr>
                  <td>{{$post_testimonial-> id}}</td>
                  <td>{{$post_testimonial-> name}}</td>
                  <td>{{$post_testimonial-> company_name}}</td>
                  <td>{{$post_testimonial-> position}}</td>
                  <td>{{$post_testimonial-> message}}</td>
                  <td><img src="photos/{{$post_testimonial-> photo}}" width = "60px" alt=""></td>
                  <td class="text-center">{{$post_testimonial-> create_by}}</td>
                  <td  class="w-[200px] text-right">
                    <a href="{{route('edit_testimonial', $post_testimonial->id)}}" class = "bg-green-600 text-white rounded py-2 px-4 inline">Edit</a>
                    <form method="POST" action="{{route('delete_testimonial', $post_testimonial->id)}}" class="bg-red-600 text-white rounded py-2 px-4 inline">
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
          {{$posts_testimonial->links()}}
        </div>
  </div>
</x-layout>