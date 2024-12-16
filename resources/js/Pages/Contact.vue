<template>
    <MetaInfo :title="metaData.page_slug"
              :metaTitle="metaData.title"
              :metaDescription="metaData.description"
              :metaKeywords="metaData.keywords"
              :ogImage="metaData.image"
    />
    <Layout>
        <div class="w-full  relative flex flex-col justify-center overflow-hidden">
            <section class="relative bg-black w-full max-w-[1920px]    text-white flex flex-col mx-auto">
                <div class="relative w-full z-10 flex items-center justify-center">
                    <img alt="Header Photo"
                         class="hidden lg:block" data-nimg="1"
                         decoding="async" height="526"
                         loading="eager"
                         :src="image"
                         style="color: transparent; max-height: 500px !important;"
                         width="1920">
                    <img
                        alt="Header Photo" class="block lg:hidden" data-nimg="1" decoding="async" height="530"
                        loading="lazy"
                        :src="image"
                        style="color: transparent; max-height: 450px !important;"
                        width="720">
                    <div
                        class="block absolute max-w-[700px] w-[100vw] lg:w-[min(644px,33vw)] right-[max(-50%,-358px)]  bottom-[max(-31%,-158px)]  lg:right-[-7%] lg:bottom-[-27%] z-10">
                        <img alt="Slats" data-nimg="1" decoding="async" height="410" loading="eager"
                             :src="asset('assets/images/Slats.png')"
                             style="color: transparent;"
                             width="644">
                    </div>
                </div>
            </section>
            <section
                class="w-full bg-black text-white pb-[min(184px,25.5vw)] lg:pb-52 flex flex-col">
                <div class="flex flex-col  mx-auto w-full px-[min(14%,104px)] xl:px-0" style="max-width: 1350px;">
                    <h2
                    class="font-Calibri uppercase font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[58px] mb-[min(70px,9vw)] lg:mb-[40px]">
                    {{ title.toUpperCase() }}
                    </h2>
                    <p class="text-[22px] max-w-[925px]">
                       {{ subtitle }}
                    </p>
                    <div
                        class="flex flex-col lg:flex-row mx-auto w-full mt-8 lg:mt-10">
                        <div class="w-full lg:w-2/3">

                            <ContactForm :fromTitle="formTitle"/>
                        </div>
                        <div class="w-full lg:w-1/3 left-lg-right">
                            <div class="max-w-[400px] mb-6 pb-4">
                                <h3 class="border-b-2 border-solid uppercase tracking-widest text-[28px] pb-[5px]"
                                    style="border-color: rgb(216, 106, 157);">EMAIL</h3>
                                <a :href="`mailto:${email}`" target="_self">
                                    <p class="mt-[15.5px] text-[22px]">{{ email }}</p>
                                </a>
                            </div>
                            <div class="max-w-[400px] mb-6 pb-4">
                                <h3
                                    class="border-b-2 border-solid uppercase tracking-widest font-Calibri text-[28px] pb-[5px]"
                                    style="border-color: rgb(106,216,185);">Phone</h3>
                                    <a :href="`tel:${phone}`" target="_self">
                                        <p class="mt-[15.5px] text-[22px] ">{{ phone }}</p>
                                    </a>
                                </div>
                            <div class="max-w-[400px] mb-6 pb-4">
                                <h3
                                    class="border-b-2 border-solid uppercase tracking-widest font-Calibri text-[28px] pb-[18.5px]"
                                    style="border-color: rgb(225, 95, 70);">Address</h3>
                                <p class="mt-[15.5px] text-[22px] ">{{ address }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
import ContactForm from "@/components/ContactForm.vue";
import { Head } from '@inertiajs/vue3';
import MetaInfo from "@/components/MetaInfo.vue";

export default {
    name: 'Contact',
    components: {MetaInfo, ContactForm, Layout, Head},

    props:{
        metaData: {
            type: Object,
            default: () => ({}),
        }
    },

    data() {
        return {
            title: this.$page.props.setting.contact_title,
            subtitle: this.$page.props.setting.contact_subtitle,
            formTitle: this.$page.props.setting.contact_form_title,
            image: this.$page.props.setting.contact_image,
            email: this.$page.props.setting.email,
            phone: this.$page.props.setting.phone_no,
            address: this.$page.props.setting.office_address,
        };
    },
};
</script>

<style scoped>
/* Add any page-specific styles here */
@media (max-width: 1023px) {
    .left-lg-right {
        text-align: left;
    }
}

@media (min-width: 1024px) {
    .left-lg-right {
        text-align: right;
    }
}

</style>
