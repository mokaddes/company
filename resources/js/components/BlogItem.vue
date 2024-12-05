<template>
    <Link :href="route('frontend.blog.detail', `${blog.slug}`)" >
        <div class="w-full h-[346px] bg-center bg-cover relative"
             :style="{ backgroundImage: `url(${blog.image})` }">
            <div class="absolute bottom-0 w-full backdrop-blur-sm p-4">
                <h1 class="title bold text-[min(60px,8.3vw)] lg:text-[26px] tracking-[4.5px] text-black">
                    {{ blog.title }}
                </h1>
                <p class="description font-bold text-[16px] text-black" v-html="truncatedDetails">
                </p>
            </div>
        </div>
    </Link>
</template>
<script >

import {Link} from '@inertiajs/vue3';
export default {

    components: {
        Link,
    },
    name: 'BlogItem',

    props: {
      blog : Object
    },

    computed: {
        truncatedDetails() {
            const details = this.blog.details || "";

            // Strip HTML tags
            const plainText = details.replace(/<[^>]*>/g, "");

            // Truncate the plain text
            const truncatedText =
                plainText.length > 150 ? plainText.substring(0, 150) + "..." : plainText;

            return truncatedText;
        },

    },

   /* data() {
        return {
            blog : {}
        }
    },
    mounted() {
        this.blog = {
            slug: 'with-the-5th',
            title: 'Is VR technology the future of firework displays?',
            description: 'How can businesses use VR to deliver inclusive and eco-friendly experiences',
            image: 'https://images.prismic.io/cheil-uk/Zmx3xJm069VX1xVu_thumb_marketplace.png?auto=format,compress'
        };
    },*/
}

</script>

<style scoped>
/* Apply initial state to p tag */
/* Initial state for the h1 and p tags */
.title, .description {
    transform: translateY(20px); /* Starts slightly below */
    transition: opacity 0.4s ease, transform 0.4s ease;
}
.description{
    opacity: 0;
}

/* Hover effect on parent to make both h1 and p tags appear smoothly */
a:hover .title, a:hover .description {
    opacity: 1;
    transform: translateY(0); /* Moves up smoothly */
}

/* Add a slight delay for the p tag to make it appear after the h1 tag */
.description {
    transition-delay: 0.1s;
}
</style>
