<template>
    <footer class="w-full bg-white flex flex-col">
        <div class="w-full flex flex-col lg:flex-row-reverse p-0 justify-between mx-auto relative" style="max-width:1920px">
            <div class="max-w-full w-auto relative block lg:h-[232px]" style="aspect-ratio:318.84 / 141.71; transform:scale(1.003)">
                <img alt="Cheil Logo" loading="lazy" decoding="async" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" :src="asset('assets/images/logo-signature-cheil-02.svg')" />
            </div>
            <div class="w-full flex flex-col w-min-[30%] lg:w-1/3 pl-[min(5rem,3%)] lg:pl-20 py-11 lg:h-full justify-center items-center lg:items-start">
                <img alt="Cheil Worldwide Logo" loading="lazy" width="225" height="39" decoding="async" style="color:transparent" :src="logo" />
                <div class="flex flex-col lg:flex-row gap-7 mt-6 mb-5 justify-center lg:justify-start text-center">
                    <NavItem label="About Us" routeName="frontend.about" />
                    <NavItem label="Work" routeName="frontend.work" />
                    <NavItem label="News & Views" routeName="frontend.blog" />
                    <NavItem label="Services" routeName="frontend.service" />
<!--                    <NavItem label="SHIFT" routeName="frontend.shift" />-->
                    <NavItem label="Contact Us" routeName="frontend.contact" />
                </div>
                <p class="font-CheilRoman mt-4 text-sm">
                    © 2024 Cheil UK <inertia-link :href="route('frontend.about')">Legal Stuff</inertia-link>
                </p>
            </div>
        </div>
    </footer>
</template>

<script>
import NavItem from "@/components/NavItem.vue";

export default {
    components: {
        NavItem,
    },

    computed: {
        logo() {
            return this.$page.props.setting.logo;
        },
    }
}
</script>

<style scoped>
/* Add any footer-specific styles here */
</style>
