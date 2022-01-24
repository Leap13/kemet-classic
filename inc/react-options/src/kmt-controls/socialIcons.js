import { ReactSortable } from "react-sortablejs";
import ItemComponent from './socialIcons/item-component';
import { useEffect, useState } from 'react';

const { __ } = wp.i18n;
const { Button, SelectControl } = wp.components;

const SocialIcons = props => {
    let value = props.value;
    let baseDefault = {
        'items': [
            {
                'id': 'facebook',
                'enabled': true,
                'url': '',
                'color': '#557dbc',
                'background': 'transparent',
                'icon': 'facebook',
                'label': 'Facebook',
            },
            {
                'id': 'twitter',
                'enabled': true,
                'url': '',
                'color': '#557dbc',
                'background': 'transparent',
                'icon': 'twitter',
                'label': 'Twitter',
            }
        ],
    };
    let defaultValue = props.params.default ? {
        ...baseDefault,
        ...props.params.default
    } : baseDefault;

    value = value ? value : defaultValue;

    let defaultParams = {
        'group': 'social_item_group',
        'options': [
            { value: 'facebook', label: __('Facebook', 'kemet'), color: '#557dbc', background: 'transparent' },
            { value: 'twitter', label: __('Twitter', 'kemet'), color: '#7acdee', background: 'transparent' },
            { value: 'linkedin', label: __('Linkedin', 'kemet'), color: '#7acdee', background: 'transparent' },
        ].sort((a, b) => {
            if (a.value < b.value) {
                return -1;
            }
            if (a.value > b.value) {
                return 1;
            }
            return 0;
        })
    };
    //console.log(a.b);

    let controlParams = props.params.input_attrs ? {
        ...defaultParams,
        ...props.params.input_attrs,
    } : defaultParams;

    let availibleSocialOptions = [];
    controlParams.options.map((option) => {
        if (!value.items.some(obj => obj.id === option.value)) {
            availibleSocialOptions.push(option);
        }
    });

    const [props_value, setPropsValue] = useState(value);

    const [state, setState] = useState({
        value: value,
        isVisible: false,
        control: (undefined !== availibleSocialOptions[0] && undefined !== availibleSocialOptions[0].value ? availibleSocialOptions[0].value : ''),
        icon: ''
    });


    const updateValues = (obj) => {
        setPropsValue(obj);
        props.onChange({ ...obj, flag: !value.flag });
    };

    const onDragStop = () => {
        let dropzones = document.querySelectorAll('.kmt-builder-area');
        let i;

        for (i = 0; i < dropzones.length; ++i) {
            dropzones[i].classList.remove('kmt-dragging-dropzones');
        }
    };

    const saveArrayUpdate = (value, index) => {
        let updateState = state.value;
        let items = updateState.items;
        const newItems = items.map((item, thisIndex) => {

            if (index === thisIndex) {
                item = {
                    ...item,
                    ...value
                };
            }
            return item;
        });

        updateState.items = newItems;
        setState(prevState => ({
            ...prevState,
            value: updateState
        }));
        updateValues(updateState);
    };

    const toggleEnableItem = (value, itemIndex) => {
        saveArrayUpdate({
            enabled: value
        }, itemIndex);
    };

    const onChangeLabel = (value, itemIndex) => {
        saveArrayUpdate({
            label: value
        }, itemIndex);
    };

    const onChangeURL = (value, itemIndex) => {
        saveArrayUpdate({
            url: value
        }, itemIndex);
    };

    const removeItem = (itemIndex) => {

        let updateState = state.value;
        let update = updateState.items;
        let updateItems = [];
        {
            update.length > 0 && update.map((old, index) => {
                if (itemIndex !== index) {
                    updateItems.push(old);
                }
            });
        }
        updateState.items = updateItems;
        setState(prevState => ({
            ...prevState,
            value: updateState
        }));
        updateValues(updateState);
    };

    const addItem = () => {
        const itemControl = state.control;
        setState(prevState => ({
            ...prevState,
            isVisible: false
        }));

        if (itemControl) {
            let updateState = state.value;
            let update = updateState.items;
            let icon = itemControl.replace(/[\d_]+$/g, ''); // Regex to replace numeric chars with empty string.

            const itemLabel = controlParams.options.filter(function (o) {
                return o.value === itemControl;
            });
            let newItem = {
                'id': itemControl,
                'enabled': true,
                'url': '',
                'color': itemLabel[0].color,
                'background': itemLabel[0].background,
                'icon': icon,
                'label': itemLabel[0].label
            };
            update.push(newItem);
            updateState.items = update;
            let availibleSocialOptions = [];
            controlParams.options.map(option => {
                if (!update.some(obj => obj.id === option.value)) {
                    availibleSocialOptions.push(option);
                }
            });

            setState(prevState => ({
                ...prevState,
                control: (undefined !== availibleSocialOptions[0] && undefined !== availibleSocialOptions[0].value ? availibleSocialOptions[0].value : '')
            }));
            setState(prevState => ({
                ...prevState,
                value: updateState
            }));

            updateValues(updateState);
        }
    };

    const onDragEnd = (items) => {
        let updateState = state.value;
        let update = updateState.items;
        let updateItems = [];
        {
            items.length > 0 && items.map(item => {
                update.filter(obj => {
                    if (obj.id === item.id) {
                        updateItems.push(obj);
                    }
                });
            });
        }
        ;

        if (!arraysEqual(update, updateItems)) {
            update.items = updateItems;
            updateState.items = updateItems;
            setState(prevState => ({
                ...prevState,
                value: updateState
            }));
            updateValues(updateState);
        }
    };

    const arraysEqual = (a, b) => {
        if (a === b) return true;
        if (a == null || b == null) return false;
        if (a.length != b.length) return false;
        for (let i = 0; i < a.length; ++i) {
            if (a[i] !== b[i]) return false;
        }
        return true;
    };

    const currentList = typeof state.value != "undefined" && state.value.items != null && state.value.items.length != null && state.value.items.length > 0 ? state.value.items : [];
    let theItems = [];
    {
        currentList.length > 0 && currentList.map(item => {
            theItems.push({
                id: item.id
            });
        });
    }
    ;


    const onChangeIcon = (icon, itemIndex) => {
        saveArrayUpdate({
            icon: icon
        }, itemIndex);
    };

    return <div className="kmt-control-field kmt-sorter-items">
        {undefined !== availibleSocialOptions[0] && undefined !== availibleSocialOptions[0].value &&
            <div className="kmt-social-add-area">
                {<SelectControl value={state.control} options={availibleSocialOptions} onChange={value => {
                    setState(prevState => ({
                        ...prevState,
                        control: value
                    }));
                }} />}
                {<Button
                    className="kmt-sorter-add-item"
                    isPrimary
                    onClick={() => {
                        addItem();
                    }}
                >
                    {__('Add Social Icon', 'kemet')}
                </Button>}

            </div>}
        <div className="kmt-sorter-row">
            <ReactSortable animation={100} onStart={() => onDragStop()} onEnd={() => onDragStop()}
                group={controlParams.group}
                className={`kmt-sorter-drop kmt-sorter-sortable-panel kmt-sorter-drop-${controlParams.group}`}
                handle={'.kmt-sorter-item-panel-header'} list={theItems}
                setList={newState => onDragEnd(newState)}>
                {currentList.length > 0 && currentList.map((item, index) => {
                    return <ItemComponent removeItem={remove => removeItem(remove)}
                        toggleEnabled={(enable, itemIndex) => toggleEnableItem(enable, itemIndex)}
                        onChangeLabel={(label, itemIndex) => onChangeLabel(label, itemIndex)}
                        onChangeIcon={(icon, index) => onChangeIcon(icon, index)}
                        onChangeURL={(url, itemIndex) => onChangeURL(url, itemIndex)}
                        key={item.id} index={index} item={item} controlParams={controlParams} />;

                })}
            </ReactSortable>
        </div>

    </div>;

};

export default SocialIcons;
