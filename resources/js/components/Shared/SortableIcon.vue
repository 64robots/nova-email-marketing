<template>
    <span
        @click.prevent="handleClick"
        class="cursor-pointer inline-flex items-center"
    >
        <slot />

        <svg
            class="ml-2"
            xmlns="http://www.w3.org/2000/svg"
            width="8"
            height="14"
            viewBox="0 0 8 14"
        >
            <g
                id="sortable-icon"
                fill="none"
                fill-rule="evenodd"
            >
                <path
                    :class="descClass"
                    id="Path-2-Copy-3"
                    d="M1.70710678 4.70710678c-.39052429.39052429-1.02368927.39052429-1.41421356 0-.3905243-.39052429-.3905243-1.02368927 0-1.41421356l3-3c.39052429-.3905243 1.02368927-.3905243 1.41421356 0l3 3c.39052429.39052429.39052429 1.02368927 0 1.41421356-.39052429.39052429-1.02368927.39052429-1.41421356 0L4 2.41421356 1.70710678 4.70710678z"
                />
                <path
                    :class="ascClass"
                    id="Combined-Shape-Copy-3"
                    fill-rule="nonzero"
                    d="M6.29289322 9.29289322c.39052429-.39052429 1.02368927-.39052429 1.41421356 0 .39052429.39052429.39052429 1.02368928 0 1.41421358l-3 3c-.39052429.3905243-1.02368927.3905243-1.41421356 0l-3-3c-.3905243-.3905243-.3905243-1.02368929 0-1.41421358.3905243-.39052429 1.02368927-.39052429 1.41421356 0L4 11.5857864l2.29289322-2.29289318z"
                />
            </g>
        </svg>
    </span>
</template>

<script>
    export default {
        props: {
            field: {
                type: String,
                required: true
            },

            sortField: {
                type: String,
                required: true
            },

            sortDirection: {
                type: Boolean,
                required: true
            }
        },

        methods: {
            handleClick() {
                this.$emit('sort')
            }
        },

        computed: {
            /**
             * The CSS class to apply to the ascending arrow icon
             */
            ascClass() {
                if (this.isSorted && !this.sortDirection) {
                    return 'fill-80'
                }

                return 'fill-60'
            },

            /**
             * The CSS class to apply to the descending arrow icon
             */
            descClass() {
                if (this.isSorted && this.sortDirection) {
                    return 'fill-80'
                }

                return 'fill-60'
            },

            /**
             * Determine whether this column is being sorted
             */
            isSorted() {
                return this.sortField == this.field
            }
        },
    }
</script>
