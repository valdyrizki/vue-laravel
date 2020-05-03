import Home from '../views/Home';
import About from '../views/About';
import Contact from '../views/Contact';
import Create from '../views/Create';
import TableOfNote from '../views/Table';
import ShowTheNote from '../views/Show';
import EditNote from '../views/Edit';

export default{
    mode : 'history',
    linkActiveClass: 'active',
    routes:[
        {
            path        : '/',
            name        : 'home',
            component   : Home
        },
        {
            path        : '/about',
            name        : 'about',
            component   : About
        },
        {
            path        : '/contact',
            name        : 'contact',
            component   : Contact
        },
        {
            path        : '/note/create',
            name        : 'create',
            component   : Create
        },
        {
            path        : '/notes/table',
            name        : 'notes.table',
            component   : TableOfNote
        },
        {
            path        : '/notes/:noteSlug',
            name        : 'notes.show',
            component   : ShowTheNote
        },

        {
            path        : '/notes/:noteSlug/edit',
            name        : 'notes.edit',
            component   : EditNote
        }
    ]
}
