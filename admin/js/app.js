const routes = [
    {path: '/', component: index},
    {path: '/dashboard', component: dashboard},
]

const router = new VueRouter({
    routes
})

let app = new Vue({
    router,
    data: {
        user: {
            authuser: false,
            usertoken: false,
            userdata: false,
            activeUser: true
        },
        config: {
            url: 'https://app.chattingtrain.space/mp/laravelapp/public/api/'
        },
        currentLink: false,
        users: []
    },
    methods: {
        login(login, password) {
            axios.post(this.config.url + 'authByPassword', {
                login: login,
                password: password
            }).then(res => {
                if (res.data.status == 'error') {
                    this.noty('Данные не верны', 'red')
                }
                if (res.data.status == 'success') {
                    this.user.usertoken = res.data.token;
                    document.location.replace('#/dashboard');
                    this.getUsers();
                }
            }).catch();
        },

        getUsers(){
            axios.get(this.config.url + 'getUsers').then(res => {
                if (res.data.status == 'success') {
                    this.users = res.data.data;
                    this.renderUsers();
                }
            }).catch();
        },

        renderUsers(){
            for(let i = 0; i < this.users.length; i++){
                $('#div_push_users').append('<div class = "card shadow"><div class = "card-body">Логин: '+this.users[i]['login']+'<br>Email: '+this.users[i]['email']+'<br>Роль: '+this.users[i]['role']+'<br><button class="btn btn-sm btn-primary">Редактировать</button></div></div>')
            }
        },

        noty(text, color) {
            $('#alert').show(200).empty().css({'background': color, 'color': 'white'}).append(text);
        },

        checkCurrrentPath() {
            if (this.$router.currentRoute.path.substr(0, 11) == '/') {
                //this.uar();
            }

            this.currentLink = this.$router.currentRoute.path.substr(0, 30);
        },

        uar(revers = false) {
            if (!revers) {
                if (this.user.authuser != true) {
                    document.location.replace('https://app.chattingtrain.space/index.php#/');
                }
                return;
            }
            if (this.user.authuser == false) {
                document.location.replace('https://app.chattingtrain.space/index.php#/');

            }
        },

    }, watch: {
        '$route'() {
            if (this.$router.currentRoute.path.substr(0, 11) == '/') {
                //this.uar();
            }

            if (this.$router.currentRoute.path.substr(0, 11) == '/chat/') {
                //this.uar();
            }

            this.currentLink = this.$router.currentRoute.path.substr(0, 30);
        }
    }

}).$mount('#app');

window.onload = function () {
    document.location.replace('#/');
}