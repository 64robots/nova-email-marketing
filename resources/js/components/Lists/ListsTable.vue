<template>
    <table
        class="table w-full bg-white"
        cellpadding="0"
        cellspacing="0"
    >
        <thead>
            <tr>

                <!-- Field Names -->
                <th
                    v-for="field in fields"
                    :key="field.attribute"
                    :class="`text-${field.textAlign}`"
                >
                    <sortable-icon
                        @sort="requestOrderByChange(field)"
                        :resource-name="lists"
                        :uri-key="field.attribute"
                        v-if="field.sortable"
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
                v-for="list in sortedLists"
                :key="list.id"
                @click="showList(list)"
            >
                <td
                    v-for="field in fields"
                    :key="field.attribute"
                    @click="showList(list)">
                    {{ list[field.attribute] }}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
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
        ],
        sortField: 'name',
        sortDirection: false
    }),

    methods: {
        requestOrderByChange(field) {
            if (field.attribute === this.sortField) {
                this.sortDirection = !this.sortDirection
            } else {
                this.sortField = field.attribute
                this.sortDirection = false
            }     
        },

        showList (list) {
            console.log('clicked')
            this.$router.push({
                name: 'nova-email-marketing-tool-list',
                params: {
                    listId: list.id
                }
            })
        }
    },

    computed: {
        sortedLists () {
            return this.lists.filter(list => {
                    return this.search === '' ||
                        list.name.includes(this.search) ||
                        String(list.id).includes(this.search) ||
                        list.subscribers === this.search
                })
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
                );
            })
        }
    }
}
</script>
