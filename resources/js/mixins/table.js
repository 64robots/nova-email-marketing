export default {
  props: {
    search: {
      type: String,
      default: '',
    },
  },

  data() {
    return {
      sortField: 'name',
      sortDirection: false,
    }
  },

  methods: {
    sort(field) {
      if (field.attribute === this.sortField) {
        this.sortDirection = !this.sortDirection
      } else {
        this.sortField = field.attribute
        this.sortDirection = false
      }
    },
  },
}
