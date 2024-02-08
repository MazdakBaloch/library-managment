<template>
    <Link :href="url" :class="classN"><slot/></Link>
</template>
<script setup>
defineProps({
    url:String,
    classN:String
})
</script>