$(document).ready(function () {
    var letCollapseWidth = false,
        paddingValue = 30,
        sumWidth = $('.navbar-right-block').width() + $('.navbar-left-block').width() + $('.navbar-brand').width() + paddingValue;

    $(window).on('resize', function () {
        navbarResizerFunc();
    });

    var navbarResizerFunc = function navbarResizerFunc() {
        if (sumWidth <= $(window).width()) {
            if (letCollapseWidth && letCollapseWidth <= $(window).width()) {
                $('#navbar').addClass('navbar-collapse');
                $('#navbar').removeClass('navbar-collapsed');
                $('nav').removeClass('navbar-collapsed-before');
                letCollapseWidth = false;
            }
        } else {
            $('#navbar').removeClass('navbar-collapse');
            $('#navbar').addClass('navbar-collapsed');
            $('nav').addClass('navbar-collapsed-before');
            letCollapseWidth = $(window).width();
        }
    };

    if ($(window).width() >= 768) {
        navbarResizerFunc();
    }

    $('[data-toggle="tooltip"]').tooltip();


});

// custom scroll for how it work page
document.addEventListener("DOMContentLoaded", function() {


    const scrollContainer = document.querySelector('.custom-scroll');

    scrollContainer.addEventListener('wheel', (event) => {
        if (event.deltaY !== 0) {
            event.preventDefault();
            scrollContainer.scrollLeft += event.deltaY;
        }
    });

// Optional: Drag scrolling for a smoother experience
    let isDown = false;
    let startX;
    let scrollLeft;

    scrollContainer.addEventListener('mousedown', (e) => {
        isDown = true;
        scrollContainer.classList.add('active');
        startX = e.pageX - scrollContainer.offsetLeft;
        scrollLeft = scrollContainer.scrollLeft;
    });

    scrollContainer.addEventListener('mouseleave', () => {
        isDown = false;
        scrollContainer.classList.remove('active');
    });

    scrollContainer.addEventListener('mouseup', () => {
        isDown = false;
        scrollContainer.classList.remove('active');
    });

    scrollContainer.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - scrollContainer.offsetLeft;
        const walk = (x - startX) * 2; // Scroll speed
        scrollContainer.scrollLeft = scrollLeft - walk;
    });
});

// Script For Mobile Menu
const menuIcon = document.getElementById("menuIcon");
const seeMoreBtn = document.getElementById("see_more_btn");
const downArrow = document.getElementById("down_arrow");
const seeMoreMenu = document.querySelector(".see_more_menu");
const cancelIcon = document.getElementById("mobSidebarCloseBtn");
const mobileMenuWrapper = document.querySelector(".mobile_menu_wrapper");

// Mobile menu toggle
menuIcon.addEventListener("click", () => {
    mobileMenuWrapper.classList.add("active");
});

cancelIcon.addEventListener("click", () => {
    mobileMenuWrapper.classList.remove("active");
});

// See more menu toggle
seeMoreBtn.addEventListener("click", () => {
    seeMoreMenu.classList.toggle("active");

    // Toggle the arrow icon direction
    if (seeMoreMenu.classList.contains("active")) {
        downArrow.style.transform = "rotate(90deg)";
    } else {
        downArrow.style.transform = "rotate(0deg)";
    }
});