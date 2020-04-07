<template>
    <div>
        <div class="text-center">
            <h3>My Done Lists</h3>
        </div>
        <form @submit="formSubmit">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  v-model="email" required>
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" v-model="password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning btn-small" :disabled="loading">Login</button>
                    <p v-if="error_status" class="text-danger mt-3">Login failed</p>
                </div>
        </form>
    </div>
</template>

<script>
    import {createFormData} from '../../misc/CreateFormData.js';
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data()
        {
            return {
                email:"",
                password:"",
                error_status:false,
            }
        },
        methods: 
        {
            formSubmit(e)
            {
                e.preventDefault();
                this.error_status=false;
                if (this.email && this.password)
                {
                    this.$store.dispatch("auth/login",createFormData({
                        "email":this.email,
                        "password":this.password
                    }));
                }
            }
        },
        watch: {
           error(val)
           {
               if (val)
               {
                   
                   this.error_status=true;
               }
           },
           success(val)
           {
               if (val)
               {
                   window.location="/home";
               }
           }
            
        },
        computed: 
        {
            error()
            {
                return this.$store.state.noti.error;
            },
            success()
            {
                return this.$store.state.noti.success;
            },
            loading()
            {
                return this.$store.state.auth.loading;
            }
        }
    }
</script>
<style >
    
    h3,label
    {
        color:orange !important;
    }

    .form-group 
    {
        padding-bottom:20px;
    }

</style>