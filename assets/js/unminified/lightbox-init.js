/* global SimpleLightbox */
const checkImage = (link) => {
    return /(png|jpg|jpeg|gif|tiff|bmp)$/.test(
        link.getAttribute('href').toLowerCase().split('?')[0].split('#')[0]
    );
}

const findAllImages = () => {
    const links = Array.from(document.querySelectorAll('a[href]:not(.custom-link):not(.kmt-core-gallery-lightbox)'));
    if (!links.length) {
        return;
    }
    links.map(link => {
        if (checkImage(link)) {
            link.classList.add('kmt-lightbox');
            new SimpleLightbox({
                elements: [link],
            });
        }
    })
}

const findGalleries = () => {
    const galleries = Array.from(document.querySelectorAll('.wp-block-gallery'));
    if (!galleries.length) {
        return;
    }

    galleries.map(gallery => {
        const galleryLinks = Array.from(gallery.querySelectorAll('.blocks-gallery-item a'));
        if (!galleryLinks.length) {
            return;
        }
        if (galleryLinks) {
            galleryLinks.map(link => {
                if (checkImage(link)) {
                    link.classList.add('kmt-core-gallery-lightbox');
                }
            })
        }
        new SimpleLightbox({
            elements: Array.from(gallery.querySelectorAll('.blocks-gallery-item a')).filter(link => checkImage(link)),
        });
    })
}

if ('loading' === document.readyState) {
    document.addEventListener('DOMContentLoaded', () => {
        findGalleries();
        findAllImages();
    });
} else {
    findGalleries();
    findAllImages();
}
