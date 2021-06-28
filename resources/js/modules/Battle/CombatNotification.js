
import Time from "../Time";

class CombatNotification {

    active = false;
    element;

    constructor() {
        this.element = document.querySelector('.battle-container > .notification');
    }

    async show(message, duration = 1000) {
        this.element.innerText = message;
        this.element.classList.add('active');
        await Time.sleep(duration);
        this.element.classList.remove('active');
    }
}

export default CombatNotification;
