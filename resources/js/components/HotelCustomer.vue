<template>
    <div class="col-md-12">
        <table class="table table-hover table-dark">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   
                                    <tr  v-for="item in customer" :key="item.id">
                                            <th scope="row">{{item.id}}</th>
                                            <td>{{item.Name}}</td>
                                            <td>{{item.Phone}}</td>
                                            <td>{{item.Address}}</td>
                                            <td>
                                                <span v-if="item.status == 1">Active</span>
                                                <span v-if="item.status == 0">InActive</span>
                                            </td>
                                    </tr>
                                   
                                  
                                 
                                </tbody>
                              </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            customer:[]
        }
    },
    mounted(){
        axios.get('/gethotelcustomers',{})
        .then((response)=>{
            this.customer = response.data;
            
        })
        .catch((error)=>{})
    }
}

</script>

<style>

</style>
