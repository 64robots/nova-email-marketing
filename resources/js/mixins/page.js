export default {
  props: {
    tool: {
      type: Object,
      default: null,
    },
  },

  data() {
    return {
      loading: true,
      search: '',
    }
  },
}
