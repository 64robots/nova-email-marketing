<template>
    <div>
        <SearchInput
            v-model="search" />

        <LoadingCard 
            :loading="loading"
            class="overflow-hidden border border-50">
            <ListsTable
                :lists="lists"
                :search="search" />
        </LoadingCard>
    </div>
</template>

<script>
import ListsTable from './ListsTable'
import PageMixin from '../../mixins/page'
import SearchInput from '../shared/SearchInput'

export default {
  components: {
    ListsTable,
    SearchInput,
  },

  mixins: [PageMixin],

  data() {
    return {
      lists: [],
    }
  },

  created() {
    this.$emit('updateTitle', this.tool.pages.lists)

    Nova.request()
      .get('/nova-vendor/nova-email-marketing-tool/lists')
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
