'use strict'

let fbPad = null;
let fbOn = false;
let ddOn = false;
let mlt = 0;

function prepareFBPad() {
    if (fbOn) {
        return;
    }

    if (fbPad == null) {
        fbPad = document.createElement('div');
        fbPad.className = 'fb_form_pad off';
        document.body.appendChild(fbPad);
    }

    fbPad.classList.add('wait');
    fixAtCenter(fbPad, document.body);
    fbPad.style.left = ((document.body.offsetWidth - fbPad.offsetWidth) / 2) + 'px';
    fbPad.style.top = ((document.body.offsetHeight - fbPad.offsetHeight) / 2) + 'px';
    fbPad.classList.remove('off');
    fbPad.classList.add('on');
    fbOn = true;
}

function closeFBForm() {
    if (fbOn) {
        fbPad.classList.remove('on');
        fbPad.classList.add('off');
        fbPad.innerHTML = '';
        fbOn = false;
    }
}

function checkForm(fm, url) {
    let pms = '_token=' + fm._token.value + '&email=' + fm.email.value;
    sendPostRequest(url, pms, fbResponse);
    setTimeout(setWaitResponse, 10);
    return false;
}

function setWaitResponse() {
    fbPad.querySelector('form').innerHTML = '';
    fbPad.querySelector('form').classList.add('wait');
}

function fixAtCenter(obj, pad) {
    obj.style.left = ((pad.offsetWidth - obj.offsetWidth) / 2) + 'px';
    obj.style.top = ((pad.offsetHeight - obj.offsetHeight) / 2) + 'px';
}

function sendGetRequest(url, cbf) {
    const xhr = new XMLHttpRequest();

    xhr.onload = cbf;

    xhr.onerror = xhr.onabort = (() => {
        alert('HTTP request error');
    });

    xhr.open('GET', url, true);
    xhr.send(null);

}

function sendPostRequest(url, pms, cbf) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = cbf;
    xhr.open('POST', url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(pms);
}

function feedBack(url) {
    prepareFBPad();
    sendGetRequest(url, fbResponse);
    return false;
}

function fbResponse() {
    if (this.readyState == 4) {
        if (this.status == 200) {
            let _r = JSON.parse(this.responseText);
            switch (_r.dest) {
                case 'sendform':
                    fbPad.classList.remove('wait');
                    fbPad.innerHTML = _r.form;
                    fixAtCenter(fbPad, document.body);
                    fbPad.querySelector('#email').focus();
                    break;
                case 'sendresp':
                    fbPad.querySelector('form').classList.remove('wait');
                    fbPad.querySelector('form').innerHTML = _r.response;
                    fixAtCenter(fbPad, document.body);
                    break;
            }
        } else
            alert('HTTP request error.');
    }
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
    if(mlt != 0) {
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