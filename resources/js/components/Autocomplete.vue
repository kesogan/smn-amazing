<template>
    <div>
        <input type="text" placeholder="User" v-model="query" v-on:keyup="autoComplete('admin/dashboard/mediaUpload')" class="form-control">
        <div class="panel-footer" v-if="results.length">
            <ul class="list-group">
                <li class=list-group-item" v-for="result in results">
                    {{result.name}}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return {
                query: '',
                results: []
            }
        },
        methods: {
            autoComplete(url){
                this.results=[];
                if(this.query.length > 2){
                    axios.get(url,{params: {this.query}}).then(response => {this.results=response.data;});
                }
            }
        }
    }
</script>
