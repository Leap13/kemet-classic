import PropTypes from "prop-types";
import { Fragment } from "react";
const { Dashicon } = wp.components;
const { __ } = wp.i18n;

const BuilderTabs = ({ control, params }) => {
    const responsive = params.responsive;
    return (
        <Fragment>
            {
                <div className="kmt-control-tabs kmt-control-tabs-responsive">
                    {responsive && (
                        <div className="kmt-build-tabs">
                            <a
                                href="#"
                                className="nav-tab preview-desktop kmt-build-tabs-button nav-tab-active"
                                data-device="desktop"
                            >
                                <span className="dashicons dashicons-desktop"></span>
                                <span>{__("Desktop", "kemet")}</span>
                            </a>
                            <a
                                href="#"
                                className="nav-tab preview-tablet preview-mobile kmt-build-tabs-button"
                                data-device="tablet"
                            >
                                <span className="dashicons dashicons-smartphone"></span>
                                <span>{__("Tablet / Mobile", "kemet")}</span>
                            </a>
                        </div>
                    )}
                    <span className="button button-secondary kmt-builder-hide-button kmt-builder-tab-toggle">
                        <Dashicon icon="no" />
                        {__("Hide", "kemet")}
                    </span>
                    <span className="button button-secondary kmt-builder-show-button kmt-builder-tab-toggle">
                        <Dashicon icon="edit" />
                        {__("Show Builder", "kemet")}
                    </span>
                </div>
            }
        </Fragment>
    );
};

export default React.memo(BuilderTabs);
