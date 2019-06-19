<template>
    <div class="container">
        <div class="row">  
            <div v-if="items.length === 0">
                No orders Found
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Order</button>
            </div>
            <div v-if="items.length > 0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Order</button>
            </div>
        </div>
        <!--Modal-->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content modalor">
     <itemlist></itemlist>
    </div>
  </div>
</div>
  
    </div>
</template>

<script>
import Itemlist from './ItemsList.vue';
export default {
    components:{
        Itemlist,
    },
    data(){
        return{
            items:[],
           
        }
    },
mounted(){
     var currentUrl = window.location.pathname;
        var tableid = currentUrl.split("/")[2];
    axios.get('/ordersforhotel/'+tableid,{})
    .then((response)=>{
        this.items=response.data;
    }).catch((error)=>{
        console.log(error);
    });
    console.log('Component Mounted');
    this.method1(); 
},
methods:{
    method1(){
        // var currentUrl = window.location.pathname;
        // var tableid = currentUrl.split("/")[2];
        // axios.post('/adddorderhotel/'+tableid,{
        //     id:tableid
        // }).then((response)=>{
        //     console.log(response.data);
        // })
    }
}
}
</script>

<style>
.modalor{
    background:transparent;
    border:none;
}
</style>
