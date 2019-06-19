<template>
    <div>
         <h2>Contact List</h2>
         <ul>
             <li v-for="item in list" :key="item.id">
                 Name : {{item.name}}<br>
                 Mobile : {{item.phone}}<br>
                 Email : {{item.emailid}}<br> 
                 Subject : {{item.subject}}<br>
                 Message: {{item.message}}<br> 
             </li>
         </ul>
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
        axios.get('/api/contactlist',{})
        .then((response)=>{
            this.list = response.data;
            
        })
        .catch((error)=>{
            console.log(error);
        })
        axios.get('/api/readcontact',{})
        .then((response)=>{
           
        }).catch((error)=>{
            
        })
    }
}
</script>

<style>

</style>
