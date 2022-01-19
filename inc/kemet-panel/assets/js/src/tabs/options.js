import { Fragment, useState } from "@wordpress/element";
import Container from "../common/Container";
import OptionsComponent, { RenderStaticOptions } from '../options-component'
const { __ } = wp.i18n;
const { Dashicon } = wp.components;

const OptionsTab = (props) => {
    return <Container>
        <div className='customize-site-options options-section'>
            <h2 className="kmt-section-title"><span className='icon'><Dashicon icon="admin-customizer" /></span>{__('Customize Your Site', 'kemet')}</h2>
            <RenderStaticOptions options={props['customize-options']} />
        </div>
    </Container>
}


export default OptionsTab;