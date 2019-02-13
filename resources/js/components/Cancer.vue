<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cancer Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="cancer">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input v-model="form.username" type="email" class="form-control" :class="{ 'is-invalid': form.errors.has('username') }" 
                    placeholder="Full Name">
                    <has-error :form="form" field="username"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sex & Age</label>
                    <input v-model="form.username" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('username') }" 
                    placeholder="Full Name">
                    <has-error :form="form" field="username"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="occupation">Occupation</label>
                    <input v-model="form.occupation" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('occupation') }" 
                    placeholder="Full Name">
                    <has-error :form="form" field="occupation"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="occupation">Place Of Employment</label>
                    <input v-model="form.poe" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('poe') }" 
                    placeholder="Place Of Employment">
                    <has-error :form="form" field="poe"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="position">Postion</label>
                    <input v-model="form.position" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('position') }" 
                    placeholder="Postion / Cadre / Level">
                    <has-error :form="form" field="position"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="address">Address Of Workplace</label>
                    <input v-model="form.address" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('address') }" 
                    placeholder="Address Of Workplace">
                    <has-error :form="form" field="address"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="cancer_type">Type Of Cancer</label>
                    <input v-model="form.cancer_type" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('cancer_type') }" 
                    placeholder="Type Of Cancer">
                    <has-error :form="form" field="cancer_type"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="cancer_stage">Stage Of Cancer</label>
                    <input v-model="form.cancer_stage" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('cancer_stage') }" 
                    placeholder="Stage Of Cancer">
                    <has-error :form="form" field="cancer_stage"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="hospital">Hospital</label>
                    <input v-model="form.hospital" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('hospital') }" 
                    placeholder="Hospital">
                    <has-error :form="form" field="hospital"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="hospital_consultant_name">Hospital Consultant Name</label>
                    <input v-model="form.hospital_consultant_name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('hospital_consultant_name') }" 
                    placeholder="Hospital Consultant Name">
                    <has-error :form="form" field="hospital_consultant_name"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="hospital_consultant_phone">Hospital Consultant Phone</label>
                    <input v-model="form.hospital_consultant_phone" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('hospital_consultant_phone') }" 
                    placeholder="Hospital Consultant Phone">
                    <has-error :form="form" field="hospital_consultant_phone"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="k_liason_officer">Kindhearts liason Officer</label>
                    <input v-model="form.k_liason_officer" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('k_liason_officer') }" 
                    placeholder="Kindhearts liason Officer">
                    <has-error :form="form" field="k_liason_officer"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="officer_number">Kindhearts liason Officer Number</label>
                    <input v-model="form.officer_number" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('officer_number') }" 
                    placeholder="Kindhearts liason Officer Number">
                    <has-error :form="form" field="officer_number"></has-error>
                  </div>
                  
                  <div class="form-group">
                    <label for="hospital_consultant_phone">Kindhearts liason Officer Number</label>
                    <input v-model="form.hospital_consultant_phone" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('hospital_consultant_phone') }" 
                    placeholder="Postion / Cadre / Level">
                    <has-error :form="form" field="hospital_consultant_phone"></has-error>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button :disabled="form.busy" type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                // Create a new form instance
                form: new Form({
                    username: '',
                    password: '',
                    remember: false
                })
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
