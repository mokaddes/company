<template>
    <Link :href="route(routeName)">
        <p class="font-CheilRoman text-[22px] whitespace-nowrap hover:nav-active">{{ label }}</p>
    </Link>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: { Link },
    props: {
        label: String,
        routeName: String,
    },
};
</script>
