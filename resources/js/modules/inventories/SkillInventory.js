import {Skill} from "../Battle/Skill";
import InventoryBase from "./InventoryBase";

class SkillInventory extends InventoryBase {
    items = [];
    quantity;

    constructor (skillInventoryData) {
        super();
        skillInventoryData.forEach(skillData => {
            this.items.push(new Skill(skillData));
        });
    }

    // Todo: perhaps add (de)bufs and stuff?
}

export default SkillInventory;
