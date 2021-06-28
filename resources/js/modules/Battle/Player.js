
import Stats from "./Stats";
import EntityBattleDisplay from "./EntityBattleDisplay";
import CombatMenu from "./CombatMenu";
import CombatEntity from "./combatEntity";
import CombatAction from "./CombatAction";
import Item from "./Item";

class Player extends CombatEntity {
    fillable = [ 'name', 'image_url', 'x', 'y' ];
    stats;
    statDisplay;
    image_url;
    entityType = 'player';

    constructor(playerData, refToBattle) {
        super(refToBattle);
        this.populateData(playerData);

        // this.combatMenu = new CombatMenu(refToBattle, this);
    }

    // Todo: max hp should be provided by the server -> resources
    getMaxHp() {
        return (3 * this.stats.level) * ((0.3 * this.stats.vitality) + (0.2 * this.stats.wisdom));
    }

    getMagic() {
        return [ 'water', 'fire', 'earth', 'earth2', 'haii'];
    }

    getItems() {
        return [
            new Item({'name': 'potion', 'quantity': 2}),
            new Item({'name': 'phoenix down', 'quantity': 1}),
            new Item({'name': 'ether', 'quantity': 77}),
        ]
    }
}

export default Player;
