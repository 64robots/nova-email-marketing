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
import SubscribersTable from './SubscribersTable'
import PageMixin from '../../mixins/page'
import moment from 'moment'

export default {
  components: {
    SubscribersTable,
  },

  mixins: [PageMixin],

  data() {
    return {
      subscribers: [],
    }
  },

  created() {
    this.$emit('updateTitle', this.tool.pages.subscribers)

    Nova.request()
      .get('/nova-vendor/nova-email-marketing-tool/subscribers')
      .then(({ data: result }) => {
        if (!result) {
          this.$router.push({
            name: 'nova-email-marketing-tool',
          })
        }
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
