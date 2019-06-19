<template>
    <div>
        <h2>Event Request List</h2>
        <div class="row">
            <ul>
                <li v-for="item in list" :key="item.id">{{item.name}} has requested for <b>Event Book</b> on {{item.date}} for {{item.hall}} hall.<br>
                The contact No is : {{item.number}}<br>
                Ocassion:{{item.event_type}}<br>
                Interested Package : {{item.hall}} + {{item.package}}
                </li>
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
        axios.get('/api/erequestslist',{})
        .then((response)=>{
            this.list = response.data;
            console.log(response.data);
        })
        .catch((error)=>{
            console.log(error);
        })
        axios.get('/api/ereadnotifications',{})
        .then((response)=>{
            
        }).catch((error)=>{
            
        })
    }
}
</script>

<style>

</style>
