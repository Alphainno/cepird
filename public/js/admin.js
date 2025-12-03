// Submenu Toggle with localStorage persistence
function toggleMenu(menuId, element) {
    const submenu = document.getElementById(menuId);
    const arrow = element.querySelector(".submenu-arrow");

    submenu.classList.toggle("open");
    arrow.classList.toggle("rotated");

    // Save submenu state to localStorage
    const isOpen = submenu.classList.contains("open");
    localStorage.setItem("submenu_" + menuId, isOpen ? "open" : "closed");
}

// User Dropdown Toggle
function toggleDropdown() {
    const menu = document.getElementById("userDropdown");
    const arrow = document.querySelector(".dropdown-arrow");

    menu.classList.toggle("show");
    arrow.classList.toggle("rotate");
}

// Close dropdown on outside click
document.addEventListener("click", function (event) {
    const dropdown = document.querySelector(".dropdown");
    const menu = document.getElementById("userDropdown");
    const arrow = document.querySelector(".dropdown-arrow");

    if (!dropdown.contains(event.target) && menu.classList.contains("show")) {
        menu.classList.remove("show");
        arrow.classList.remove("rotate");
    }
});

// ================= Responsive Sidebar Logic =================
const sidebar = document.getElementById("sidebar");
const toggleButton = document.getElementById("sidebarToggle");
const backdrop = document.getElementById("sidebarBackdrop");

function openSidebar() {
    sidebar.classList.add("open");
    backdrop.classList.remove("hidden");
    // Save sidebar state to localStorage
    localStorage.setItem("sidebarState", "open");
}

function closeSidebar() {
    sidebar.classList.remove("open");
    backdrop.classList.add("hidden");
    // Save sidebar state to localStorage
    localStorage.setItem("sidebarState", "closed");
}

// Toggle button event
toggleButton.addEventListener("click", openSidebar);

// Close sidebar when clicking backdrop on mobile
backdrop.addEventListener("click", closeSidebar);

// Close sidebar when clicking any sidebar link on mobile/tablet (to mimic navigation)
document.querySelectorAll(".sidebar-link").forEach((link) => {
    link.addEventListener("click", () => {
        if (window.innerWidth < 1024) {
            // Only on small screens
            closeSidebar();
        }
    });
});

// Restore sidebar and submenu states on page load
window.addEventListener("load", () => {
    // Restore sidebar state
    const sidebarState = localStorage.getItem("sidebarState");

    if (window.innerWidth < 1024) {
        // On mobile: respect saved state or default to closed
        if (sidebarState === "open") {
            openSidebar();
        } else {
            closeSidebar();
        }
    }

    // Restore submenu states
    document.querySelectorAll('[id$="Menu"]').forEach((submenu) => {
        const menuId = submenu.id;
        const savedState = localStorage.getItem("submenu_" + menuId);

        if (savedState === "open") {
            submenu.classList.add("open");
            // Find and rotate the arrow
            const button = submenu.previousElementSibling;
            if (button) {
                const arrow = button.querySelector(".submenu-arrow");
                if (arrow) {
                    arrow.classList.add("rotated");
                }
            }
        }
    });
});

// Close sidebar when resizing from small to large (optional: prevents visual glitch)
let isLargeScreen = window.innerWidth >= 1024;
window.addEventListener("resize", () => {
    const currentlyLarge = window.innerWidth >= 1024;
    if (currentlyLarge && !isLargeScreen) {
        // If transitioning from small to large
        sidebar.classList.remove("open");
        backdrop.classList.add("hidden");
    }
    isLargeScreen = currentlyLarge;
});
