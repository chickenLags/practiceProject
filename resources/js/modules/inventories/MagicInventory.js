import Magic from "../Magic";
import InventoryBase from "./InventoryBase";


class MagicInventory extends InventoryBase {
    items = [];

    constructor (magicInventoryData) {
        super();
        this.items = magicInventoryData.map(magicData => new Magic(magicData));
    }
}

export default MagicInventory;
