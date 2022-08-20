'use strict';

import 'tw-elements/dist/src/js/bs/src/collapse';
import 'tw-elements/dist/src/js/bs/src/modal';
import {BlogPageClass} from "./classes/BlogPageClass";
import {FormClass} from "./classes/FormClass";

(function ($) {
    const page = $('main');
    const forms = $('form.feedback-form');

    if (page.hasClass('blog-page')) {
        const blog = new BlogPageClass($, page);
        blog.init();
    }

    if (forms.length) {
        forms.each(function () {
            const form = new FormClass($, $(this));
            form.init();
        })
    }
})(jQuery);