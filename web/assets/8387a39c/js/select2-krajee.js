/*!
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2016
 * @version 2.0.8
 *
 * Additional enhancements for Select2 widget extension for Yii 2.0.
 *
 * Author: Kartik Visweswaran
 * For more JQuery plugins visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */
var initS2ToggleAll = function () {
}, initS2Order = function () {
}, initS2Loading = function () {
}, initS2Open = function () {
}, initS2Unselect = function () {
};
(function (factory) {
    "use strict";
    if (typeof define === 'function' && define.amd) { // jshint ignore:line
        // AMD. Register as an anonymous module.
        define(['jquery'], factory); // jshint ignore:line
    } else { // noinspection JSUnresolvedVariable
        if (typeof module === 'object' && module.exports) { // jshint ignore:line
            // Node/CommonJS
            // noinspection JSUnresolvedVariable
            module.exports = factory(require('jquery')); // jshint ignore:line
        } else {
            // Browser globals
            factory(window.jQuery);
        }
    }
}(function ($) {
    "use strict";
    initS2ToggleAll = function (id) {
        var $el = $('#' + id), togId = '#' + 's2-togall-' + id, $tog = $(togId);
        if (!$el.attr('multiple')) {
            return;
        }
        $el.on('select2:open.krajees2', function () {
            if ($tog.parent().attr('id') === 'parent-' + togId || !$el.attr('multiple')) {
                return;
            }
            $('#select2-' + id + '-results').closest('.select2-dropdown').prepend($tog);
            $('#parent-' + togId).remove();
        }).on('change.krajeeselect2', function () {
            if (!$el.attr('multiple')) {
                return;
            }
            var tot = 0, sel = $el.val() ? $el.val().length : 0;
            $tog.removeClass('s2-togall-select s2-togall-unselect');
            $el.find('option:enabled').each(function () {
                if ($(this).val().length) {
                    tot++;
                }
            });
            if (tot === 0 || sel !== tot) {
                $tog.addClass('s2-togall-select');
            } else {
                $tog.addClass('s2-togall-unselect');
            }
        });
        $tog.off('.krajees2').on('click.krajees2', function () {
            var isSelect = $tog.hasClass('s2-togall-select'), flag = true, ev = 'selectall';
            if (!isSelect) {
                flag = false;
                ev = 'unselectall';
            }
            $el.find('option').each(function () {
                var $opt = $(this);
                if (!$opt.attr('disabled') && $opt.val().length) {
                    $opt.prop('selected', flag);
                }
            });
            $el.select2('close').trigger('krajeeselect2:' + ev).trigger('change');
        });
    };
    initS2Open = function () {
        var $el = $(this), $drop = $(".select2-container--open"),
            cssClasses, i, $src = $el.parents("[class*='has-']");
        if ($src.length) {
            cssClasses = $src[0].className.split(/\s+/);
            for (i = 0; i < cssClasses.length; i++) {
                if (cssClasses[i].match("has-")) {
                    $drop.removeClass("has-success has-error has-warning").addClass(cssClasses[i]);
                }
            }
        }
        if ($el.data('unselecting')) {
            $el.removeData('unselecting');
            $el.select2('close').trigger('krajeeselect2:cleared');
        }
    };
    initS2Unselect = function () {
        $(this).data('unselecting', true);
    };
    initS2Order = function(id, val) {
        var $el = $('#' + id);
        if (val && val.length) {
            $.each(val, function(k, v) {
                $el.find('option[value="' + v + '"]').appendTo($el);
            });
            $el.find('option:not(:selected)').appendTo($el);
        }
    };
    initS2Loading = function (id, optVar) {
        /**
         * @namespace opts.id
         * @namespace opts.themeCss
         * @namespace opts.sizeCss
         * @namespace opts.doReset
         * @namespace opts.doToggle
         * @namespace opts.doOrder
         */
        var opts = window[optVar] || {}, themeCss = opts.themeCss, sizeCss = opts.sizeCss, doOrder = opts.doOrder,
            doReset = opts.doReset, doToggle = opts.doToggle, $el = $('#' + id), $container = $(themeCss),
            $loading = $('.kv-plugin-loading.loading-' + id), $group = $('.group-' + id);
        $el.off('.krajees2');
        if (!$container.length) {
            $el.show();
        }
        if ($group.length) {
            $group.removeClass('kv-input-group-hide').removeClass('.group-' + id);
        }
        if ($loading.length) {
            $loading.remove();
        }
        if (sizeCss) {
            $el.next(themeCss).removeClass(sizeCss).addClass(sizeCss);
        }
        if (doReset) {
            $el.closest("form").off('.krajees2').on("reset.krajees2", function () {
                setTimeout(function () {
                    $el.trigger("change").trigger("krajeeselect2:reset");
                }, 100);
            });
        }
        if (doToggle) {
            initS2ToggleAll(id);
        }
        if (doOrder) {
            $el.on('select2:select.krajees2 select2:unselect.krajees2', function (evt) {
                var $selected = $(evt.params.data.element);
                if (!$selected || !$selected.length) {
                    return;
                }
                $selected.detach();
                $el.append($selected).find('option:not(:selected)').appendTo($el);
            });
        }
        $el.on('select2:open.krajees2', initS2Open).on('select2:unselecting.krajees2', initS2Unselect);
    };
}));