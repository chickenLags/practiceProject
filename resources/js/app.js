// require('./bootstrap');

require('alpinejs');
import Battle from './modules/Battle/Battle';

Array.prototype.intersect = function(arr1) {
    return this.filter(item => arr1.includes(item));
}


function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}



if (window.location.pathname ==='/battle') {
    let playerId = 1;
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/api/battle/${playerId}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            "X-CSRF-TOKEN": token,
        },
    })
        .then(res => res.json())
        .then(battleData => {
            if (!battleData.battle) {
                // notify no battle
                Battle.noBattle();
                return;
            }
            new Battle(battleData.battle)
        });
}
