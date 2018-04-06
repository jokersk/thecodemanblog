@extends('template')

@section('content')
<div id="tagsList">
    <div class="">
        <a  class="right btn" @click="addList = true">New</a>
    </div>

    <table class="bordered highlight">
        <thead>
          <tr>
              <th>Id</th>
              <th>tags Name</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <tr v-if="addList">
                <td>
                    @{{lastId}}
                </td>
                <td>
                    <input type="text" v-model="newName">
                </td>
                <td>
                    <button class="btn" @click="addNew">Save</button>
                </td>
            </tr>
            
            <tr v-for="list in listing">
                <td>@{{list.id}}</td>
                <td>@{{list.name}}</td>  
                <td></td> 
            </tr>      
            
        </tbody>
    </table>
</div>
   
@endsection
@push('scripts')
<script>
    var listing = @json($tags)
</script>
<script>
    new Vue({
        el:"#tagsList",
        data :{
            addList : false,
            newName : "",
            listing : @json($tags)
        },
        computed: {
            lastId(){
                if(this.listing.length > 0){
                    last = this.listing.slice(0,1)[0]
                    return +last.id + 1
                }else{
                    return +0;
                }
                
            }
        },
        methods : {
            addNew(){
                
                axios.post(`${site_url}/tags/create`,{
                    name : this.newName
                }).then(res=>{
                    this.listing.unshift(res.data)
                    this.addList  = false
                })
            }
        }
    })
</script>
@endpush


