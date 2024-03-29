'use strict';

import {mask} from "../utils/phoneMask";
import {api} from "../api";

export const FormClass = function ($, form) {
    const _this = this;
    this.form = form;
    this.submitBtn = this.form.find('button[type="submit"]');
    this.formNote = this.form.find('.form-note');
    this.closeButton = this.form.parent().find('button[aria-label="Close"]');
    this.rules = {
        'feedback-name': {
            required: true,
        },
        'feedback-phone': {
            required: true,
        },
        'feedback-email': {
            required: true,
            user_email: true,
        },
    }

    this.handleSubmit = function () {
        const $form = _this.form.get(0);
        const url = $form.action;

        _this.hideNote();

        api.submitForm(url, $form)
            .then(res => {
                if (res.ok) {
                    $form.reset();
                    _this.setSuccess();
                    _this.resetFieldsBorder();
                    setTimeout(() => {
                        _this.closeModal();
                        _this.hideNote();
                    }, 1500);
                }
            })
            .catch(() => _this.setError());

    }

    this.resetFieldsBorder = () => {
        const successFields = _this.form.find('.border-green-600');
        successFields.each(function () {
            $(this).removeClass('border-green-600');
        });
    }

    this.hideNote = () => {
        _this.formNote.html('');
    }

    this.setSuccess = () => {
        _this.hideNote();
        if (_this.formNote.hasClass('text-red')) {
            _this.formNote.removeClass('text-red');
        }

        _this.formNote.addClass('text-green-600');
        _this.formNote.html('Ваша заявка успешно отправлена!');
    }

    this.setError = () => {
        _this.hideNote();
        if (_this.formNote.hasClass('text-green-600')) {
            _this.formNote.removeClass('text-green-600');
        }

        _this.formNote.addClass('text-red');
        _this.formNote.html('Ошибка! Попробуйте позже.');
    }

    this.validateEmail = function (value, element) {
        return this.optional(element) || /\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/.test(value);
    }

    this.closeModal = () => {
        if (!_this.closeButton.length) {
            return;
        }

        _this.closeButton.trigger('click');
    }

    this.init = () => {
        if (!this.form.length) {
            return;
        }

        mask();

        this.form.validate({
            ignore: [],
            errorClass: 'border-red',
            validClass: 'border-green-600',
            rules: _this.rules,
            errorElement: 'span',
            errorPlacement: function (error, element) {
                const placement = $(element).data('error');

                if (placement) {
                    $(placement).append(error).addClass('text-red');
                } else {
                    error.insertBefore(element).addClass('text-red');
                }
            },
            submitHandler: _this.handleSubmit
        });

        $.validator.addMethod('user_email', _this.validateEmail);
        jQuery.extend(jQuery.validator.messages, {
            required: 'Это поле обязательно для заполнения*',
            user_email: 'Некорректный e-mail',
        });
    }
}