<template>
    <Head>
        <title>Service</title>
    </Head>
    <Layout>
        <div class="w-full relative flex flex-col justify-center">
            <section
                class="relative bg-black w-full max-w-[1920px] h-screen  max-h-[730px]   text-white flex flex-col mx-auto overflow-hidden">
                <div class="lg:h-auto left-0 top-0  absolute lg:relative w-full object-cover">
                    <div
                        class="relative object-bottom flex items-center justify-center w-full max-w-[1920px] h-[90vh] max-h-[680px] overflow-hidden mx-auto">
                        <img :src="asset('assets/images/service.png')" alt="Services background" class="hidden lg:block"
                             data-nimg="fill"
                             decoding="async" loading="lazy"
                             sizes="100vw"
                             style="position: absolute; height: 100%; width: 100%; inset: 0px; object-fit: cover; object-position: center center; color: transparent;">
                        <img
                            :src="asset('assets/images/service.png')" alt="Services background" class="lg:hidden"
                            data-nimg="fill" decoding="async"
                            loading="lazy"
                            sizes="100vw"
                            style="position: absolute; height: 100%; width: 100%; inset: 0px; object-fit: cover; object-position: center center; color: transparent;">
                    </div>
                </div>
                <div class="absolute w-full h-full  max-h-[680px] bg-black bg-opacity-0 "></div>
                <div
                    class="relative px-[min(14%,104px)] pt-[min(113px,16vw)] lg:pt-0 lg:px-0 lg:absolute lg:top-[23%] lg:left-[8.33%]"
                    style="opacity: 1; transform: none;">
                    <h2
                        class=" max-md:mt-[-20px] font-Calibri font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[48px]  mb-[min(273px,38vw)] max-md:mb-[min(273px,50vw)] lg:mb-0 .line-height-m">
                        OUR <br class="block lg:hidden">SERVICES</h2>
                </div>
                <div
                    class="  max-w-[600px] max-h-[415px] hidden  lg:block absolute w-[100%]  lg:left-[20%] xl:left-[25%] top-[22.6%]">
                    <img :src="asset('assets/images/Slats.svg')" alt="Slats"
                         class="w-full lg:max-h-[380px] xl:max-h-[415px]" data-nimg="1"
                         decoding="async" height="685"
                         loading="eager"
                         style="color: transparent;" width="943">
                </div>
                <div
                    class=" max-w-[640px] max-h-[400px]  block lg:hidden absolute w-[100%]  left-[53%] sm:left-[53%] top-[0%]">
                    <img :src="asset('assets/images/Slats.svg')" alt="Slats" class="w-full" data-nimg="1"
                         decoding="async" height="408"
                         loading="eager" style="color: transparent;" width="641">
                </div>
                <div
                    class="relative  top-[0%] sm:top-[-15%]  lg:absolute w-full px-[min(14%,104px)] lg:px-0 lg:w-[41.7%] lg:left-[53.75%] lg:top-[60%] xl:top-[46.9%] mb-[min(87px,12vw)] lg:mb-0">
                    <p class="text-[min(28px,3.88vw)]  lg:text-[min(26px,1.7vw)] xl:text-22px lg:my-11 max-w-[611px] max-975:max-w-[100%]">
                        We are an integrated agency with commerce at its heart. Bridging the three worlds of physical,
                        digital and immersive experiences, we work across a broad range of services to forge deeper,
                        more rewarding, connected experiences.<br></p>
                </div>
            </section>
            <section class="w-full relative bg-black text-white lg:pt-[10px] pb-20 md:pb-52 flex flex-col z-[0]">
                <div class="flex flex-col mx-auto w-full lg:px-[min(7%,104px)] xl:px-0" style="max-width: 1350px;">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 gap-y-14 items-start justify-center">
                        <ServiceIconBox/>
                        <div class="md:px-14 max-md:px-[min(14%,104px)]" style="opacity: 1; transform: none;">
                            <div class="">
                                <div class=" lg:translate-y-2/4">
                                    <div>
                                        <h2 class="text-white uppercase text-[6.5vw] max-md:text-[5.5vw] lg:text-[25px]  xl:text-[38px] tracking-[0.15em]  text-left w-full">
                                            Looking to take your
                                        </h2>
                                        <h2 class="text-white uppercase text-[6.5vw] lg:text-[25px] xl:text-[38px] tracking-[0.15em]  text-left w-full max-md:mb-12">
                                            business further?
                                        </h2>
                                    </div>
                                    <br>
                                    <div class="lg:hidden">
                                        <a href="mailto:newbusiness@cheil.com" rel="noopener noreferrer"
                                           target="_blank">
                                            <button
                                                class="border-y-4 border-x-0 border-[#EF89C1] border-solid text-[min(28px,3.88vw)] lg:text-[14px] font-Calibri font-bold tracking-[2.5px] uppercase px-[24.5px] py-[min(25px,3.5vw)] lg:py-[8px] relative overflow-hidden animatedButton hover:text-white w-full">
                                                Let's talk
                                            </button>
                                        </a>
                                    </div>
                                    <div class="hidden lg:block">
                                        <a href="mailto:newbusiness@cheil.com" rel="noopener noreferrer"
                                           target="_blank">
                                            <button
                                                class="border-y-4 border-x-0 border-[#EF89C1] border-solid text-[min(28px,3.88vw)] lg:text-[14px] font-Calibri font-bold tracking-[2.5px] uppercase px-[24.5px] py-[min(25px,3.5vw)] lg:py-[8px] relative overflow-hidden animatedButton hover:text-white">
                                                Let's talk
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block max-975:hidden " style="opacity: 1; transform: none;"><img
                            alt="Small meeting arround a table" data-nimg="1" decoding="async" height="427"
                            loading="lazy"
                            :src="asset('assets/images/lets_talk.webp')"
                            style="color: transparent;"
                            width="640"></div>
                    </div>
                </div>
            </section>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
import ServiceIconBox from "@/components/ServiceIconBox.vue";
import { Head } from '@inertiajs/vue3';

export default {
    name: 'Service',
    components: {ServiceIconBox, Layout, Head},
};
</script>
