<template>
    <div>
        <heading class="mb-6">Email Marketing</heading>
        
        <div class="flex justify-between">
            <div class="relative h-9 flex items-center mb-6">
                 <icon type="search" class="absolute ml-3 text-70" />

                <input
                    data-testid="search-input"
                    dusk="search"
                    class="appearance-none form-control form-input w-search pl-search"
                    placeholder="Search"
                    type="search"
                    v-model="search">
            </div>               
        </div>

        <loading-card :loading="loading" :class="{ 'overflow-hidden border border-50': !shouldShowToolbar }">
            <ListTable
                :lists="lists"
                :search="search" />
        </loading-card>
    </div>
</template>

<script>
import ListTable from './ListTable'

export default {

    components: {
        ListTable
    },

    data () {
        return {
            loading: true,
            lists: [],
            search: ''
        }
    },
    
    mounted() {
        Nova.request().get('/nova-vendor/nova-email-marketing-tool/lists').then(({ data: result }) => {
            this.lists = result.data
            this.loading = false
        });
    },
}
</script>

<style>
    /* Scoped Styles */
</style>
