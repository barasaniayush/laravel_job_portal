<template>
    <div>
        <input type="text"
         v-model="keyword" 
         placeholder="Search jobs"
         v-on:keyup="searchJobs()" 
         class="form-control my-3">
        <div class="card-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results">
                    <a :href=" '/jobs/'+result.id +'/'+result.title+'/' ">{{result.title}}<br>{{result.position}}</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                keyword: '',
                results:[],
            }
        },
        methods: {
            searchJobs() {
                this.results = [];
                if(this.keyword.length>1) {
                    axios.get('/jobs/search/',{params:{keyword:this.keyword}}).then((response)=>{this.results = response.data;})
                }
            },
        }
    };
</script>
