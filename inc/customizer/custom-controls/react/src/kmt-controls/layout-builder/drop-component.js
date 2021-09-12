import { ReactSortable } from "react-sortablejs";
import ItemComponent from "./item-component";
import AddComponent from "./add-component";
const { Fragment } = wp.element;

const DropComponent = (props) => {
    const location = props.zone.replace(props.row + "_", "");
    let currentList =
        typeof props.items != "undefined" &&
        props.items != null &&
        props.items.length != null &&
        props.items.length > 0
            ? props.items
            : [];
    let choices = props.choices,
        filterChoices = Object.keys(choices),
        theItems = [];
    {
        const sortList = [...currentList];
        currentList.length > 0 &&
            currentList.map((item, key) => {
                if (filterChoices.includes(item)) {
                    theItems.push({
                        id: item,
                    });
                } else {
                    sortList.splice(sortList.indexOf(item), 1);
                }
            });
        currentList = sortList;
    }
    let currentCenterList =
        typeof props.centerItems != "undefined" &&
        props.centerItems != null &&
        props.centerItems.length != null &&
        props.centerItems.length > 0
            ? props.centerItems
            : [];
    let theCenterItems = [];
    {
        let sortCurrentCenterList = [...currentCenterList];
        currentCenterList.length > 0 &&
            currentCenterList.map((item, key) => {
                if (filterChoices.includes(item)) {
                    theCenterItems.push({
                        id: item,
                    });
                } else {
                    sortCurrentCenterList.splice(
                        sortCurrentCenterList.indexOf(item),
                        1
                    );
                }
            });
        currentCenterList = sortCurrentCenterList;
    }
    const addSortable = (items, list, listLocation) => {
        let id = listLocation.replace("_", "-");
        return (
            <Fragment>
                <ReactSortable
                    animation={100}
                    onStart={() => props.showDrop()}
                    group={props.controlParams.group}
                    className={`kmt-builder-drop kmt-builder-sortable-panel kmt-builder-drop-${
                        location + id
                    }`}
                    list={items}
                    setList={(newState) =>
                        props.onUpdate(
                            props.row,
                            props.zone + listLocation,
                            newState
                        )
                    }
                    onEnd={() => props.hideDrop()}
                >
                    {list.length > 0 &&
                        list.map((item, index) => {
                            return (
                                <ItemComponent
                                    removeItem={(remove) =>
                                        props.removeItem(
                                            remove,
                                            props.row,
                                            props.zone + listLocation
                                        )
                                    }
                                    focusSection={(focus) =>
                                        props.focusSection(focus)
                                    }
                                    key={item}
                                    index={index}
                                    item={item}
                                    controlParams={props.controlParams}
                                    choices={props.choices}
                                />
                            );
                        })}
                </ReactSortable>
                <AddComponent
                    row={props.row}
                    list={items}
                    settings={props.settings}
                    column={props.zone + listLocation}
                    setList={(newState) =>
                        props.onAddItem(
                            props.row,
                            props.zone + listLocation,
                            newState
                        )
                    }
                    key={location}
                    location={location + listLocation}
                    id={"add" + id + "-" + location}
                    controlParams={props.controlParams}
                    choices={props.choices}
                />
            </Fragment>
        );
    };

    return (
        <div
            className={`kmt-builder-area kmt-builder-area-${location}`}
            data-location={props.zone}
        >
            {"header-desktop-items" === props.controlParams.group &&
                location == "right" &&
                addSortable(theCenterItems, currentCenterList, "_center")}
            {addSortable(theItems, currentList, "")}
            {"header-desktop-items" === props.controlParams.group &&
                location == "left" &&
                addSortable(theCenterItems, currentCenterList, "_center")}
        </div>
    );
};

export default React.memo(DropComponent);
