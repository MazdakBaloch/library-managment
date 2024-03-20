<template>
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="text-center">Add Author</h1>
                </div>
                <form  class="user" @submit.prevent="form.post('/authors') ,{
                    onSuccess: () => form.reset('firstName','lastName'),
                }">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">First Name</label>
                        <input type="text" v-model="form.firstName" class="form-control form-control-user" id="name"
                        placeholder="Author First Name">
                        <p class="text-danger">{{form.errors.firstName}}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Last Name</label>
                        <input type="text" v-model="form.lastName"  class="form-control form-control-user" id="name"
                        placeholder="Author Last Name">
                        <p class="text-danger">{{form.errors.lastName}}</p>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mx-4" :disabled="form.processing">
                        Add
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script setup>
import {useForm} from '@inertiajs/vue3'
let form = useForm({
   firstName:'',
   lastName:''
})
</script>