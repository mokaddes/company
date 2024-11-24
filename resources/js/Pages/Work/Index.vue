<template>
    <Head>
        <title>Work</title>
    </Head>
    <Layout>
        <div class="mx-auto w-full max-w-[1920px]  bg-black flex flex-col justify-center overflow-hidden relative">
        <!-- Slats Background Image for Large Screens -->
        <div class="hidden md:block absolute top-0 right-0 md:left-[50%] md:w-[864px]">
            <img src="assets/images/Slats.png" alt="Slats" class="w-[864px] h-[371px]" />
        </div>

        <!-- Slats Background Image for Small Screens -->
        <div class="block md:hidden max-w-[644px] absolute w-full right-[-35%] top-0">
            <img src="assets/images/Slats.png" alt="Slats" class="w-full" />
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
                <WorkCard
                    slug="frontend-work-detail"
                    title="Creating a moment in time at Baselworld"
                    image="https://images.prismic.io/cheil-uk/6511948afbd9a45bcec80385_fbrsdhrh.jpg"
                    company="Samsung"
                    description="Want to deliver a world-class conference that inspires audiences?"
                    btnColor="#1d9b78c9"
                    btnText="Want to deliver a world class conference that inspires audiences?"
                />

                <!-- Item 2 -->
                <WorkCard
                    slug="frontend-work-detail"
                    title="Powering Pet Owners"
                    image="https://images.prismic.io/cheil-uk/7f871bc8-ae61-4d17-9d19-1b2287de3ef5_Jet+Pet+Standing+Dog2.jpg"
                    company="Samsung"
                    description="Want to send your product viral?"
                    btnColor="#c50dd1"
                    btnText="See how"
                />

                <!-- Item 3 -->
                <WorkCard
                    slug="frontend-work-detail"
                    title="Helping Men Embrace their Sensitive Side"
                    image="https://images.prismic.io/cheil-uk/12f7eab8-f4d2-4ef5-bb80-40f1ac6c4be9_maxresdefault.jpg"
                    company="NIVEA"
                    description="Looking to create a campaign that makes a difference?"
                    btnColor="#1fb871"
                    btnText="See how"
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
};
</script>

<style scoped>


</style>
