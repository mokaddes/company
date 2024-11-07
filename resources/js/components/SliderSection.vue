<template>
    <section class="relative bg-black w-full max-w-[1920px] text-white flex flex-col mx-auto pb-[min(227px,31.5vw)] lg:pb-96 overflow-hidden">
        <div class="h-full relative w-full object-cover lg:aspect-video">
            <div class="relative w-full h-full cover-video overflow-hidden lg:overflow-visible">

                <!-- Mobile Video -->
                <video
                    src="assets/images/coverVideoV2.mp4"
                    class="block lg:hidden w-full h-full object-cover"
                    autoplay
                    loop
                    muted
                    playsinline
                ></video>

                <!-- Desktop Video -->
                <video
                    src="assets/images/coverVideoMO.mp4"
                    class="hidden lg:block absolute top-0 left-1/2 transform -translate-x-1/2 h-full lg:w-full object-cover"
                    autoplay
                    loop
                    muted
                    playsinline
                ></video>

                <!-- Decorative Image for Large Screens -->
                <div class="absolute z-10 left-[-22%] top-[-4.5vh] lg:left-auto lg:right-0 lg:top-[-200px] w-[75%] lg:w-auto">
                    <img
                        alt="Slats"
                        loading="lazy"
                        width="644"
                        height="410"
                        decoding="async"
                        style="color: transparent;"
                        srcset="assets/images/Slats.png 1x, assets/images/Slats.png&w=1920&q=75 2x"
                        src="assets/images/Slats.png&w=1920&q=75"
                    >
                </div>

                <!-- Decorative Image for Small Screens -->
                <div class="hidden lg:block absolute z-10 right-[50%] bottom-[-200px]">
                    <img
                        alt="Slats"
                        loading="lazy"
                        width="644"
                        height="410"
                        decoding="async"
                        style="color: transparent;"
                        srcset="assets/images/Slats.png 1x, assets/images/Slats.png&w=1920&q=75 2x"
                        src="assets/images/Slats.png&w=1920&q=75"
                    >
                </div>
            </div>

            <!-- Decorative Image for Mobile -->
            <div class="block lg:hidden absolute z-10 right-[-22%] bottom-[-8.5vh] w-[75%] lg:w-auto">
                <img
                    alt="Slats"
                    loading="lazy"
                    width="644"
                    height="410"
                    decoding="async"
                    style="color: transparent;"
                    srcset="assets/images/Slats.png 1x, assets/images/Slats.png&w=1920&q=75 2x"
                    src="assets/images/Slats.png&w=1920&q=75"
                >
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "SliderSection",
};
</script>
