<template>
    <div class="container">
        <div class="row content-justify-center">
        <div class="col-md-8" >
            <div class="form-group">
                <label for="name">Cashier Name</label>
                <input type="text" class="form-control" placeholder="John Doe" v-model="name">
            </div>
            <div class="form-group">
                <label for="email">Cashier Email</label>
                <input type="text" class="form-control" placeholder="johndoe@mail.com" v-model="email">
            </div>
            
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="*************" v-model="password">
            </div>
           
            <div class="form-group">
                <button @click="adduser()" class="btn btn-success">Add user</button>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            name:'',
            email:'',
            password:'',
            confirmPassword:'',
        }
    },
    methods:{
        adduser(){
            axios.post('/addcashier',{
                name:this.name,
                email:this.email,
                password:this.password,
                role:2,
            }).then((response)=>{
               
            }).catch((error)=>{
                console.log(error);
            });
        }
    }
        

}
</script>

<style>

</style>
