<script setup>
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";
import MessengerChat from "@/components/MessengerChat.vue";


</script>

<template>
    <div class="w-full flex flex-col h-full">
        <Navbar></Navbar>
        <slot/>
        <Footer></Footer>
        <MessengerChat page-id="1466455226917829"></MessengerChat>
    </div>
</template>

<style scoped>
#mobileMenu {
    transition: left .5s ease-in-out;
}
</style>
