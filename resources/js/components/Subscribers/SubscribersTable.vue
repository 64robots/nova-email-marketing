<template>
    <SortTable
        :fields="fields"
        :filter="filter"
        :tableData="subscribers"
        viewRoute="nova-email-marketing-tool-subscriber" />
</template>

<script>
import SortTable from '../Shared/SortTable'

export default {
    props: {
        subscribers: {
            type: Array,
            required: true
        },

        search: {
            type: String,
            default: ''
        }
    },

    components: {
        SortTable
    },

    data: () => ({
        fields: [
            {
                indexName: 'Name',
                textAlign: 'left',
                attribute: 'name',
                sortable: true
            },
            {
                indexName: 'Email address',
                textAlign: 'left',
                attribute: 'email',
                sortable: true
            },
            {
                indexName: 'Subscribe Date',
                textAlign: 'left',
                attribute: 'subscribed_at',
                sortable: true
            }
        ],
        sortField: 'name',
        sortDirection: false
    }),

    methods: {
        filter (subscriber) {
            return this.search === '' ||
                subscriber.name.includes(this.search) ||
                String(list.id).includes(this.search) ||
                subscriber.email.includes(this.search)
        }
    }
}
</script>
