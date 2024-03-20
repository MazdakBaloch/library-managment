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
                             <td>{{langauge.id}}</td>
                             <td>{{ langauge.first_name + ' ' + langauge.last_name }}</td>
                             <td>
                                <LinkBtn :url="'/languages/'+langauge.id + '/edit'" classN="btn btn-primary">Edit</LinkBtn>
                                <button type="button" class="btn btn-danger mx-2" @click.prevent="onDelete(langauge.id)">Delete</button>
                                </td>
                                </tr>
                                </tbody>
        </table>
        <Bootstrap5Pagination :data="categories" @pagination-change-page="getResult" />
    </Table>
</template>
<script setup>
const {langauges} = defineProps({
    langauges: Object
})
</script>