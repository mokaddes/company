<template>
    <Head>
        <title>About Us</title>
    </Head>
    <Layout>
        <div class="w-full bg-black flex flex-col justify-center">
        <main class="w-full mx-auto">
            <!-- Video Section -->
            <AboutBannerSection
                videoSrc="assets/images/coverVideoV2.mp4"
                title="ABOUT US"
                imageSrc="assets/images/slats.png"
                imageAlt="Slats"
                :description="[
                    'We are a team of creative thinkers and problem solvers dedicated to expanding the limits of what is possible by helping brands achieve their goals.',
                    'We utilize our experience working with major global brands to fuel creative innovation that delivers real results.',
                ]"
            />
            <!-- Team Gallery Section -->
            <AboutTeamSection
                title="MEET THE"
                subtitle="TEAM"
                :teamImages="teamImages"
            />
            <AboutMobileImage src="assets/images/about_us_image_03.webp"></AboutMobileImage>

            <!-- About Connect Section -->
            <AboutConnectSection
                logoSrc="assets/images/ConnecPlus.svg"
            />
        </main>
    </div>
    </Layout>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
import AboutBannerSection from "@/components/AboutBannerSection.vue";
import AboutTeamSection from "@/components/AboutTeamSection.vue";
import AboutConnectSection from "@/components/AboutConnectSection.vue";
import AboutMobileImage from "@/components/AboutMobileImage.vue";
import { Head } from '@inertiajs/vue3';


export default {
    components: {AboutMobileImage, Layout, AboutBannerSection, AboutTeamSection, AboutConnectSection, Head},
    data() {
        return {
            teamImages: [
                {
                    src: "assets/images/about_us_image_01.webp",
                    alt: "Team Image 1",
                },
                {
                    src: "assets/images/about_us_image_03.webp",
                    alt: "Team Image 3",
                },
                {
                    src: "assets/images/about_us_image_04.webp",
                    alt: "Team Image 4",
                },
            ],
        };
    },
};
</script>

<style scoped>
.noScrollbars::-webkit-scrollbar {
    display: none;
}
.noScrollbars {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.cover-video video {
    object-fit: cover;
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

.animatedButton {
    position: relative;
    background-color: transparent;
    transition: background-color 0.3s ease-in-out;
    overflow: hidden;
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
