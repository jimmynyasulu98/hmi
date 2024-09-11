<script setup>
    import { reactive } from 'vue';
    import Layout from '../../Layouts/Layout.vue';
    
    defineOptions({layout: Layout});
    defineProps({ claim: Object });
  
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
            <div class="tab-content ">

                <div class="flex tab-pane fade show active profile-overview" id="profile-overview">
                  
                    <h5 class="card-title block-sm-1">Profile Details</h5>

                    <div class="flex row">
                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                        <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                    </div>

                    <div class="flex row">
                        <div class="col-lg-3 col-md-4 label">Company</div>
                        <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                    </div>

                    <div class=" flex row">
                        <div class="col-lg-3 col-md-4 label">Job</div>
                        <div class="col-lg-9 col-md-8">Web Designer</div>
                    </div>


                </div>

            </div>
        <form @submit.prevent="submit">
            <h5 class="card-title">Claim Treatment</h5>
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
                    <tr v-for="(form_item, k) in form" :key="k" >
                        <td scope="row" class="text-red">
                            <i class="far fa-trash-alt text-red-600" @click="deleteRow(k, form_item)"></i>
                        </td>
                        <td><input class="form-control text-xs h-1" type="text" v-model="form_item.treatment_type" /></td>
                        <td>
                            <textarea rows="1" cols="30" class="text-xs mt-2 h-1" v-model="form_item.description">
                                At w3schools.com you will learn how to make a website. We offer free tutorials.
                            </textarea>
                        </td>
                        <td><input class="form-control text-xs h-1" type="number" v-model="form_item.charge" /></td>
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