<template>
   <div class="container-fluid mangoose">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1 class="subha">Chancellor Grand</h1>
            <h1>Invoice</h1>
        </div>
    </div>
    <div class="row rest" >
        <div class="col-md-4">
            <b>GSTIN:21AANFC8464H1ZB</b><br>
            <b>Addr:Baddhanpur,Bypass Road,Bbsr</b>
        </div>
        <div class="col-md-8 text-right">
            <span style="font-size:45px;"><b>Table No : {{customer[0].tableno}}</b><br></span>
            <b>Order No:{{customer[0].orderno}}</b><br>
            <b>Transaction Date:{{customer[0].created_at}}</b><br>
            <b>Customer Name:{{customer[0].name}}</b><br>
        </div>
    </div>

    <div class="row sabdhan">
        <table class="col-md-12 bishram">
            <tr>
                <td><b>Item Name</b></td>
                <td><b>Qnty</b></td>
                <td><b>Price</b></td>
            </tr>
            <tr v-for="item in itemlist" :key="item.id">
                <td>{{item.itemname}}</td>
                <td>{{item.itemqnty}}</td>
                <td>{{item.amount}}</td>
            </tr>
           
                
           
               <tr>
                   <td>
                       <b>Total</b>
                   </td>
                   <td></td>
                   
                   <td><b>{{sum}}</b></td>
               </tr> 
               
               <tr>
                    <td>
                        <b>CGST</b>
                    </td>
                    <td><b>2.5%</b></td>
                    
                    <td><b>{{cgst}}</b></td>
                </tr> 
                
               <tr>
                    <td>
                        <b>SGST</b>
                    </td>
                    <td><b>2.5%</b></td>
                    
                    <td><b>{{sgst}}</b></td>
                </tr> 
                
               <tr>
                    <td>
                        <b>Grand Total</b>
                    </td>
                    <td></td>
                    
                    <td><b>{{total}}</b></td>
                </tr> 
        </table>
    </div>
   
    <div class="row justify-content-center gordoh rest">
        <h3>Thank You ! Please Visit Again.</h3>
    </div>
    <div class="row justify-content-center gordoh rest">
        <h3>Visit Us at www.chancellorgrand.com</h3>
    </div>
  
    <div class="row justify-content-center gordoh rest">
        <h3>***Customer Copy***</h3>
    </div>
  <br>
    <div class="row justify-content-center ropo">
            <div class="col-md-12 text-center">
                <h1>Chancellor Grand</h1>
                <h1>Sales</h1>
            </div>
        </div>
        <div class="row rest">
            <div class="col-md-4 rest">
                <b>GSTIN:21AANFC8464H1ZB</b><br>
                <b>Addr:Baddhanpur,Bypass Road,Bbsr</b>
            </div>
            <div class="col-md-8 text-right">
            <span style="font-size:45px;"><b>Table No : {{customer[0].tableno}}</b><br></span>
            <b>Order No:{{customer[0].orderno}}</b><br>
            <b>Transaction Date:{{customer[0].created_at}}</b><br>
            <b>Customer Name:{{customer[0].name}}</b><br>
        </div>
    </div>

    <div class="row sabdhan">
        <table class="col-md-12 bishram">
            <tr>
                <td><b>Item Name</b></td>
                <td><b>Qnty</b></td>
                <td><b>Price</b></td>
            </tr>
            <tr v-for="item in itemlist" :key="item.id">
                <td>{{item.itemname}}</td>
                <td>{{item.itemqnty}}</td>
                <td>{{item.amount}}</td>
            </tr>
           
                
           
               <tr>
                   <td>
                       <b>Total</b>
                   </td>
                   <td></td>
                   
                   <td><b>{{sum}}</b></td>
               </tr> 
               
               <tr>
                    <td>
                        <b>CGST</b>
                    </td>
                    <td><b>2.5%</b></td>
                    
                    <td><b>{{cgst}}</b></td>
                </tr> 
                
               <tr>
                    <td>
                        <b>SGST</b>
                    </td>
                    <td><b>2.5%</b></td>
                    
                    <td><b>{{sgst}}</b></td>
                </tr> 
                
               <tr>
                    <td>
                        <b>Grand Total</b>
                    </td>
                    <td></td>
                    
                    <td><b>{{total}}</b></td>
                </tr> 
        </table>
    </div>
        <div class="row justify-content-center">
            <h3>***Restaurant Copy***</h3>
        </div>
                   <un-done></un-done>
</div>
</template>

<script>
export default {
    data(){
        return{
            customer:[],
            itemlist:[],
            pricelist:[],
    
        }
    }
    ,mounted:function(){
        var currentUrl = window.location.pathname;
        var orderno = currentUrl.split("/")[2];
            axios.get('/api/getcustsomerforkot/'+orderno,{})
            .then((response)=>{
                this.customer = response.data;
            }).catch((error)=>{

            });
            axios.get('/api/orderitems/'+orderno,{})
            .then((response)=>{
                
                this.itemlist = response.data;
            }).catch((error)=>{

            });
            axios.get('/api/getpricelistfororder/'+orderno,{

            }).then((response)=>{
                this.pricelist = response.data;
               
               
            }).catch((error)=>{

            });
           
    },
    methods:{
            printme(){
                window.print();
            }
    },
    computed:{
            sum(){
               return this.pricelist.reduce((acc, item) => parseInt(acc,10) + parseInt(item.amount,10), 0);
            },
            cgst(){
                return  this.sum * 25/1000; 
            },
            sgst(){
                return this.sum * 25/1000;
            },
            total(){
                return this.sum + this.cgst + this.sgst;
            }   
        
      
    }
           
}
</script>

<style>
.mangoose div{
        margin-left:25px;
    }
 .mangoose   table{
        margin-left:25px;
        font-weight:bold;
        width:100%;
    }
  .mangoose  h1{
        font-size:80px;
    }
  .mangoose  html{
        font-size:50px;
        font-weight:400;
    }

  
.mangoose  table tr{
    border:2px solid black;
    padding-top:10px;
    padding-bottom: 10px;
    font-size:50px;
}
.mangoose table td{
    padding:10px;
}
.mangoose .rest{
     font-size:50px;
    font-weight:400;
}
@page { size: 58mm 100mm }
body.receipt .sheet { width: 58mm; height: 100mm } /* change height as you like */
@media print { body.receipt { width: 58mm } }
</style>
