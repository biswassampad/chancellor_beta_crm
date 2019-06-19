<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="customers">Customer Name</label>
                    <select class="form-control" v-model="customername">
                        <option v-for="item in customers" :key="item.id" :value="item.id">{{item.Name}}</option>
                    </select>  
                </div>
                <div class="form-group">
                    <label for="customers">Room Number</label>
                    <select class="form-control" v-model="roomno">
                        <option v-for="item in rooms" :key="item.id">{{item.RoomNo}}</option>
                    </select>  
                </div>
                <div class="form-group">
                    <label for="customers">No Of Guests</label>
                    <input type="text" v-model="members" class="form-control" placeholder="No of guests">
                </div>
                
                <div class="form-group">
                    <label for="customers">CheckIn Date</label>
                    <input type="date" v-model="checkin" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="customers">Checkout Date</label>
                    <input type="date" v-model="checkout" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="customers">Stay Duration</label>
                    <input type="text" v-model="duration" class="form-control" placeholder="No of days ">
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-success" @click="bookroom()">Book</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            customers:[],
            rooms:[],
            customername:'',
            roomno:'',
            members:'',
            checkin:'',
            checkout:'',
            duration:'',

        }
    },
    mounted(){
         axios.get('/gethotelcustomers',{})
        .then((response)=>{
            this.customers = response.data;
        })
        .catch((error)=>{})
         axios.get('/gethotelrooms',{})
        .then((response)=>{
            this.rooms = response.data;
        })
        .catch((error)=>{})
    },
    methods:{
        bookroom(){
            axios.post('/api/bookroom',{
                name:this.customername,
                roomno:this.roomno,
                members:this.members,
                checkin:this.checkin,
                checkout:this.checkout,
                duration:this.duration,
            })
            .then((response)=>{})
            .catch((error)=>{})
        }
    }
}
</script>

<style>

</style>
