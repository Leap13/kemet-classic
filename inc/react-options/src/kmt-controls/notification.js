const NotificationComponent = ({ params }) => {
    const { content } = params;

    return <div className="kmt-notification">{content}</div>
}

export default NotificationComponent