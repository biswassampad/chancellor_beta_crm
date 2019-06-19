<template>
    
</template>

<script>
export default {
    data(){
        return{
            tableno:'',
        }
    },
     mounted:function(){
         
       
        
        this.method1(); 
  },
   methods:{
       method1(){
            var currentUrl = window.location.pathname;
          var orderno = currentUrl.split("/")[2];
          axios.get('tableno/'+orderno,{})
        .then(response=>{
           
            this.tableno=response.data[0].tableno;
           
            axios.get('inactive/'+orderno,{

            }).then((response)=>{
               
            });
            axios.get('/api/vacanttable/'+this.tableno,{

            }).then((response)=>{
                
            })
            .catch((error)=>{})
           
        }).catch((error)=>{
            console.log(error);
        });
       }
   }
}
</script>

<style>

</style>
