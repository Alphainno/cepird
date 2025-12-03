const navbar = document.getElementById("navbar");
const mobileMenuButton = document.getElementById("mobile-menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const menuIcon = document.getElementById("menu-icon");
const xIcon = document.getElementById("x-icon");
let isMobileMenuOpen = false;

/**
 * Handles the navbar style change on scroll.
 */
const handleScroll = () => {
    const isScrolled = window.scrollY > 20;
    if (isScrolled) {
        navbar.classList.remove("bg-transparent", "py-5");
        navbar.classList.add(
            "bg-white/95",
            "backdrop-blur-md",
            "shadow-md",
            "py-3"
        );
    } else {
        navbar.classList.remove(
            "bg-white/95",
            "backdrop-blur-md",
            "shadow-md",
            "py-3"
        );
        navbar.classList.add("bg-transparent", "py-5");
    }
};

/**
 * Toggles the visibility of the mobile menu.
 */
const toggleMobileMenu = () => {
    isMobileMenuOpen = !isMobileMenuOpen;

    if (isMobileMenuOpen) {
        mobileMenu.classList.remove("mobile-menu-closed");
        mobileMenu.classList.add("mobile-menu-open");
        menuIcon.classList.add("hidden");
        xIcon.classList.remove("hidden");
    } else {
        mobileMenu.classList.remove("mobile-menu-open");
        mobileMenu.classList.add("mobile-menu-closed");
        menuIcon.classList.remove("hidden");
        xIcon.classList.add("hidden");
    }
};

/**
 * Smoothly scrolls to a section and closes the mobile menu if open.
 * @param {string} id - The ID of the section to scroll to.
 */
const scrollToSection = (id) => {
    if (isMobileMenuOpen) {
        toggleMobileMenu(); // Close menu
    }
    const element = document.getElementById(id);
    if (element) {
        element.scrollIntoView({ behavior: "smooth" });
    }
};

// Event Listeners
window.addEventListener("scroll", handleScroll);
mobileMenuButton.addEventListener("click", toggleMobileMenu);

// Ensure initial state is correct (in case page is loaded scrolled)
window.addEventListener("load", handleScroll);

// Attach scroll handler to desktop navigation buttons
document
    .querySelectorAll('.md\\:flex button[onclick^="scrollToSection"]')
    .forEach((button) => {
        const sectionId = button.getAttribute("onclick").match(/'([^']+)'/)[1];
        button.onclick = () => scrollToSection(sectionId);
    });

// Attach scroll handler to mobile menu buttons
document
    .querySelectorAll('#mobile-menu button[onclick^="scrollToSection"]')
    .forEach((button) => {
        const sectionId = button.getAttribute("onclick").match(/'([^']+)'/)[1];
        button.onclick = () => scrollToSection(sectionId);
    });
