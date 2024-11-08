<template>
    <section class="w-full bg-black text-white pt-[min(138px,19vw)] lg:pt-[144px] pb-52 flex flex-col">
        <div class="flex flex-col lg:flex-row mx-auto w-full px-[min(14%,104px)] xl:px-0" style="max-width:1480px">
            <!-- Logo Section -->
            <div class="mx-auto lg:mx-0 w-[60%] lg:w-1/3 self-start flex justify-center lg:justify-end pr-0 lg:pr-[35px] mb-[min(60px,8.33vw)]">
                <img
                    :alt="logoAlt"
                    loading="lazy"
                    width="284"
                    height="69"
                    decoding="async"
                    style="color:transparent"
                    :src="logoSrc"
                />
            </div>

            <!-- Text and Button Section -->
            <div class="w-full lg:w-2/3">
                <div class="text-[min(34px,4.72vw)] lg:text-[22px] flex flex-col gap-7 mb-16">
                    <p>{{ textParagraph1 }}</p>
                    <p>{{ textParagraph2 }}</p>
                </div>
                <a :href="buttonLink" target="_blank">
                    <button class="border-y-4 border-x-0 border-[#EF89C1] border-solid text-[18px] font-Calibri tracking-[2.5px] uppercase px-[24.5px] py-[18.5px] relative overflow-hidden animatedButton">
                        {{ buttonText }}
                    </button>
                </a>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        logoAlt: {
            type: String,
            default: 'Cheil Connect Logo',
        },
        logoSrc: {
            type: String,
            required: true,
        },
        textParagraph1: {
            type: String,
            default: 'Collaboration doesn’t stop at our agency’s front door. With our Cheil Connec+ network, you’ll also have access to a wealth of expertise across the globe, all working together to create bespoke customer experiences across multiple disciplines, channels, and touchpoints.',
        },
        textParagraph2: {
            type: String,
            default: 'Want to find out more about our Cheil Connec+ Network?',
        },
        buttonLink: {
            type: String,
            default: 'https://www.cheilconnect.com/',
        },
        buttonText: {
            type: String,
            default: 'Learn more',
        },
    },
};
</script>

<style scoped>

.animatedButton::before,
.animatedButton::after {
    content: '';
    position: absolute;
    width: 4px; /* Matches the border width */
    height: 100%;
    background-color: #EF89C1;
    transition: transform 0.3s ease;
}

.animatedButton {
    position: relative;
    background-color: transparent;
    transition: background-color 0.3s ease-in-out;
    overflow: hidden;
}

/* Left border animation */
.animatedButton::before {
    left: 0;
    top: -100%;
    transform-origin: top;
    transform: translateY(0);
}

/* Right border animation */
.animatedButton::after {
    right: 0;
    bottom: -100%;
    transform-origin: bottom;
    transform: translateY(0);
}

/* On hover, animate the borders into view */
.animatedButton:hover::before {
    transform: translateY(100%);
}

.animatedButton:hover::after {
    transform: translateY(-100%);
}

/* Button background color on hover */
.animatedButton:hover {
    background-color: #ef89c199;
}

</style>
