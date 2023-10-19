import { useState, useEffect } from 'react';

const { __ } = wp.i18n;
const { Dashicon, TextControl, Button, Tooltip } = wp.components;
import IconSelector from './IconSelector';
import getIcons from './Icons';

const ItemComponent = props => {


    const [state, setState] = useState({
        open: false,
    });

    const Icons = window.getIcons;
    const icon = props.item.id.replace(/[\d_]+$/g, '');

    // const [selectedIcon, setSelectedIcon] = useState(
    //     props.item.icon
    // )



    // useEffect(() => {
    //     setSelectedIcon(Icons[props.item.icon]);
    // }, []);



    return <div className="kmt-sorter-item" data-id={props.item.id} key={props.item.id}>
        <div className="kmt-sorter-item-panel-header" onClick={() => {
            setState((prevState => ({
                ...prevState,
                open: state.open ? false : true
            })))
        }}>
            <Tooltip text={__('Toggle Item Visibility', 'kemet')}>
                <Button
                    className={`kemet-sorter-visiblity ${(props.item.enabled ? 'item-is-visible' : 'item-is-hidden')}`}
                >
                    {getIcons[props.item.id]}

                </Button>
            </Tooltip>
            <span className="kmt-sorter-title">
                {undefined !== props.item.label && '' !== props.item.label ? props.item.label : __('Social Item', 'kemet')}
            </span>
            <Button className={`kmt-sorter-item-expand ${props.item.enabled ? 'item-is-visible' : 'item-is-hidden'}`}
                onClick={e => {
                    e.stopPropagation();
                    props.toggleEnabled(props.item.enabled ? false : true, props.index);
                }}>
                <Dashicon icon="visibility" />
            </Button>
            <Button className="kmt-sorter-item-remove" isDestructive onClick={() => {
                props.removeItem(props.index);
            }}>
                <Dashicon icon="no-alt" />
            </Button>
        </div>
        {state.open && <div className="kmt-sorter-item-panel-content">
            <TextControl label={__('Label', 'kemet')} value={props.item.label ? props.item.label : ''}
                onChange={value => {
                    props.onChangeLabel(value, props.index);
                }} />

            <TextControl label={__('URL', 'kemet')} value={props.item.url ? props.item.url : ''} onChange={value => {
                props.onChangeURL(value, props.index);
            }} />
            <p className="kmt-social-icon-picker-label">{__("Icon")}</p>
            <IconSelector
                value={props.item.icon}
                onIconChoice={value => {
                    props.onChangeIcon(value, props.index);
                    //setSelectedIcon(Icons[value]);
                }}
                icons={getIcons}
            />

        </div>}
    </div>;
};
export default ItemComponent;