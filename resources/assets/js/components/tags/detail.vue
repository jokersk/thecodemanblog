<template>
    <div class="container" id="blogDetail">
    <div class="">
        <div class="row">
            <div class="col s12">
                <v-text-field
                    label="Title"
                    v-model="tag.name"
                ></v-text-field>
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
    export default {
        
        data(){
            return {
                id : this.$route.params.id,
                tag : {}
            }
        },
        mounted() {
            
            this.getData()
        },
        methods : {
            getData(){
                if(this.id)
                {
                    axios.get(`${site_url}/getTagData/${this.id}`).then(res=>{
                        this.tag = res.data
                    }) 
                }
               
            },
            submit(){
                axios.post(`${site_url}/data/tags/save`,{
                    "id" : this.id,
                    "name" : this.tag.name
                }).then(res=>{
                    this.id = res.data.id
                    this.$router.push(`/tags/list`);
                })
            }
        }
       
    }
</script>
