<template>
    <div>
        <h2>Hotel Request List</h2>
        <div class="row">
            <ul>
                <li v-for="item in list" :key="item.id">{{item.name}} has requested for room book on {{item.date}} for {{item.members}} members.<br>
                The contact No is : {{item.number}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            list:[],
        }
    },
    mounted(){
        axios.get('/api/hrequestslist',{})
        .then((response)=>{
            this.list = response.data;
            console.log(response.data);
        })
        .catch((error)=>{
            console.log(error);
        })
        axios.get('/api/readnotifications',{})
        .then((response)=>{
            
        }).catch((error)=>{
            
        })
    }
}
</script>

<style>
div{
    color:white;
}
h2{
    color:white;
}
</style>
