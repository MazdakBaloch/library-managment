<template>
    <Table title="Authors">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="authors.data" v-for="author in authors.data">
                     <td>{{author.id}}</td>
                     <td>{{author.first_name + ' ' + author.last_name}}</td>
                     <td>
                        <LinkBtn :url="'/authors/'+author.id + '/edit'" classN="btn btn-primary">Update</LinkBtn>
                        <button type="button" class="btn btn-danger mx-2" @click.prevent="onDelete(author.id)">Delete</button>
                     </td>
                </tr>
            </tbody>
        </table>
        <Bootstrap5Pagination :data="authors" @pagination-change-page="getResult" />
    </Table>
</template>
<script setup>
import Table from '../../Shared/Table.vue'
import LinkBtn from '../../Shared/LinkBtn.vue'
import { useForm } from '@inertiajs/vue3';
defineProps({
    authors: Object
})
const form = useForm({})
const getResult = (page = 1) => {
    form.get('/authors?page=' + page)
}
const onDelete = (id) => {
    if(!confirm('Are you sure?')) return
  form.delete('/authors/'+id)  
}
</script>