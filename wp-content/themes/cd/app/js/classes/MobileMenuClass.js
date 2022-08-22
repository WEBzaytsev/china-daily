'use strict';

export const MobileMenuClass = function ($, header, button) {
    const self = this;
    this.button = button || $('.mob-menu-btn');
    this.header = header || $('header.header');

    this.displayMenu = function (e) {
        self.header.toggleClass('active');
        $('body').toggleClass('overflow-hidden');
    }

    this.init = (screenWidth) => {
        if (!this.button.length
            || !this.header.length
            || screenWidth === 'desktop') {
            return;
        }

        this.button.on('click', self.displayMenu);
    }
}