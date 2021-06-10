window.onload = () => {
    window.onscroll = function() { myFunction() };

    const navbar = document.getElementById("main-nav-header");
    console.log(navbar);
    const sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

}
