<template>
    <div class="flex justify-between">
        <div class="relative h-9 flex items-center mb-6">
                <icon type="search" class="absolute ml-3 text-70" />

            <input
                data-testid="search-input"
                dusk="search"
                class="appearance-none form-control form-input w-search pl-search"
                placeholder="Search"
                type="search"
                :value="value"
                @input="$emit('input', $event.target.value)">
        </div>               
    </div>
</template>

<script>
export default {
    props: {
        value: {
            type: String,
            required: true
        }
    }
}
</script>
