import { createPortal, useRef, useState } from "@wordpress/element";
import PalettePreview from "./color-palettes/PalettePreview";
import AddPaletteContainer from "./color-palettes/AddPaletteContainer";
import ColorPalettesModal from "./color-palettes/ColorPalettesModal";
import usePopoverMaker from "../common/popover-component";
import OutsideClickHandler from "../common/outside-component";
import { Transition } from "@react-spring/web";
import bezierEasing from "bezier-easing";
const { __, sprintf } = wp.i18n;
import { Modal } from '@wordpress/components';


const ColorPalettes = ({
  value,
  onChange,
  params: { label, link },
}) => {
  const [state, setState] = useState(value);
  const colorPalettesWrapper = useRef();
  const buttonRef = useRef();

  const [{ isOpen, isTransitioning }, setModalState] = useState({
    isOpen: false,
    isTransitioning: false,
  });
  const [currentView, setCurrentView] = useState("");
  const [openModal, setOpenModal] = useState(false)
  const [delPalette, setDelPalette] = useState()
  const { styles, popoverProps } = usePopoverMaker({
    ref: currentView === "add" ? buttonRef : colorPalettesWrapper,
    defaultHeight: 430,
    shouldCalculate: isTransitioning || isOpen,
  });


  const setIsOpen = (isOpen) => {
    setModalState((state) => ({
      ...state,
      isOpen,
      isTransitioning: true,
    }));
  };

  const stopTransitioning = () =>
    setModalState((state) => ({
      ...state,
      isTransitioning: false,
    }));

  const handleChangePalette = (active) => {
    let currentPalette = active.palettes.find(
      ({ id }) => id === active.current_palette
    );
    let { id, skin, type, name, ...colors } = { ...currentPalette };
    Object.values(colors).map((item, index) => {
      document.documentElement.style.setProperty(
        `--paletteColor${index + 1}`,
        item
      );
      return item;
    });
    setState(active);
    onChange({ ...active, flag: !value.flag });
  };

  const handleChangeComplete = (color, index) => {
    let newValue = { ...state };
    newValue[index] = color;
    let { current_palette, palettes, ...colors } = newValue;
    Object.values(colors).map((item, index) => {
      document.documentElement.style.setProperty(
        `--paletteColor${index + 1}`,
        item
      );
      return item;
    });
    setState({ ...state, ...colors, current_palette, palettes });
    onChange({
      ...state,
      ...colors,
      flag: !value.flag,
      current_palette,
      palettes,
    });
  };

  const handleAddPalette = (data) => {
    let { current_palette, palettes, ...colors } = { ...state };

    let newPalette = {
      id: palettes.length + 1,
      ...colors,
      type: "custom",
      skin: data.type,
      name: data.name,
    };
    palettes.unshift(newPalette);
    onChange({
      ...value,
      flag: !value.flag,
    });
    setIsOpen(false);
  };

  const handleDeletePalette = (id) => {
    setOpenModal(true)
    const deletePalette = value.palettes.filter((palette) => {
      return palette.id === id;
    });

    setDelPalette({ ...deletePalette })

  };

  const ConfirmDelete = () => {

    let newPalette = value.palettes.filter((palette) => {
      return palette.id !== delPalette[0].id;
    });
    setState({ ...value, palettes: newPalette });
    onChange({ ...value, palettes: newPalette });
    setOpenModal(false)
  }

  const handleResetColor = (id) => {
    let updateState = {
      ...state,
    };
    let currentPalette = updateState.palettes.find(
      ({ id }) => id === updateState.current_palette
    );
    let resetColor = currentPalette[id];
    handleChangeComplete(resetColor, id);
  };

  return (
    <div>
      <header>
        <span className="customize-control-title kmt-control-title">
          {label}
        </span>
        {label && <a href={link}> </a>}
      </header>
      <OutsideClickHandler
        disabled={!isOpen}
        useCapture={false}
        className="kmt-palettes-outside"
        additionalRefs={[popoverProps.ref]}
        onOutsideClick={(e) => {
          if (e.target.closest(".kmt-color-palette-confrim__delete")) {
            return;
          }
          setIsOpen(false);
          setCurrentView(" ");
        }}
        wrapperProps={{
          ref: colorPalettesWrapper,
          onClick: (e) => {
            e.preventDefault();
            if (
              e.target.closest(".kmt-color-picker-modal") ||
              e.target.classList.contains("kmt-color-picker-modal")
            ) {
              return;
            }
            if (!state.palettes) {
              return;
            }
            setIsOpen(true);
          },
        }}
      >
        <div className={`kmt-palettes-preview`}>
          <PalettePreview
            onClick={() => {
              if (!state.palettes) {
                return;
              }
              setIsOpen(false);
            }}
            value={state}
            onChange={(v, id) => handleChangeComplete(v, id)}
            skipModal={false}
            handleClickReset={(val) => {
              handleResetColor(val);
            }}
          />
          <div className={`kmt-palette-toggle-modal `}
            onClick={(e) => {
              e.preventDefault();
              setIsOpen(true);
              setCurrentView("modal");
            }}
          >
            <header>
              {__(`Select Another Palette`)}
            </header>
            <span
              className={`kmt-button-open-palette`}
            ></span>
          </div>
        </div>
      </OutsideClickHandler>
      <OutsideClickHandler
        disabled={!isOpen}
        useCapture={false}
        className="kmt-button-palettes-outside"
        additionalRefs={[popoverProps.ref]}
        onOutsideClick={(e) => {
          setIsOpen(false);
          setCurrentView(" ");
        }}
        wrapperProps={{
          ref: buttonRef,
          onClick: (e) => {
            e.preventDefault();
            if (
              e.target.closest(".kmt-color-picker-modal") ||
              e.target.classList.contains("kmt-color-picker-modal")
            ) {
              return;
            }
            if (!state.palettes) {
              return;
            }
            setIsOpen(true);
          },
        }}
      >
        <button
          className={`kmt-button-palette`}
          onClick={(e) => {
            e.stopPropagation();
            e.preventDefault();
            setCurrentView("add");
            setIsOpen(true);
          }}
        >

          Save New Palette
      </button>
      </OutsideClickHandler>
      {(isTransitioning || isOpen) &&
        createPortal(
          <Transition
            items={isOpen}
            onRest={(isOpen) => {
              stopTransitioning();
            }}
            config={{
              duration: 100,
              easing: bezierEasing(0.25, 0.1, 0.25, 1.0),
            }}
            from={
              isOpen
                ? {
                  transform: "scale3d(0.95, 0.95, 1)",
                  opacity: 0,
                }
                : { opacity: 1 }
            }
            enter={
              isOpen
                ? {
                  transform: "scale3d(1, 1, 1)",
                  opacity: 1,
                }
                : {
                  opacity: 1,
                }
            }
            leave={
              !isOpen
                ? {
                  transform: "scale3d(0.95, 0.95, 1)",
                  opacity: 0,
                }
                : {
                  opacity: 1,
                }
            }
          >
            {(style, item) => {
              if (!item) {
                return null;
              }
              if (currentView === "add") {
                return (
                  <AddPaletteContainer
                    wrapperProps={{
                      style: {
                        ...style,
                        ...styles,
                      },
                      ...popoverProps,
                    }}
                    onChange={(val, id) => {
                      handleChangeComplete(val, id);
                    }}
                    value={state}
                    option={state}
                    handleAddPalette={handleAddPalette}
                    handleCloseModal={() => { setCurrentView("") }}

                  />
                );
              } else if (currentView === "modal") {
                return (
                  <ColorPalettesModal
                    wrapperProps={{
                      style: {
                        ...style,
                        ...styles,
                      },
                      ...popoverProps,
                    }}
                    onChange={(val) => {
                      setIsOpen(false);
                      handleChangePalette(val);
                    }}
                    value={state}
                    option={state}
                    handleDeletePalette={(id) => handleDeletePalette(id)}

                  />
                );
              }
              else {
                return
              }
            }}
          </Transition>,
          document.body
        )}

      {openModal && <Modal title={__(`Are you sure you want to delete the ${delPalette[0].name} palette?
`)}

        className={`kmt-color-palette-confrim__delete`}
        isDismissible={true}
      >
        < p className={__(`kmt-paltette-popup-content`)}>
          {__(`If this is the currently active palette, the current palette will be switched to the Base one`)}
        </p>
        <div className={__(`kmt-paltette-popup-action`)}>
          <button type="button" class="components-button is-primary has-text has-icon" onClick={(e) => {
            e.preventDefault();
            ConfirmDelete()
          }}><span class="dashicon dashicons dashicons-trash"></span>Delete</button>
          <button type="button" class="components-button is-secondary" onClick={() => { setOpenModal(false) }}>Cancel</button>
        </div>
      </Modal>
      }

    </div >
  );
};

export default ColorPalettes;
