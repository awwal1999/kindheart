<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Welcome to Kindheart</h2>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <!-- <a href=""> -->
                        <router-link to="/cancer" class="nav-link">
                            <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-plus"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Add Cancer Details</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                        <!-- </a> -->
                        </router-link>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">

                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">

                    </div>
                    <!-- /.col -->
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
