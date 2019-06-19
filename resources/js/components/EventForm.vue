<template>
    <div class="container">
       <div v-if="this.done == null">
           <div class="form-group">
            <label for="halltype">Event Purpose</label>
            <input type="text" class="form-control" v-model="purpose" placeholder="Enter Event Purpose">
        </div>
        <div class="form-group">
            <label for="halltype">Booking Date</label>
            <input type="date" class="form-control" v-model="date" placeholder="Booking Date.">
        </div>
        <div class="form-group">
            <label for="halltype">Guests</label>
            <input type="text" class="form-control" name="price" v-model="guests" placeholder="Total Number of Guests">
        </div>
        <div class="form-group">
            <label for="halltype">Hall</label>
            <select class="form-control" v-model="hall">
                <option v-for="item in halls" :key="item.id">{{item.type}}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="halltype">Food Choice</label>
            <select class="form-control" v-model="foodchoice">
                <option>Veg</option>
                <option>NonVeg</option>
            </select>
        </div>
        <div v-if="this.foodchoice === 'Veg'">
          <label for="halltype">Veg Categories</label>
            <select class="form-control" v-model="category">
                <option v-for="item in vpackages" :key="item.id">{{item.PackageName}}</option>
            </select>
        </div>
        <div v-if="this.foodchoice === 'NonVeg'">
           <label for="halltype">Non Veg Categories</label>
            <select class="form-control" v-model="category">
                <option v-for="item in nvpackages" :key="item.id">{{item.PackageName}}</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" @click="addevent()">Submit</button>
        </div>

       </div>
       <div v-if="this.done == true">
           <img src="https://cdn.pixabay.com/photo/2013/07/12/17/00/approved-151676_960_720.png" height="200px">
           <h2>Event Details Added</h2>
       </div>
    </div>
</template>

<script>
export default {

data(){
    return{
        halls:[],
        vpackages:[],
        nvpackages:[],
        foodchoice:'',
        eventno:'',
        purpose:'',
        date:'',
        guests:'',
        hall:'',
        category:'',
        done:null
    }
},
mounted(){
    axios.get('/api/eventhalls',{})
    .then((response)=>{
        console.log(response.data);
        this.halls=response.data;
    }).catch((error)=>{
        console.log(error);
    });
     axios.get('/api/eventcatsveg',{})
    .then((response)=>{
        console.log(response.data);
        this.vpackages=response.data;
    }).catch((error)=>{
        console.log(error);
    });
    axios.get('/api/eventcatsnveg',{})
    .then((response)=>{
        console.log(response.data);
        this.nvpackages=response.data;
    }).catch((error)=>{
        console.log(error);
    });
},
methods:{
    addevent(){
        var currentUrl = window.location.pathname;
        var customerno = currentUrl.split("/")[2];
       
        axios.get('/api/geteventnumber/'+customerno,{
           
        }).then((response)=>{
             this.eventno = response.data[0].eventno;
             axios.post('/api/addeventdetails/',{
                 eventno:this.eventno,
                 purpose:this.purpose,
                 date:this.date,
                 guests:this.guests,
                 hall:this.hall,
                 package:this.category,
             }).then((response)=>{
                 this.done= response.data;
                
             }).catch((error)=>{

             });
        }).catch((error)=>{

        });
        
    }
}
}
</script>

<style>
h2{
    color:white;
}
.form-group label{

}
</style>
