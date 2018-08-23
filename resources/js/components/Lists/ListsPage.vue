<template>
    <div>
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

        <LoadingCard 
            :loading="loading"
            class="overflow-hidden border border-50">
            <ListsTable
                :lists="lists"
                :search="search" />
        </LoadingCard>
    </div>
</template>

<script>
import ListsTable from './ListsTable'

export default {

    components: {
        ListsTable
    },

    data () {
        return {
            loading: true,
            lists: [],
            search: '',
            tool: null
        }
    },
    
    created () {
        this.$emit('updateTitle', 'Lists')

        Nova.request().get('/nova-vendor/nova-email-marketing-tool/lists')
            .then(({ data: result }) => {
                this.lists = result.data
                this.loading = false
            })
    },
}
</script>

<style>
    /* Scoped Styles */
</style>
