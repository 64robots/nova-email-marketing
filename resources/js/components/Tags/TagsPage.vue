<template>
    <div>
        <SearchInput
            v-model="search" />

        <LoadingCard 
            :loading="loading"
            class="overflow-hidden border border-50">
            <TagsTable
                :tags="tags"
                :search="search" />
        </LoadingCard>
    </div>
</template>

<script>
import TagsTable from './TagsTable'

export default {

    components: {
        TagsTable
    },

    data () {
        return {
            loading: true,
            tags: [],
            search: ''
        }
    },
    
    created () {
        this.$emit('updateTitle', 'Tags')

        Nova.request().get('/nova-vendor/nova-email-marketing-tool/tags')
            .then(({ data: result }) => {
                this.tags = result.data
                this.loading = false
            })
    },
}
</script>

<style>
    /* Scoped Styles */
</style>
