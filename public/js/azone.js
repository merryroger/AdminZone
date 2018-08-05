'use strict'

let fbOn = false;
let ddOn = false;
let mlt = 0;

function fixAtCenter(obj, pad) {
    obj.style.left = ((pad.offsetWidth - obj.offsetWidth) / 2) + 'px';
    obj.style.top = ((pad.offsetHeight - obj.offsetHeight) / 2) + 'px';
}

function feedBack() {
    if (!fbOn) {
        let _fbf = document.querySelector('.fb_form_pad');
        fixAtCenter(_fbf, document.body);
        _fbf.classList.remove('off');
        _fbf.classList.add('on');
        document.querySelector('#email').focus();
        fbOn = true;
    }
    return false;
}

function closeFBForm() {
    if (fbOn) {
        let _fbf = document.querySelector('.fb_form_pad');
        _fbf.classList.remove('on');
        _fbf.classList.add('off');
        fbOn = false;
    }
}

function closeResponseForm() {
    let _rf = document.querySelector('#app');
    _rf.innerHTML = '';
    _rf.classList.add('h');
}

function showDDMenu(src) {
    if (!ddOn) {
        let dd = document.querySelector('#dd_menu');
        dd.classList.toggle('h');
        dd.classList.toggle('v');
        dd.style.top = src.offsetTop + src.offsetHeight + 5 + 'px';
        dd.style.left = src.offsetLeft + 'px';
        dd.addEventListener('mousemove', resetDDClose);
        dd.addEventListener('mouseout', closeDDMenu);
        ddOn = true;
    }
}

function resetDDClose() {
    if (mlt != 0) {
        clearTimeout(mlt);
        mlt = 0;
    }
}

function closeDDMenu() {
    if (ddOn) {
        mlt = setTimeout(shutDDMenu, 1000);
    }
}

function shutDDMenu() {
    if (ddOn) {
        let dd = document.querySelector('#dd_menu');
        dd.removeEventListener('mouseout', closeDDMenu);
        dd.removeEventListener('mousemove', resetDDClose);
        dd.classList.toggle('v');
        dd.classList.toggle('h');
        ddOn = false;
        mlt = 0;
    }
}

//onblur = shutDDMenu;