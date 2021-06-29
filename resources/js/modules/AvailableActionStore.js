

class AvailableActionStore {

    actions = [];

    constructor(magicInventory, itemIventory, skillInventory) {
        this.actions = this.actions.merge(magicInventory.getActions());
        this.actions = this.actions.merge(itemIventory.getActions());
        this.actions = this.actions.merge(skillInventory.getActions());
    }

    find(name) {
        return this.actions.find(action => action.name === name);
    }
}

export default AvailableActionStore;
