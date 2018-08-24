<template>
    <div>
        <SearchInput
            v-model="search" />

        <LoadingCard 
            :loading="loading"
            class="overflow-hidden border border-50">
            <SubscribersTable
                :subscribers="subscribers"
                :search="search" />
        </LoadingCard>
    </div>
</template>

<script>
import SubscribersTable from '../Subscribers/SubscribersTable'
import moment from 'moment'
import PageMixin from '../../mixins/page'

export default {

    props: {
        id: {
            type: String,
            required: true
        }
    },

    components: {
        SubscribersTable
    },

    mixins: [ PageMixin ],

    data () {
        return {
            list: [],
            subscribers: []
        }
    },
    
    created () {

        Nova.request().get(`/nova-vendor/nova-email-marketing-tool/lists/${this.id}`)
            .then(({ data: result }) => {
                this.list = result.data
                this.$emit('updateTitle', `${this.tool.pages.list} ${this.list.name}`)
            })

        Nova.request().get(`/nova-vendor/nova-email-marketing-tool/list-subscribers/${this.id}`)
            .then(({ data: result }) => {
                let subscribers = result.data
                subscribers.forEach(member => {
                    member.subscribed_at = moment(member.subscribed_at).format('MM/DD/YYYY')
                })
                this.subscribers = subscribers
                this.loading = false
            })
    },
}
</script>

<style>
    /* Scoped Styles */
</style>
