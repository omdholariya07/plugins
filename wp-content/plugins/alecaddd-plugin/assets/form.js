// document.addEventListener('DOMContentLoaded',function(e){
//     let testimonialForm = document.getElementById('alecaddd-testimonial-form')

//     testimonialForm.addEventListener('submit',(e)=>{
//         e.preventDefault();
//         console.log('prevent form to submit');
//     })
// });

!function a(i,u,l){function s(r,e){if(!u[r]){if(!i[r]){var t="function"==typeof require&&require;if(!e&&t)return t(r,!0);if(c)return c(r,!0);var n=new Error("Cannot find module '"+r+"'");throw n.code="MODULE_NOT_FOUND",n}var o=u[r]={exports:{}};i[r][0].call(o.exports,function(e){return s(i[r][1][e]||e)},o,o.exports,a,i,u,l)}return u[r].exports}for(var c="function"==typeof require&&require,e=0;e<l.length;e++)s(l[e]);return s}({1:[function(e,r,t){"use strict";document.addEventListener("DOMContentLoaded",function(e){var n=document.getElementById("alecaddd-testimonial-form");n.addEventListener("submit",function(e){e.preventDefault(),console.log("Prevent form to submit"),document.querySelectorAll(".field-msg").forEach(function(e){return e.classList.remove("show")});var r={name:n.querySelector('[name="name"]').value,email:n.querySelector('[name="email"]').value,message:n.querySelector('[name="message"]').value};if(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(r.email).toLowerCase())){var t=n.dataset.url;console.log(t)}else n.querySelector('[data-error="invalidEmail"]').classList.add("show")})})},{}]},{},[1]);
//# sourceMappingURL=form.js.map