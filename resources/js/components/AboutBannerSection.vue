<template>
    <section class="relative bg-black w-full max-w-[1920px] text-white flex flex-col mx-auto overflow-hidden">
        <!-- Video Background -->
        <div class="h-full lg:h-auto left-0 top-0 absolute lg:relative w-full object-cover">
            <div class="absolute lg:relative w-full h-full cover-video">
                <video
                    :src="videoSrc"
                    class="left-[50%] translate-x-[-50%] h-full lg:h-auto lg:w-full lg:left-0 lg:translate-x-0 absolute lg:relative"
                    autoplay
                    loop
                    muted
                    playsinline
                ></video>
            </div>
        </div>

        <!-- Overlay -->
        <div class="absolute w-full h-full bg-black bg-opacity-80"></div>

        <!-- Title Section -->
        <div class="relative px-[min(14%,104px)] pt-[min(113px,16vw)] lg:pt-0 lg:px-0 lg:absolute lg:top-[23%] lg:left-[8.33%]">
            <h2 class="font-Calibri font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[58px] mb-[min(273px,38vw)] lg:mb-0">
                {{ title }}
            </h2>
        </div>

        <!-- SVG Image -->
        <div class="max-w-[644px] lg:max-w-[943px] block absolute w-[100%] lg:w-[min(943px,49vw)] right-[-35%] top-[0%] lg:left-[13%] lg:top-[22.6%]">
            <img :alt="imageAlt" class="w-full" :src="imageSrc" />
        </div>

        <!-- Description Section -->
        <div class="relative lg:absolute w-full px-[min(14%,104px)] lg:px-0 lg:w-[45%] lg:left-[55%] lg:top-[35%] mb-[min(87px,12vw)] lg:mb-0">
            <p v-for="(paragraph, index) in description" :key="index" class="text-[min(34px,4.72vw)] lg:text-[min(26px,1.7vw)] xl:text-22px my-4 xl:my-11">
                {{ paragraph }}
            </p>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        videoSrc: {
            type: String,
            required: true,
            default: 'assets/images/coverVideoV2.mp4',
        },
        title: {
            type: String,
            default: 'ABOUT US',
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
        description: {
            type: Array,
            default: () => [
                'At Cheil, we aren’t defined by channel, capability, or output. We are defined by doing what works.',
                'To drive growth for brands, we operate using performance principles - constantly learning, optimizing, and evolving. We believe in the power of collaboration, working together to see the bigger picture to redefine what’s possible.',
                'With a team of 180+ experts in various fields, we have the knowledge to create deeper, more rewarding experiences for your customers.',
            ],
        },
    },
};
</script>

<style scoped>
/* Scoped styles if needed */
</style>
