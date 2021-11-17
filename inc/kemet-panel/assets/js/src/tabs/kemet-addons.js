import Container from "../common/Container"
import { __ } from "@wordpress/i18n";
const KemetAddons = () => {
    return <Container>
        <div className='install-kemet-addons'>
            <h1>{__('Kemet Addons', 'kemet')}</h1>
        </div>
    </Container>
}

export default KemetAddons