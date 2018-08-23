<template>
    <div>
        <heading class="mb-6">Email Marketing<span v-if="tool">{{ tool }}</span></heading>
        
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
            <ListTable
                :lists="lists"
                :search="search" />
        </LoadingCard>
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
            search: '',
            tool: null
        }
    },
    
    created () {
        Nova.request().get('/nova-vendor/nova-email-marketing-tool/tool')
            .then(({ data: result }) => {
                this.tool = result.data
            })

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
