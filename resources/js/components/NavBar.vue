<template>
    <nav class="w-full flex flex-col bg-white sticky top-0 z-30 drop-shadow-md">
        <div
            class="w-full flex flex-row justify-between px-[min(6.99vw,50px)] lg:pl-12 lg:pr-[140px] h-[75px] lg:h-[100px] items-center mx-auto"
            :style="{ maxWidth: '1920px' }"
        >
            <Link :href="route('frontend.home')">
                <img
                    alt="Cheil Worldwide Logo"
                    loading="eager"
                    width="125"
                    height="39"
                    decoding="async"
                    class="max-h-[25.5px] lg:max-h-[40px]"
                    style="color:transparent"
                    :src="asset('assets/images/Cheil_Worldwide_logo.ccf58f6e.svg')"
                />
            </Link>



            <!-- Desktop Menu -->
            <div class="gap-[40px] hidden lg:flex">
                <NavItem
                    label="About Us"
                    routeName="frontend.about"
                    :active="route().current('frontend.about')"
                />
                <NavItem
                    label="Work"
                    routeName="frontend.work"
                    :active="route().current('frontend.work') || route().current('frontend.work.detail')"
                />
                <NavItem
                    label="News & Views"
                    routeName="frontend.blog"
                    :active="route().current('frontend.blog') || route().current('frontend.blog.detail')"
                />
                <NavItem
                    label="Services"
                    routeName="frontend.service"
                    :active="route().current('frontend.service')"
                />
                <NavItem
                    label="SHIFT"
                    routeName="frontend.shift"
                    :active="route().current('frontend.shift')"
                />
                <NavItem
                    label="Contact Us"
                    routeName="frontend.contact"
                    :active="route().current('frontend.contact')"
                />
            </div>


            <!-- Mobile Menu Toggle -->
            <div class="flex lg:hidden aspect-square w-10 z-40 cursor-pointer dex_btn" @click="toggleMobileMenu">
                <NavbarSVG />
            </div>
        </div>

        <!-- Mobile Menu Component -->
        <MobileMenu v-if="isMobileMenuOpen" @close="toggleMobileMenu" />
    </nav>
</template>

<script>
import MobileMenu from "./MobileMenu.vue";
import NavItem from "./NavItem.vue";
import NavbarSVG from "@/components/NavbarSVG.vue";
import { Link } from '@inertiajs/vue3';

export default {
    components: {NavbarSVG, MobileMenu, NavItem, Link },
    data() {
        return {
            isMobileMenuOpen: false,
        };
    },
    methods: {
        toggleMobileMenu() {
            this.isMobileMenuOpen = !this.isMobileMenuOpen;
        },

        asset(path) {
            let url = import.meta.env.VITE_APP_URL;
            if (!path) {
                return `${url}/asset/images/default.png`;
            }
            return `${url}/${path}`;
        },
    },

};
</script>
