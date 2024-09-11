<script setup>
    import { reactive } from 'vue';
    import Layout from '../../Layouts/Layout.vue';
    import { router } from '@inertiajs/vue3';
    
    defineOptions({layout: Layout});
    defineProps({ claims: Object });

    function showClaim(claim_id) { 
        router.get( '/service-provider/claim/'+ claim_id);
    }

</script>
<template>
    <div>
        <table class="table-auto">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Member Number</th>
                    <th>Stage</th>
                    <th>Charge (Mk.)</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(claim, k) in claims" :key="k">
                    <td>{{ k+1 }}</td>
                    <td>{{ claim.member.membership_number }}</td>
                    <td>{{ claim.stage}}</td>
                    <td>{{ claim.total}}</td>
                    <td scope="row" class=" text-blue-600">
                        <i class="far fa-eye cursor-pointer" @click="showClaim(claim.id)"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>