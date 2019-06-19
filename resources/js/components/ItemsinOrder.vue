<template>
    
</template>

<script>
export default {
    data(){
        return{
            items:[],
            orderno:'',
            itemdetails:'',
        }
    },
    mounted(){
        console.log('order list mounted');
         var currentUrl = window.location.pathname;
        var tableid = currentUrl.split("/")[2];
        axios.get('/getorderdetails/'+tableid,{})
        .then((response)=>{
            this.itemdetails = response.data;
           
        }).catch((error)=>{

        });
    }
}
</script>

<style>

</style>
