<script setup>
    import { reactive } from 'vue';
    import Layout from '../../Layouts/Layout.vue';
    
    defineOptions({layout: Layout});

    const form = reactive([{
        treatment_type: null,
        description: null,
        charge: null,
    }])

    const submit =()=>{
        router.post('/claim/new', form);
    }

    const addNewRow = () => {
            form.push({
                treatment_type: null,
                description: null,
                charge: null,
            })
        };

    const  deleteRow= (index, form_item) => {
            var idx = form.indexOf(form_item);
            console.log(idx, index);
            if (idx > -1) {
                form.splice(idx, 1);
            }
            //this.calculateTotal();
        }
   
</script>
<template>
    <div>
        <form @submit.prevent="submit">
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
                            <i class="far fa-trash-alt text-red-600" @click="deleteRow(k, form_item)"></i>
                        </td>
                        <td><input class="form-control text-xs" type="text" v-model="form_item.treatment_type" /></td>
                        <td>
                            <textarea rows="3" cols="30" class="text-xs" v-model="form_item.description">
                                At w3schools.com you will learn how to make a website. We offer free tutorials.
                            </textarea>
                        </td>
                        <td><input class="form-control text-xs" type="number" v-model="form_item.charge" /></td>
                    </tr>
                    <button type='button' class="btn btn-info" @click="addNewRow">
                        <i class="fas fa-plus-circle"></i>
                        Add
                    </button>
                </tbody>
            </table>
            <button class="bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded " :disabled="form.processing" >
                Create
            </button>
        </form>
      
        
    </div>
</template>