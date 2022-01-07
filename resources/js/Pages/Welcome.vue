<template>
    <Head title="Welcome" />
</template>

<style scoped>

</style>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
      Head,
      Link,
    },
    props: {
        customers: Array,
    },

}
</script>
