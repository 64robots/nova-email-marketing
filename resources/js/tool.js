Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-email-marketing-tool',
            path: '/nova-email-marketing-tool',
            component: require('./components/Tool'),
            children: [
                {
                    name: 'nova-email-marketing-tool-lists',
                    path: 'lists',
                    component: require('./components/Lists/ListsPage')
                },
                {
                    name: 'nova-email-marketing-tool-list',
                    path: 'list/:id',
                    component: require('./components/List/ListPage'),
                    props: true
                },
                {
                    name: 'nova-email-marketing-tool-tags',
                    path: 'tags',
                    component: require('./components/Tags/TagsPage')
                },
                {
                    name: 'nova-email-marketing-tool-subscribers',
                    path: 'subscribers',
                    component: require('./components/Subscribers/SubscribersPage')
                },
                
            ]
        }
    ])
})
