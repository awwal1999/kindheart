<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">Profile Component</div> -->

                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Profile</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                                </ol>
                            </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- Main Content-->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                            <div class="col-md-3">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" :src="showPhoto()" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{this.form.name}}</h3>

                                    <p class="text-muted text-center">{{this.form.type}}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Patients Volunteered for</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Points earned</b> <a class="float-right">13,287</a>
                                    </li>
                                    </ul>

                                    <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#volunteer" data-toggle="tab">Volunteer Settings</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Personal Settings</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                    <div class="active tab-pane" id="activity">


                                        <p>
                                            Profile Page
                                        </p>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                                <div class="col-sm-10">
                                                <input type="email" v-model="form.name" id="inputName" placeholder="Name" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" >
                                                <has-error :form="form" field="name"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                                <div class="col-sm-10">
                                                <input type="email" v-model="form.email" id="inputEmail" placeholder="Email"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" >
                                                </div>
                                                <has-error :form="form" field="email"></has-error>
                                            </div>
                                            <!-- <div class="form-group"> -->
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group col-sm-10">
                                                            <label for="inputEmail" class="col-sm-4 control-label">Sex</label>
                                                            <select v-model="form.sex" class="custom-select form-control" :class="{ 'is-invalid': form.errors.has('sex') }">
                                                                <option value="male" selected>Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                        </div>
                                                        <has-error :form="form" field="sex"></has-error>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group row">
                                                            <label for="age" class="col-sm-10 col-form-label">Age</label>
                                                            <div class="col-sm-4">
                                                                <input v-model="form.age" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('age') }"
                                                                 placeholder="Age">
                                                            </div>
                                                            <has-error :form="form" field="age"></has-error>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                            <!-- </div> -->
                                            <div class="form-group">
                                                <label for="inputPhoto" class="col-sm-2 control-label">Profile Photo</label>
                                                <div class="col-sm-10">
                                                    <input type="file" @change="getPhoto" class="form-input" name="photo" id="inputPhoto">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-6 control-label">Password (leave empty if not changing)</label>

                                                <div class="col-sm-10">
                                                <input v-model="form.password" type="password" name="password" class="form-control" id="inputPassword" 
                                                :class="{ 'is-invalid': form.errors.has('password') }">
                                                </div>
                                                <has-error :form="form" field="password"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                <button @click.prevent="updateProfile" type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="volunteer">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="phone" class="col-sm-6 control-label">Phone Number</label>

                                                <div class="col-sm-10">
                                                <input type="email" v-model="vForm.phone" id="phone" placeholder="phone" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }" >
                                                <has-error :form="form" field="phone"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="address" class="col-sm-10 control-label">Contact Address</label>

                                                <div class="col-sm-10">
                                                <input type="email" v-model="vForm.address" id="address" placeholder="address" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('address') }" >
                                                <has-error :form="form" field="address"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="profession" class="col-sm-2 control-label">Profession</label>

                                                <div class="col-sm-10">
                                                <input type="email" v-model="vForm.profession" id="profession" placeholder="profession" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('profession') }" >
                                                <has-error :form="form" field="profession"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="volunteerArea" class="col-sm-10 control-label">Area of volunteer</label>

                                                <div class="col-sm-10">
                                                <select v-model="vForm.volunteerArea" class="custom-select form-control" :class="{ 'is-invalid': vForm.errors.has('volunteerArea') }">
                                                    <option value="Media Unit" selected>Media Unit</option>
                                                    <option value="Fundraising unit">Fundraising unit</option>
                                                    <option value="Medical unit">Medical unit</option>
                                                    <option value="Awareness campaign unit">Awareness campaign unit</option>
                                                    <option value="Advocacy and Research unit">Advocacy and Research unit</option>
                                                    <option value="I.T unit">I.T unit</option>
                                                    <option value="Welfare services unit">Welfare services unit</option>
                                                    <option value="Accounting and logistics">Accounting and logistics</option>
                                                </select>
                                                <has-error :form="form" field="volunteerArea"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="whyVolunteer" class="col-sm-10 control-label">Why do you want to volunteer</label>

                                                <div class="col-sm-10">
                                                <input type="text" v-model="vForm.whyVolunteer" id="whyVolunteer" placeholder="whyVolunteer" 
                                                class="form-control" :class="{ 'is-invalid': vForm.errors.has('whyVolunteer') }" >
                                                <has-error :form="form" field="whyVolunteer"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="goal" class="col-sm-10 control-label">List 4 Goals you plan to achieve while volunteering with kindheart </label>

                                                <div class="col-sm-10">
                                                <input type="text" v-model="vForm.goal" id="goal" placeholder="goal" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('goal') }" >
                                                <has-error :form="form" field="goal"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="facebook" class="col-sm-6 control-label">Facebook Handle</label>

                                                <div class="col-sm-10">
                                                <input type="text" v-model="vForm.facebook" id="facebook" placeholder="facebook" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('facebook') }" >
                                                <has-error :form="form" field="facebook"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="instagram" class="col-sm-6 control-label">Instagram Handle</label>

                                                <div class="col-sm-10">
                                                <input type="text" v-model="vForm.instagram" id="instagram" placeholder="instagram" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('instagram') }" >
                                                <has-error :form="form" field="instagram"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="twitter" class="col-sm-2 control-label">twitter</label>

                                                <div class="col-sm-10">
                                                <input type="text" v-model="vForm.twitter" id="twitter" placeholder="twitter" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('twitter') }" >
                                                <has-error :form="form" field="twitter"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="heard" class="col-sm-10 control-label">How did you hear about Kindheart organization?</label>

                                                <div class="col-sm-10">
                                                <input type="text" v-model="vForm.heard" id="heard" placeholder="heard" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('heard') }" >
                                                <has-error :form="form" field="heard"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="enjoyedMost" class="col-sm-10 control-label">What have you enjoyed most in previous volunteer works?</label>

                                                <div class="col-sm-10">
                                                <input type="text" v-model="vForm.enjoyedMost" id="enjoyedMost" placeholder="enjoyedMost" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('enjoyedMost') }" >
                                                <has-error :form="form" field="enjoyedMost"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="enjoyedLeast" class="col-sm-10 control-label">What have you enjoyed the least in previous volunteer works?</label>

                                                <div class="col-sm-10">
                                                <input type="text" v-model="vForm.enjoyedLeast" id="enjoyedLeast" placeholder="enjoyedLeast" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('enjoyedLeast') }" >
                                                <has-error :form="form" field="enjoyedLeast"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="language" class="col-sm-10 control-label">Specify the languages you speak</label>

                                                <div class="col-sm-10">
                                                <input type="text" v-model="vForm.language" id="language" placeholder="language" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('language') }" >
                                                <has-error :form="form" field="language"></has-error>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="channel" class="col-sm-10 control-label">What communication channels do you prefer?</label>

                                                <div class="col-sm-10">
                                                <select v-model="vForm.channel" class="custom-select form-control" :class="{ 'is-invalid': vForm.errors.has('channel') }">
                                                    <option value="whatsapp" selected>WhatsApp</option>
                                                    <option value="email">email</option>
                                                </select>
                                                <has-error :form="form" field="channel"></has-error>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                <button @click.prevent="submitVolunteer" type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                        <div>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                // Create a new form instance
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    sex: '',
                    age: '',
                    password: '',
                    type: '',
                    photo: '',
                }),
                vForm: new Form({
                    id: '',
                    phone: '',
                    address: '',
                    profession: '',
                    volunteerArea: '',
                    whyVolunteer: '',
                    goal: '',
                    facebook: '',
                    instagram: '',
                    twitter: '',
                    heard: '',
                    enjoyedMost: '',
                    enjoyedLeast: '',
                    language: '',
                    channel: '',
                }),
            }
        },
        methods: {
            showPhoto() {
                let photo = (this.form.photo.length > 200 ) ? this.form.photo : 'img/profiles/' + this.form.photo;
                return photo
                return 'img/profiles/' + this.form.photo
            },
            getPhoto(photo) {
                let file = photo.target.files[0];
                if (file['size'] < 2111775) {
                    let reader = new FileReader();
                    reader.onloadend = (file) => {
                        this.form.photo = reader.result;
                        console.log(reader.result)
                    }
                    reader.readAsDataURL(file);
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Image size must be less than 2M',
                    })
                }
            },
            updateProfile(){
                this.$Progress.start()
                this.form.patch('api/profile/')
                .then( () => {
                    this.$Progress.finish()
                })
                .catch( () => {
                    this.$Progress.fail()
                })
            },
            submitVolunteer() {
                this.$Progress.start()
                this.vForm.put('api/volunteer/')
                .then( () => {
                    this.$Progress.finish()
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Volunteer profile saved successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
                .catch( () => {
                    this.$Progress.fail()
                })
            },
        },
        created(){
            axios.get('api/profile')
            .then( ({data})=> {
                this.form.fill(data)
            }),
            axios.get('api/volunteer')
            .then( ({data})=> {
                this.vForm.fill(data)
            })

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
