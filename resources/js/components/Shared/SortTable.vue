<template>
    <table
        class="table w-full bg-white"
        cellpadding="0"
        cellspacing="0"
    >
        <thead>
            <tr>
                <th
                    v-for="field in fields"
                    :key="field.attribute"
                    :class="`text-${field.textAlign}`"
                >
                    <sortable-icon
                        v-if="field.sortable"
                        @sort="sort(field)"
                        :sortField="sortField"
                        :sortDirection="sortDirection"
                    >
                        {{ field.indexName }}
                    </sortable-icon>

                    <span v-else>
                        {{ field.indexName }}
                    </span>
                </th>
            </tr>
        </thead>

        <tbody>
            <tr
                v-for="item in sortedData"
                :key="item.id"
                @click="view(item)"
            >
                <td
                    v-for="field in fields"
                    :key="field.attribute">
                    {{ item[field.attribute] }}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import TableMixin from '../../mixins/table'

export default {
    mixins: [ TableMixin ],

    props: {
        fields: {
            type: Array,
            required: true
        },

        tableData: {
            type: Array,
            required: true
        },

        viewRoute: {
            type: String,
            default: null
        },

        filter: {
            type: Function,
            default: () => { return true }
        }
    },

    computed: {
        sortedData () {
            return this.tableData.filter(this.filter)
                .sort((a, b) => {
                    const firstValue = a[this.sortField]
                    const secondValue = b[this.sortField]
                    
                    let comparison = 0;
                    if (firstValue > secondValue) {
                        comparison = 1;
                    } else if (firstValue < secondValue) {
                        comparison = -1;
                    }
                    return (
                        this.sortDirection ? (comparison * -1) : comparison
                    )
                })
        }
    },

    methods: {
        view (item) {
            this.$router.push({
                name: this.viewRoute,
                params: {
                    id: item.id
                }
            })
        }
    }
}
</script>
