import React from 'react'

export default function responsive(props) {
    const [device, setDevice] = useState('desktop');
    return (
        <>
            <span className="customize-control-title">{label}</span>
            <ul className="kmt-responsive-control-btns kmt-responsive-slider-btns">
                <li className="desktop active">
                    <button type="button" className="preview-desktop active" data-device="desktop">
                        <i i class="dashicons dashicons-desktop" onClick={() => setDevice('tablet')} ></i>
                    </button>
                </li>
                <li class="tablet ">
                    <button type="button" className="preview-tablet " data-device="tablet" >
                        <i class="dashicons dashicons-tablet" onClick={() => setDevice('mobile')} ></i>
                    </button>
                </li>
                <li class="mobile">
                    <button type="button" className="preview-mobile" data-device="mobile" >
                        <i className="dashicons dashicons-smartphone" onClick={() => setDevice('desktop')}></i>
                    </button>
                </li>
            </ul>
            {props.children}
        </>
    )
}