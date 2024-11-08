// resources/js/globalMethods.js
export default {
    methods: {
        asset(path) {
            let url = import.meta.env.VITE_APP_URL;
            if (!path) {
                return `${url}/asset/images/default.png`;
            }
            return `${url}/${path}`;
        }
    }
};
