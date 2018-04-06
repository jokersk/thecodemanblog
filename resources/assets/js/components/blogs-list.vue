<template>
    <div class="container">
        <div id="blogList">
            <div>
                <v-btn  class="mx-0"  :to="{path:`/blogs/detail`}" color="warning">
                    New
                </v-btn>
            </div>
            
            <v-data-table
                :headers="headers"
                :items="blogs"
                hide-actions
                class="elevation-1"
            >
                <template slot="items" slot-scope="props">
                    <td>{{ props.item.id }}</td>
                    <td class="">{{ props.item.title }}</td>
                    <td class="">
                         <v-btn :to="{ path: `/blogs/detail/${props.item.id}` }" color="info">Edit</v-btn>
                        
                    </td>
                    <td class="">
                         <v-switch
                            v-model="props.item.status"
                            @change="update(props.item.id, props.item.status)"
                            
                        ></v-switch>
                    </td> 
                    <td align=right>
                        <v-btn  color="error" @click.native="dialog = true">Delete</v-btn>      
                        <v-dialog v-model="dialog" max-width="290">
                            <v-card>
                                <v-card-title class="headline">Sure?</v-card-title>
                                
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="green darken-1" flat="flat" @click.native="dialog = false">Disagree</v-btn>
                                    <v-btn @click="deleted(props.item.id)" color="green darken-1" flat="flat" >Agree</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>

                    </td>  
                </template>
            </v-data-table>
            
        </div>
    </div>
</template>

<script>
import axios from "axios"
    export default {
        name : "blogsList",
        data(){
            return {
                blogs : [],
                dialog :false,
                headers: [
                    {
                        text: 'ID',
                        align: 'left',
                        sortable: false,
                        value: 'name'
                    },
                    { text: 'Blog Title', value: 'Blog Title' },
                    { text: 'Action', value: 'Action' },
                    { text: 'status', value: 'status' },
                    { text: 'delete', value: 'delete', align:  'right' },
                    
                    
                ]
                
            }
        },
        mounted() {
            axios.get(site_url+"/data/blogs/list").then(res=>{
                this.blogs = res.data
            })
        },
        methods : {
            update : function(blogId,status){
                console.log(status)
                var input = status == 1? "1":"0"
                axios.get(`${site_url}/updateStatus/${blogId}/${input}`)
            },
            change(){

            },
            deleted(id){
                this.dialog = false
                axios.get(site_url+"/data/blogs/delete/"+id).then(res=>{
                    
                    const blogs = this.blogs.filter((b)=>{
                        return b.id != id
                    })
                    this.blogs = blogs
                })
            }
        }
    }
</script>
<style>
    
</style>

