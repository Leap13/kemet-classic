import {
    Fragment,
    createElement,
    useRef,
    useEffect,
    useMemo,
    useCallback,
    useState,
} from '@wordpress/element'

import classnames from 'classnames'

import { __experimentalGradientPicker as ExperimentalGradientPicker } from '@wordpress/components'

const GradientPicker = ({ value, onChange }) => {
    const allGradients = [
        'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
        'linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)',
        'linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)',
        'linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)',
        'linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%)',
        'linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%)',
        'linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%)',
        'linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%)',
        'linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%)',
        'linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%)',
        'linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%)',
        'linear-gradient(to right, #ffecd2 0%, #fcb69f 100%)',
        'linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%)',
        'linear-gradient(to right, #fa709a 0%, #fee140 100%)',
        'linear-gradient(to top, #30cfd0 0%, #330867 100%)',
        'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
        'linear-gradient(15deg, #13547a 0%, #80d0c7 100%)',
        'linear-gradient(to top, #ff0844 0%, #ffb199 100%)',
        'linear-gradient(to top, #3b41c5 0%, #a981bb 49%, #ffc8a9 100%)',
        'linear-gradient(to top, #cc208e 0%, #6713d2 100%)',
        'linear-gradient(to right, #0acffe 0%, #495aff 100%)',
        'linear-gradient(-225deg, #FF057C 0%, #8D0B93 50%, #321575 100%)',
        'linear-gradient(-225deg, #231557 0%, #44107A 29%, #FF1361 67%, #FFF800 100%)',
        'radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%)',
        'linear-gradient(180deg, #2af598 0%, #009efd 100%)',
        'linear-gradient(to right, #6a11cb 0%, #2575fc 100%)',
        'linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%)',
        'linear-gradient(to top, #3f51b1 0%, #5a55ae 13%, #7b5fac 25%, #8f6aae 38%, #a86aa4 50%, #cc6b8e 62%, #f18271 75%, #f3a469 87%, #f7c978 100%)',
        'linear-gradient(to top, #7028e4 0%, #e5b2ca 100%)',
        'linear-gradient(to top, #0c3483 0%, #a2b6df 100%, #6b8cce 100%, #a2b6df 100%)',
        'linear-gradient(to right, #868f96 0%, #596164 100%)',
        'linear-gradient(to top, #c79081 0%, #dfa579 100%)',
        'linear-gradient(to top, #09203f 0%, #537895 100%)', 'linear-gradient(-60deg, #ff5858 0%, #f09819 100%)',
        'linear-gradient(to top, #0ba360 0%, #3cba92 100%)',
        'linear-gradient(-225deg, #B7F8DB 0%, #50A7C2 100%)',
        'linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%)',
        'linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%)',
        'linear-gradient(-225deg, #FFE29F 0%, #FFA99F 48%, #FF719A 100%)',
        'linear-gradient(to top, #e14fad 0%, #f9d423 100%)',
        'linear-gradient(to right, #d7d2cc 0%, #304352 100%)',
        'linear-gradient(-20deg, #616161 0%, #9bc5c3 100%)',
        'linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%)',
        'linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%)',
        'linear-gradient(to top, #c1dfc4 0%, #deecdd 100%)',
        'linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%)',
        'linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%)',
        'linear-gradient(-20deg, #e9defa 0%, #fbfcdb 100%)',
        'linear-gradient(60deg, #abecd6 0%, #fbed96 100%)',
        'linear-gradient(to top, #d5d4d0 0%, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7 100%)',
        'linear-gradient(45deg, #93a5cf 0%, #e4efe9 100%)',
        'linear-gradient(to top, #d299c2 0%, #fef9d7 100%)',
        'linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%)',
        'linear-gradient(to top, #dad4ec 0%, #dad4ec 1%, #f3e7e9 100%)',
        'linear-gradient(to top, #dfe9f3 0%, white 100%)',
        'linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%)',
    ]

    return (
        <Fragment>
            <ExperimentalGradientPicker
                value={value.gradient || ''}
                onChange={(val) => {
                    onChange(

                        val
                    )
                }}
            />

            <ul className={'ct-gradient-swatches'}>

                {allGradients.map((gradient, slug) => (
                    <li
                        onClick={() => {
                            onChange(gradient)
                        }}

                        style={{
                            '--background-image': gradient,
                        }}
                        key={slug}></li>
                ))}
            </ul>
        </Fragment>
    )
}

export default GradientPicker
