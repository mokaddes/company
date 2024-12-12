<template>
    <div>
        <div id="fb-root"></div>
        <div class="fb-customerchat"
             attribution="setup_tool"
             :page_id="pageId"
             theme_color="#0084ff"
             logged_in_greeting="Hi! How can we help you?"
             logged_out_greeting="Hi! Please log in to chat with us.">
        </div>
    </div>
</template>

<script>
export default {
    props: {
        pageId: {
            type: String,
            required: true
        }
    },
    mounted() {
        // Initialize Messenger SDK
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v15.0'
            });
        };

        // Load Messenger SDK script
        const scriptId = 'facebook-jssdk';
        if (!document.getElementById(scriptId)) {
            const js = document.createElement('script');
            js.id = scriptId;
            js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
            document.body.appendChild(js);
        }
    }
};
</script>
