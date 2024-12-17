<template>
    <footer class="w-full bg-white flex flex-col">
        <div class="w-full flex flex-col lg:flex-row-reverse p-0 justify-between mx-auto relative" style="max-width:1920px">
            <!-- Logo Section -->
            <div class="max-w-full w-auto relative block lg:h-[232px]" style="aspect-ratio:318.84 / 141.71; transform:scale(1.003)">
                <img alt="Cheil Logo" loading="lazy" decoding="async" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" :src="asset('assets/images/logo-signature-cheil-02.svg')" />
            </div>

            <!-- Footer Content Section -->
            <div class="w-full flex flex-col lg:w-1/3 pl-[min(5rem,3%)] lg:pl-20 py-11 lg:h-full justify-center items-center lg:items-start">
                <img alt="Cheil Worldwide Logo" loading="lazy" width="225" height="39" decoding="async" style="color:transparent" :src="logo" />

                <!-- Navigation Links -->
                <div class="flex flex-col lg:flex-row gap-7 mt-6 mb-5 justify-center lg:justify-start text-center">
                    <NavItem label="About Us" routeName="frontend.about" />
                    <NavItem label="Work" routeName="frontend.work" />
                    <NavItem label="News & Insight" routeName="frontend.blog" />
                    <NavItem label="Services" routeName="frontend.service" />
                    <NavItem label="Contact Us" routeName="frontend.contact" />
                </div>

                <!-- Social Media Icons -->
                <div class="flex gap-4 mt-6">
                    <a v-if="getSettings.facebook_url" :href="getSettings.facebook_url" target="_blank" aria-label="Facebook" class="hover:text-blue-600">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a v-if="getSettings.twitter_url" :href="getSettings.twitter_url" target="_blank" aria-label="Twitter" class="hover:text-blue-400">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a v-if="getSettings.instagram_url" :href="getSettings.instagram_url" target="_blank" aria-label="Instagram" class="hover:text-pink-500">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a v-if="getSettings.linkedin_url" :href="getSettings.linkedin_url" target="_blank" aria-label="LinkedIn" class="hover:text-blue-700">
                        <i class="fab fa-linkedin-in text-lg"></i>
                    </a>
                    <a v-if="getSettings.youtube_url" :href="getSettings.youtube_url" target="_blank" aria-label="YouTube" class="hover:text-red-600">
                        <i class="fab fa-youtube text-lg"></i>
                    </a>
                    <a v-if="getSettings.whatsapp_number" :href="`https://wa.me/${getSettings.whatsapp_number}`" target="_blank" aria-label="WhatsApp" class="hover:text-green-500">
                        <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                </div>

                <!-- Copyright Text -->
                <p class="font-CheilRoman mt-4 text-sm">
                    © {{ currentYear }} {{ copyright_text }}
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
    },
    data() {
        return {
            currentYear: new Date().getFullYear(),
            copyright_text: this.$page.props.setting.copyright_text,
            getSettings: this.$page.props.setting
        };
    },
};
</script>

<style scoped>
/* Additional styles for social media icons */
a {
    transition: color 0.3s ease;
}
i {
    font-size: 1.25rem;
}
</style>
