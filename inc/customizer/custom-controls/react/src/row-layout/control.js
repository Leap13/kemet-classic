import RowLayoutComponent from './row-layout-component';

export const RowLayoutControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
        ReactDOM.render(
            <RowLayoutComponent control={control} customizer={wp.customize} device={device} />,
            control.container[0]
        );
    },
    ready: function () {

        jQuery('.wp-full-overlay-footer .devices button').on('click', function () {

            var device = jQuery(this).attr('data-device');
            var trigger = '';

            switch (device) {
                case 'desktop':
                    trigger = 'mobile';
                    break;

                case 'tablet':
                    trigger = 'desktop';
                    break;

                case 'mobile':
                    trigger = 'tablet';
                    break;

                default:
                    break;
            }
            jQuery('.customize-control-kmt-row-layout .kmt-responsive-control-bar .kmt-responsive-btns button.preview-' + trigger).trigger('click');
        });
    },
});
