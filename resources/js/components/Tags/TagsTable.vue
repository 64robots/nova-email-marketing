<template>
    <SortTable
        :fields="fields"
        :filter="filter"
        :tableData="tags"
        viewRoute="nova-email-marketing-tool-tag" />
</template>

<script>
import SortTable from '../Shared/SortTable'

export default {
    props: {
        tags: {
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
            }
        ]
    }),

    methods: {
        filter (tag) {
            return this.search === '' ||
                tag.name.includes(this.search) ||
                String(tag.id).includes(this.search)

        }
    }
}
</script>
