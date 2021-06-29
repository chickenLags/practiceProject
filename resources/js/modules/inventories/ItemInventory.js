import Item from "../Item";
import InventoryBase from "./InventoryBase";

class ItemInventory extends InventoryBase{
    items = [];
    quantity;

    constructor (itemInventoryData) {
        super();
        itemInventoryData.forEach(itemData => {
            this.items.push(new Item(itemData));
        });
    }
}

export default ItemInventory;
