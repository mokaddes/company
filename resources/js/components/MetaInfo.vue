<template>
    <Head>
        <title>{{ metaTitle }}</title>
        <meta name="description" :content="metaDescription">
        <meta name="keywords" :content="metaKeywords">
        <meta property="og:title" :content="metaTitle">
        <meta property="og:description" :content="metaDescription">
        <meta property="og:image" :content="ogImage">
        <meta property="og:type" content="website">
        <meta property="og:url" :content="ogUrl">
    </Head>
</template>

<script>
import { Head } from '@inertiajs/vue3';

export default {
    components: { Head },
    name: "MetaInfo",
    props: {
        title: {
            type: String,
            default: "Default title for the site."
        },
        metaTitle: {
            type: String,
            default: null,
        },
        metaDescription: {
            type: String,
            default: null,
        },
        metaKeywords: {
            type: String,
            default: null,
        },
        ogImage: {
            type: String,
            default: null,
        },
        ogUrl: {
            type: String,
            default: () => window.location.href,
        },
    },
    computed: {
        // Compute values by prioritizing props, falling back to settings or defaults
        finalTitle() {
            return this.metaTitle || this.$page.props.setting?.meta_title || this.title;
        },
        metaDescriptionComputed() {
            return this.metaDescription || this.$page.props.setting?.meta_description || "Default description for the site.";
        },
        metaKeywordsComputed() {
            return this.metaKeywords || this.$page.props.setting?.meta_keywords || "default, keywords";
        },
        ogImageComputed() {
            return this.ogImage || this.$page.props.setting?.og_image || "/default-image.jpg";
        },
        ogUrlComputed() {
            return this.ogUrl || window.location.href;
        },
    },
};
</script>
