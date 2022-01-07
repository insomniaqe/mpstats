let app = new Vue({
    el: '#app',
    data: {
        url: 'https://app.chattingtrain.space/mp/laravelapp/public/api/'
    },
    methods: {
        login(login, password) {
            axios.post(this.url + 'authByPassword', {
                login: login,
                password: password
            }).then(res => {
                if (res.data.status == 'error') {
                    this.noty('Данные не верны', 'red')
                }
                if(res.data.status == 'success'){
                    this.setCookie('token', res.data.token);
                    document.location.replace('app');
                }
            }).catch();
        },

        noty(text, color) {
            $('#alert').show(200).empty().css({'background': color, 'color': 'white'}).append(text);
        },

        getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        },

        setCookie(name, value, options = {}) {
            options = {
                path: '/',
                ...options
            };
            if (options.expires instanceof Date) {
                options.expires = options.expires.toUTCString();
            }
            let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
            for (let optionKey in options) {
                updatedCookie += "; " + optionKey;
                let optionValue = options[optionKey];
                if (optionValue !== true) {
                    updatedCookie += "=" + optionValue;
                }
            }
            document.cookie = updatedCookie;
        },

        deleteCookie(name) {
            this.setCookie(name, "", {
                'max-age': -1
            })
        },
    }
})