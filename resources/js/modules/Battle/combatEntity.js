
import Stats from "./Stats";
import EntityBattleDisplay from "./EntityBattleDisplay";
import CombatMenu from "./CombatMenu";

class CombatEntity {
    fillable = [ 'name', 'image_url', 'x', 'y' ];
    // stats;
    // statDisplay;
    image_url;
    entityType = 'player'

    constructor(refToBattle) {
        this.refToBattle = refToBattle;
    }

    populateData(combatEntityData) {
        this.populateGeneralData(combatEntityData);
        this.populateStats(combatEntityData);
        this.populateStatDisplay(combatEntityData);
    }

    populateGeneralData(combatEntityData) {
        let keys = Object.keys(combatEntityData);
        let legalKeys = this.fillable.intersect(keys);
        legalKeys.forEach(key => this[key] = combatEntityData[key]);
    }

    populateStats(combatEntityData) {
        this.stats = new Stats(combatEntityData);
    }

    populateStatDisplay(combatEntityData) {
        this.statDisplay = new EntityBattleDisplay(this.entityType);
        this.statDisplay.setTitle(`Lvl. ${this.stats.level} - ${this.getName()}`);
        this.statDisplay.setHpBar(this.stats.hp, this.getMaxHp());
        this.statDisplay.setImageSrc(this.image_url);
    }

    getName() {
        if (this.entityType === 'enemy') {
            return this.name;
        }

        return 'You';
    }

    isAlive() {
        return this.stats.hp > 0;
    }

    getMaxHp() {
        throw new Error('not implemented function getMaxHp.');
    }

    applyDamage(damage) {
        this.stats.hp -= damage;
        this.statDisplay.setHpBar(this.stats.hp, this.getMaxHp());
    }

    async attackAnimation(duration) {
        await this.statDisplay.attackAnimation(duration);
    }

    async dodgeAnimation(duration) {
        await this.statDisplay.dodgeAnimation(duration);
    }

}

export default CombatEntity;
