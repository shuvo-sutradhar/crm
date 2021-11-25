<template>

<div>
    <div class="absolute top-0 left-0 inline-flex items-center p-2">
        <icon name="search" classList="text-gray-500 dark:text-gray-400 mt-0.5 ml-1" v-if="query == ''" />
        <icon name="x-circle" classList="text-red-500 dark:text-gray-400 mt-0.5 ml-1" v-else /> 
    </div>

    <input type="text"
            :value="query" 
            class="w-full pl-10 pr-4 py-2.5 rounded shadow-sm text-gray-600 text-sm font-medium dark:text-gray-200 dark:bg-gray-900 focus:outline-none focus:ring focus:border-indigo-500"
            :placeholder="$t('search')"
            @input="$emit('reset-pagination', $event.target.value)">
    
    <label class="absolute l-0 t-0 -mt-8 w-10 h-6 text-center cursor-pointer" 
            :class="[ query !== '' ? 'block' : 'hidden']"
            @click="$emit('reload')">
        <em class="fad fa-times-circle text-pink-500"></em>
    </label>
</div>

</template>

<script>

export default {
    name: 'Search',
  
    props: ["query"],
    model: {
      prop: "query",
      event: "reset-pagination"
    }

}
</script>
