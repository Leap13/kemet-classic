import Card from "../common/Card"
import Container from "../common/Container"
import {
    __experimentalGrid as Grid,
} from '@wordpress/components';
const { __ } = wp.i18n;

const Support = () => {
    return <Container>
        <Grid columns={3} className='kmt-support'>
            <Card>
                <div className='kmt-card-title'>
                    <h2>{__('Knowledge Base', 'kemet')}</h2>
                </div>
                <div className='kmt-card-body'>
                    <p>{__('Here you will find answers for your questions and inquiries. We are always working on enhancing the Theme documention library for make the process easier for you.', 'kemet')}</p>
                </div>
                <div className='kmt-card-action'>
                    <a className='kmt-button primary' target='_blank' href="#">{__('Visit', 'kemet')}</a>
                </div>
            </Card>
            <Card>
                <div className='kmt-card-title'>
                    <h2>{__('Need Help', 'kemet')}</h2>
                </div>
                <div className='kmt-card-body'>
                    <p>{__('Kemet Theme has a professional support team who will pamper you by handling your issues and answering your questions and inquiries with 24-48 hours.', 'kemet')}</p>
                </div>
                <div className='kmt-card-action'>
                    <a className='kmt-button primary' target='_blank' href="#">{__('Visit', 'kemet')}</a>
                </div>
            </Card>
            <Card>
                <div className='kmt-card-title'>
                    <h2>{__('Follow us', 'kemet')}</h2>
                </div>
                <div className='kmt-card-body'>
                    <p>{__('Join our Facebook community to fellow Leap13 users creating effective websites! Share your site, ask questions and help others.', 'kemet')}</p>
                </div>
                <div className='kmt-card-action'>
                    <a className='kmt-button primary' target='_blank' href="#">{__('Visit', 'kemet')}</a>
                </div>
            </Card>
        </Grid>
    </Container>
}

export default Support