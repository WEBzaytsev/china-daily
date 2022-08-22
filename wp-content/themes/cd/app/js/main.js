'use strict';

import 'tw-elements/dist/src/js/bs/src/collapse';
import 'tw-elements/dist/src/js/bs/src/modal';
import {BlogPageClass} from "./classes/BlogPageClass";
import {FormClass} from "./classes/FormClass";
import {MobileMenuClass} from "./classes/MobileMenuClass";

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

    const mobileMenu = new MobileMenuClass($);
    mobileMenu.init(checkScreenWidth());
})(jQuery);

function checkScreenWidth() {
    const mobileWidth = 767;
    const tabletWidth = 1024;
    const largeWidth = 1200;
    const windowWidth = document.documentElement.clientWidth;

    if (mobileWidth > windowWidth) {
        return 'mobile';
    }

    if (tabletWidth > windowWidth) {
        return 'tablet';
    }

    if (tabletWidth > largeWidth) {
        return 'tablet';
    }

    return 'desktop';
}