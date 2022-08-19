'use strict';

import {api} from '../api';
import debounce from 'lodash/debounce.js';

export const BlogPageClass = function ($, page) {
    const _this = this;
    this.page = page;
    this.input = this.page.find('input#search');
    this.select = this.page.find('select#cat');
    this.contentWrap = $('.posts-container');
    this.params = {
        cat: '',
        q: '',
        // pg: 1,
    }

    this.setSelect = () => {
        if (!this.select.length) {
            return;
        }

        this.select.select2()
            .on('select2:select', _this.handleSelect);
    }

    this.handleInput = function () {
        _this.params.q = $(this).val();
        _this.updateContent();
    }

    this.handleSelect = function () {
        _this.params.cat = $(this).val();
        _this.updateContent();
    }

    this.updateContent = async () => {
        const url = new URL(window.location.href);
        const data = await api(`${url.origin}${url.pathname}`, _this.params);

        if (await data) {
            _this.contentWrap.html($(data).find('.posts-container').html());
            _this.updateUrl();
        }
    }

    this.updateUrl = () => {
        const url = new URL(window.location);
        for (const [key, value] of Object.entries(_this.params)) {
            url.searchParams.set(key, String(value));
        }
        window.history.pushState(null, document.title, url);
    }

    this.setState = () => {
        const url = new URL(window.location.href);
        const params = url.searchParams;
        for (const [key, value] of params.entries()) {
            if (_this.params[key]) {
                _this.params[key] = value;
            }
        }
    }

    this.init = () => {
        if (!this.page.length) {
            return;
        }

        this.setSelect();
        this.setState();
        this.input.on('input', debounce(this.handleInput, 500));
    }
}