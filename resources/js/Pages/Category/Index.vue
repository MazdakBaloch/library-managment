<template>
    <Table title="Categories">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="categories.data" v-for="category in categories.data">
                     <td>{{category.id}}</td>
                     <td>{{category.name}}</td>
                     <td>
                        <LinkBtn :url="'/categories/'+category.id + '/edit'" classN="btn btn-primary">Edit</LinkBtn>
                        <button type="button" class="btn btn-danger mx-2" @click.prevent="onDelete(category.id)">Delete</button>
                     </td>
                </tr>
            </tbody>
        </table>
        <Bootstrap5Pagination :data="categories" @pagination-change-page="getResult" />
    </Table>
</template>
<script setup>
import Table from '../../Shared/Table.vue'
import LinkBtn from '../../Shared/LinkBtn.vue'
import { useForm } from '@inertiajs/vue3';

const {categories} = defineProps({
    categories: Object
})

const form = useForm({})
const getResult = (page = 1) => {
    form.get('/categories?page=' + page)
}
const onDelete = (id) => {
    if(!confirm('Are you sure?')) return
 form.delete('/categories/'+id)   
}
</script>