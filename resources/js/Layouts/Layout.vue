<script setup>
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";


</script>

<template>
    <div class="w-full flex flex-col h-full">
        <Navbar></Navbar>
        <slot/>
        <Footer></Footer>
    </div>
</template>

<style scoped>
#mobileMenu {
    transition: left .5s ease-in-out;
}
</style>
