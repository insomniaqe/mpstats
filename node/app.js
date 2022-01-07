let proxy = require('express-http-proxy')

proxy('https://mpstats.io', {
    proxyReqBodyDecorator: (body) => {
        console.log(body)
        return body
    },
})