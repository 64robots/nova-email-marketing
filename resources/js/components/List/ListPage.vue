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
            <ListTable
                :members="members"
                :search="search" />
        </LoadingCard>
    </div>
</template>

<script>
import ListTable from './ListTable'
import moment from 'moment'

export default {

    props: {
        listId: {
            type: String,
            required: true
        }
    },

    components: {
        ListTable
    },

    data () {
        return {
            loading: true,
            list: [],
            members: [],
            search: '',
            tool: null
        }
    },
    
    created () {
        this.$emit('updateTitle', 'Lists')

        Nova.request().get(`/nova-vendor/nova-email-marketing-tool/lists/${this.listId}`)
            .then(({ data: result }) => {
                this.list = result.data
                this.$emit('updateTitle', `List ${this.list.name}`)
            })

        Nova.request().get(`/nova-vendor/nova-email-marketing-tool/list-members/${this.listId}`)
            .then(({ data: result }) => {
                let members = result.data
                members.forEach(member => {
                    member.subscribed_at = moment(member.subscribed_at).format('MM/DD/YYYY')
                })
                this.members = members
                this.loading = false
            })
    },
}
</script>

<style>
    /* Scoped Styles */
</style>
