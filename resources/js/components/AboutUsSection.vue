<template>
    <section class="w-full bg-black text-white pb-[min(184px,25.5vw)] lg:pb-52 flex flex-col">
        <div class="flex flex-col lg:flex-row mx-auto w-full px-[min(14%,104px)] xl:px-0" style="max-width: 1480px;">
            <div class="w-full lg:w-1/3">
                <h2 class="font-Calibri font-bold tracking-widest text-[min(52px,7.2vw)] lg:text-[58px] mb-10">
                    A LITTLE BIT<br>ABOUT US
                </h2>
            </div>
            <div class="w-full lg:w-2/3">
                <div class="text-[min(28px,3.88vw)] lg:text-[22px] flex flex-col gap-7 mb-16">
                    <p>An integrated agency with commerce at its heart, we bridge the three worlds of physical, digital and immersive...</p>
                    <p>We’re award winners, fast thinkers, makers and doers, tailoring solutions...</p>
                    <p>Find out more about us.</p>
                </div>
                <Link :href="route('frontend.about')">
                    <button class="border-y-4 border-x-0 border-[#EF89C1] border-solid text-[18px] font-Calibri tracking-[2.5px] uppercase px-[24.5px] py-[18.5px] relative overflow-hidden animatedButton">
                        Find out more
                    </button>
                </Link>
            </div>
        </div>
    </section>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    name: "AboutUsSection",
    components: { Link },
};
</script>
