<template>
    <Head>
        <title>Work</title>
    </Head>
    <Layout>
        <div class="mx-auto w-full max-w-[1920px]  bg-black flex flex-col justify-center overflow-hidden relative">
        <!-- Slats Background Image for Large Screens -->
        <div class="hidden md:block absolute top-0 right-0 md:left-[50%] md:w-[864px]">
            <img :src="asset('assets/images/Slats.png')" alt="Slats" class="w-[864px] h-[371px]" />
        </div>

        <!-- Slats Background Image for Small Screens -->
        <div class="block md:hidden max-w-[644px] absolute w-full right-[-35%] top-0">
            <img :src="asset('assets/images/Slats.png')" alt="Slats" class="w-full" />
        </div>

        <!-- Main Content -->
        <div class="w-full flex flex-col justify-center items-start max-w-[1540px] mx-auto px-0 md:px-5 relative">
            <!-- Title Section -->
            <div class="h-[min(511px,71vw)] md:h-auto w-full text-white font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[58px] pt-[min(100px,13.9vw)] pl-[min(70px,9.7vw)] md:pt-[192px] md:pb-[143px] text-left relative">
                <h1>OUR WORK</h1>
            </div>

            <!-- Grid Section -->
            <div class="w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-[min(302px,42vw)] md:mb-[212px]">
                <!-- Item 1 -->
                <WorkCard v-for="work in works" :key="work.id"
                    :slug="work.slug"
                    :title="work.list_title"
                    :image="asset(work.thumbnail)"
                    :company="work.brand"
                    :description="work.subtitle"
                    :btnColor="work.background_color"
                    :btnText="work.button_text"
                />

            </div>
        </div>
    </div>
    </Layout>
</template>

<script>
import WorkCard from '@/components/WorkCard.vue';
import Layout from "@/Layouts/Layout.vue";
import { Head } from '@inertiajs/vue3';

export default {
    components: {
        Layout,
        WorkCard,
        Head
    },
    name: 'Work/Index',
    props: {
        works: Object,
        seoData: Object
    }
};
</script>

<style scoped>


</style>
