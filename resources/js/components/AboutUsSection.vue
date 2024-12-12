<template>
    <section class="w-full bg-white text-black py-[min(184px,25.5vw)] lg:py-[100px] flex flex-col">
        <div class="flex flex-col lg:flex-row mx-auto w-full px-[min(14%,104px)] lg:px-[min(4%,104px)] " style="max-width: 1480px;">
            <div class="w-full lg:w-[45%]">
                <h2 class="font-Calibri font-bold tracking-widest text-[min(52px,7.2vw)] lg:text-[58px] mb-10">
                    {{ content.about_title.toUpperCase() }}
                </h2>
            </div>
            <div class="w-full lg:w-[55%]">
                <div class="text-[min(28px,3.88vw)] lg:text-[22px] flex flex-col gap-7 mb-16">
                    {{ content.about_description }}
                </div>
                <Link :href="route('frontend.about')">
                    <button class="border-y-4 border-x-0 border-[#EF89C1] border-solid text-[18px] font-Calibri tracking-[2.5px] uppercase px-[24.5px] py-[18.5px] relative overflow-hidden animatedButton">
                        {{ content.about_btn_text.toUpperCase() }}
                    </button>
                </Link>
            </div>
        </div>
    </section>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    props:{
        content: {
            type: Object,
            required: true,
        },
    },
    name: "AboutUsSection",
    components: { Link },
};
</script>
