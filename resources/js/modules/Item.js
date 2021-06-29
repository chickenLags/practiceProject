
class Item {

    fillable = [
        'name',
        'description',
        'quantity',
    ];

    constructor (itemData) {
        let fillableKeys = itemData.intersectKeys(this.fillable);
        for (let key of fillableKeys) {
            this[key] = itemData[key];
        }
    }
}

export default Item;
