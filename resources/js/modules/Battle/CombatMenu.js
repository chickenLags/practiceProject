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
    baseOptions = ['attack', 'steal', 'magic', 'item', 'run'];
    // initialActions = [
    //     new Action('attack', this.battle.handleAttack),
    //     // new Action('magic', this.showMagicActions),
    //     // new Action('item', this.showItems),
    //     new Action('escaspe', this.battle.escape),
    //
    // ]

    constructor(battle, player) {
        this.battle = battle;
        this.player = player;
        this.element = document.querySelector('.combat-menu');
        // this.baseOptions.forEach(option => this.element.appendChild(this.makeHtmlOption(option)));
        this.options = this.baseOptions;
    }

    setOptions(options ) {
        this.clearBattleMenu();
        this.options = options; // options are changed on show.
    }

    clearBattleMenu() {
        Array.from(this.element.children).forEach(child => this.element.removeChild(child));
    }

    makeHtmlOption(innerText) {
        let htmlOption = document.createElement('p');
        htmlOption.classList.add(['combat-option']);
        htmlOption.innerText = innerText;

        return htmlOption;
    }

    addHandleCallbackToElement = (element) => {
        element.addEventListener('click', this.handlePlayerInput);
    }

    handlePlayerInput = (e) => {
        this.hide();
        let action = e.target.innerText.toLowerCase();
        switch(action) {
            case 'attack': return this.battle.battleCallback(new CombatAction('attack', this.player, this.battle.monster));
            case 'magic': return this.renderMagic();
            case 'item': return this.renderItems();
            case 'steal': return this.battle.battleCallback(new CombatAction('steal', this.player, this.battle.monster)); // why is this regarded as an attack?
            case 'run': return this.battle.battleCallback(new CombatAction('run', this.player, this.battle.monster)); // why is this regarded as an attack?
            default:
                this.battle.notify(`Did not find ${action}`);
                throw new Error(`Did not find ${action}`);
                break;
        }
    }

    renderMagic() {
        this.setOptions(this.player.getMagic());
        this.show();
    }

    renderItems() {
        this.setOptions(this.player.getItems());
        this.show();
    }

    show() {
        let optionRenders = this.options.map(option => {
            if (typeof option === 'object') {
                return option.getRender();
            }

            return this.makeHtmlOption(option);
        })
        // TODO: left off here, implementing items and their usage.
        optionRenders.forEach(this.addHandleCallbackToElement);
        optionRenders.forEach(option => this.element.appendChild(option));
        this.element.classList.add('active');
    }

    hide() {
        this.element.classList.remove('active');
    }

    showMagicActions = () => {
        // return [
            // new Action('water', )
        // ]
    }

}

export default CombatMenu;
