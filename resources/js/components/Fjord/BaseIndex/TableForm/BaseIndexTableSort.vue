<template>
    <b-dropdown
        right
        variant="outline-secondary"
        v-if="sortBy"
        class="dropdown-md-square-mobile"
        no-caret
    >
        <template v-slot:button-content>
            <fa-icon icon="sort-amount-down" />
            <span class="d-none d-lg-inline-block">{{ __('fj.sort') }}</span>
        </template>

        <b-dropdown-item
            v-for="(text, key) in sortBy"
            :key="key"
            @click="sort(key)"
        >
            <b-form-radio :checked="sort_by_key" :value="key">
                {{ text }}
            </b-form-radio>
        </b-dropdown-item>
    </b-dropdown>
</template>

<script>
export default {
    name: 'BaseIndexTableSort',
    props: {
        sortBy: {
            type: Object,
            required: true
        },
        sortByDefault: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            sort_by_key: ''
        };
    },
    methods: {
        sort(key) {
            this.sort_by_key = key;
            this.$emit('sort', key);
        }
    }
};
</script>
