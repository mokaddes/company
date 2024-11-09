<template>
    <div></div> <!-- Empty template since this component only manages meta tags -->
</template>

<script>
export default {
    props: {
        pageName: {
            type: String,
            required: true,
        },
        title: {
            type: String,
            default: '',
        },
        description: {
            type: String,
            default: '',
        },
    },
    watch: {
        pageName: {
            handler() {
                this.setMetaTags();
            },
            immediate: true,
        },
    },
    methods: {
        setMetaTags() {
            const title = this.title || this.defaultTitle();
            const description = this.description || this.defaultDescription();

            document.title = title;
            this.updateMetaTag('description', description);
        },
        updateMetaTag(name, content) {
            let tag = document.querySelector(`meta[name="${name}"]`);
            if (tag) {
                tag.setAttribute('content', content);
            } else {
                tag = document.createElement('meta');
                tag.setAttribute('name', name);
                tag.setAttribute('content', content);
                document.head.appendChild(tag);
            }
        },
        defaultTitle() {
            // Customize based on pageName or provide a default fallback
            switch (this.pageName) {
                case 'about':
                    return 'About Us - Your Company';
                case 'contact':
                    return 'Contact Us - Your Company';
                default:
                    return 'Your Company';
            }
        },
        defaultDescription() {
            // Customize based on pageName or provide a default fallback
            switch (this.pageName) {
                case 'about':
                    return 'Learn more about our company and team.';
                case 'contact':
                    return 'Get in touch with us for any inquiries.';
                default:
                    return 'Welcome to our website!';
            }
        },
    },
};
</script>
