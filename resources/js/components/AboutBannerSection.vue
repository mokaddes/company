<template>
    <section class="relative bg-white w-full max-w-[1920px] text-white flex flex-col mx-auto overflow-hidden min-h-screen">
        <!-- Background Image -->
        <div
            class="absolute w-full h-full bg-cover bg-center"
            :style="{ backgroundImage: `url(${bannerSrc})` }"
            :alt="bannerTitle">
        </div>

        <!-- Overlay -->
        <div class="absolute w-full h-full bg-black bg-opacity-80"></div>

        <!-- Title Section -->
        <div class="relative px-[min(14%,104px)] pt-[min(113px,16vw)] lg:pt-0 lg:px-0 lg:absolute lg:top-[23%] lg:left-[8.33%]">
            <h2 class="font-Calibri font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[58px] mb-[min(273px,38vw)] lg:mb-0">
                {{ bannerTitle }}
            </h2>
        </div>

        <!-- SVG Image -->
        <div class="max-w-[644px]  lg:max-w-[943px] block absolute w-[100%] lg:w-[min(943px,49vw)] right-[-35%] top-[0%] lg:left-[5%] lg:top-[35%]">
            <img :alt="imageAlt" class="w-full" :src="asset(imageSrc)" />
        </div>

        <!-- Description Section -->
        <div class="relative lg:absolute w-full px-[min(14%,104px)] lg:px-0 lg:w-[45%] lg:left-[55%] lg:top-[4%] mb-[min(87px,12vw)] lg:mb-0">
            <h4 class="text-[min(34px,4.72vw)] lg:text-[min(26px,1.7vw)] xl:text-22px mb-4 xl:mb-11">
                {{ missionTitle }}
            </h4>
            <p class="text-[min(34px,4.72vw)] lg:text-[min(26px,1.7vw)] xl:text-22px my-4 xl:my-11">
                {{ missionDescription }}
            </p>
            <h4 class="text-[min(34px,4.72vw)] lg:text-[min(26px,1.7vw)] xl:text-22px mb-4 xl:mb-11">
                {{ visionTitle }}
            </h4>
            <p class="text-[min(34px,4.72vw)] lg:text-[min(26px,1.7vw)] xl:text-22px my-4 xl:my-11">
                {{ visionDescription }}
            </p>
        </div>
    </section>

</template>

<script>
export default {
    props: {
        bannerSrc: {
            type: String,
            default: 'assets/images/coverVideoV2.mp4',
        },
        bannerTitle: {
            type: String,
            default: 'ABOUT US',
        },
        missionTitle: {
            type: String,
        },
        missionDescription: {
            type: String,
        },
        visionTitle: {
            type: String,
            required: true,
        },
        visionDescription: {
            type: String,
        },
        imageSrc: {
            type: String,
            required: true,
            default: 'assets/images/slats.png',
        },
        imageAlt: {
            type: String,
            default: 'Slats',
        },
    },
};
</script>

<style scoped>
/* Scoped styles if needed */
</style>
