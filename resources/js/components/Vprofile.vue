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
                                                <label for="phone" class="col-sm-2 control-label">Phone Number</label>

                                                <div class="col-sm-10">
                                                <input type="email" v-model="vForm.phone" id="phone" placeholder="phone" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }" >
                                                <has-error :form="form" field="phone"></has-error>
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
            })

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
