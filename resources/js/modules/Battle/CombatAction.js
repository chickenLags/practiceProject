
import Time from "../Time";

class CombatAction {

    name; // 'attack' / 'water' / 'steal', 'potion',
    origin; // player, monster
    target; // player, monster
    combatType; // magic, physical, ranged
    actionType; // item, combat, utility
    isMagic; //true/false

    constructor(name, origin, target, actionType='combat', combatType='physical', isHeal=false) {
        this.name = name;
        this.origin = origin;
        this.target = target;
        this.combatType = combatType;
        this.actionType = actionType;
        this.isHeal = isHeal;
    }

    async handle(messageCallback) {
        if (this.isHeal) {
            return this.heal();
        }

        if (this.combatType === 'utility') {
            return this.custom();
        }

        return await this.handleCombat(messageCallback);
    }

    async handleCombat(messageCallback) {
        if (!this.origin.isAlive()) {
            return;
        }

        // Todo: implement items
        // Todo: implement magic
        // Todo: implement skills

        if (!this.hitsEnemy()) {
            messageCallback(`${this.target.getName()} did a swirly shwoo. ${this.origin.getName()}'s ${this.name} missed.`);

            await this.target.dodgeAnimation(800);
            return;
        }

        this.recDamage = this.getDamage();
        this.recDefence = this.getDefence();
        this.redReducedDamage = this.recDamage + this.getDefencePercentage(this.recDamage, this.recDefence);

        await this.origin.attackAnimation(500);

        this.target.applyDamage(this.redReducedDamage);
    }

    getDamage() {
        switch (this.combatType) {
            case 'magic': return this.origin.stats.spirit * 3;
            case 'physical': return this.origin.stats.strength * 2;
            case 'range': return this.origin.agility * 1.5;
            default: throw new Error('unknown combat type given in CombatAction.getDamage.');
        }
    }

    getDefence() {
        switch (this.combatType) {
            case 'magic': return this.origin.stats.wisdom * 3;
            case 'physical': return this.origin.stats.vitality * 2;
            case 'range': return this.origin.agility * 1.5;
            default: throw new Error('unknown combat type given in CombatAction.getDamage.');
        }
    }

    getDefencePercentage(damage, defence) {
        return (damage - defence) / damage;
    }

    hitsEnemy() {
        let percentageDiff = (this.target.stats.evasion - this.origin.stats.hit_rate) / this.origin.stats.hit_rate;
        return Math.random() <= 1 + percentageDiff;
    }

    handleUtility() {

    }

    handleHeal() {

    }


    getMagicDamage(entityStats) {
        return this.spirit * this.spell.getDamage();
    }

    itemDamage(entityStats) {

    }

}

export default CombatAction;
