<template>
    <div class="grid grid-cols-3 gap-2 lg:px-[min(5%,50px)]">
        <div v-for="item in items" :key="item.name"
             class="iconbox relative flex flex-col justify-center items-center min-h-[130px] min-w-[100px] xl:h-[130px] text-center overflow-hidden bg-[#0C0C0C]"
             @mouseenter="setActiveContent(item)"
             @mouseleave="resetContent">
            <!-- Icon Image -->
            <div class="h-3/5 w-3/5 p-4 absolute top-3">
                <img :src="`/assets/images/${item.icon}`" :alt="item.name"
                     class="p-3" decoding="async" loading="lazy"
                     style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
            </div>
            <!-- Name Text -->
            <p class="absolute inset-x-0 bottom-2 text-sm line-height-s">{{ item.name }}</p>

            <!-- Animated Borders -->
            <span class="border-side side-bottom" :style="{ borderColor: borderColor }"></span>
            <span class="border-side side-left" :style="{ borderColor: borderColor }"></span>
            <span class="border-side side-top" :style="{ borderColor: borderColor }"></span>
            <span class="border-side side-right" :style="{ borderColor: borderColor }"></span>
        </div>
    </div>


    <!-- Dynamic Header, Subheader, and Description -->
    <div class="relative min-h-[470px] overflow-hidden pl-14">
        <div class="flex flex-col text-[22px]">
            <!-- Dynamic Header -->
            <h1 class="text-[min(60px,8.3vw)] lg:text-[36px] font-Calibri uppercase tracking-widest" :style="{ color: borderColor }">
                {{ activeHeader }}
            </h1>
            <!-- Dynamic Subheader -->
            <p class="font-bold text-[min(28px,3.88vw)] lg:text-[22px] my-5 font-Calibri">
                {{ activeSubheader }}
            </p>
            <!-- Dynamic Description -->
            <p class="text-[min(28px,3.88vw)] lg:text-[22px] my-5 font-Calibri">
                {{ activeDescription }}
            </p>
        </div>
    </div>



</template>
<script>
export default {
    name: 'ServiceIconBox',
    data() {
        return {
            activeHeader: "Our Expertise",
            activeSubheader: "We develop, optimise and localise global brands",
            activeDescription: "We are experts at customising, engineering, testing and publishing content for local market BAU activity and campaigns...",
            borderColor: '#19becc',
            items: [
                { name: 'Strategy', color: '#1E90FF', header: 'Our Strategy', subheader: 'Strategy Subheader', description: 'Strategy Description', icon: 'strategy.svg' },
                { name: 'Connected Commerce', color: '#32CD32', header: 'Connected Commerce', subheader: 'Commerce Subheader', description: 'Commerce Description', icon: 'connected.svg' },
                { name: 'Experiential', color: '#FFA500', header: 'Experiential Marketing', subheader: 'Experiential Subheader', description: 'Experiential Description', icon: 'experiential.svg' },
                { name: 'Retail', color: '#FF4500', header: 'Retail Solutions', subheader: 'Retail Subheader', description: 'Retail Description', icon: 'retail.svg' },
                { name: 'Customer Experience', color: '#FF1493', header: 'Customer Experience', subheader: 'Experience Subheader', description: 'Experience Description', icon: 'production.svg' },
                { name: 'Media', color: '#1E90FF', header: 'Media Services', subheader: 'Media Subheader', description: 'Media Description', icon: 'media.svg' },
                { name: 'Data', color: '#32CD32', header: 'Data Analytics', subheader: 'Data Subheader', description: 'Data Description', icon: 'data.svg' },
                { name: 'Creative', color: '#FFA500', header: 'Creative Design', subheader: 'Creative Subheader', description: 'Creative Description', icon: 'creative.svg' },
                { name: 'Global Web Operations', color: '#FF4500', header: 'Web Operations', subheader: 'Operations Subheader', description: 'Operations Description', icon: 'ops.svg' }
            ]
        };
    },
    methods: {
        setActiveContent(item) {
            this.activeHeader = item.header;
            this.activeSubheader = item.subheader;
            this.activeDescription = item.description;
            this.borderColor = item.color;
        },
        resetContent() {
            this.activeHeader = "Our Expertise";
            this.activeSubheader = "We develop, optimise and localise global brands";
            this.activeDescription = "We are experts at customising, engineering, testing and publishing content for local market BAU activity and campaigns...";
            this.borderColor = '#19becc';
        }
    }

};
</script>



<style scoped>
/* General styles for iconbox */
.iconbox {
    position: relative;
    background-color: #0C0C0C; /* Example background */
    overflow: hidden;
}

/* Styling for the border sides, initially transparent */
.iconbox .border-side {
    position: absolute;
    border-color: transparent; /* Border starts as invisible */
    transition: border-color 0.3s ease, width 0.5s ease, height 0.5s ease; /* Smooth transition */
}


/* Bottom border */
.iconbox .side-bottom {
    bottom: 0;
    left: 0;
    width: 0%; /* Start width at 0 to animate */
    height: 2px; /* Border thickness */
    border-bottom: 2px solid;
}

/* Left border */
.iconbox .side-left {
    top: 0;
    left: 0;
    width: 2px; /* Border thickness */
    height: 0%; /* Start height at 0 to animate */
    border-left: 2px solid;
}

/* Top border */
.iconbox .side-top {
    top: 0;
    left: 0;
    width: 0%; /* Start width at 0 to animate */
    height: 2px; /* Border thickness */
    border-top: 2px solid;
}

/* Right border */
.iconbox .side-right {
    top: 0;
    right: 0;
    width: 2px; /* Border thickness */
    height: 0%; /* Start height at 0 to animate */
    border-right: 2px solid;
}

/* Hover effect to show the borders only on the hovered iconbox */
.iconbox:hover .side-bottom {
    border-color: currentColor; /* Apply color */
    width: 100%; /* Animate to full width */
}

.iconbox:hover .side-left {
    border-color: currentColor; /* Apply color */
    height: 100%; /* Animate to full height */
}

.iconbox:hover .side-top {
    border-color: currentColor; /* Apply color */
    width: 100%; /* Animate to full width */
}

.iconbox:hover .side-right {
    border-color: currentColor; /* Apply color */
    height: 100%; /* Animate to full height */
}


</style>
