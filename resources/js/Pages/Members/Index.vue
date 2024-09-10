<script setup>
    import { reactive } from 'vue';
    import Layout from '../../Layouts/Layout.vue';
    import { router } from '@inertiajs/vue3'
    defineOptions({layout: Layout});

    const form = reactive([{
        treatment_type: null,
        description: null,
        charge: null,
    }])

    const submit =()=>{
        router.post('/claim/new', form);
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
                <tr v-for="(form_item, k) in form" :key="k">
                    <td scope="row" class="text-red">
                        <p></p>
                    </td>
                    <td><input class="form-control text-xs" type="text" v-model="form_item.treatment_type" /></td>
                    <td>
                        <textarea rows="3" cols="30" class="text-xs" v-model="form_item.description">
                            At w3schools.com you will learn how to make a website. We offer free tutorials.
                        </textarea>
                    </td>
                    <td><input class="form-control text-xs" type="number" v-model="form_item.charge" /></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>