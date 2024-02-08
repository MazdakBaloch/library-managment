<template>
    <Table>
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
                        <LinkBtn :url="`categories/${category.id}/edit`" classN="btn btn-primary">Edit</LinkBtn>
                     </td>
                </tr>
            </tbody>
        </table>
    </Table>
</template>
<script setup>
import Table from '../../Shared/Table.vue'

defineProps({
    categories: Object
})
</script>