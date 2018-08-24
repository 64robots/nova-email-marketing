<template>
    <div>
        <heading
            class="mb-6"
            v-if="tool">
            {{ title }}
        </heading>
        
        <router-view
            v-if="tool"
            :tool="tool"
            @updateTitle="updateTitle">
        </router-view>
    </div>
</template>

<script>
export default {
  data() {
    return {
      pageTitle: '',
      tool: null,
    }
  },

  created() {
    Nova.request()
      .get('/nova-vendor/nova-email-marketing-tool/tool')
      .then(({ data: result }) => {
        this.tool = result
      })
    if (this.$route.name === 'nova-email-marketing-tool') {
      this.$router.push({
        name: 'nova-email-marketing-tool-lists',
      })
    }
  },

  computed: {
    title() {
      let title = this.tool ? this.tool.title : 'Email Marketing'
      return `${title} - ${this.pageTitle}`
    },
  },

  methods: {
    updateTitle(title) {
      this.pageTitle = title
    },
  },
}
</script>

<style>
/* Scoped Styles */
</style>
