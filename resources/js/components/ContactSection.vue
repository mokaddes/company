<template>
    <section class="w-full bg-black text-white py-[min(121px,16.8vw)] lg:py-44 flex flex-col px-[min(14%,104px)] xl:px-0">
        <div class="flex flex-col mx-auto w-full max-w-[1480px]">
            <h2 class="font-Calibri font-bold tracking-widest text-[min(52px,7.2vw)] xl:text-[58px] mb-28">CONTACT</h2>
            <div class="w-full max-w-[1036px] flex flex-col lg:mx-auto lg:flex-row">
                <div class="flex flex-col gap-7 mb-[min(114px,15.8vw)] lg:mb-16 w-full xl:w-1/2">
                    <h2 class="font-Calibri font-light tracking-widest text-[min(48px,6.66vw)] xl:text-[48px]">LET’S CONNECT</h2>
                    <p class="text-[min(26px,3.61vw)] xl:text-[22px] mb-[min(114px,15.8vw)] lg:my-11">Want to become part of our team? We’d love to hear from you.</p>
                    <inertia-link href="/contact">
                        <button class="border-y-4 border-x-0 border-[#EF89C1] border-solid text-[18px] font-Calibri tracking-[2.5px] uppercase px-[24.5px] py-[18.5px] relative overflow-hidden animatedButton">
                            Get in touch
                        </button>
                    </inertia-link>
                </div>
                <div class="py-16 lg:py-0 border-t-2 border-l-0 lg:border-l-2 lg:border-t-0 pl-0 lg:pl-[20%] xl:pl-32 border-white border-solid flex flex-col gap-7 mb-[min(114px,15.8vw)] lg:mb-16 w-full xl:w-1/2">
                    <h2 class="font-Calibri font-light tracking-widest text-[min(48px,6.66vw)] xl:text-[48px]">ADDRESS</h2>
                    <div class="flex flex-col mb-[min(114px,15.8vw)] lg:my-11 text-[min(26px,3.61vw)] xl:text-[22px]">
                        <p>10 Queen Street Place,<br>London EC4R 1BE<br>United Kingdom</p>
                    </div>
                    <a href="mailto:newbusiness@cheil.com">
                        <p class="text-[22px] underline">newbusiness@cheil.com</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "ContactSection",
};
</script>
