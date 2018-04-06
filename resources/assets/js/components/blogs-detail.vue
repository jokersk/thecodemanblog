<template>
    <div class="container" id="blogDetail">
        
    <h4>{{ blog.title }}</h4>
    <div class="row">
        <div class="col">
            <v-switch
            :label="`Is Online`"
            v-model="blog.status"
            ></v-switch>
        </div>
        
    </div>

    <div>
         <v-flex xs12 sm6>
            <v-select
            label="Select"
            :items="tagsOption"
            v-model="tags"
            multiple
            item-text="name"
            item-value="id"
            max-height="400"
            ></v-select>
        </v-flex>
    </div>
   
    <div class="">
        <div class="row">
            <div class="col s12">
        
                <v-text-field
                    label="Title"
                    v-model="blog.title"
                ></v-text-field>
            </div>
        
        </div>
        
            <div class="row">
                <div class="col-12 col-md-6">
                    <v-text-field
                        name="input-7-1"
                        label="Blog content"
                        multi-line
                        v-model="blog.content"
                    ></v-text-field>
                </div>
                 <div class="col-12 col-md-6">
                     <div v-html="markedContent">
                     </div>
                 </div>
            </div>
            <div class="row">
                <div class="col">
                    <v-btn  :left=true :absolute=true type="submit" @click="submit" color="warning" >submit</v-btn>
                </div>
            </div>
    
         </div>
    </div>
</template>

<script>
import axios from "axios"
import * as marked from "marked"


    export default {
        
        data(){
            return {
                id : this.$route.params.id,
                blog : {},
                tags:[],
                tagsOption:[
                    
                ]
            }
        },
        mounted() {
            
            this.getData()
            this.getTagsList()
        },
        methods : {
            getTagsList(){
                axios.get(`${site_url}/data/tags/list`).then(res=>{
                        this.tagsOption = res.data.tags
                }) 
            },
            getData(){
                if(this.id)
                {
                    axios.get(`${site_url}/getBlogData/${this.id}`).then(res=>{
                        this.blog = res.data
                        this.tags = res.data.tags
                    }) 
                }
               
            },
            update(blogId,status){
                var input = status == 1? "0":"1"
                axios.get(`${site_url}/updateStatus/${blogId}/${input}`)
            },
            submit(){
                axios.post(`${site_url}/data/blogs/create`,{
                    "id" : this.id,
                    "title" : this.blog.title,
                    "content" : this.blog.content,
                    "tags" : this.tags
                }).then(res=>{
                    this.id = res.data.id
                    this.$router.push(`/blogs/detail/${this.id}`);
                })
            }
        },
        computed:{
            markedContent(){
                let content = this.blog.content || ""
                return marked(content)
            }
        }
    }
</script>
