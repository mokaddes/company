<template>
    <section class="w-full bg-white text-black pt-[min(141px,19.58vw)] pb-[min(256px,35.5vw)] lg:py-44 flex flex-col px-0">
        <div class="flex flex-col mx-auto w-full" style="max-width:1920px">
            <div class="w-full max-w-[1480px] mx-auto px-[min(14%,104px)] xl:px-0">
                <h2 class="font-Calibri font-bold tracking-widest text-[min(52px,7.2vw)] xl:text-[58px] mb-[min(66px,9.16vw)] lg:mb-28">
                    {{ title }} <span class="inline lg:hidden"><br /></span> {{ subtitle }}
                </h2>
            </div>

            <!-- Desktop view - Grid layout -->
            <div class="hidden lg:grid grid-cols-3 gap-12">
                <div
                    v-for="(image, index) in teamImages"
                    :key="index"
                    class="min-w-[300px] flex-shrink-0"
                >
                    <img
                        :src="image.src"
                        :alt="image.alt"
                        class="w-full h-auto object-cover"
                        width="300"
                        height="200"
                        loading="lazy"
                    />
                </div>
            </div>

            <!-- Mobile view - Horizontal scroll layout -->
            <div class="flex lg:hidden gap-4 overflow-x-scroll no-scrollbars snap-x snap-mandatory">
                <div
                    v-for="(image, index) in teamImages"
                    :key="index"
                    class="snap-center min-w-[300px] flex-shrink-0"
                >
                    <img
                        :src="image.src"
                        :alt="image.alt"
                        class="w-full h-auto object-cover"
                        width="300"
                        height="200"
                        loading="lazy"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: 'MEET THE',
        },
        subtitle: {
            type: String,
            default: 'TEAM',
        },
        teamImages: {
            type: Array,
            required: true,
            default: () => [
                { src: 'path/to/image1.jpg', alt: 'Team member 1' },
                { src: 'path/to/image2.jpg', alt: 'Team member 2' },
                // Add more default images as needed
            ],
        },
    },
};
</script>

<style scoped>
/* Hide scrollbars */
.noScrollbars::-webkit-scrollbar {
    display: none;
}
.noScrollbars {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
