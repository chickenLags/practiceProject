import CombatAction from "./CombatAction";

class Action {
    name;
    callback;
    constructor (name, callback) {
        this.name = name;
        this.callback = callback;
    }
}

class CombatMenu {

    battle;
    player;
    element;

    options;
    // baseOptions = ['attack', 'steal', 'magic', 'item', 'run'];
    availableActions = [];

    constructor(battle, player) {
        this.battle = battle;
        this.player = player;
        this.element = document.querySelector('.combat-menu');
        this.options = this.player.getMenuOptions()
            // .then(options => this.options = options);
    }

    setOptions(options ) {
        this.clearBattleMenu();
        this.options = options; // options are changed on show.
        this.show();
    }

    clearBattleMenu() {
        Array.from(this.element.children).forEach(child => this.element.removeChild(child));
    }

    addOptionToMenu = (option) => {
        let optionElement = option.getRender();
        optionElement.addEventListener('click', this.handleClickMenuItem);
        this.element.appendChild(optionElement);
    }

    handleClickMenuItem = (e) => {
        this.hide();

        let actionName = e.target.innerText.toLowerCase();
        let action = this.options.find(option => option.name === actionName);

        if (!action) {
            this.battle.notify(`Did not find ${actionName}`);
            this.setOptions(this.player.getMenuOptions());
            return;
        }

        console.log(action);
        action.handle(this, this.battle.battleCallback)
    }

    async show() {
        let optionRenders = await this.options.map(this.addOptionToMenu);
        this.element.classList.add('active');
    }

    hide() {
        this.element.classList.remove('active');
    }
}

export default CombatMenu;
