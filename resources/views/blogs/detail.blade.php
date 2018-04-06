@extends('template')
@push('style')
<style>
    code{
        background-color: #d1ecf1;
        padding:10px;
        display: block;
        border-radius: 5px;
    }
</style>
@endpush
@section('content')
<div class="container" id="blogDetail">

<h4>{{ $blog? $blog->title : 'blog' }}</h4>
<div class="row">
    <div class="switch">
        <label>
       
        <input type="checkbox" v-model="status">
        <span class="lever"></span>

        </label>
    </div>
</div>
<div class="row">

</div>
<div class="row ">
<form class="col s12 my3" action="{{url('blogs/create')}}" method="post">
  @csrf
    @if($blog)
        <input type="hidden" name="id" value="{{$blog->id}}">
    @endif

    <div class="">
       
    </div>

  <div class="row">
    <div class="input-field col s12">
      <input  type="text" class="validate" name="title" value="{{$blog? $blog->title : ''}}">
      <label  for="">Title</label>
    </div>
  
  </div>

    <div class="row">
        <div class="input-field col s12">
          <textarea name="content" id="textarea1" class="materialize-textarea">{{$blog ? $blog->content : ''}}</textarea>
          <label for="textarea1">Textarea</label>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            {!! $blog? $blog->result : '' !!}
        </div>
    </div>

    <div class="row">
        <div class="col">
        <button class="waves-effect waves-light btn" type="submit" >submit</button>
        </div>
    </div>
  
</form>
</div>


  
</div>
@endsection
@push('scripts')

<script>
    var site_url = "{{url('/')}}"
    var blog_status = "{{!empty($blog)? $blog->status: ''}}"
    var blog_id = "{{!empty($blog)? $blog->id : '' }}"
    
</script>
@endpush
