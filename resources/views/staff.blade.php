<x-layout>
  <div class="mx-auto w-[1200px]">
        <div class = "flex justify-between my-5 mx-auto">
        <a href="/create_staff" class = "bg-green-600 text-white rounded py-2 px-4">Add Staff</a>
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
              <th>Position</th>
              <th>Photo</th>
              <th>Phone</th>
              <th>Facebook</th>
              <th>Linkedin</th>
              <th>Twiter</th>
              <th>Priority</th>
              <th>Created By</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts_staff as $post_staff)
              <tr>
                  <td>{{$post_staff-> id}}</td>
                  <td>{{$post_staff-> name}}</td>
                  <td>{{$post_staff-> position}}</td>
                  <td><img src="photos/{{$post_staff-> photo}}" width = "60px" alt=""></td>
                  <td>{{$post_staff-> phone}}</td>
                  <td>{{$post_staff-> facebook}}</td>
                  <td>{{$post_staff-> linkedin}}</td>
                  <td>{{$post_staff-> twitter}}</td>
                  <td class="text-center">{{$post_staff-> priority}}</td>
                  <td class="text-center">{{$post_staff-> created_by}}</td>
                  <td class="w-[200px] text-right">
                    <a href="{{route('edit_staff', $post_staff->id)}}" class = "bg-green-600 text-white rounded py-2 px-4 inline">Edit</a>
                    <form method="POST" action="{{route('delete_staff', $post_staff->id)}}" class="bg-red-600 text-white rounded py-2 px-4 inline">
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
          {{$posts_staff->links()}}
        </div>
      </div>
</x-layout>