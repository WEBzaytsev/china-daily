'use strict';

import {api} from '../api';
import debounce from 'lodash/debounce.js';

export const BlogPageClass = function ($, page) {
    const _this = this;
    this.page = page;
    this.input = this.page.find('input#search');
    this.select = this.page.find('select#cat');
    this.contentWrap = $('.posts-container');
    this.resetBtn = $('button.posts-reset');
    this.params = new Proxy({}, {
        async set(obj, prop, value) {
            obj[prop] = value;
            await _this.updateContent();
            return true;
        },
    });

    this.reset = function () {
        for (let key of Object.keys(_this.params)) {
            _this.params[key] = '';
        }
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
    }

    this.handleSelect = function () {
        _this.params.cat = $(this).val();
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
        for (const key of params.keys()) {
            _this.params[key] = params.get(key);
        }
    }

    this.init = () => {
        if (!this.page.length) {
            return;
        }

        this.setSelect();
        this.setState();
        this.input.on('input', debounce(this.handleInput, 500));
        this.resetBtn.on('click', this.reset);
    }
}