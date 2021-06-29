import Item from "../Item";

class InventoryBase {
    items = [];
    quantity;

    getActions() {
        return this.items;
    }

    // Todo: perhaps add (de)bufs and stuff?
}

export default InventoryBase;
