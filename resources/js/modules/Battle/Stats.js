
class Stats {
    fillable = [
        'level',
        'hp',
        'strength', // dmg aplifier
        'spirit', // magic attack amplifier
        'vitality', // health amplifier, physical defence
        'wisdom', // health amplifier, magic defence
        'luck', // ??
        'hit_rate', // chance to hit
        'agility', // ranged attack amplifier, minimal time till next turn increase.
        'evasion', // chance to evade
        'speed', // time till next turn
    ];

    constructor (statData) {
        for (let key in statData) {
            if (this.fillable.includes(key)) {
                this[key] = statData[key];
            }
        }
    }

    // Todo: perhaps add (de)bufs and stuff?
}

export default Stats;
