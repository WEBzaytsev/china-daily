'use strict';

import 'tw-elements/dist/src/js/bs/src/collapse';
import 'tw-elements/dist/src/js/bs/src/modal';
import {BlogPageClass} from "./classes/BlogPageClass";

(function($) {
    const page = $('main');

    if (page.hasClass('blog-page')) {
        const blog = new BlogPageClass($, page);
        blog.init();
        return;
    }
})(jQuery);