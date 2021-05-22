(function ($) {
    var signupLink = $('a.signup-link'),
        signingLink = $('a.signin-link'),
        platformLink = $('a.platform-link'),
        platformURL = window.location.origin + '/vp/';

    platformLink.hide();

    function initKeycloak() {
        var clientId;

        switch (window.location.hostname) {
            case 'cloud.giotto.localhost':
            case 'giotto.ai':
            case 'cloud.giotto.ai':
            case 'www.giotto.ai':
                clientId = 'cloud-giotto-ai';
                break;

            case 'dev-www.giotto.ai':
            case 'dev-cloud.giotto.ai':
                clientId = 'dev-cloud-giotto-ai';
                break;
        }

        var keycloak = new Keycloak({
            url: window.location.origin + '/auth/',
            realm: 'master',
            clientId: clientId
        });

        keycloak.init().then(function (authenticated) {
            if (authenticated) {
                signingLink.addClass('d-none');
                signupLink.addClass('d-none');
                platformLink.removeClass('d-none');
            } else {
                signingLink.removeClass('d-none');
                signupLink.removeClass('d-none');
                platformLink.addClass('d-none');
            }
        });

        var signinUrl = keycloak.createLoginUrl({
            redirectUri: platformURL,
            prompt: 'none'
        });

        var signupUrl = keycloak.createRegisterUrl({
            redirectUri: platformURL,
            prompt: 'none'
        });

        $('.signup-link').each(function () {
            $(this).attr("href", signupUrl);
        });
        $('.signin-link').each(function () {
            $(this).attr("href", signinUrl);
        });
        $('.platform-link').each(function () {
            $(this).attr("href", platformURL);
        });
    }

    function navBarScrollHandler() {
        let navBar = document.getElementById('navbarscroll');
        let navBarMobile = document.getElementById('navbarscrollmobile');

        if (window.scrollY > 80) {
            navBar.classList.add('scrolled');
            navBarMobile.classList.add('scrolled');
        } else {
            navBar.classList.remove('scrolled');
            navBarMobile.classList.remove('scrolled');
        }
    }

    

    $(window).on('load', function () {
        initKeycloak();
        document.addEventListener('scroll', navBarScrollHandler);

    });
})(jQuery);