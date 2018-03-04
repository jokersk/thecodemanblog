@extends('template')

@section('content')
<div id="blogList">
    <div class="">
        <a href="{{url('blogs/detail')}}" class="right btn">New</a>
    </div>

    <table class="bordered highlight">
        <thead>
          <tr>
              <th>Id</th>
              <th>Blog Title</th>
              
              <th>Action</th>
              <th>status</th>
          </tr>
        </thead>

        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->title}}</td>
                    
                    <td> 
                        <a class="btn" href='{{url("blogs/detail/{$blog->id}")}}'  >edit</a>
                    </td>
                    <td>
                        <div class="switch">
                            <label>
                        
                            <input type="checkbox"  @click="update('{{$blog->id}}','{{$blog->status}}')"  {{ $blog->status == 1 ? "checked" : "" }}>
                            <span class="lever"></span>

                            </label>
                        </div>
                        
                    </td>
                </tr>      
            @endforeach
        </tbody>
    </table>
</div>
   
@endsection

@push('scripts')
<script>
    new Vue({
        el:"#blogList",
        data :{

        },
        methods : {
            update : function(blogId,status){
                console.log(111)
                var input = status == 1? "0":"1"
                axios.get(`${site_url}/updateStatus/${blogId}/${input}`)
            }
        }
    })
</script>
@endpush
