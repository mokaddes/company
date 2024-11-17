<template>
    <Head>
        <title>News & Views</title>
    </Head>
    <Layout>
        <div class="mx-auto w-full max-w-[1920px] flex flex-col justify-center overflow-hidden bg-black relative">
            <div class="hidden md:block absolute top-[0px] right-[0%]  md:left-[calc(50%)] md:w-[864px]"><img
                :src="asset('assets/images/Slats.svg')" alt="Slats" data-nimg="1" decoding="async" height="371"
                loading="eager"
                style="color: transparent;" width="864"></div>
            <div class="block md:hidden max-w-[644px]  absolute w-[100%] right-[-35%] top-[0%]"><img
                :src="asset('assets/images/Slats.svg')" alt="Slats" class="w-full" loading="eager"></div>
            <div
                class="w-full flex flex-col justify-center items-start  max-w-[1540px] mx-auto px-0 md:px-[20px] relative ">
                <div
                    class="h-[min(511px,71vw)] md:h-auto w-full font-Calibri text-white font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[58px] pt-[min(100px,13.9vw)] pl-[min(70px,9.7vw)] md:pt-[192px] md:pb-[143px] text-left relative uppercase">
                    <h1>News &amp; Views</h1></div>
                <div class=" w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-[20px] mb-[min(302px,42vw)] md:mb-[212px] ">
                    <BlogItem v-for="i in 12" :key="i" />
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
import BlogItem from "@/components/BlogItem.vue";
import {Link} from "@inertiajs/vue3";
import { Head } from '@inertiajs/vue3';

export default {
    name: 'Blog',
    components: {Link, BlogItem, Layout, Head},
};
</script>

<style scoped>


</style>
