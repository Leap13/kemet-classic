import { Fragment } from "@wordpress/element";
import classnames from "classnames";
const { __ } = wp.i18n;
const IconsList = ({
    searchString,
    filteredPacks,
    onChange,
    value,
    setSearchString,
}) => {
    return (
        <div className="kmt-modal-tabs-content kmt-predefined-icons-container">
            <div className="kmt-option-input">
                <input
                    type="text"
                    placeholder={__("Search icon", "kemet")}
                    value={searchString}
                    onChange={({ target: { value } }) => setSearchString(value)}
                />
            </div>

            <div className="kmt-icons-list">
                <ul>
                    {filteredPacks.map((icon) => (
                        <Fragment>
                            <li
                                key={icon}
                                onClick={() => {
                                    onChange({
                                        ...value,
                                        icon: `${icon}`,
                                    });
                                }}
                                className={classnames(
                                    {
                                        active: value.icon === `${icon}`,
                                    },
                                    icon
                                )}
                                data-icon={`${icon}`}
                            />
                        </Fragment>
                    ))}
                </ul>
            </div>
        </div>
    );
};

export default IconsList;
