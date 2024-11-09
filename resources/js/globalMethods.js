// resources/js/globalMethods.js
export default {
    methods: {
        asset(path) {
            // window base path
            const url = window.location.origin;
            if (!path) {
                return `${url}/asset/images/default.png`;
            }
            return `${url}/${path}`;
        }
    }
};
