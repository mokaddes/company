<template>
    <MetaInfo :title="metaData.page_slug"
              :metaTitle="metaData.title"
              :metaDescription="metaData.description"
              :metaKeywords="metaData.keywords"
              :ogImage="metaData.image"
    />
    <Layout>
        <div class="w-full bg-black flex flex-col justify-center">
        <main class="w-full mx-auto">
            <!-- Video Section -->
            <AboutBannerSection
                :bannerSrc="bannerSrc"
                :bannerTitle="bannerTitle"
                :missionTitle="missionTitle"
                :missionDescription="missionDescription"
                :visionTitle="visionTitle"
                :visionDescription="visionDescription"
            />
            <!-- Team Gallery Section -->
            <AboutTeamSection
                :title="about.team_title"
                :teamImages="teamImages"
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
import MetaInfo from "@/components/MetaInfo.vue";


export default {
    components: {AboutMobileImage, Layout, AboutBannerSection, AboutTeamSection, AboutConnectSection, Head, MetaInfo},

    props: {
        about: {
            type: Object,
            required: true,
        },
        teams: {
            type: Object,
            required: true,
        },
        metaData: {
            type: Object,
            default: () => ({}),
        }

    },
    data() {
        console.log(this.metadata);
        return {
            teamImages: this.teams,
            bannerSrc: this.about.image,
            bannerTitle: this.about.title,
            missionTitle: this.about.mission_title,
            missionDescription: this.about.mission_description,
            visionTitle: this.about.vision_title,
            visionDescription: this.about.vision_description,
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
