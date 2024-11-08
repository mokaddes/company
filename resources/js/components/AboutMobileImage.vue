<template>
    <div class="block lg:hidden w-full aspect-square relative">
        <img
            :alt="alt"
            loading="lazy"
            decoding="async"
            :src="src"
            :sizes="sizes"
            style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
        />
    </div>
</template>

<script>
export default {
    props: {
        alt: {
            type: String,
            default: 'photo',
        },
        src: {
            type: String,
            required: true,
        },
        sizes: {
            type: String,
            default: '100vw',
        },
    },
};
</script>

<style scoped>
/* Add any scoped CSS here if needed */
</style>
