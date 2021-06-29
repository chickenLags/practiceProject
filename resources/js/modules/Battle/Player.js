
import Stats from "./Stats";
import EntityBattleDisplay from "./EntityBattleDisplay";
import CombatMenu from "./CombatMenu";
import CombatEntity from "./combatEntity";
import CombatAction from "./CombatAction";
import Item from "../Item";
import Repo from "../Repo";

import {CombatMenuItem, CombatMenuOption, CombatMenuSkill, CombatMenuMagic, CombatMenuMenu, CombatMenuAction} from './CombatMenuItem'
import {Run, Steal} from "./Skill";
import MagicInventory from "../inventories/MagicInventory";
import ItemInventory from "../inventories/ItemInventory";
import SkillInventory from "../inventories/SkillInventory";
import AvailableActionStore from "../AvailableActionStore";

class Player extends CombatEntity {
    fillable = ['id', 'name', 'image_url', 'x', 'y' ];
    stats;
    statDisplay;
    image_url;
    entityType = 'player';
    magicInventory;
    itemInventory;

    constructor(playerData, refToBattle) {
        super(refToBattle);
        this.populateData(playerData);
    }

    async initAsync() {
        let magicData = await Repo.getMagicForPlayer(this.id);
        this.magicInventory = new MagicInventory(magicData);
        let inventoryData = await Repo.getInventoryForPlayer(this.id);
        this.itemInventory = new ItemInventory(inventoryData);
        let skillData = await Repo.getSkillsForPlayer(this.id);
        this.skillInventory = new SkillInventory(skillData);

        this.availableActions = new AvailableActionStore(this.magicInventory, this.itemInventory, this.skillInventory );
    }

    // Todo: max hp should be provided by the server -> resources
    getMaxHp() {
        return (3 * this.stats.level) * ((0.3 * this.stats.vitality) + (0.2 * this.stats.wisdom));
    }

    async getMagicMenuOptions() {
        let options = [];
        for (const magic of this.getMagic()) {
            let combatMenuMagic = await new CombatMenuMagic(magic.name, new Magic(magic, this, this.refToBattle.monster));
            option.push(combatMenuMagic);
        }
        return options;
    }

    getItemMenuOptions = () => {
        return this.itemInventory.items.map(item => new CombatMenuItem(item, new CombatAction(item, this, this.refToBattle.monster, 'item')))
    }

    getMenuOptions = () => {
        return [
            new CombatMenuAction('attack', new CombatAction('attack', this, this.refToBattle.monster)),
            new CombatMenuSkill('steal', new Steal(this, this.refToBattle.monster)),
            // new CombatMenuMenu('magic', this.getMagicMenuOptions()),
            new CombatMenuMenu('item', this.getItemMenuOptions()),
            new CombatMenuSkill('run', new Run(this, this.refToBattle.monster))
        ]
    }

    async getAvailableActions() {
        throw new Error('should i be here?');
        return this.availableActions;
    }
}

export default Player;
