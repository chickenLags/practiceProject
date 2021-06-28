
import Stats from "./Stats";
import EntityBattleDisplay from "./EntityBattleDisplay";
import CombatAction from "./CombatAction";
import CombatEntity from "./combatEntity";

class Monster extends CombatEntity {

    fillable = [
        'name',
        'image_url',
    ];

    stats;
    statDisplay;
    entityType = 'enemy';

    constructor(monsterData, refToBattle) {
        super(refToBattle);
        this.populateData(monsterData);
    }

    //TODO: max hp should be given by server... - resources?
    getMaxHp() {
        return (3 * this.stats.level) * ((0.6 * this.stats.vitality) + (0.4 * this.stats.wisdom));
    }

    getCombatAction() {
        return new CombatAction('claw', this, this.refToBattle.player);
    }

}
export default Monster;
