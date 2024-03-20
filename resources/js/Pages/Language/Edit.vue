<template>
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="text-center">Update Language</h1>
                </div>
                <form  class="user" @submit.prevent="form.put('/languages/' + language.id,{
                    onSuccess: () => form.reset('name'),
                })">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Language</label>
                        <input type="text" v-model="form.name" class="form-control form-control-user" id="name"
                        placeholder="Language Name">
                        <p class="text-danger">{{form.errors.name}}</p>
                    </div>

                    <button type="submit" class="btn btn-outline-primary mx-4 " :disabled="form.processing">
                        Update
                        </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script setup>
import {useForm} from '@inertiajs/vue3';

const {language} = defineProps({
    language: Object
})

const form = useForm({
    name: language.name
})
</script>