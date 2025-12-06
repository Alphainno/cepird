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

// ================= Toast Notification System =================
function showToast(message, type = "success", duration = 5000) {
    const toastContainer = document.getElementById("toast-container");

    // Create toast element
    const toast = document.createElement("div");
    toast.className = `toast-notification flex items-center p-4 rounded-lg shadow-lg transform translate-x-full transition-all duration-300 ease-in-out max-w-sm`;

    // Set colors based on type
    const colors = {
        success: "bg-green-500 text-white border-green-600",
        error: "bg-red-500 text-white border-red-600",
        warning: "bg-yellow-500 text-white border-yellow-600",
        info: "bg-blue-500 text-white border-blue-600",
    };

    toast.classList.add(...colors[type].split(" "));

    // Add icon based on type
    const icons = {
        success: `<svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
        </svg>`,
        error: `<svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
        </svg>`,
        warning: `<svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
        </svg>`,
        info: `<svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
        </svg>`,
    };

    // Create toast content
    toast.innerHTML = `
        ${icons[type]}
        <div class="flex-1 text-sm font-medium">${message}</div>
        <button class="ml-3 text-white hover:text-gray-200 focus:outline-none" onclick="dismissToast(this)">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    `;

    // Add to container
    toastContainer.appendChild(toast);

    // Trigger animation
    setTimeout(() => {
        toast.classList.remove("translate-x-full");
        toast.classList.add("translate-x-0");
    }, 10);

    // Auto dismiss
    if (duration > 0) {
        setTimeout(() => {
            dismissToast(toast.querySelector("button"));
        }, duration);
    }
}

function dismissToast(button) {
    const toast = button.closest(".toast-notification");
    toast.classList.remove("translate-x-0");
    toast.classList.add("translate-x-full");

    // Remove from DOM after animation
    setTimeout(() => {
        if (toast.parentNode) {
            toast.parentNode.removeChild(toast);
        }
    }, 300);
}
