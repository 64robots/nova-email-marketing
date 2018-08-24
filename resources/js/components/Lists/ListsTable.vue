<template>
    <SortTable
        :fields="fields"
        :filter="filter"
        :tableData="lists"
        viewRoute="nova-email-marketing-tool-list" />
</template>

<script>
import SortTable from '../Shared/SortTable'

export default {
    props: {
        lists: {
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
                indexName: 'ID',
                textAlign: 'left',
                attribute: 'id',
                sortable: true
            },
            {
                indexName: 'Name',
                textAlign: 'left',
                attribute: 'name',
                sortable: true
            },
            {
                indexName: '# of Subscribers',
                textAlign: 'left',
                attribute: 'subscribers',
                sortable: true
            }
        ]
    }),

    methods: {
        filter (list) {
            return this.search === '' ||
                list.name.includes(this.search) ||
                String(list.id).includes(this.search) ||
                list.subscribers === this.search
        }
    }
}
</script>
