
class Item {

    fillable = [
        'name',
        'description',
        'quantity',
    ];

    constructor (statData) {
        for (let key in statData) {
            if (this.fillable.includes(key)) {
                this[key] = statData[key];
            }
        }
    }

    getRender() {
        let htmlOption = this.createElement();
        let quanityLabel = document.createTextNode(this.quantity);
        htmlOption.appendChild(quanityLabel);
        htmlOption.addEventListener('click', this.handlePlayerInput);
        return htmlOption;
    }

    createElement() {
        let htmlOption = document.createElement('p');
        htmlOption.classList.add(...['render', 'item-render', 'combat-option']);
        htmlOption.innerText = this.name;
        return htmlOption;
    }
}

export default Item;
