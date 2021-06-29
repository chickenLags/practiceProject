
class Magic {

    fillable = [
        'name',
        'level',
        'waterAttribute',
        'fireAttribute',
        'earthAttribute',
        'airAttribute',
        'multiplier',
    ];

    constructor(magicData) {
        for (let key in magicData.intersectKeys(this.fillable)) {
            this[key] = magicData[key];
        }
    }
}

export default Magic;
