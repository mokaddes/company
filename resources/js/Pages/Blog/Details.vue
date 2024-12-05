<template>
    <Layout>
        <div class="mx-auto w-full max-w-[1920px] flex flex-col justify-center overflow-hidden relative bg-black text-white">
            <div
                class="block absolute  w-[100vw] top-[-12vw] left-[50%] md:left-[50%] md:w-[864px] z-10 md:top-[-180px]">
                <img :src="asset('assets/images/Slats.svg')" alt="Slats" class="w-full" data-nimg="1" decoding="async" height="371"
                     loading="lazy"
                     style="color: transparent;" width="864">
            </div>
            <div
                class="max-w-[1680px] w-full flex flex-col justify-center items-center px-0 pt-[min(175px,30.3vw)] lg:py-[190px] lg:px-[5vw] mx-auto relative z-0">
                <div
                    class="uppercase text-[min(60px,8.3vw)] lg:text-[36px] font-bold text-left mx-0 mb-[0px] tracking-[6.3px] w-full px-2">
                    <h1>{{ blog.title }}</h1>
                </div>
                <div class="py-[2.5rem]">
                    <img :src="asset('assets/images/blog_details.webp')" alt="Hero Image" class="w-[1540px] h-[346px]" data-nimg="1" decoding="async"
                         height="346" loading="lazy"
                         style="color: transparent;"
                         width="1540">
                </div>
                <div class="max-w-[1045px] pt-[20px] mx-auto">

                    <div class="flex justify-center flex-col items-center">
                        <div class="w-full" v-html="blog.details">

                        </div>
                    </div>
                </div>
                <div v-if="relatedBlog && relatedBlog.length > 0"
                    class="max-w-[1680px] w-full flex flex-col justify-center px-0 pt-[min(175px,24.3vw)] lg:py-[30px] lg:px-[5vw] mx-auto relative z-0">
                    <h1 class="uppercase text-[min(60px,4.3vw)] lg:text-[25px]  text-left mx-0 mb-[0px] tracking-[6.3px] w-full px-8">
                        More from us:</h1>
                    <div class=" w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-[20px] mb-[min(302px,42vw)] md:mb-[212px] ">
                        <BlogItem v-for="item in relatedBlog" :key="item.id" :blog="item" />
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
import {Link} from "@inertiajs/vue3";
import BlogItem from "@/components/BlogItem.vue";

export default {
    name: 'Details',
    components: {BlogItem, Link, Layout},
    props: {
        blog : {
            type : Object
        },
        relatedBlog : {
            type : Object
        }
    }

}
</script>
