<template>
    <Layout>
        <div class="w-full  relative flex flex-col justify-center overflow-hidden">
            <section class="relative bg-black w-full max-w-[1920px]    text-white flex flex-col mx-auto">
                <div class="relative w-full z-10 flex items-center justify-center">
                    <img alt="Header Photo"
                         class="hidden lg:block" data-nimg="1"
                         decoding="async" height="526"
                         loading="eager"
                         :src="asset('assets/images/contact.webp')"
                         style="color: transparent;"
                         width="1920">
                    <img
                        alt="Header Photo" class="block lg:hidden" data-nimg="1" decoding="async" height="530"
                        loading="lazy"
                        :src="asset('assets/images/contact.webp')"
                        style="color: transparent;"
                        width="720">
                    <div
                        class="block absolute max-w-[700px] w-[100vw] lg:w-[min(644px,33vw)] right-[max(-50%,-358px)]  bottom-[max(-31%,-158px)]  lg:right-[-7%] lg:bottom-[-27%] z-10">
                        <img alt="Slats" data-nimg="1" decoding="async" height="410" loading="eager"
                             :src="asset('assets/images/Slats.png')"
                             style="color: transparent;"
                             width="644">
                    </div>
                </div>
            </section>
            <section
                class="w-full relative bg-black text-white pt-[min(138px,19vw)] lg:pt-[140px] pb-52 flex flex-col  z-[0]">
                <div class="flex flex-col  mx-auto w-full px-[min(14%,104px)] xl:px-0" style="max-width: 1350px;"><h2
                    class="font-Calibri uppercase font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[58px] mb-[min(70px,9vw)] lg:mb-[40px]">
                    CONTACT US</h2>
                    <p class="text-[22px] max-w-[925px]">We’d love to hear from you, whether you want to join our team
                        or discuss an opportunity to work together.</p>
                    <div
                        class="w-full max-w-[1330px]  h-50 self-end grid grid-cols-1 lg:grid-cols-3 gap-[38.5px] my-[min(120px,16vw)] lg:my-[105px] ">
                        <div class="max-w-[400px] col-span-1 row-span-2"><h3
                            class="border-b-2 border-solid uppercase tracking-widest font-Calibri text-[28px] pb-[18.5px]"
                            style="border-color: rgb(225, 95, 70);">Address</h3>
                            <p class="mt-[15.5px] text-[22px] ">London Office:<br>10 Queen Street Place, London, EC4R
                                1BE<br><br>Chertsey Office:<br>3000 Hillswood Drive<br>Hillswood Business Park<br>Chertsey,
                                Surrey, KT16 0RS</p></div>
                        <div class="max-w-[400px] col-span-1 row-span-1"><h3
                            class="border-b-2 border-solid uppercase tracking-widest font-Calibri text-[28px] pb-[18.5px]"
                            style="border-color: rgb(233, 172, 68);">work with us</h3><a
                            href="mailto:newbusiness@cheil.com"
                            target="_self">
                            <p class="mt-[15.5px] text-[22px] underline">newbusiness@cheil.com</p></a></div>
                        <div class="max-w-[400px] col-span-1 row-span-1"><h3
                            class="border-b-2 border-solid uppercase tracking-widest font-Calibri text-[28px] pb-[18.5px]"
                            style="border-color: rgb(84, 166, 205);">LINKEDIN</h3><a
                            href="https://www.linkedin.com/company/cheil-uk"
                            target="_blank">
                            <p class="mt-[15.5px] text-[22px] underline">Pop on over to our LinkedIn page</p></a></div>
                        <div class="max-w-[400px] col-span-1 row-span-1"><h3
                            class="border-b-2 border-solid uppercase tracking-widest font-Calibri text-[28px] pb-[18.5px]"
                            style="border-color: rgb(153, 200, 115);">JOBS</h3><a
                            href="https://apply.workable.com/cheil/"
                            target="_blank">
                            <p class="mt-[15.5px] text-[22px] underline">Take a look at our current job
                                opportunities</p></a></div>
                        <div class="max-w-[400px] col-span-1 row-span-1"><h3
                            class="border-b-2 border-solid uppercase tracking-widest font-Calibri text-[28px] pb-[18.5px]"
                            style="border-color: rgb(216, 106, 157);">EMAIL</h3><a href="mailto:workwithus@cheil.com"
                                                                                   target="_self"><p
                            class="mt-[15.5px] text-[22px] underline">Drop us a note: workwithus@cheil.com</p></a></div>
                    </div>
                </div>
            </section>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";

export default {
    name: 'Contact',
    components: {Layout},
};
</script>
