const body = document.querySelector("body");
const sidebar = body.querySelector("nav");
const toggle = body.querySelector(".toggle");
const modeSwitch = body.querySelector(".toggle-switch");
const modeText = body.querySelector(".mode-text");
const home = document.querySelector(".home");
const sidebarBtn = document.querySelector(".sidebarBtn");

const storedSidebarState = localStorage.getItem("sidebarState");
const isSidebarClosed = storedSidebarState === "closed";
sidebar.classList.toggle("close", isSidebarClosed);
home.style.marginLeft = isSidebarClosed ? "100px" : "270px";

function updateSidebarBtnContent() {
    sidebarBtn.innerHTML = sidebar.classList.contains("active")
        ? "arrow_back"
        : "menu";
}

sidebarBtn.addEventListener("click", function () {
    sidebar.classList.toggle("active");
    const isSidebarOpen = sidebar.classList.contains("active");
    localStorage.setItem("isSidebarOpen", isSidebarOpen);
    updateSidebarBtnContent();
});

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    sidebar.classList.toggle("close");
});

sidebar.addEventListener("mouseenter", function () {
    sidebar.classList.add("open");
});

sidebar.addEventListener("mouseleave", function () {
    sidebar.classList.remove("open");
});

const storedMode = localStorage.getItem("mode");
body.classList.toggle("dark", storedMode === "dark");
modeText.innerText = storedMode === "dark" ? "Claro" : "Oscuro";

modeSwitch.addEventListener("click", function () {
    body.classList.toggle("dark");
    const isDarkMode = body.classList.contains("dark");
    modeText.innerText = isDarkMode ? "Claro" : "Oscuro";
    localStorage.setItem("mode", isDarkMode ? "dark" : "light");
});

updateSidebarBtnContent();
