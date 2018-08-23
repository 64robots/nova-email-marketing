<template>
    <div>
        <heading class="mb-6">
            {{ title }}
        </heading>
        
        <router-view
            @updateTitle="updateTitle">
        </router-view>
    </div>
</template>

<script>
export default {
    data () {
        return {
            pageTitle: '',
            tool: null
        }
    },

    computed: {
        title () {
            let title = this.tool ? this.tool : 'Email Marketing'
            return `${title} - ${this.pageTitle}`
        }
    },

    methods: {
        updateTitle (title) {
            this.pageTitle = title
        }
    }
}
</script>

<style>
    /* Scoped Styles */
</style>
