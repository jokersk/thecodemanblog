@extends('template')

@section('content')
    <div class="">
        <a href="{{url('blogs/detail')}}" class="right btn">New</a>
    </div>

    <table class="bordered highlight">
        <thead>
          <tr>
              <th>Id</th>
              <th>Blog Title</th>
              
              <th>Action</th>
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
                </tr>
                
            @endforeach
          
         
        </tbody>
    </table>
   
@endsection
