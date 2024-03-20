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
                <tr v-if="langauges.data" v-for="langauge in langauges.data">
                    <td>{{ langauge.id }}</td>
                    <td>{{ langauge.name }}</td>
                    <td>
                        <LinkBtn :url="'/languages/' + langauge.id + '/edit'" classN="btn btn-primary">Edit</LinkBtn>
                        <button type="button" class="btn btn-danger mx-2"
                            @click.prevent="onDelete(langauge.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <Bootstrap5Pagination :data="langauges" @pagination-change-page="getResult" />
    </Table>
</template>

<script setup>
import Table from '../../Shared/Table.vue'
import LinkBtn from '../../Shared/LinkBtn.vue'
import { useForm } from '@inertiajs/vue3';
defineProps({
    langauges: Object
})

const form = useForm({});
const getResult = (page = 1) => {
    form.get('/languages?page=' + page)
}
const onDelete = (id) => {
    if (!confirm('Are you sure?')) return
    form.delete('/languages/' + id)
}
</script>
