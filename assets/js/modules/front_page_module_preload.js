const generateFrontPagePreload = () => {
    // in production necessarily delete " /miparti "
    const mainStyles = `<link rel="preload" as="style" href="` + window.location.origin + `/miparti/wp-content/themes/miparti/style.css" media="all">
    <link rel="preload" as="style" href="` + window.location.origin + `/miparti/wp-content/themes/miparti/assets/css/studio.min.css" media="all">    
    <link rel="preload" as="script" href="` + window.location.origin +  `/miparti/wp-content/themes/miparti/assets/js/libs.min.js" media="all">
    <link rel="preload" as="script" href="` + window.location.origin + `/miparti/wp-content/themes/miparti/assets/js/studio.min.js" media="all">
    <link rel="preload" as="script" href="` + window.location.origin + `/miparti/wp-content/themes/miparti/assets/js/main.min.js" media="all">
`;
    setTimeout(function () {
        document.head.insertAdjacentHTML('beforeEnd', mainStyles);
    }, 5000);
};
generateFrontPagePreload();