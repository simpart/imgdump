/**
 * @file main.js
 * @brief app code before pack
 */

let start = () => {
    try {
        init_title(app.conf.title);
    } catch (e) {
        console.error(e.stack);
    }
}

let init_title = (ttl) => {
    try {
        let Header = require('mofron-comp-header-title');
        mofron.func.addHeadConts({
            tag      : 'title',
            contents : ttl
        });
        
        new Header({
            title   : ttl,
            height  : 80,
            url     : './',
            visible : true
        });
    } catch (e) {
        console.error(e.stack);
    }
}

try {
    require('mofron');
    require('expose-loader?app!../../conf/namesp.js');
    require('../../conf/common.js');
    start();
} catch (e) {
    console.error(e.stack);
}
/* end of file */
