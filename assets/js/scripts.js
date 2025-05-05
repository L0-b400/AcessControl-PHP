// window.addEventListener('DOMContentLoaded', () => {
//     const msgContainer = document.getElementById('msg-container');
//     if (msgContainer) {
//         const message = msgContainer.dataset.msg;
//         if (message) {
//             alert(message);
//         }
//     }
// });


const mobileNav = document.querySelector(".hamburger");
const navbar = document.querySelector(".menubar");

const toggleNav = () => {
  navbar.classList.toggle("active");
  mobileNav.classList.toggle("hamburger-active");
};
mobileNav.addEventListener("click", () => toggleNav());
