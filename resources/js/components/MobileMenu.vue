<template>
    <div
        class="flex flex-row lg:hidden fixed h-screen w-full top-0 bg-black text-white z-50 mobile_menu"
        style="left: 0; transition-property: opacity, left; min-height: -webkit-fill-available;"
    >
        <div class="bg-white h-full w-[min(21.5%,155px)]">
            <div class="h-[75px] justify-center flex">
                <div class="flex lg:hidden aspect-square w-10 mx-auto z-40 cursor-pointer" @click="closeMenu">
                   <NavbarSVG />
                </div>
            </div>
        </div>
        <div class="ml-[min(7vw,50px)] mt-[min(8.75vw,63px)] gap-[min(4.86vw,35px)] flex flex-col text-[#B3B3B3]">
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
<!--                <NavItem
                    label="SHIFT"
                    routeName="frontend.shift"
                    :active="route().current('frontend.shift')"
                />-->
                <NavItem
                    label="Contact Us"
                    routeName="frontend.contact"
                    :active="route().current('frontend.contact')"
                />
            </div>

        </div>
    </div>
</template>

<script>
import NavItem from "./NavItem.vue";
import NavbarSVG from "@/components/NavbarSVG.vue";

export default {
    components: {NavbarSVG, NavItem },
    methods: {
        closeMenu() {
            this.$emit("close");
        },
    },
};
</script>
