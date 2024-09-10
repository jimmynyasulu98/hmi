<template>
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
</template>
<script setup>




</script>