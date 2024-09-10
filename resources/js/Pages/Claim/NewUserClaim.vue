<script setup>
    import { reactive } from 'vue';
    import Layout from '../../Layouts/Layout.vue';
    import { router } from '@inertiajs/vue3';
    
    defineOptions({layout: Layout});
    defineProps({ members: Object });

    function createClaimForm (id) { 
        router.get('/member/'+id.toString()+'/claim/new');
    }

</script>
<template>
    <div>
        <table class="table-auto">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Treatment type</th>
                    <th>Description</th>
                    <th>Charge (Mk.)</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(member, k) in members" :key="k">
                    <td scope="row" class="text-red">
                        <i class="far fa-trash-alt text-red-600" ></i>
                    </td>
                    <td>{{ member.first_name}}</td>
                    <td>{{ member.last_name}}</td>
                    <td>{{ member.email}}</td>
                    <td scope="row" class="text-red">
                        <i class="far fa-file " @click="createClaimForm(member.id)"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>