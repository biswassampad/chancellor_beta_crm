<template>
<div class="container">
 <div class="row content-justify-center">
        <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">Room No</th>
                <th scope="col">Room Type</th>
                <th scope="col">Room Price</th>
                <th scope="col">Availibility</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <tr v-for="room in rooms" :key="room.id">
                    <th scope="row">Room No : {{room.RoomNo}}</th>
                        <td>
                            <span v-if="room.RoomType == 1">Royal</span>
                             <span v-if="room.RoomType == 2">Exclusive</span>
                              <span v-if="room.RoomType == 3">Elegent</span>
                        </td>
                        <td>
                           INR {{room.RoomPrice}}
                        </td>
                        <td>
                            <span v-if="room.Engaged == 0">Available</span>
                        </td>
                        <td>
                            <button class="btn btn-warning" @click="bookroom(room.id)">Allot</button>
                        </td>
                </tr>              
             
            </tbody>
          </table>
    </div>
</div>
   
</template>

<script>
export default {
    data(){
        return{
            rooms:[],
            i:1,
            name:'',
            staying:'',
            memebers:'',
            checkin:'',
            details:'',
        }
    },
    mounted(){
      
        axios.get('/getavailrooms',{})
        .then((response)=>{
            this.rooms=response.data;
        }).catch((error)=>{
            console.log(error);
        });
    },
    methods:{
        bookroom($id){
                var currentUrl = window.location.pathname;
                var orderno = currentUrl.split("/")[2];
                
                axios.get('/customerdetails/'+orderno,{

                }).then((response)=>{
                   
                    this.details=response.data,
                   this.name = this.details[0].Name,
                    this.staying = this.details[0].Staying,
                    this.members = this.details[0].Members,
                    this.checkin = this.details[0].checkin,
                axios.post('/assignroomtocustomer/'+orderno,{
                        customerid:orderno,
                        roomno:$id,
                        staying:this.staying,
                        members:this.members,
                }).then((response)=>{
                    axios.get('/updateroom/'+$id,{

                    }).then((response)=>{
                       
                    }).catch((error)=>{

                    });
                }).catch((error)=>{
                    console.log(error);
                });
                })
               
        }
    }
}
</script>

<style>

</style>
