Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-email-marketing-tool',
            path: '/nova-email-marketing-tool',
            component: require('./components/Tool'),
        },
    ])
})
