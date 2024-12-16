<template>
    <section class="relative bg-black w-full max-w-[1920px] text-white flex flex-col mx-auto pb-0 overflow-hidden">
        <div class="h-full relative w-full object-cover lg:h-[calc(100vh-227px)]">
            <div class="relative w-full h-full cover-image overflow-hidden lg:overflow-visible">
                <!-- Mobile Image -->
                <img
                    :src="banner_image"
                    alt="Banner Mobile"
                    class="block lg:hidden w-full  object-cover"
                    loading="lazy"
                />

                <!-- Desktop Image -->
                <img
                    :src="banner_image"
                    alt="Banner Desktop"
                    class="hidden lg:block absolute top-0 left-1/2 transform -translate-x-1/2  lg:w-full object-cover"
                    loading="lazy"
                />

                <!-- Decorative Image for Large Screens -->
                <div class="absolute z-10 left-[-22%] top-[-4.5vh] lg:left-auto lg:right-0 lg:top-[-200px] w-[75%] lg:w-auto">
                    <img
                        alt="Slats"
                        loading="lazy"
                        width="644"
                        height="410"
                        decoding="async"
                        style="color: transparent;"
                        :src="asset('assets/images/Slats.png')"
                    >
                </div>

                <!-- Decorative Image for Small Screens -->
                <div class="hidden lg:block absolute z-10 right-[55%] bottom-[-160px]">
                    <img
                        alt="Slats"
                        loading="lazy"
                        width="644"
                        height="410"
                        decoding="async"
                        style="color: transparent;"
                        :src="asset('assets/images/Slats.png')"
                    >
                </div>
            </div>
<!--

            &lt;!&ndash; Large Screens &ndash;&gt;
            <div class="hidden md:block absolute z-10 right-[-22%] bottom-[-75.5vh] w-[75%] lg:w-auto">
                <img
                    alt="Slats"
                    loading="lazy"
                    width="644"
                    height="410"
                    decoding="async"
                    style="color: transparent;"
                    :src="asset('assets/images/Slats.png')"
                >
            </div>

            &lt;!&ndash; Medium Screens &ndash;&gt;
            <div class="hidden sm:block md:hidden absolute z-10 right-[-22%] bottom-[-60.5vh] w-[75%] lg:w-auto">
                <img
                    alt="Slats"
                    loading="lazy"
                    width="644"
                    height="410"
                    decoding="async"
                    style="color: transparent;"
                    :src="asset('assets/images/Slats.png')"
                >
            </div>

            &lt;!&ndash; Small Screens &ndash;&gt;
            <div class="block sm:hidden absolute z-10 right-[-22%] bottom-[-48.5vh] w-[75%] lg:w-auto">
                <img
                    alt="Slats"
                    loading="lazy"
                    width="644"
                    height="410"
                    decoding="async"
                    style="color: transparent;"
                    :src="asset('assets/images/Slats.png')"
                >
            </div>
-->


        </div>
    </section>
</template>

<script>

export default {
    props: {
        banner_image: {
            type: String,
            required: true,
        },
    },
    name: "SliderSection",

};
</script>



<style>
/* Optional: Add custom CSS for responsive adjustments if needed */
</style>
