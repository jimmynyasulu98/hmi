<script setup>
    import Layout from '../Layouts/Layout.vue';
    defineOptions({layout: Layout});
    defineProps({ user: String });
</script>
<template>
   
    <div>
        <p class="text-black">{{ user }}</p>
        <p class="text-black">{{ $page.props.auth.user }}</p>
    </div>
</template>