import { Fragment } from "@wordpress/element";
import classnames from "classnames";
import {
  Button,
  FocalPointPicker,
  __experimentalGradientPicker,
  ColorPicker,
} from "@wordpress/components";
import { MediaUpload } from "@wordpress/media-utils";
const { __ } = wp.i18n;

const BackgroundModal = (props) => {
  console.log(props);
  const allGradients = [
    "linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)",
    "linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)",
    "linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)",
    "linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)",
    "linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%)",
    "linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%)",
    "linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%)",
    "linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%)",
    "linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%)",
    "linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%)",
    "linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%)",
    "linear-gradient(to right, #ffecd2 0%, #fcb69f 100%)",
    "linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%)",
    "linear-gradient(to right, #fa709a 0%, #fee140 100%)",
    "linear-gradient(to top, #30cfd0 0%, #330867 100%)",
    "linear-gradient(135deg, #667eea 0%, #764ba2 100%)",
    "linear-gradient(15deg, #13547a 0%, #80d0c7 100%)",
    "linear-gradient(to top, #ff0844 0%, #ffb199 100%)",
    "linear-gradient(to top, #3b41c5 0%, #a981bb 49%, #ffc8a9 100%)",
    "linear-gradient(to top, #cc208e 0%, #6713d2 100%)",
    "linear-gradient(to right, #0acffe 0%, #495aff 100%)",
    "linear-gradient(-225deg, #FF057C 0%, #8D0B93 50%, #321575 100%)",
    "linear-gradient(-225deg, #231557 0%, #44107A 29%, #FF1361 67%, #FFF800 100%)",
    "radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%)",
    "linear-gradient(180deg, #2af598 0%, #009efd 100%)",
    "linear-gradient(to right, #6a11cb 0%, #2575fc 100%)",
    "linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%)",
    "linear-gradient(to top, #3f51b1 0%, #5a55ae 13%, #7b5fac 25%, #8f6aae 38%, #a86aa4 50%, #cc6b8e 62%, #f18271 75%, #f3a469 87%, #f7c978 100%)",
    "linear-gradient(to top, #7028e4 0%, #e5b2ca 100%)",
    "linear-gradient(to top, #0c3483 0%, #a2b6df 100%, #6b8cce 100%, #a2b6df 100%)",
    "linear-gradient(to right, #868f96 0%, #596164 100%)",
    "linear-gradient(to top, #c79081 0%, #dfa579 100%)",
    "linear-gradient(to top, #09203f 0%, #537895 100%)",
    "linear-gradient(-60deg, #ff5858 0%, #f09819 100%)",
    "linear-gradient(to top, #0ba360 0%, #3cba92 100%)",
    "linear-gradient(-225deg, #B7F8DB 0%, #50A7C2 100%)",
    "linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%)",
    "linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%)",
    "linear-gradient(-225deg, #FFE29F 0%, #FFA99F 48%, #FF719A 100%)",
    "linear-gradient(to top, #e14fad 0%, #f9d423 100%)",
    "linear-gradient(to right, #d7d2cc 0%, #304352 100%)",
    "linear-gradient(-20deg, #616161 0%, #9bc5c3 100%)",
    "linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%)",
    "linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%)",
    "linear-gradient(to top, #c1dfc4 0%, #deecdd 100%)",
    "linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%)",
    "linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%)",
    "linear-gradient(-20deg, #e9defa 0%, #fbfcdb 100%)",
    "linear-gradient(60deg, #abecd6 0%, #fbed96 100%)",
    "linear-gradient(to top, #d5d4d0 0%, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7 100%)",
    "linear-gradient(45deg, #93a5cf 0%, #e4efe9 100%)",
    "linear-gradient(to top, #d299c2 0%, #fef9d7 100%)",
    "linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%)",
    "linear-gradient(to top, #dad4ec 0%, #dad4ec 1%, #f3e7e9 100%)",
    "linear-gradient(to top, #dfe9f3 0%, white 100%)",
    "linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%)",
  ];
  const defaultColorPalette = [
    "#000000",
    "#ffffff",
    "#dd3333",
    "#dd9933",
    "#eeee22",
    "#81d742",
    "#1e73be",
    "#e2e7ed",
  ];
  const RenderTopSection = () => {
    return (
      <div className={`ct-color-picker-top`}>
        <ul className="ct-color-picker-skins">
          {defaultColorPalette.map((color, index) => (
            <li
              key={`color-${index}`}
              style={{
                background: color,
              }}
              className={classnames({
                active: props.props.color === color,
              })}
              onClick={() => props.props.onChangeComplete(color)}
            >
              <div className="ct-tooltip-top">{`Color ${index + 1}`}</div>
            </li>
          ))}
        </ul>
      </div>
    );
  };
  const renderImageSettings = () => {
    const dimensions = {
      width: 400,
      height: 100,
    };
    const repeat = {
      "no-repeat": (
        <svg viewBox="0 0 16 16">
          <rect x="6" y="6" width="4" height="4" />
        </svg>
      ),
      "repeat-x": (
        <svg viewBox="0 0 16 16">
          <rect y="6" width="4" height="4" />
          <rect x="6" y="6" width="4" height="4" />
          <rect x="12" y="6" width="4" height="4" />
        </svg>
      ),
      "repeat-y": (
        <svg viewBox="0 0 16 16">
          <rect x="6" width="4" height="4" />
          <rect x="6" y="6" width="4" height="4" />
          <rect x="6" y="12" width="4" height="4" />
        </svg>
      ),
      repeat: (
        <svg viewBox="0 0 16 16">
          <path d="M0,0h4v4H0V0z M6,0h4v4H6V0z M12,0h4v4h-4V0z M0,6h4v4H0V6z M6,6h4v4H6V6z M12,6h4v4h-4V6z M0,12h4v4H0V12z M6,12h4v4H6V12zM12,12h4v4h-4V12z" />
        </svg>
      ),
    };

    return (
      <>
        <div className="ct-control">
          <MediaUpload
            title={__("Select Background Image", "astra")}
            onSelect={(media) => onSelectImage(media)}
            allowedTypes={["image"]}
            value={
              props.props.media && props.props.media ? props.props.media : ""
            }
            render={({ open }) => (
              <>
                {!props.props.media && (
                  <Button
                    className="upload-button button-add-media"
                    isDefault
                    onClick={() => open(open)}
                  >
                    {__("Select Background Image", "Kemet")}
                  </Button>
                )}
              </>
            )}
          />
        </div>
        {props.props.media && props.props.backgroundType === "image" && (
          <div className="ct-control">
            <div className={`thumbnail thumbnail-image`}>
              <FocalPointPicker
                url={
                  props.props.media.url
                    ? props.props.media.url
                    : props.props.backgroundImage
                }
                dimensions={dimensions}
                value={
                  undefined !== props.props.backgroundPosition
                    ? props.props.backgroundPosition
                    : { x: 0.5, y: 0.5 }
                }
                onChange={(focalPoint) =>
                  onChangeImageOptions(
                    "backgroundPosition",
                    "background-position",
                    focalPoint
                  )
                }
              />
            </div>
          </div>
        )}
        <div className="ct-control">
          <header>
            <label>{__("Background Repeat")}</label>
          </header>
          <section>
            <ul className="ct-radio-option ct-buttons-group">
              {Object.keys(repeat).map((item) => {
                let classActive = "";
                if (item === props.props.backgroundRepeat) {
                  classActive = "active";
                }
                return (
                  <li
                    isTertiary
                    className={`${classActive}`}
                    onClick={() =>
                      onChangeImageOptions(
                        "backgroundRepeat",
                        "background-repeat",
                        item
                      )
                    }
                  >
                    {repeat[item] && repeat[item]}
                  </li>
                );
              })}
            </ul>
          </section>
        </div>
        <div className="ct-control">
          <header>
            <label>{__("Background Size")}</label>
          </header>
          <section>
            <ul className="ct-radio-option ct-buttons-group">
              {["auto", "cover", "contain"].map((item) => {
                let classActive = "";
                if (item === props.props.backgroundSize) {
                  classActive = "active";
                }
                return (
                  <li
                    isTertiary
                    className={`${classActive}`}
                    onClick={() =>
                      onChangeImageOptions(
                        "backgroundSize",
                        "background-size",
                        item
                      )
                    }
                  >
                    {item}
                  </li>
                );
              })}
            </ul>
          </section>
        </div>

        <div className="ct-control">
          <header>
            <label>{__("Background Attachment")}</label>
          </header>
          <section>
            <ul className="ct-radio-option ct-buttons-group">
              {["fixed", "scroll", "inherit"].map((item) => {
                let classActive = "";
                if (item === props.props.backgroundAttachment) {
                  classActive = "active";
                }
                return (
                  <li
                    isTertiary
                    className={`${classActive}`}
                    onClick={() =>
                      onChangeImageOptions(
                        "backgroundAttachment",
                        "background-attachment",
                        item
                      )
                    }
                  >
                    {item}
                  </li>
                );
              })}
            </ul>
          </section>
        </div>
      </>
    );
  };

  const onSelectImage = (media) => {
    props.props.onSelectImage(media, "image");
  };
  const onSelect = (tabName) => {
    console.log(tabName);
    props.props.onSelect(tabName);
  };
  const onRemoveImage = () => {
    props.props.onSelectImage("");
  };

  const open = (open) => {
    event.preventDefault();
    open();
  };

  const onChangeImageOptions = (tempKey, mainkey, value) => {
    props.props.onChangeImageOptions(mainkey, value, "image");
  };
  return (
    <Fragment>
      <ul
        className="ct-modal-tabs"
        onMouseUp={(e) => {
          e.preventDefault();
        }}
      >
        {["color", "gradient", "image"].map((type) => (
          <li
            data-type={type}
            key={type}
            className={classnames({
              active: type === props.props.backgroundType,
            })}
            onClick={() => props.props.onSelect(type)}
          >
            {
              {
                color: __("Color", "blocksy"),
                gradient: __("Gradient", "blocksy"),
                image: __("Image", "blocksy"),
              }[type]
            }
          </li>
        ))}
      </ul>

      <div
        className={classnames({
          "ct-image-tab ct-options-container":
            props.props.backgroundType === "image",
          "ct-gradient-tab ct-color-picker-modal":
            props.props.backgroundType === "gradient",
          "ct-color-tab": props.props.backgroundType === "color",
        })}
      >
        {props.props.backgroundType === "image" && renderImageSettings()}

        {props.props.backgroundType === "gradient" && (
          <>
            <__experimentalGradientPicker
              className="ct-gradient-color-picker"
              value={
                props.props.gradient &&
                props.props.backgroundType === "gradient"
                  ? props.props.gradient
                  : ""
              }
              onChange={(gradient) =>
                props.props.onChangeGradient(gradient, "gradient")
              }
            />
            <ul className={"ct-gradient-swatches"}>
              {allGradients.map((gradient, slug) => (
                <li
                  onClick={() =>
                    props.props.onChangeGradient(gradient, "gradient")
                  }
                  style={{
                    "--background-image": gradient,
                  }}
                  key={slug}
                ></li>
              ))}
            </ul>
          </>
        )}

        {props.props.backgroundType == "color" && (
          <>
            {RenderTopSection()}
            <ColorPicker
              color={props.props.color}
              onChangeComplete={(color) => props.props.onChangeComplete(color)}
            />
          </>
        )}
      </div>
    </Fragment>
  );
};

export default BackgroundModal;
