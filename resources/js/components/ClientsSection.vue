<template>
    <section class="w-full bg-white text-black py-[min(121px,16.8vw)] lg:py-44 flex flex-col px-[min(14%,104px)] xl:px-0">
        <div class="flex flex-col mx-auto w-full max-w-[1480px]">
            <h2 class="font-Calibri font-bold tracking-widest text-[min(52px,7.2vw)] xl:text-[58px] mb-28">OUR CLIENTS</h2>
            <div class="w-full grid grid-cols-2 xl:grid-cols-3 gap-20 lg:gap-40 items-center">
                <div v-for="client in clients" :key="client.name" class="w-full max-w-[296px] relative block justify-center">
                    <img :alt="client.name + ' Logo'" :src="client.logo" class="block" />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "ClientsSection",
    data() {
        return {
            clients: [
                { name: "Samsung", logo: "assets/images/Samsung.cf06ee23.svg" },
                { name: "Philip Morris", logo: "assets/images/philip-morris-international-dark.webp" },
                { name: "Beiersdorf", logo: "assets/images/beiersdorf.webp" },
                { name: "VR Therapies", logo: "assets/images/VR-LOGO-HORIZONTAL-ALL BLACK.57a1bfd8.svg" },
                { name: "Priority Pass", logo: "assets/images/Priority_Pass_logo_small-black.webp" },
                { name: "Spond", logo: "assets/images/spond-logo-white-out.webp" },
            ],
        };
    },
};
</script>
