<template>
     <div class="row justify-content-center ">
     <div class="card col-md-10">
        <div class="card-body">
             <div class="row justify-content-center">
                  <h1 class="black"><b>INVOICE</b></h1>
             </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <span><h1 class="bill-header">Chancelor Grand</h1></span>
                    <p><b>Badadhanpur, Odisha</b></p>
                   
                </div>
                <div class="col-md-4">
                   
                </div>
                <div class="col-md-4 text-right">
                    <p><b>{{this.customername}}</b></p>
                    <p><b>{{this.customer.Phone}}</b></p>
                    <p><b>{{this.customer.Address}}</b></p>
                </div>
            </div>
            <div class="row">
                <table class="table table-bordered">
  
  <tbody>
    <tr>
      <th scope="row">Checkin Date:</th>
        <th scope="row">{{this.guest.CheckInDate}}</th>
    </tr>
    <tr>
      <th scope="row">Checkout Date:</th>
        <th scope="row">{{this.guest.CheckOutDate}}</th>
    </tr>
    <tr>
      <th scope="row">Total Stay Duration</th>
        <th scope="row">{{this.guest.StayDuration}}</th>
    </tr>
    <tr>
      <th scope="row">Room No:</th>
        <th scope="row">{{this.guest.RoomNo}}</th>
    </tr>
    <tr>
      <th scope="row">Room Price/Day</th>
        <th scope="row">{{this.Room.RoomPrice}}</th>
    </tr>
    <tr>
      <th scope="row">Total Stay Price</th>
        <th scope="row">{{total}}</th>
    </tr>
   <tr>
      <th scope="row">CGST(6%):</th>
        <th scope="row">{{cgst}}</th>
    </tr>
     <tr>
      <th scope="row">SGST(6%):</th>
        <th scope="row">{{sgst}}</th>
    </tr>
     <tr>
      <th scope="row">Grand Total:</th>
        <th scope="row">{{gtotal}}</th>
    </tr>
  </tbody>
</table>

            </div>
            <div class="row space">
                <div class="col-md-12 text-right bandua">
                    For Chancellor Grand
                </div>
            </div>
            <div class="row">
                <div class="col-md-6  bandua">
                   Thank You !! Please Visit Again!!
                </div>
                <div class="col-md-6  bandua">
                   
                   <!-- <button class="btn btn-primary" @click.prevent="printme">Print</button> -->
                </div>
            </div>
            <div class="row justify-content-center">
              Please do not refresh or back until bill is printed
            </div>
            
  </div>
</div>
     </div>
</template>

<script>
export default {
  data(){
    return{
      guest:'',
      name:'',
      RoomNo:'',
      checkin:'',
      checkout:'',
      stay:'',
      price:'',
      customer:'',
      customername:'',
      Room:'',
    }
  },
  mounted(){
    var currentUrl = window.location.pathname;
        var roomno = currentUrl.split("/")[2];
    axios.get('/api/hotelbookingdetails/'+roomno,{})
    .then((response)=>{
     
      this.guest=response.data[0];
      this.name=this.guest.CustomerId;
      this.roomno = this.guest.RoomNo;
      axios.get('/api/hotelcutsomer/'+this.name,{})
      .then((response)=>{
        this.customer=response.data[0];
        this.customername=this.customer.Name;
        
      })

      axios.get('/api/roomdetails/'+this.roomno,{})
      .then((response)=>{
        
        this.Room = response.data[0];
        axios.get('/api/clearcustomer/'+this.name,{})
        axios.get('/api/clearbooking/'+this.name,{})
      })
    })
    .catch((error)=>{})
  },
  methods:{
    printme(){
      window.print();
    }
  } ,
  computed:{
    total(){
      return parseInt(this.Room.RoomPrice)*parseInt(this.guest.StayDuration)
    },
    cgst(){
      return this.total*0.06;
    },
    sgst(){
      return this.total*0.06;
    },
    gtotal(){
      return this.cgst+this.sgst+this.total;
    }
  }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Pacifico');
@import url('https://fonts.googleapis.com/css?family=Fredoka+One');
.bill-header{
    color:black;
    font-family: 'Pacifico', cursive;
}
.black{
    color:black;
    font-family: 'Fredoka One', cursive;
}
.bandua{
    color:black;
    font-weight: bold;
}
.space{
    margin-top:100px; 
}
</style>
