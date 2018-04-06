<template>
    <div class="container">
        <div id="blogList">
            <div>
                <v-btn  class="mx-0"  :to="{path:`/tags/detail`}" color="warning">
                    New
                </v-btn>
            </div>
            
            <v-data-table
                :headers="headers"
                :items="tags"
                hide-actions
                class="elevation-1"
            >
                <template slot="items" slot-scope="props">
                    <td>{{ props.item.id }}</td>
                    <td class="">{{ props.item.name }}</td>
                    <td class="">
                         <v-btn :to="{ path: `/tags/detail/${props.item.id}` }" color="info">Edit</v-btn>
                        
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
        name : "tagsList",
        data(){
            return {
                tags : [],
                dialog :false,
                headers: [
                    {
                        text: 'ID',
                        align: 'left',
                        sortable: false,
                        value: 'name'
                    },
                    { text: 'tag Title', value: 'tag Title' },
                    { text: 'Action', value: 'Action' },
                    
                    { text: 'delete', value: 'delete', align:  'right' },
                    
                    
                ]
                
            }
        },
        mounted() {
            
            axios.get(site_url+"/data/tags/list").then(res=>{
                
                this.tags = res.data.tags
            })
        },
        methods : {
            change(){

            },
            deleted(id){
                this.dialog = false
                axios.get(site_url+"/data/tags/delete/"+id).then(res=>{
                    
                    this.tags = this.tags.filter((b)=>{
                        return b.id != id
                    })
                })
            }
        }
    }
</script>
<style>
    
</style>

