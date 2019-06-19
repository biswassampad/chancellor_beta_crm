
<template>
<div>
    <div class="row">
                <div class="col-md-12">
                  <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Get Room Avaialibility</th>
                        <th scope="col">
                          <input type="date" v-model="hoteldate" placeholder="Enter Date" class="form-control">
                        </th>
                        <th scope="col">
                          <button class="btn btn-success" @click="searchrooms()">Check</button>
                        </th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
              <div class="row" v-if="roomlist.length==0">
                <div class="col-md-12">
                  <table class="table table-hover table-dark">
                    <thead>
                        <th scope="col">No Records Found Search A Date Please
                           
                        </th>
                        <th scope="col">
                             <span>
                              ¯\_(ツ)_/¯
                               </span>
                        </th>
                    </thead>
                  </table>
                </div>
              </div>
              <div class="row" v-if="roomlist.length>0">
                <div class="col-md-12">
                  <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Room No</th>
                        <th scope="col">
                         Date
                        </th>
                        <th scope="col">
                            Status
                         </th>
                      </tr>
                      </thead>
                      <tr v-for="item in roomlist" :key="item.id">
                          <td>{{item.roomno}}</td>
                          <td>{{item.date}}</td>
                          <td>Unavailable</td>
                      </tr>
                    
                  </table>
                </div>
              </div>
</div>
</template>
<script>
export default{
    data(){
        return{
            hoteldate:'',
            roomlist:[],
        }
    },
    methods:{
        searchrooms(){
            var date = this.hoteldate;
            axios.get('/api/getvacantrooms/'+date,{})
            .then((response)=>{
                this.roomlist = response.data;
            }).catch((error)=>{
                console.log(error);
            });
        }
    }
}
</script>
