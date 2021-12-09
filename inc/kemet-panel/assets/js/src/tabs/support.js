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
                    <p>{__('Kemet Theme documentation library will guide you to build your next Kemet website easily without any need to touch a single line of code.', 'kemet')}</p>
                </div>
                <div className='kmt-card-action'>
                    <a className='kmt-button primary' target='_blank' href="#">{__('Documentation', 'kemet')}</a>
                </div>
            </Card>
            <Card>
                <div className='kmt-card-title'>
                    <h2>{__('Need Help', 'kemet')}</h2>
                </div>
                <div className='kmt-card-body'>
                    <p>{__('Have a question? Kemet support team is here to help you by answering your questions and handling your issues within 24-48 hours.', 'kemet')}</p>
                </div>
                <div className='kmt-card-action'>
                    <a className='kmt-button primary' target='_blank' href="#">{__('Submit a Ticket', 'kemet')}</a>
                </div>
            </Card>
            <Card>
                <div className='kmt-card-title'>
                    <h2>{__('Follow us', 'kemet')}</h2>
                </div>
                <div className='kmt-card-body'>
                    <p>{__('Come and join our Facebook group! Share your thoughts, opinions, suggestions, and help others. You will always be more than welcome!', 'kemet')}</p>
                </div>
                <div className='kmt-card-action'>
                    <a className='kmt-button primary' target='_blank' href="#">{__('Facebook Group', 'kemet')}</a>
                </div>
            </Card>
        </Grid>
    </Container>
}

export default Support