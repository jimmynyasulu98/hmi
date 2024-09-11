<script setup>
import { defineProps, defineEmits, ref, reactive } from "vue";
import {onClickOutside} from '@vueuse/core'
import { router } from '@inertiajs/vue3'


defineProps({ members: Object });
const form = reactive({
        membership_number: '',
        first_name: '',
        surname: '',
    })
const emit = defineEmits(["modal-close"]);

const target = ref(null)
onClickOutside(target, ()=>emit('modal-close'))

const submitHandler = ()=>{ 
    emit('modal-close')
    router.get('/member/find-user/?membership_number='+form.membership_number+'&first_name='+form.first_name+'&surname='+form.surname);
    }
</script>

<template>
  <div v-if="isOpen" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
    <div class="modal-wrapper ">
      <div class="modal-container" ref="target">
        <form @submit.prevent="submitHandler">
            <div class="modal-header flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4 dark:border-white/10">
                <div  class=" font-medium leading-normal text-surface dark:text-white"> 
                    <slot name="header"> default header </slot>
                </div>    
            </div>
            <div class="relative flex-auto p-4">
                <div class="w-full max-w-sm">
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 text-s  md:text-right mb-1 md:mb-0 pr-1" for="inline-full-name">
                                Search with Membership #
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input v-model="form.membership_number" class=" appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" >
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 text-s md:text-right mb-1 md:mb-0 pr-1" for="inline-full-name">
                                Search with First name
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input v-model="form.first_name"  class=" appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" >
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 text-s  md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                Search with Surname
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input v-model="form.surname" class=" appearance-none border-2 border-gray-200 rounded w-full py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
                <slot name="footer">
                
                </slot>
                <div>
                    <button type="submit"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded " >Submit</button>
                </div>
            
            </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}
.modal-container {
  width: 600px;
  margin: 15px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
}

</style>