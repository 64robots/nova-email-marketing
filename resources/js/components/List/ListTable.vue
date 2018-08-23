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
                v-for="member in sortedMembers"
                :key="member.id"
                @click="showMember(member)"
            >
                <td
                    v-for="field in fields"
                    :key="field.attribute"
                    @click="showMember(member)">
                    {{ member[field.attribute] }}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: {
        members: {
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
        requestOrderByChange(field) {
            if (field.attribute === this.sortField) {
                this.sortDirection = !this.sortDirection
            } else {
                this.sortField = field.attribute
                this.sortDirection = false
            }     
        },

        showMember (member) {
            /*
            this.$router.push({
                name: 'nova-email-marketing-tool-list',
                params: {
                    listId: list.id
                }
            })
            */
        }
    },

    computed: {
        sortedMembers () {
            return this.members.filter(member => {
                    return this.search === '' ||
                        member.name.includes(this.search) ||
                        String(list.id).includes(this.search) ||
                        member.email.includes(this.search)
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
