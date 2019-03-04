<template>
    <div class="container">
        <nav class="navbar navbar-custom navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
                    <a class="navbar-brand page-scroll" href="#page-top"> 
                        <img src="img/logo.png" alt="" class="img-responsive"> 
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#section-intro" class="page-scroll">Home</a></li>
                        <li><a class="page-scroll" href="#section-about">About</a></li>
                        <li><a class="page-scroll" href="#section-services">services</a></li>
                        <li><a class="page-scroll" href="#section-features">Support Us</a></li>
                        <li><a class="page-scroll" href="#section-contact">contact</a></li>
                        <li><a class="page-scroll" href="" data-toggle="modal" data-target="#loginModal">Register/Login</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

         <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalTitle">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="login" @submit.prevent="login" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.email" id="login-email" type="email" class="form-control" 
                                :class="{ 'is-invalid': form.errors.has('email') }" placeholder="email"
                                name="email" required autofocus>
                                <has-error :form="form" field="email" style="color:#a94442 !important;"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.password" id="login-password" type="password" class="form-control" 
                                :class="{ 'is-invalid': form.errors.has('password') }" placeholder="password"
                                name="password" required>
                                <has-error :form="form" field="password"></has-error>
                            </div>
                            <div class="form-group" id="test">
                                Dont have an account? <a type="button" id="myBtn" 
                                onclick="$('#register').show();$('#login').hide();"
                                >Register here</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <form id="register" style="display:none" @submit.prevent="register" @keydown="rform.onKeydown($event)">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input v-model="rform.name" type="text" name="name" 
                            class="form-control" :class="{ 'is-invalid': rform.errors.has('name') }" placeholder="Your name" required>
                            <has-error :form="rform" field="name" style="color:#a94442 !important;"></has-error>
                        </div>                        
                        <div class="form-group">
                            <label for="name">E-Mail</label>
                            <input v-model="rform.email" type="email" name="email" 
                            class="form-control" :class="{ 'is-invalid': rform.errors.has('email') }" placeholder="Your email" required>
                            <has-error :form="rform" field="email" style="color:#a94442 !important;"></has-error>
                        </div>                        
                        <div class="form-group">
                            <label for="type">Register As</label>
                            <select v-model="rform.type" name="type"  id="type"
                            class="form-control" :class="{ 'is-invalid': rform.errors.has('type') }">
                                <option value="patient">Patient</option>
                                <option value="volunteer">Volunteer</option>
                            </select>
                            <has-error :form="rform" field="type" style="color:#a94442 !important;"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input v-model="rform.password" type="password" name="password"
                                class="form-control" :class="{ 'is-invalid': rform.errors.has('password') }" required>
                            <has-error :form="rform" field="password" style="color:#a94442 !important;"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input v-model="rform.password_confirmation" type="password" name="password_confirmation"
                                class="form-control" :class="{ 'is-invalid': rform.errors.has('password_confirmation') }" required>
                            <has-error :form="rform" field="password_confirmation" style="color:#a94442 !important;"></has-error>
                        </div>
                        <div class="form-group" >
                            Have an account? <a type="button" onclick="$('#login').show();$('#register').hide();">Login here</a>
                        </div>

                    </div>
                        <div class="modal-footer">
                            <!-- <a class="btn" onclick="$('#login').show();$('#register').hide();">Login</a> -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Register</button>
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
                email: '',
                password: '',
                remember: false
            }),
            rform: new Form({
                name: '',
                email: '',
                type: '',
                password: '',
                password_confirmation: '',
            })
            }
        },

        methods: {
            login () {
            // Submit the form via a POST request
            this.form.post('/login')
                .then(({ data }) => { 
                    console.log(data) 
                    this.$router.push('/dashboard');
                    this.$router.go()
                    })
            },
            register () {
            // Submit the form via a POST request
            this.rform.post('/register')
                .then(({ data }) => { 
                    console.log(data) 
                    // this.$router.push('/dashboard');
                    // this.$router.go()
                     Swal.fire(
                        'Registered!',
                        'You may proceed to login.',
                        'success'
                    )
                    })
            }
        }
    }
</script>
