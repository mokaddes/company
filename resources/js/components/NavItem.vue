<template>
    <Link :href="route(routeName)">
        <p
            class="font-CheilRoman text-[22px] whitespace-nowrap hover:nav-active nav-item"
            :class="{'nav-active': active}"
        >
            {{ label }}
        </p>

    </Link>
</template>

<script>
import {Link} from '@inertiajs/vue3';

export default {
    components: {Link},
    props: {
        label: String,
        routeName: String,
        active: Boolean,
    },
};
</script>

<style scoped>
.nav-item {
    position: relative; /* Ensure the position context for the :after pseudo-element */
}

.nav-active:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background-color: #f5d361;
    animation: nav-active 0.2s ease-in-out;
}
.nav-item:hover:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background-color: #f5d361;
    animation: nav-active 0.2s ease-in-out;
}
@keyframes nav-active {
    0% {
        width: 0;
        opacity: 0;
    }
    100% {
        width: 100%;
        opacity: 1;
    }
}

</style>
