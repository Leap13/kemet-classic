import SortableComponent from './sortable-component';

export const sortableControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<SortableComponent control={control} />, control.container[0]);
    },
    ready: function () {

        'use strict';

        let control = this;


        control.sortableContainer = control.container.find('.sortable').first();


        control.sortableContainer.sortable({

            stop: function () {
                control.updateValue();
            }
        }).disableSelection().find('div').each(function () {

            jQuery(this).find('i.visibility').click(function () {
                jQuery(this).toggleClass('dashicons-visibility-faint').parents('div:eq(0)').toggleClass('invisible');
            });
        }).click(function () {
            control.updateValue();
        });
    },

    updateValue: function () {
        'use strict';
        let control = this,
            newValue = [];

        this.sortableContainer.find('div').each(function () {
            if (!jQuery(this).is('.invisible')) {
                newValue.push(jQuery(this).data('value'));
            }
        });
        control.setting.set(newValue);
    }
});