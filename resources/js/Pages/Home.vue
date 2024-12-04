<template>
    <Head>
        <title>Home</title>
    </Head>
    <Layout>
        <div class="w-full bg-black flex flex-col justify-center">
            <main class="w-full mx-auto ">
                <SliderSection v-if="content.banner_section === 1" :banner_image="content.banner_video" />
                <AboutUsSection v-if="content.about_section === 1" :content="content" />
                <section class="w-full relative bg-black text-white lg:pt-[10px] pb-20 md:pb-22 flex flex-col z-[0]" v-if="content.service_section === 1">
                    <div class="flex flex-col mx-auto w-full  px-[min(14%,104px)] lg:px-[min(4%,104px)] mt-10" >
                        <h2 class="font-Calibri font-bold tracking-widest text-center text-[min(32px,7.2vw)] xl:text-[40px] mb-10 ">{{ content.service_title.toUpperCase() }}</h2>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 gap-y-14 items-start justify-center">
                            <ServiceIconBox :services="services" :activeService="activeService" />
                        </div>
                    </div>
                </section>
                <ClientsSection v-if="content.client_section === 1" :client_title="content.client_title" :clients="clients" />
                <ContactSection v-if="content.contact_section === 1" :content="content"/>
            </main>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
import SliderSection from "@/Components/SliderSection.vue";
import AboutUsSection from "@/Components/AboutUsSection.vue";
import ClientsSection from "@/Components/ClientsSection.vue";
import ContactSection from "@/Components/ContactSection.vue";
import { Head } from '@inertiajs/vue3';
import ServiceIconBox from "@/components/ServiceIconBox.vue";

export default {
    props: ["content", "clients", "services", "activeService"],
    name: 'Home',
    components: {ServiceIconBox, Layout, SliderSection, AboutUsSection, ClientsSection, ContactSection, Head},


};
</script>

<style >
.animatedButton {
    position: relative;
    background-color: transparent;
    transition: background-color 0.3s ease-in-out;
    overflow: hidden;
}

.animatedButton::before,
.animatedButton::after {
    content: '';
    position: absolute;
    width: 4px; /* Matches the border width */
    height: 100%;
    background-color: #EF89C1;
    transition: transform 0.3s ease;
}

/* Left border animation */
.animatedButton::before {
    left: 0;
    top: -100%;
    transform-origin: top;
    transform: translateY(0);
}

/* Right border animation */
.animatedButton::after {
    right: 0;
    bottom: -100%;
    transform-origin: bottom;
    transform: translateY(0);
}

/* On hover, animate the borders into view */
.animatedButton:hover::before {
    transform: translateY(100%);
}

.animatedButton:hover::after {
    transform: translateY(-100%);
}

/* Button background color on hover */
.animatedButton:hover {
    background-color: #ef89c199;
}

</style>
