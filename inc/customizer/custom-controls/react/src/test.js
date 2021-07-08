import {
    unmountComponentAtNode,
} from '@wordpress/element'
export const defineCustomizerControl = () =>
(wp.customize.controlConstructor['kmt-responsive-slider'] = wp.customize.kemetControl.extend({
    initialize(id, params) {

        params.content = jQuery('<span></span>', {
            id: 'customizdde-control-' + id.replace(/]/g, '').replace(/\[/g, '-'),
            'class': 'customize-dddcontrol customize-control-' + params.type
        });
        console.log(params);
        const control = this;
        wp.customize.kemetControl.prototype.initialize.call(control, id, params)
        console.log(control);
        wp.customize.control.remove()
        control.container[0].classList.remove('customize-control')

        // The following should be eliminated with <https://core.trac.wordpress.org/ticket/31334>.
        function onRemoved(removedControl) {
            if (control === removedControl) {
                control.destroy()
                control.container.remove()
                wp.customize.control.unbind('removed', onRemoved)
            }
        }

        wp.customize.control.bind('removed', onRemoved)
    },
    // renderContent() {

    // },
    destroy() {
        unmountComponentAtNode(this.container[0])

        if (wp.customize.Control.prototype.destroy) {
            wp.customize.Control.prototype.destroy.call(this)
        }
    },
}))
