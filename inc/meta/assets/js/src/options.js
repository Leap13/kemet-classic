import { OptionComponent } from '../../../../customizer/custom-controls/react/src/options/options-component'
import {
    useEffect,
} from '@wordpress/element'

const SingleOptionComponent = ({ value, optionId, option, onChange }) => {
    const Option = OptionComponent(option.type);
    return option.type && <div id={optionId} className={`customize-control-${option.type}`}>
        <Option id={optionId} value={value} params={option} onChange={onChange} />
    </div>;
}

const RenderOptions = ({ options, onChange, values }) => {
    return Object.keys(options).map((optionId) => {
        let value = values[optionId];
        let option = options[optionId];
        useEffect(() => {
            kemetGetResponsiveJs();
        }, []);
        return <SingleOptionComponent value={value} optionId={optionId} option={option} onChange={(newVal) => {
            onChange(newVal, optionId)
        }} key={optionId} />;
    })
}

export function kemetGetResponsiveJs() {
    'use strict';

    let device = 'desktop'
    if (
        wp.data &&
        wp.data.select &&
        wp.data.select('core/edit-post') &&
        wp.data.select('core/edit-post').__experimentalGetPreviewDeviceType
    ) {
        device = wp.data
            .select('core/edit-post')
            .__experimentalGetPreviewDeviceType()
            .toLowerCase()
    }

    jQuery(document).find('.kmt-responsive-control-btns > li').removeClass('active');
    jQuery(document).find('.kmt-responsive-control-btns > li.' + device).addClass('active');

    jQuery(document).find('.kmt-responsive-control-btns button i').on('click', function (event) {
        event.preventDefault();
        let device = jQuery(this).parent('button').attr('data-device');

        if ('desktop' == device) {
            device = 'tablet';
        } else if ('tablet' == device) {
            device = 'mobile';
        } else {
            device = 'desktop';
        }

        jQuery(document).find('.kmt-responsive-control-btns > li').removeClass('active');
        jQuery(document).find('.kmt-responsive-control-btns > li.' + device).addClass('active');
    });
}
export const OptionsComponent = ({ options, onChange, values }) => {
    return <div className="kmt-options">
        <RenderOptions options={options} onChange={onChange} values={values} />
    </div>
}