'use strict';

import {BlogPageClass} from "./classes/BlogPageClass";

(function($) {
    const page = $('main');

    if (page.hasClass('blog-page')) {
        const blog = new BlogPageClass($, page);
        blog.init();
        return;
    }
})(jQuery);