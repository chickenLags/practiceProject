import CombatAction from "./CombatAction";

class MenuItemParent {
    constructor() {
        // this.name = name;
    }

    handle(combatMenu, battleCallback) {

    }

    getRender() {
        let htmlOption = document.createElement('p');
        htmlOption.classList.add(['combat-option']);
        htmlOption.innerText = this.name;

        return htmlOption;
    }



}

class CombatMenuItem extends MenuItemParent {
    constructor(item, combatAction) {
        super();
        this.name = item.name;
        this.item = item;
        this.combatAction = combatAction;
    }

    handle(combatMenu, battleCallback) {
        battleCallback(this.combatAction);
    }

    getRender() {
        let htmlOption = this.createElement();
        let quanityLabel = this.createQuantityLabel();

        htmlOption.appendChild(quanityLabel);
        return htmlOption;
    }

    createElement() {
        let htmlOption = document.createElement('p');
        htmlOption.classList.add(...['render', 'item-render', 'combat-option']);
        htmlOption.innerText = this.item.name;
        return htmlOption;
    }

    createQuantityLabel() {
        let quantityLabel = document.createElement('label');
        quantityLabel.classList.add(...['mr-4', 'float-right', 'lower']);
        quantityLabel.innerText = `x ${this.item.quantity}`;
        return quantityLabel;
    }

}

class CombatMenuOption extends MenuItemParent {
    constructor(name, combatAction, menubles = []) {
        super();
        this.name = name;
        this.combatAction = combatAction;
    }

    handle(combatMenu, battleCallback) {
        battleCallback(this.combatAction);
    }
}

class CombatMenuSkill extends MenuItemParent {
    constructor(name, skill, combatAction) {
        super();
        this.name = name;
        this.combatAction = combatAction;
    }

    handle(combatMenu, battleCallback) {

    }
}

class CombatMenuMenu extends MenuItemParent {
    constructor(name, nextMenu) {
        super();
        this.name = name;
        this.nextMenu = nextMenu;
    }

    handle(combatMenu, battleCallback) {
        combatMenu.setOptions(this.nextMenu)
    }
}

class CombatMenuMagic extends MenuItemParent {
    constructor(name, magic) {
        super();
        this.name = name;
        this.magic = magic;
    }

    handle(combatMenu, battleCallback) {

    }
}

class CombatMenuAction extends MenuItemParent {
    constructor(name, combatAction) {
        super();
        this.name = name;
        this.combatAction = combatAction;
    }

    handle(combatMenu, battleCallback) {
        battleCallback(this.combatAction);
    }
}

export {CombatMenuItem, CombatMenuOption, CombatMenuSkill, CombatMenuMagic, CombatMenuMenu, CombatMenuAction};
